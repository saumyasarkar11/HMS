<?php
    session_start();
?>
<html>
    <head>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/login.css" rel="stylesheet">
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg); height: 100vh;">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <?php
                            if(isset($_SESSION['status'])){
                                echo '<div class="alert alert-dark" role="alert">'.$_SESSION['status'].'</div>';
                                session_unset();
                            }
                        ?>
                        
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">HMS Sign In</h3>
                            <form action="api/login.php" method="POST" class="signin-form" autocomplete="off">
                                <div class="form-group">
                                    <input type="text" name="uid" class="form-control" placeholder="Enter UID" required>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" name="password" type="password" class="form-control" placeholder="Enter Password" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="loginBtn" class="form-control btn btn-primary submit px-3">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex justify-content-center">
                                    <a href="#" style="color: #fff">Forgot Password?</a>
                                </div>
                            </form>                
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>