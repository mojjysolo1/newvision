<?php
class Database {
private $conn;
private $table;
private $field,$field1,$field2,$field3;
private $value,$value1,$value2,$value3;
public  $numRows,$numPairRows;
public  $pairArrayValues=array();
public  $rowValues=array();
public $insert_id;
public $error;

/*private $host='localhost';
    private $dbName='schoolsa_dit';
    private $userName='schoolsa_root';
    private $password='schoolsafia@15feb2020';*/
//    
//    private $host='localhost';
//	private $dbName='ditmaps';
//	//private $dbName='dit_test';
//    private $userName='root';
//	//private $password='schoolsafia@2017';
//	private $password='schoolsaphia@2017';

public function __construct(){
  try{
         $this->conn = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_DATABASE'].";port=".$_ENV['DB_PORT']."",$_ENV['DB_USER'],$_ENV['DB_PASS']);//;charset=utf8
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	}catch(PDOException $e){
		
		$this->error=$e->getMessage();
	
	}
        
}

public function changeDatabaseConnection($host='localhost',$dbName='dit',$userName='root',$password=''){
	$this->host=$host;
    $this->dbName=$dbName;
	$this->userName=$userName;
	$this->password=$password;

	$this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName;port=3307",$this->userName,$this->password);//;charset=utf8
	$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
}


public function set($instance,$column,$row){
$this->table=$instance;
$this->field=$column;
$this->value=$row;
}
public function setPairs($instance,$column,$row,$column1,$row1){
$this->table=$instance;
$this->field=$column;
$this->value=$row;
$this->field1=$column1;
$this->value1=$row1;
}

public function setTriple($instance,$column,$row,$column1,$row1,$column2,$row2){
$this->table=$instance;
$this->field=$column;
$this->value=$row;
$this->field1=$column1;
$this->value1=$row1;
$this->field2=$column2;
$this->value2=$row2;
}

public function setQuadruple($instance,$column,$row,$column1,$row1,$column2,$row2,$column3,$row3){
$this->table=$instance;
$this->field=$column;
$this->value=$row;
$this->field1=$column1;
$this->value1=$row1;
$this->field2=$column2;
$this->value2=$row2;
$this->field3=$column3;
$this->value3=$row3;
}

public function executeStatement($param){

		try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,1);
	        $sql=$this->conn->prepare($param);
		     $resp=$sql->execute();
		}catch(PDOException $e){				
		$this->error=$e->getMessage();			
			}	
		return $resp;
	}
        
public function select($param){
	$sql=$this->conn->query($param);
	$this->numRows=$sql->fetch();
	//mysqli_free_result($sql);
	return $this->numRows;
	}

	public function selectAllValues($params){
		$sql=$this->conn->prepare($params);
		$sql->execute();
		$this->numRows=$sql->rowCount();
		$this->rowValues=$sql->fetchAll(PDO::FETCH_ASSOC);
		//mysqli_free_result($sql);
		return $this->rowValues;
		}


	public function updateTables($upd_sql){
try{
	$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare($upd_sql);
    $resp=$update->execute();
	}catch(PDOException $e){
		
		$this->error=$e->getMessage();
	
	}

//$this->insert_id=$this->conn->lastinsertid();
return $resp;
		}


public function getCount(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."'");
$this->numRows= $sql->rowCount();
//mysqli_free_result($sql);
return $this->numRows;
}

public function getCountIn(){
	$sql=$this->conn->query("select * from ".$this->table." where ".$this->field." in ('".$this->value."')");
	$this->numRows= $sql->rowCount();
	//mysqli_free_result($sql);
	return $this->numRows;
	}

public function getPairCount(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."' and ".$this->field1."='".$this->value1."'");
$this->numPairRows=$sql->rowCount();
//mysqli_free_result($sql);
return $this->numPairRows;
}

public function getTripleCount(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."' and ".$this->field1."='".$this->value1."' and ".$this->field2."='".$this->value2."' ");
$this->numPairRows= $sql->rowCount();
//mysqli_free_result($sql);
return $this->numPairRows;
}

public function getQuadrupleCount(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."' and ".$this->field1."='".$this->value1."' and ".$this->field2."='".$this->value2."' and ".$this->field3."='".$this->value3."' ");
$this->numPairRows=$sql->rowCount();
//mysqli_free_result($sql);
return $this->numPairRows;
}

public function getValues(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."'");
$this->rowValues=$sql->fetch();
//mysqli_free_result($sql);
return $this->rowValues;
}


public function getAllValues(){
$sql=$this->conn->prepare("select * from ".$this->table." where ".$this->field."='".$this->value."'");
$sql->execute();
$this->rowValues=$sql->fetchAll();
//mysqli_free_result($sql);
return $this->rowValues;
}

public function getAllValuesEndsLike(){
	$sql=$this->conn->prepare("select * from ".$this->table." where ".$this->field." like '%".$this->value."'");
	$sql->execute();
	$this->rowValues=$sql->fetchAll();
	//mysqli_free_result($sql);
	return $this->rowValues;
	}

public function getAllValuesLimit($btwn_start,$btwn_end,$orderby){
$sql=$this->conn->prepare("select * from ".$this->table." where ".$this->field."='".$this->value."' order by ".$orderby." limit ".$btwn_start.",".$btwn_end."" );
$sql->execute();
$this->rowValues=$sql->fetchAll();
//mysqli_free_result($sql);
return $this->rowValues;
}

public function getPairValues(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."' and ".$this->field1."='".$this->value1."'");

$this->pairArrayValues=$sql->fetch();
//mysqli_free_result($sql);
return $this->pairArrayValues;
}


public function getTripleValues(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."' and ".$this->field1."='".$this->value1."' and ".$this->field2."='".$this->value2."' ");
$this->pairArrayValues=$sql->fetch();
//mysqli_free_result($sql);
return $this->pairArrayValues;
}


public function getQuadrupleValues(){
$sql=$this->conn->query("select * from ".$this->table." where ".$this->field."='".$this->value."' and ".$this->field1."='".$this->value1."' and ".$this->field2."='".$this->value2."' and ".$this->field3."='".$this->value3."' ");
$this->pairArrayValues=$sql->fetch();
//mysqli_free_result($sql);
return $this->pairArrayValues;
}



public function insertValues(array $array_vals){

	//get field placeholders for prepare statement
	$keys=array_keys($array_vals);

$filtered_keys=array_map(fn($keys)=>':'.$keys.',',$keys);
//trim ',' on the last element
$filtered_keys[count($filtered_keys)-1]=rtrim($filtered_keys[count($filtered_keys)-1],',');
$params=join('',$filtered_keys);
//ends get field placeholders for prepare statement

try{
      $query="insert into ".$this->table." values (".$params.")";
      	$insert=$this->conn->prepare($query);
      
      $resp=$insert->execute($array_vals);
      $this->insert_id=$this->conn->lastinsertid();
      return $resp;

   }catch(PDOException $e){
   	  $this->error=$e->getMessage();
   	   
   }

}

//u_id, names, sex, email, auth_id, pwd, photo, title, pos, department, contacts, stamp
public function users_update($u_id,$names,$sex,$email,$auth_id,$pwd,$photo,$contacts,$stamp){
	try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set names='$names',sex='$sex',email='$email',auth_id='$auth_id',pwd='$pwd',photo='$photo',contacts='$contacts',stamp='$stamp' where  u_id='$u_id' ");//stopped
$resp=$update->execute();
	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();
return $resp;
}


public function beginTransaction()
{
	return $this->conn->beginTransaction();
}
public function commit()
{
	return $this->conn->commit();
}

public function rollBack()
{
	return $this->conn->rollBack();
}

public function inTransaction()
{
	return $this->conn->inTransaction();
}

//p_id,reg_no,contact,cand_results,transac_uuid,transac_token,request2pay,confirm_payment,details,date,stamp
public function payments_update($p_id,$reg_no,$contact,$cand_results,$transac_uuid,$transac_token,$request2pay,$confirm_payment,$details,$date,$stamp){
	try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set reg_no='$reg_no',contact='$contact',cand_results='$cand_results',transac_uuid='$transac_uuid',transac_token='$transac_token',request2pay='$request2pay',confirm_payment='$confirm_payment',details='$details',date='$date',stamp='$stamp' where  p_id='$p_id' ");
$resp=$update->execute();
	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();
return $resp;
}

//pc_id, u_id, ass_id, i_id, printed_cands, invalid_cands, detailed_info, total_cands, inserts, received_files, taken_files, host_info, stamp
public function printed_cands_update($pc_id,$u_id,$ass_id,$i_id,$printed_cands,$invalid_cands,$detailed_info,$total_cands, $inserts,$received_files,$taken_files,$host_info,$stamp){
	try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set u_id='$u_id', ass_id='$ass_id', i_id='$i_id', printed_cands='$printed_cands', invalid_cands='$invalid_cands', detailed_info='$detailed_info', total_cands='$total_cands', inserts='$inserts', received_files='$received_files', taken_files='$taken_files', host_info='$host_info', stamp='$stamp' where  pc_id='$pc_id' ");
$resp=$update->execute();
	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();
return $resp;
}


//nort_id, system, sender, sender_id, receiver, message, ops_table, ops_assmt_id, inserts, status, date, stamp
public function nortifications_update($nort_id,$system,$sender,$sender_id,$receiver,$message,$ops_table,$ops_assmt_id,$inserts, $status,$date,$stamp){
	try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set app_sys='$system',sender='$sender',sender_id= $sender_id,receiver='$receiver',message='$message',ops_table='$ops_table',ops_assmt_id=$ops_assmt_id,inserts=$inserts,status='$status',date='$date',stamp=$stamp  where nort_id='$nort_id' ");
$resp=$update->execute();
	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();
return $resp;
}


//ur_id, reg_no, contact, candResults, checkoutStatus, sessionid, networkCode, servicecode, transac_desc, provider_channel, transac_status, transac_id, stamp
public function ussd_results_update($ur_id,$reg_no,$contact,$candResults,$checkoutStatus,$sessionid,$networkCode,$servicecode,$transac_desc,$provider_channel,$transac_status,$transac_id,$stamp){
	/*$connect=mysqli_connect("localhost","root","","dit2");
	$module_assessed=mysqli_real_escape_string($connect,$module_assessed);
$modules=mysqli_real_escape_string($connect,$modules);*/
	
	try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set reg_no='$reg_no',contact='$contact',candResults='$candResults',checkoutStatus='$checkoutStatus',sessionid='$sessionid',networkCode='$networkCode',servicecode='$servicecode',transac_desc='$transac_desc',provider_channel='$provider_channel',transac_status='$transac_status',transac_id='$transac_id',stamp='$stamp' where  ur_id='$ur_id' ");
$resp=$update->execute();
	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();
return $resp;
}

//fi_id, i_id, bt_id, reg_no, names, sex, photo, sector, occupation, modules, date_of_birth, district_of_birth, country, started, ended, qualification, module_assessed, score, stamp
public function file_info_update_scores($fid,$score,$grade,$overall){
	
	try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set score='$score',grade='$grade',overall='$overall' where  fi_id='".$fid."'");
$resp=$update->execute();
	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();
return $resp;
}



public function update(){


	try{
	$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set ".$this->field1."='".$this->value1."' where  ".$this->field."='".$this->value."'");
$resp=$update->execute();

return $resp;

	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();

}

public function updateTriple(){


	try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("update ".$this->table." set ".$this->field1."='".$this->value1."' ,".$this->field2."='".$this->value2."' where  ".$this->field."='".$this->value."'");
$resp=$update->execute();

return $resp;

	}catch(PDOException $e){
		$this->error=$e->getMessage();
		
	}

//$this->insert_id=$this->conn->lastinsertid();

}

public function disableForeignKeyChecks(){

	try{
		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("set foreign_key_checks=0");
	$resp=$update->execute();
	
	return $resp;
	
	}catch(PDOException $e){
		$this->error=$e->getMessage();
	
	}
	
	}
	
	public function enableForeignKeyChecks(){
		try{
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		$update=$this->conn->prepare("set foreign_key_checks=1");
		$resp=$update->execute();
		
		return $resp;
		
		}catch(PDOException $e){
			$this->error=$e->getMessage();
		
		}
	}
	
	public function delete(){
	
	try{
		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("delete from ".$this->table." where ".$this->field."='".$this->value."'");
	$resp=$update->execute();
	
	return $resp;
	
	}catch(PDOException $e){
		$this->error=$e->getMessage();
	
	}
	
	}
	
	public function deletePairs(){
	
	try{
		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("delete from ".$this->table." where ".$this->field."='".$this->value."'  and ".$this->field1."='".$this->value1."'");
	$resp=$update->execute();
	
	return $resp;
	
	}catch(PDOException $e){
		$this->error=$e->getMessage();
	
	}
	
	}
	
	public function auto_inc($num){
	
	try{
		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	$update=$this->conn->prepare("alter table ".$this->table." auto_increment=".$num."");
	$resp=$update->execute();
	
	return $resp;
	
	}catch(PDOException $e){
		$this->error=$e->getMessage();
	
	}
	
	}
	
	public function close(){
	$this->conn=null;
	}
	

}
?>