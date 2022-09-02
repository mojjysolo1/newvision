<?php

class UserMainController{

    public function main(array $data)
    {
        switch(nullTrim($data['opt'])){
              
            case 'book_listings':
               
             return $this->orderBooks($data);

             case 'book_orders':
               $order_vals=json_decode($data['opt2'],true);
               
               if(count($order_vals)==0)
                  return View::make('subviews/makeOrderView');
               
                return $this->makeOrder($order_vals);

                case 'insert_order':

                     return $this->insertNewOrder($data);

                     case 'book_delivery':

                        return ParseSuccess("delivered");

               default:
                   throw new CaseOptionNotFound();
               break;
           }
    }


    public function insertNewOrder($data)
        {
        $names=$data['names'];
        $email=$data['email'];
        $phone=$data['phone'];
        $place=$data['place'];
        $comment=$data['comment'];
        $bookorder_data=$data['book_orders'];

        $db=new Database;
        $usersmodel=new Users($db);
        
        $data_array=[
            "user_id"=>0, 
            "sess_id"=>session_id(), 
            "names"=>nullTrim($names), 
            "email"=>nullTrim($email), 
            "phone"=>nullTrim($phone), 
            "stamp"=>time(), 
        ];

        $resp=$usersmodel->store($data_array);

        if($resp){
            $insert_id=$usersmodel->insert_id;
            $ordersmodel=new Orders($db);
           
            foreach($bookorder_data as $vals){
                [$bk_id,$bk_items]=explode('/',$vals);

                $data_array2=[
                    "order_id"=>0,
                    "user_id"=>$insert_id,
                    "book_det_id"=>$bk_id,
                    "order_tag"=>'',
                    "order_status"=>'pending',
                    "quantity"=>$bk_items,
                    "comment"=> nullTrim($comment),
                    "created_at"=> date('Y-m-d H:i:s'),
                    "updated_at"=> '',
                    "stamp"=> time(), 
                ];

                $ordersmodel->store($data_array2);

            }

            $emailcontroller=new EmailController;
            echo $emailcontroller->sendEmail($_ENV['SENDER_EMAIL'],$email,"book order","Your order has benn made, status:pending");
            

            return ParseSuccess("Order successfully made");

        }
         

        return ParseError("Order processing failed");



    }
    


    public function makeOrder($order_vals)
    {
        $book_order=array();
        $book_pass_ids=array();
        foreach($order_vals as $key=>$val){
            $oid=(int)filter_var($key,FILTER_SANITIZE_NUMBER_INT);
            $book_order[$oid]=$val;
            $book_pass_ids[]=$oid;
        }

        $sql="select * from book_details where book_id in (".join(',',$book_pass_ids).")";
       
        $bookscontroller=new BooksController;
        $arr_vals=$bookscontroller->show($sql);

        return View::make('subviews/makeOrderView',['data_array'=>$arr_vals,'book_order'=>$book_order]);
    }


    public function orderBooks($data)
    {
        $tnum=$data['opt4'];
        $startnum=$data['opt5'];
       
        $sql="select * from books b inner join book_details bd on b.book_id=bd.book_id order by b.book_id desc";


        $bookcontroller=new BooksController;
        $arr_vals=$bookcontroller->show("$sql LIMIT {$startnum},{$tnum}");
        $numRows=$bookcontroller->countRows($sql);

         return View::make('subviews/orderBooksView',['data_array'=>$arr_vals,'startnum'=>$startnum,'tnum'=>$tnum,'numRows'=>$numRows]);
    }
}

?>