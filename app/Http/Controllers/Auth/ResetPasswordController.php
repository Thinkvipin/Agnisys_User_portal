<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    // public function reset(Request $request){
    //     $credentials = $request->only('email', 'password');
    //     echo $credentials['email'] . $credentials['password'];
        
    // }
    
    
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $credentials = $request->only('email', 'password');
        
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
                // wordpress password reset
                
                
                
                // $curl = curl_init();
                // curl_setopt_array($curl, array(
                //     CURLOPT_URL => "https://lms.agnisys.com/wp-json/v1/passwordUpdate/",
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => "",
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 30,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => "POST",
                //     CURLOPT_POSTFIELDS => array('email'=> $user['email'],'password' => $password),
                // ));
                // $response = curl_exec($curl);
                // $err = curl_error($curl);
                // curl_close($curl);
            }
        );
        
        
    
        
    
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }
    protected function sendResetResponse(Request $request, $response)
    {
        $url = $this->redirectPath();
        $url = $url."/?passwordrest=true";
        return redirect($url)
                            ->with('status', trans($response));
    }
    
    
    
    
    
}
