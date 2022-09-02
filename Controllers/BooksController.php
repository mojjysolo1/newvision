<?php

class BooksController{

    public int $rowCount;
    public Database $db;

    public function __construct()
    {
        $this->db=new Database;
    }


    public function index ()
    {
       
    //    return View::make('adminLoginView',['layout'=>'loginLayout']);
      
    }

 public function show($sql):array
 {

    $book_table=new Books($this->db);
    $arr_vals=$book_table->fetchAllAssoc($sql);
    $this->rowCount=$book_table->rowCount;
    return is_array($arr_vals)?$arr_vals:[];
 }

    public function store(array $bookdata,array $bookdetailsdata)
    {
 
       $db=new Database;
       $books_table=new Books($db);  
       
        $arr_vals=$books_table->fetch('bookcode',$bookdata['bookcode']);

        if($books_table->rowCount>0){//if book exists already

            $insert_id=$arr_vals['book_id'];
            $resp=true;
        }else{//if new book
            
           $resp=$books_table->store($bookdata);
           $insert_id=$books_table->insert_id;
        }


          
        if($resp){
            $bookdetailsdata['book_id']=$insert_id;

            $books_details_table=new BookDetails($db);
            $resp2=$books_details_table->store($bookdetailsdata);
          
        }
          
        if($resp && $resp2)
             return true;
        
           return false;
       
    }

    public function countRows($sql):int
    {

        $book_table=new Books($this->db);
    $rows=$book_table->fetchRowCount($sql);
    
    return $rows;

    }

    
}

?>