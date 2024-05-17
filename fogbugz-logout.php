<?php  

   
    if(isset($_GET['apiToken'])){
      
        $token = $_GET['apiToken'];
        $url = "https://agnisys.fogbugz.com/api.asp?cmd=logoff&token=".$token;
        $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
    
            $headers = array();
            $headers[] = "Content-Type: application/json; charset=utf-8";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);
    
            return $result;
            echo "successfull logout";
      
      
    }
   
   
    
    
