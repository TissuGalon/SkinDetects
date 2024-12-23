<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Register Pages</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="../assets/images/logo.png" height="24" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <form class="form-horizontal" action="register.php" method="POST">


    <!-- Username Input -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="text" name="username" required="" placeholder="Username">
        </div>
    </div>

    <!-- Password Input -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="password" name="password" required="" placeholder="Password">
        </div>
    </div>

    <!-- Confirm Password Input -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="password" name="confirm_password" required="" placeholder="Confirm Password">
        </div>
    </div>

    <!-- Terms and Conditions -->
    <div class="form-group row">
        <div class="col-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" required="">
                <label class="custom-control-label font-weight-normal" for="customCheck1">
                    I accept <a href="#" class="text-muted">Terms and Conditions</a>
                </label>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-group text-center row m-t-20">
        <div class="col-12">
            <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Register</button>
        </div>
    </div>

    <!-- Link to Login -->
    <div class="form-group m-t-10 mb-0 row">
        <div class="col-12 m-t-20 text-center">
            <a href="login_page.php" class="text-muted">Already have an account?</a>
        </div>
    </div>
</form>

                    </div>

                </div>
            </div>
        </div>


        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/modernizr.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.js"></script>

    </body>
</html>