<?php
// header('Content-Type: application/json');
// // require __DIR__.'vendor/autoload.php';

// require('/home/anupam/public_html/user-account/vendor/autoload.php');
// $app = require_once('bootstrap/app.php');


// // Set up Laravel Eloquent ORM
// $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
// // ...

// use App\User;

// // ...



// // ...
// if(isset($_POST['username'])){
//     $email = isset($_POST['username']) ? $_POST['username'] : null;;
//     $passwordToCheck = isset($_POST['password']) ? $_POST['password'] : null;

//     echo $email." - ".$passwordToCheck;
//     $user = User::where('email', $email)->first();
    
//     if ($user && \Illuminate\Support\Facades\Hash::check($passwordToCheck, $user->password)) {
//         // echo "Password is correct for user with email: $email";
//         $response = array('status' => 'success', 'message' => 'Login successful');
//     } else {
//         // echo "Invalid credentials";
//         $response = array('status' => 'error', 'message' => 'Invalid username or password');
//     }
// }
// // Return the JSON response
// echo json_encode($response);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    iframe{
      width: 100%;
      height: 100vh;
      max-height: 100%;
    }
  </style>
</head>
<body>
<form action="iframe.php" method="post">
    <input type="text" name="username" value="">
    <input type="text" name="password">
    <input type="submit" value="submit">
</form>
<!--<iframe id="yourIframe" src="https://www.portal.agnisys.com/login2"></iframe>-->

</body>
</html>
