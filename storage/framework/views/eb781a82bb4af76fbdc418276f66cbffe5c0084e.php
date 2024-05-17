<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="RoNaDZDCrVO8F1SiIGYIBHpxNj6uVSrCVDLwo9sF">
        <link rel="icon" href="<?php echo e(asset('/images/Favicon-100x100.png')); ?>" sizes="32x32" />
        
        <!-- Bootstrap core CSS-->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <!--<link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">-->

        <!-- Custom fonts for this template-->
        <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
        <!-- froala-->
        <link href="<?php echo e(asset('vendor/froala/froala_editor.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('vendor/froala/froala_style.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('vendor/froala/froala_editor.pkgd.min.css')); ?>">
        <!-- Include Code Mirror CSS. -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
        
        <!-- Custom styles for this template-->
        <link href="<?php echo e(asset('css/sb-admin.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/simplemde.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/mention.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
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
        <?php echo $__env->make('admin.includes.ag-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        
        <div class="row justify-content-center">
            
            <div class="col-md-6">
                
                <br><br><br>
                <div class="card" style="margin:auto;width:80%;">
                    <div class="card-header"><?php echo e(__('Register')); ?></div>
    
                    <div class="card-body">

                        <form method="POST" id='loginform' action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="fname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?></label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>" name="fname" value="<?php echo e(old('fname')); ?>" required autofocus>
    
                                    <?php if($errors->has('fname')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('fname')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Last Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name1" type="text" class="form-control<?php echo e($errors->has('lname') ? ' is-invalid' : ''); ?>" name="lname" value="<?php echo e(old('lname')); ?>" required autofocus>

                                <?php if($errors->has('lname')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('lname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="off">

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required autocomplete="off">

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Company')); ?></label>
                            
                            <div class="col-md-6">
                                <input type="text" name="company" id="company" class="form-control" required/>
                            </div>
                            
                        </div>
                        <input type="hidden" name="type" value="e"/>
                        <input type="hidden" name="role" value="Subscriber"/>
                        <div class="special-field">
                          <label for="birthday"><?php echo e(__('Date of Birth')); ?></label>
                          <input type="text" name="birthday" id="birthday" value="" />
                        </div>
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <!--<div class="g-recaptcha" data-sitekey="6LcL-0wUAAAAABBob-2QX7fB_emPecMHD-usspGC"></div>-->
                                <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>"></div>
                                <?php if($errors->has('g-recaptcha-response')): ?>
                                	<span class="invalid-feedback" style="display:block">
                                		<strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                	</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="captchaValidate();">
                                    <?php echo e(__('Register')); ?>

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
                    <div class="card-header"><?php echo e(__('Login')); ?></div>

                    <div class="card-body">


                        <form method="POST" id="formLogin" action="<?php echo e(route('login')); ?>">

                            <?php if($errors->has('Username')): ?>
                                <div class="alert alert-danger" id="LoginFrmError" role="alert" ><?php echo $errors->first('Username'); ?></div>
                            <?php endif; ?>


                            <?php echo csrf_field(); ?>
    
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>
    
                                <div class="col-md-6">
                                    <input id="email2" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
    
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
    
                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
    
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        
                                        <label class="form-check-label" for="remember">
                                            <?php echo e(__('Remember Me')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Login')); ?>

                                    </button>
    
                                    <a style="color: #000;text-decoration: underline;text-align: right;font-size: 13px;margin-left: 25px;" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
                                </div>
                            </div>
                        </form>
                </div>
        </div>
        
        
        <div class="flash-message" style="position: fixed;
        left: 31px;
        bottom: 30px;">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(Session::has('alert-' . $msg)): ?>
                    <p class="alert alert-<?php echo e($msg); ?>" >
                        <?php echo e(Session::get('alert-' . $msg)); ?> 
                        <a href="#" class="close" style="margin-left:1em;" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> <!-- end .flash-message -->
        
        
        
        
        <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>-->
        
    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <!--<script src="<?php echo e(asset('vendor/chart.js/Chart.min.js')); ?>"></script>-->
    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/sb-admin.js')); ?>"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('js/demo/chart-area-demo.js')); ?>"></script>-->
    <script src="<?php echo e(asset('js/simplemde.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-typehead.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mention.js')); ?>"></script>
    <!-- froala-->
    <script src="<?php echo e(asset('vendor/froala/froala_editor.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('vendor/froala/froala_editor.pkgd.min.js')); ?>"></script>
    <!-- tiny mce -->
    <script src="<?php echo e(asset('js/tinymce.min.js')); ?>"></script>

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
