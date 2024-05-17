<?php

header('Content-Type: application/json');
// require __DIR__.'vendor/autoload.php';

require('/home/anupam/public_html/user-account/vendor/autoload.php');
$app = require_once('bootstrap/app.php');


// Set up Laravel Eloquent ORM
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
// ...

use App\User;

// ...


$response = array('status' => 'API not run');
// ...
if(isset($_POST['username'])){
    $email = isset($_POST['username']) ? $_POST['username'] : null;;
    $passwordToCheck = isset($_POST['password']) ? $_POST['password'] : null;

    // echo $email." - ".$passwordToCheck;
    $user = User::where('email', $email)->first();
    
    if ($user && \Illuminate\Support\Facades\Hash::check($passwordToCheck, $user->password)) {
        // echo "Password is correct for user with email: $email";
        $response = array('status' => 'success', 'message' => 'Login successful');
    } else {
        // echo "Invalid credentials";
        $response = array('status' => 'error', 'message' => 'Invalid username or password');
    }
}
// Return the JSON response
echo json_encode($response);

?>

