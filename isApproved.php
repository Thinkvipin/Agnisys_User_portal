<?php
$servername = "localhost";
$username = "anupam_portal";
$password = "I[fHC93dW9pmK#PAdM";

$conn = mysqli_connect('localhost', $username, $password,'anupam_portal');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


header("Access-Control-Allow-Origin: https://www.agnisys.com");
// function cors() {
    
//     // Allow from any origin
//     if (isset($_SERVER['HTTP_ORIGIN'])) {
//         // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
//         // you want to allow, and if so:
//         header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
//         header('Access-Control-Allow-Credentials: true');
//         header('Access-Control-Max-Age: 86400');    // cache for 1 day
//     }
    
//     // Access-Control headers are received during OPTIONS requests
//     if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
//             // may also be using PUT, PATCH, HEAD etc
//             header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        
//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
//             header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
//         exit(0);
//     }
// }


if(isset($_GET['email'])){
  
    $email = $_GET['email'];
    $page = $_GET['page'];
      
   
      $sql= mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$email' and status = 1");
      
      
      
      // FETCHING DATA FROM DATABASE
    
      $row = mysqli_fetch_assoc($sql);
      
      $data = $row['name'];
      if($email != '' && $page != ''){
          if($data){
            //   echo "Yes";
              $output = array("status"=>"Yes","msg"=>"success");
              
          }else{
            //   echo "No";
              $output = array("status"=>"No","msg"=>"success");
          }
      }
      else{
        //   echo "Please provide the email/Page!";
          $output = array("status"=>"No","msg"=>"Please provide the email/Page!");
      }
      
      echo json_encode($output);
      
    
    
}








