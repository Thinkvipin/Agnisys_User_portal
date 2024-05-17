<?php
$servername = "localhost";
$username = "anupam_portal";
$password = "I[fHC93dW9pmK#PAdM";

$conn = mysqli_connect('localhost', $username, $password,'anupam_portal');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_GET['id'])){
  
    $id = $_GET['id'];
    $url = $_GET['url'];

    

   
      $sql= mysqli_query($conn,"SELECT * FROM `usertracks` WHERE id = '$id'");
      // FETCHING DATA FROM DATABASE
    
      $row = mysqli_fetch_assoc($sql);
      
      $dataUrl = $row['url'];
        
        if($url == 'https://www.portal.agnisys.com'){
            
        }
        else if($url == 'https://www.portal.agnisys.com/dashboard'){
            
        }
        else if ($dataUrl == ''){
            $sql= mysqli_query($conn,"UPDATE `usertracks` SET url = '$url' WHERE id = '$id'");
        }
        else if(strpos($dataUrl, $url) !== false){
            
        }
        else{
            
            $url = $dataUrl.", ".$url;
            $sql= mysqli_query($conn,"UPDATE `usertracks` SET url = '$url' WHERE id = '$id'");
            
        }
    
}








