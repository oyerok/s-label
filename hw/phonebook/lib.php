<?php
class db {
    private static $dbName = 'contacts';
    private static $user = 'root';
    private static $pwd = '';
    private static $host = 'localhost';
    private static $dbh = null;
   
    private function __construct() {
       
    }
    
    public static function connectDb(){
         if (empty(self::$dbh)) {
             try{
                 self::$dbh = new PDO('mysql:host='.self::$host.';dbname='.self::$dbName.'', self::$user, self::$pwd);
                 echo 'Connection complete';
             } catch (Exception $ex) {
                 file_put_contents('log.txt',$ex->getMessage()."\r\n", FILE_APPEND);
                 echo "Error!: " . $ex->getMessage() . "<br/>";
                 die();
             } 
         }
         return self::$dbh;
     }
     
     public function addContact(){
         
     }
     
     public function getList($sql, $params = array())
     {
         $stm = self::$dbh->prepare($q);
         $stm->execute($param);
         return $stm->fetchAll(PDO::FETCH_ASSOC);
     }
}

db::connectDb()->query();
db::connectDb()->getList($q, $params = array());