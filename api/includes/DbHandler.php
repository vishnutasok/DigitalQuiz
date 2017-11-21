<?php
/**
 * Sales.ProjectVisit DBHandler Ver 0.1
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 * @author Vishnu T asok
 */
class DbHandler {
     private $db;
     function __construct() {
          require_once 'NotORM.php';
          include_once 'dbconnection.php';
          $pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $dbhost, $dbuser, $dbpass);
          $this->db = new NotORM($pdo);
     }

     public function getQuestions($id) {
          return $this->db->tbl_questions();
     }
}