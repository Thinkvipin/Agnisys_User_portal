<?php
// set_cookie.php
// die("helo");
// Get username and password from the query parameters
$username = $_GET['username'] ?? null;
$password = $_GET['password'] ?? null;

if ($username = 'uttam@agnisys.com' && $password = '1_agnisys#2') {
    
    // Set the cookie
    // setcookie('uid', '450', time() + (86400 * 30), "/"); // 30 days expiration
    // Replace this with your actual API call implementation
    // die("hekmlew");
    // $api_url = "https://www.portal.agnisys.com/iframe.php?username=$username&password=$password";
    // $response = file_get_contents($api_url);
    
    // // Decode the JSON string to an associative array
    // $response_data = json_decode($response, true);
    
    // // Access the 'status' element from the response data
    // $response = $response_data['status'];
    
    // Check if the API call was successful and the credentials are valid
    // if ($response === "success") {
        $cookieValue = '450';
        $expiry = time() + 86400; // Expiry time: 24 hours
        $path = '/';
        
        $cookieHeader = "Set-Cookie: uid={$cookieValue}; expires={$expiry}; path={$path};";

        header($cookieHeader); 
    // }
    
    
    
    
    
// die("esfsd");
    
}
else{
        setcookie('uid', 0, time() + (-1), "/");
    }


// Get the current URL without the query string
$currentUrl = strtok($_SERVER["REQUEST_URI"], '?');

// Parse the query string
parse_str($_SERVER['QUERY_STRING'], $queryParams);

// Remove username and password parameters if they exist
unset($queryParams['username']);
unset($queryParams['password']);

// Rebuild the query string
$newQueryString = http_build_query($queryParams);

// Redirect to the new URL without the username and password parameters
header("Location: $currentUrl" . ($newQueryString ? '?' . $newQueryString : ''));
exit();