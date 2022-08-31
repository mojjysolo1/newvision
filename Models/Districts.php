<?php
/**
 * Description of Districts
 *
 * @author Joshua M.S
 */
class Districts extends QueryBuilder{
     public $table='districts';
   
    public function create()
    {
        return "CREATE TABLE $this->table (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `lat` varchar(45) NOT NULL,
  `lng` varchar(45) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3";
    }

    

   

}
