<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="RoNaDZDCrVO8F1SiIGYIBHpxNj6uVSrCVDLwo9sF">
        <link rel="icon" href="{{asset('/images/Favicon-100x100.png')}}" sizes="32x32" />
        
        <!-- Bootstrap core CSS-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!--<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">-->

        <!-- Custom fonts for this template-->
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
        <!-- froala-->
        <link href="{{asset('vendor/froala/froala_editor.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/froala/froala_style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('vendor/froala/froala_editor.pkgd.min.css')}}">
        <!-- Include Code Mirror CSS. -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
        
        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
        <link href="{{asset('css/simplemde.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/mention.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <title>AGNISYS | Customer Portal</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <style>
            .invalid-feedback, .invalid-feedback strong{
                color: #d62f2f;
                font-size: 12px;
                font-weight: 400;
            }
            .special-field{
                display: none;
            }
        </style>
            </head>
    <body>
        @include('admin.includes.ag-header')
        
        
        <div class="row justify-content-center">
            
            <div class="col-md-6">
                
                <br><br><br>
                <div class="card" style="margin:auto;width:80%;">
                    <div class="card-header">{{ __('Register') }}</div>
    
                    <div class="card-body">

                        <form method="POST" id='loginform' action="{{ route('register') }}">
                        @csrf

                            <div class="form-group row">
                                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>
    
                                    @if ($errors->has('fname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="name1" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="off">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="off">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>
                            
                            <div class="col-md-6">
                                <input type="text" name="company" id="company" class="form-control" required/>
                            </div>
                            
                        </div>
                        <input type="hidden" name="type" value="e"/>
                        <input type="hidden" name="role" value="Subscriber"/>
                        <div class="special-field">
                          <label for="birthday">{{ __('Date of Birth') }}</label>
                          <input type="text" name="birthday" id="birthday" value="" />
                        </div>
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <!--<div class="g-recaptcha" data-sitekey="6LcL-0wUAAAAABBob-2QX7fB_emPecMHD-usspGC"></div>-->
                                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                @if($errors->has('g-recaptcha-response'))
                                	<span class="invalid-feedback" style="display:block">
                                		<strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                	</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="captchaValidate();">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        </form>
                        
                    </div>
                </div>
            
                
            </div>
            <div class="col-md-6">
                
                        <br><br><br>
                <div class="card" style="width:80%;margin-top:130px;margin:auto;">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">


                        <form method="POST" id="formLogin" action="{{ route('login') }}">

                            @if ($errors->has('Username'))
                                <div class="alert alert-danger" id="LoginFrmError" role="alert" >{!! $errors->first('Username') !!}</div>
                            @endif


                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email2" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> 
                            <?php
                            
                            if(isset($_GET['redirect_to'])){
                                $value = $_GET['redirect_to'];
                                echo '<input  type="hidden" value="'.$value.'" name="redirect_url">';
                            }
                            else if(isset($_GET['url'])){
                                $value = $_GET['url'];
                                echo '<input  type="hidden" value="'.$value.'" name="redirect_url">';
                            }
                            else{
                                echo '<input  type="hidden" value="" name="redirect_url">';
                            }
                            ?>
                            
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
    
                                    <a style="color: #000;text-decoration: underline;text-align: right;font-size: 13px;margin-left: 25px;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                </div>
        </div>
        
        
        <div class="flash-message" style="position: fixed;
        left: 31px;
        bottom: 30px;">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}" >
                        {{ Session::get('alert-' . $msg) }} 
                        <a href="#" class="close" style="margin-left:1em;" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                  @endif
                @endforeach
        </div> <!-- end .flash-message -->
        
        
        
        
        <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <!--<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>-->
        
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <!--<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>-->
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.js')}}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <!--<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>-->
    <script src="{{asset('js/simplemde.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-typehead.js')}}"></script>
    <script src="{{asset('js/mention.js')}}"></script>
    <!-- froala-->
    <script src="{{asset('vendor/froala/froala_editor.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/froala/froala_editor.pkgd.min.js')}}"></script>
    <!-- tiny mce -->
    <script src="{{asset('js/tinymce.min.js')}}"></script>

    <!-- Include Code Mirror JS. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    
    <!-- Include PDF export JS lib. -->
    <!--<script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>-->
    <!-- google Captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
        // function captchaValidate(){
        //     if(grecaptcha.getResponse() == "") {
        //         event.preventDefault();
        //         alert("You can't proceed without Captcha Verify!");
        //     }
        // }
    </script>
    <!-- end of google caotcha code -->
    <script>
        $('.flash-message').delay(10000).fadeOut('slow');
    </script>

    </body>
    
    
</html>
