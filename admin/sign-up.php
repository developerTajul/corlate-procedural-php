<?php 
require_once('./config/database.php');
$errors = array();
if( isset( $_POST['reg_info']) ){
    // 
    $fname          = $_POST['user_fname'];
    $lname          = $_POST['user_lname'];
    $email          = $_POST['user_email'];
    $username       = $_POST['user_username'];
    $password       = $_POST['user_password'];
    $encrpted_pass  = md5($password );

    if( empty( $fname ) ){
        $errors['fname'] = "First Name must not be blank";
    }
    if( empty( $lname ) ){
        $errors['lname'] = "Last Name must not be blank";
    }
    if( empty( $email ) ){
        $errors['email'] = "Email Address must not be blank";
    }
    if( empty( $username ) ){
        $errors['username'] = "Username must not be blank";
    }
    if( empty( $password ) ){
        $errors['password'] = "Password must not be blank";
    }
    $errors_num = count($errors );

    if( $errors_num  === 0 ){
        $result = mysqli_query( $con, "INSERT INTO users(user_fname, user_lname, user_email, user_username, user_password)VALUES('$fname', '$lname', '$email', '$username', '$encrpted_pass')");
        if($result){
            $success = "Data has been inserted successfully.";
        }
    }

}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Aircraft</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>
    


<div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Sign Up</p>
        <div class="panel-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="user_fname" class="form-control span12">
                    <?php 
                    if( isset( $errors['fname'] ) ): ?>
                        <p><?php echo $errors['fname']; ?></p>
                    <?php 
                    endif; ?>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="user_lname" class="form-control span12">
                    <?php 
                    if( isset( $errors['lname'] ) ): ?>
                        <p><?php echo $errors['lname']; ?></p>
                    <?php 
                    endif; ?>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="user_email" class="form-control span12">
                    <?php 
                    if( isset( $errors['email'] ) ): ?>
                        <p><?php echo $errors['email']; ?></p>
                    <?php 
                    endif; ?>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user_username" class="form-control span12">
                    <?php 
                    if( isset( $errors['username'] ) ): ?>
                        <p><?php echo $errors['username']; ?></p>
                    <?php 
                    endif; ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="user_password" class="form-control span12">
                    <?php 
                    if( isset( $errors['password'] ) ): ?>
                        <p><?php echo $errors['password']; ?></p>
                    <?php 
                    endif; ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="reg_info" class="btn btn-primary pull-right" value="Sign Up!">
                    <label class="remember-me"><input type="checkbox"> I agree with the <a href="terms-and-conditions.html">Terms and Conditions</a></label>
                </div>
                    <div class="clearfix"></div>
            </form>

            <?php 
            if( isset( $success ) ): ?>
            <?php echo $success; ?>
            <?php 
            endif; ?>
        </div>
    </div>
    <p><a href="privacy-policy.html" style="font-size: .75em; margin-top: .25em;">Privacy Policy</a></p>
</div>



    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>
