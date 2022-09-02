<?php
/**
 * Description of Accounts
 *
 * @author Joshua M.S
 */
class BookDetails extends QueryBuilder{
   public $table='book_details';
    
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
            `book_det_id` int(11) NOT NULL AUTO_INCREMENT,
            `book_id` int(11) NOT NULL,
            `bookname` varchar(45) NOT NULL,
            `class` varchar(5) NOT NULL,
            `bk_cost` int(11) NOT NULL,
            `bk_gd_cost` int(11) NOT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            `stamp` varchar(45) NOT NULL,
            PRIMARY KEY (`book_det_id`),
            KEY `book_fk_idx` (`book_id`),
            CONSTRAINT `book_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE NO ACTION
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3";
    }


}
