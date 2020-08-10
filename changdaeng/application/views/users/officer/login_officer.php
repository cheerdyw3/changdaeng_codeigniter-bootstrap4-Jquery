<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/images/favicon.png')?>">
    <title>changdeang-officer</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- page css -->
    <link href="<?=base_url('assets/css/pages/login-register-lock.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
    
    <link href="<?=base_url('assets/css/colors/default-dark.css')?>" id="theme" rel="stylesheet">
    <style>
        .shadow{
            -webkit-box-shadow: 5px 6px 27px -1px rgba(0,0,0,0.17);
            -moz-box-shadow: 5px 6px 27px -1px rgba(0,0,0,0.17);
            box-shadow: 5px 6px 27px -1px rgba(0,0,0,0.17);
        }

    </style>
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Cmu</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-color:#ecf0f1;">
            <div class="row text-center mb-5">
                    <!-- <div class="col-md-12">
                        <img src="<?=base_url('upload/logo/')?>" alt="">
                    </div> -->
                </div>
            <div class="login-box">
                <div style="background-color:#ffffff;" class="p-5 shadow"> 
                    <form class="form-horizontal" id="frm_login" action="<?=base_url('login_officer/chk_login')?>" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" title="กรุณากรอกชื่อผู้ใช้" required>
                                </div>
                                <p for="username" class="text-danger m-l-6 "></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" title="กรุณากรอกรหัสผ่าน" required>
                                </div>
                                <p for="password" class="text-danger m-l-6 "></p>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-info float-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox" name="remember" class="filled-in chk-col-light-blue" value="remember">
                                    <label for="checkbox-signup"><code style="color:#7f8c8d;">Remember me </code></label>
                                </div> 
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="p-t-0">
                                    <button class="btn btn-info btn-block" type="submit"><a class="pb-2">Log In</a></button>
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url('assets/plugins/bootstrap/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- validate -->
    <script src="<?=base_url('assets/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/validate/validation.js')?>"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $(document).ready(function () {
            $('#frm_login').validate({
				errorPlacement: function(error, element) {
				// Append error within linked label
				$( element )
					.closest( "form" )
						.find( "p[for='" + element.attr( "id" ) + "']" )
							.append( error );
				}
			});
        })
    </script>
    
</body>

</html>