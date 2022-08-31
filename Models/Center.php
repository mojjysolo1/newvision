<?php
/**
 * Description of Center
 *
 * @author Joshua M.S
 */
class Center extends QueryBuilder{
    public $table='center';
    

    public function create()
    {
        
        return "CREATE TABLE $this->table (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL,
  `center_no` varchar(45) NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `logo` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL,
  `accredited_by` varchar(255) NOT NULL,
  `lat` varchar(45) NOT NULL,
  `long` varchar(45) NOT NULL,
  `stamp` varchar(45) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `districtfk_idx` (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3";
    }


}
