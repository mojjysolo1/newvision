<?php

class UploadFiles{
   public  $errmsg_arr = array();
   public $errflag = false;

   private $permitted_images= array('image/jpg','image/jpeg','image/pjpeg','image/png');
   public $file_basename;

    public $file_size;
    public $file_name;
    public $file_tmp;
    public $file_type;

    function __construct($files_post_array){

        $timestamp=time();
        $this->file_basename=basename($files_post_array['file']['name']);
        $filestr=$timestamp.''.$this->file_basename;


        $this->file_tmp=$files_post_array['file']['tmp_name'];
        $this->file_name=str_replace(' ','_',$filestr);
        $this->file_size=$files_post_array['file']['size'];
        $this->file_type=$files_post_array['file']['type'];
    }

    public function getFileName(){
        return  $this->file_name;
    }

    public function getFileBaseName(){
        return   $this->file_basename;
    }


    public function checkImageFileErrors(){
      $imagetype_error=false;
      define(MAXFILE,2097152,true);
//2MB=2097152bytes

//check image type
if(in_array($this->file_type,$this->permitted_images)){
    $imagetype_error=true;
}

/*foreach($this->permitted_images as $image_type_values){
    if($this->file_type==$image_type_values){
        $imagetype_error=true;
    break;
    }
    }
*/

//End of check image type
if($imagetype_error==false){
$this->errmsg_arr[]=ParseError(" The uploded image type is not accepted ".$this->file_basename);
$this->errflag=true;
}

if($this->file_size>MAXFILE){
$this->errmsg_arr[]=ParseError("Image is too big to be uploaded on our server");
$this->errflag=true;
}
//check name
if(strlen($this->file_name)>80){
$this->errmsg_arr[]=ParseError("The name of your image is too long.");
$this->errflag=true;
}

return $this->errflag;
    }



    public function IsImage($image_path){

$dobm=getimagesize($image_path);
$mimet=$dobm['mime'];

//check if a valid mime
if(!in_array($mimet,$this->permitted_images)){

return false;
}

return true;
    }

    public function UploadFile($image_save_filepath){

        if(move_uploaded_file($this->file_tmp,$image_save_filepath)){
            
      return true;

        }else{
            return false;
        }

    }


}

?>