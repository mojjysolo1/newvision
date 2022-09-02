<?php
/**
 * Description of Accounts
 *
 * @author Joshua M.S
 */
class Orders extends QueryBuilder{
   public $table='orders';
    
   protected $columns=[];
   public string $error_msg;
   
   public function __construct(Database $db)
   {

     parent::__construct($db);

     $arr_fields=$this->fetchAllAssoc("select column_name from information_schema.columns where table_schema='".$_ENV['DB_DATABASE']."'
     and table_name='".$this->table."'");

     $this->columns=array_map(fn($rr)=>$rr['column_name'],$arr_fields);
     
   }
   
    public function create()
    {
        
        return "CREATE TABLE $this->table (
            `order_id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `book_det_id` int(11) NOT NULL,
            `order_tag` varchar(45) NOT NULL,
            `order_status` varchar(15) NOT NULL,
            `quantity` int(11) NOT NULL,
            `comment` text NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            `stamp` varchar(15) NOT NULL,
            PRIMARY KEY (`order_id`),
            KEY `user_fk_idx` (`user_id`),
            KEY `book_details_fk_idx` (`book_det_id`),
            CONSTRAINT `book_details_fk` FOREIGN KEY (`book_det_id`) REFERENCES `book_details` (`book_det_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
            CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3";
    }


}
