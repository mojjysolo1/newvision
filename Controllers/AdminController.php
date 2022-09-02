<?php

class AdminController{

    public function index ()
    {
       
       return View::make('adminLoginView',['layout'=>'loginLayout']);
      
    }

    public function profile()
    {
        return View::make('adminAccountView');
    }


    public function main(array $data)
    {

        switch(nullTrim($data['opt'])){
              
            case 'add_books':
                
             return View::make('subviews/addBooksView');

             case 'manage_books':

                 return $this->manageBooks();
         

                case 'insert_books':

                    return $this->insertBooks($data);   

               default:
                   throw new CaseOptionNotFound();
               break;
           }
    }


    public function manageBooks()
    {
         $db=new Database;
         $book_table=new Books($db);
         $arr_vals=$book_table->fetchAllAssoc("select * from books b inner join book_details bd on b.book_id=bd.book_id order by b.book_id desc");
                 
         return View::make('subViews/adminBooksView',['data_array'=>$arr_vals]);
    }

    public function insertBooks(array $data)
    {
        $books=new BooksController;

        $book_data=[
             "book_id"=>0,
            "bookcode"=> nullTrim($data['bk_code']),
            "bookname"=> nullTrim($data['bk_name']),
            "created_at"=> date('Y-m-d H:i:s'),
            "updated_at"=> '',
            "stamp"=> time()
        ];

        $book_details_data=[
            "book_det_id"=> 0,
            "book_id"=>'',
            "bookname"=> nullTrim($data['bk_name']),
            "class"=> nullTrim($data['class']),
            "bk_cost"=> nullTrim($data['bk_price']),
            "bk_gd_cost"=> nullTrim($data['bk_gd_price']),
            "created_at"=> date('Y-m-d H:i:s'),
            "updated_at"=> '',
            "stamp"=> time(),
       ];
        $resp=$books->store($book_data,$book_details_data);

        if($resp){
            return ParseSuccess("Succesfully Inserted");
        }else{
            return ParseError("insert Operation failed");
        }
    }


}

?>