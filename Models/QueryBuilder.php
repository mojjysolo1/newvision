<?php
/**
 * Description of Model
 *
 * @author Joshua M.S
 */
abstract class QueryBuilder{

    protected static $database=null;
    public string $error_msg;
    public int $rowCount=0;
    
    public function __construct(Database $conn) {
         self::$database=$conn;
    }
    
    public function fetch($column,$cell):array
    {
        self::$database->set($this->table,$column,$cell);
        
        return self::$database->getValues();
    }


    public function fetchAssoc($column,$cell):array
    {
        self::$database->set($this->table,$column,$cell);
        
        return self::$database->getValues(true);
    }

    
    public function fetchAllAssoc($statement):array 
    {
        $data=self::$database->selectAllValues($statement);
        $this->rowCount=self::$database->numRows;
        return $data;
    }


    public function store(array $arr_insert_values):bool
    {
      foreach($arr_insert_values as $key=>$val){
          if(!in_array($key,$this->columns)){
             $this->error_msg=$key." Column on ".$this->table." table Doesn't  Exist";
             return false;
          
          }
      }

      if(count($arr_insert_values)!==count($this->columns)){
             $this->error_msg="Some table felds are missing";
             return false;
      }
            

      self::$database->set($this->table,1,1);
      $response=self::$database->insertValues($arr_insert_values);
      return $response;
    }
    
    
    abstract public function create();
    

//    abstract public function seeder();
//
//     public function seeder()
//    {
//        return "INSERT INTO $this->tablename (`p_id`,`names`,`salary`) VALUES (1,'joshua','1000');
//        INSERT INTO $this->tablename (`p_id`,`names`,`salary`) VALUES (2,'yehu','2000');
//        INSERT INTO $this->tablename (`p_id`,`names`,`salary`) VALUES (3,'dennish','3000');
//        INSERT INTO $this->tablename (`p_id`,`names`,`salary`) VALUES (4,'joan','2000');
//        INSERT INTO $this->tablename (`p_id`,`names`,`salary`) VALUES (5,'daisy','1500');";
//    }
}
?>