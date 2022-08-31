<?php
/**
 * Description of Accounts
 *
 * @author Joshua M.S
 */
class Accounts extends QueryBuilder{
   public $table='accounts';
    
   
   
   
   
    public function create()
    {
        
        return "CREATE TABLE $this->table (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_id` int(11) NOT NULL,
  `amount_paid` float NOT NULL,
  `my_comm_status` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `stamp` varchar(45) NOT NULL,
  PRIMARY KEY (`acc_id`),
  KEY `momocheckout_fk_idx` (`mc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3";
    }


}
