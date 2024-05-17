<?php
header("Access-Control-Allow-Origin: https://www.agnisys.com"); // Allow requests from agnisys.com
header("Access-Control-Allow-Credentials: true"); // Allow credentials, such as cookies

// Check if the 'uid' cookie exists
if (isset($_COOKIE['uid'])) {
    echo 'cookie_exists'; // Or you can return some JSON response
} else {
    echo 'cookie_not_exists'; // Or return a different response
}
?>
