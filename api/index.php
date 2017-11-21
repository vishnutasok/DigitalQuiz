<?php
/* *
 * This contains all the API's of Digital Quiz
 * API Documentation Ver 0.1
 * @author Vishnu T Asok
 * */
require_once 'includes/DbHandler.php';
date_default_timezone_set("Asia/Kolkata");
require 'Slim/Slim.php';
if (!isset($_SESSION)) {
     session_start();
}
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
function getConnection() {
     $dbhost = 'localhost';
     $dbname = 'db_digital_quiz';
     $dbuser = 'root';
     $dbpass = 'mytkey';
     $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $dbh;
}
$app->get('/getQuestions/:id', function($id = null) use($app) {
     $db = new DbHandler();
     $data = $db->getQuestions($id);
     $app->response()->header('Content-Type', 'application/json');
     echo json_encode($data);
});
$app->run();

