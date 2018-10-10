<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="login-page">
<section class="login">
    <div class="container">
        <div class="row">
            <!-- Right Side -->
            <div class="col-6">
                <div class="right-side">
                    <div class="container logo-heading">
                        <!-- Logo Image -->
                        <div class="logo">
                            <img src="img/logo.png" alt="" class="img-fluid d-block mx-auto w-25">
                        </div>
                        <!-- Heading -->
                        <h1 class="heading text-center">
                            SCS <br> By <br> ICOSOL
                        </h1>
                    </div>
                </div>
            </div>
            <!-- Left Side -->
            <div class="col-sm-12 col-md-6">
                <div class="left-side">
                    <div class="login-form">
                        <!-- Heading -->
                        <h2>Please enter your username
                            and your password.</h2>
                        <!-- Form -->
                        <form name="LoginForm" action="logincheck.php" method="post">
                            
                            <?php if (!empty($_GET['message'])) { ?>   
                                <div class="row" style="margin-top: 5%;text-align:left;margin-left: 19%;margin-bottom: -4%;">
                                    <span id="Invalid" style="color:#fff;font-size: medium;font-weight: bold;">Invalid Username Or Password</span> 
                                </div>
                            <?php
                              }
                            ?>
                            
                            <!-- User Name -->
                            <input type="text" class="form-control" placeholder="USERNAME" name ="username" id="username">
                            <!-- Password -->
                            <input type="password" class="form-control" placeholder="PASSWORD" name="password" id="password">
                            <!-- Btn Login -->
                            
                            <button type="submit" value="Login" class="form-control" onclick="ValidateForm()">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script type="text/javascript">

                                $('#mainCaptcha').bind("cut copy paste", function (e) {
                                    e.preventDefault();
                                });
                                function ValidateForm() {
                                    $(function () {
                                        $("form[name='LoginForm']").validate({
                                            rules: {
                                                username: "required",
                                                password: "required",
                                            },
                                            messages: {
                                                username: "Please enter your username",
                                                password: "Please enter your password",
                                            },
                                            submitHandler: function (form) {
                                                var admin_name = $("#username").val();
                                                var admin_password = $("#password").val();
                                                var errormessage = $("#errormessage").val();
                                                form.submit();
                                            }
                                        });
                                    });


                                }


        </script>
</body>
</html>