<?php
/**
 * Description of Momocheckout
 *
 * @author Joshua M.S
 */
class Momocheckout extends QueryBuilder{
      public $table='momocheckout';
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
  `mc_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_cat` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `transac_uuid` varchar(255) NOT NULL,
  `transac_token` text NOT NULL,
  `request2pay` varchar(255) NOT NULL,
  `confirm_payment` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `operation` varchar(45) NOT NULL,
  `device` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`mc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3";
    }

  
}
