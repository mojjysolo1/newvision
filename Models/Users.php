<?php
/**
 * Description of Accounts
 *
 * @author Joshua M.S
 */
class Users extends QueryBuilder{
   public $table='users';
    
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
            `user_id` int(11) NOT NULL AUTO_INCREMENT,
            `sess_id` varchar(45) NOT NULL,
            `names` varchar(80) NOT NULL,
            `email` varchar(45) NOT NULL,
            `phone` varchar(45) NOT NULL,
            `stamp` varchar(45) NOT NULL,
            PRIMARY KEY (`user_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3";
    }


}
