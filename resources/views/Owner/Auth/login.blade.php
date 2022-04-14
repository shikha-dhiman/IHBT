
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login with IHBT</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{asset('user_asset/css/style.css')}}" rel="stylesheet">
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div class="login-form-bg h-100" id="login-background">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-sm-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <h4 style="text-align: center;">Sign In</h4>
                                <input type="hidden" name="prefix" id="prefix" value="{{url(request()->getSchemeAndHttpHost())}}">
                                <form class="mt-5 mb-5 login-input">
                                    <input type="hidden" name="prefix_name" id="prefix_name" value="{{request()->route()->getName()}}">
                                    <div class="form-group">
                                        <select title="User type" class="form-control" name="user_type" id="user_type">
                                            <option value="owner">Admin</option>
                                            <option value="receptionist_user">Receptionist</option>
                                            <option value="doctor">Doctor</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="login-url" value="{{url('/login')}}">
                                        <input type="hidden" name="index-url" value="{{url('/')}}">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class='error' id='login_error_user' style="color: red;"><span id='user_error' ></span></div>
                                    <button class="btn login-form__btn submit w-100" id="loginbtn">Sign In</button>
                                </form>
                                <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="{{url('register')}}" class="text-primary">Sign Up</a> now</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('user_asset/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('user_asset/js/custom.min.js')}}"></script>
    <script src="{{asset('user_asset/js/settings.js')}}"></script>
    <script src="{{asset('user_asset/js/gleek.js')}}"></script>
    <script src="{{asset('user_asset/js/styleSwitcher.js')}}"></script>
</body>
</html>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#login_error_user").attr('disabled',true);
        jQuery('#loginbtn').click(function(e) {
             e.preventDefault();
            jQuery("#login_error_user").attr('disabled',false);
            var url = "{{url('owner/login')}}";
            var username = jQuery('input[name="username"]').val();
            var password = jQuery('input[name="password"]').val();
           /* var user_type = jQuery('input[name="prefix_name"]').val();*/
            var user_type = $("#user_type :selected").val();
            jQuery.ajax({
                type: 'POST',
                url: url,
                data: {username:username,password:password, user_type:user_type},
                success: function (data) {
                    console.log(data);
                    if(data == "The mobile must be at least 10 characters."){
                         
                        jQuery("#user_error").html("The mobile must be at least 10 characters.");
                        
                    }else if(data == "The password format is invalid."){

                        $("#user_error").html("The password must be at least 8 characters and must be numbers.");
                        
                    }else if(data == "The password must be at least 8 characters."){

                        $("#user_error").html("The password must be at least 8 characters and must be numbers.");
                        
                    }else if(data == "Wrong username or password."){

                        $("#user_error").html("Wrong username or password.");
                        
                    }else if(data == "Logged in sucessfully"){
                        var url = $("#prefix").val();
                        window.location.href = url+'/'+user_type;
                        
                    }
                }
            });
           
        });
    });
    
   </script>




