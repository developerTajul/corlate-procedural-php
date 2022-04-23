<?php 
session_start();
require_once("./config/database.php");
require_once('./inc/helper.php');
require_once('../functions.php');
/**
 * check user logged in
 */
if( !is_user_loggedin() ){
  header("Location: sign-in.php");
}
$email_from_db  = $_SESSION['email'];
$user_from_db   = $_SESSION['username'];
$user_data = mysqli_query( $con, "SELECT * FROM users WHERE user_email='$email_from_db' OR user_username = '$user_from_db'");
$result = mysqli_fetch_assoc($user_data);
$fullname = $result['user_fname']." ".$result['user_lname'];



/**
 * update info
 */
if( isset( $_GET['edit_id'] ) ){
	$current_user_id = $_GET['edit_id'];
	$fetch_current_user_data = mysqli_query( $con, "SELECT * FROM users WHERE user_id='$current_user_id'");
	$current_user = mysqli_fetch_assoc($fetch_current_user_data);
	$full_username = $current_user['user_fname'].' '.$current_user['user_lname'];
}else{
  $current_user_id = $result['user_id'];
  $fetch_current_user_data = mysqli_query( $con, "SELECT * FROM users WHERE user_id='$current_user_id'");
	$current_user = mysqli_fetch_assoc($fetch_current_user_data);
	$full_username = $current_user['user_fname'].' '.$current_user['user_lname'];
}

if( isset( $_POST['update_info'] ) ){
	$fname = $_POST['update_fname'];		
	$lname = $_POST['update_lname'];		
	$email = $_POST['update_email'];
		
	mysqli_query($con, "UPDATE users SET user_fname='$fname', user_lname='$lname', user_email='$email' WHERE id='$current_user_id' ");   
	header("Location: users.php");
}

/**
 * Delete User
 */
if( isset( $_GET['delete_id'] ) ){
  $current_user_id = $_GET['delete_id'];
  mysqli_query($con, "DELETE FROM users WHERE user_id='$current_user_id'");
  header("Location: users.php");
}

/**
 * Categories
 */
$categroy_sql = "SELECT * FROM categories";
$fetch_cats = mysqli_query($con, $categroy_sql);
$cats = mysqli_fetch_all($fetch_cats, MYSQLI_ASSOC);




/**
 * Post starts
 */
if( isset( $_POST['post_info'] ) ){
  
	$title = $_POST['post_title'];
	$content = $_POST['post_content'];
	$slug = strtolower(implode('-', explode(' ', $title)));
	$cat_id = $_POST['category_id'];

	// post-thumbnail 
	$tmp_name_name = $_FILES['post_thumbnail']['tmp_name'];
	$target_file = $_FILES['post_thumbnail']['name'];
	move_uploaded_file($tmp_name_name, '../uploads/blog/'.$target_file);

	$sql_query = "INSERT INTO posts (post_title, post_slug, post_content, post_thumbnail, author_id, category_id) VALUES ('$title', '$slug', '$content', '$target_file', '$current_user_id', '$cat_id')"; 

	$result = mysqli_query($con,  $sql_query);

	if( $result ){
		$success = "Post has been added successfully";
	}
  
}


/**
 * edit post
 */
if( isset( $_GET['post_edit_id'] ) ){
  $current_post_id = $_GET['post_edit_id'];
  $fetch_current_post_data = mysqli_query( $con, "SELECT * FROM posts WHERE post_id='$current_post_id'");
  $current_post = mysqli_fetch_assoc($fetch_current_post_data);
}

if( isset( $_POST['update_post'] ) ){


	$title = $_POST['update_title'];		
	$content = $_POST['update_content'];		
	// $email = $_POST['update_email'];
		
	mysqli_query($con, "UPDATE posts SET post_title='$title', post_content='$content' WHERE post_id='$current_post_id' ");   
	header("Location: all_posts.php");
}


/**
 * Delete Post
 */
if( isset( $_GET['post_delete_id'] ) ){
  $current_post_id = $_GET['post_delete_id'];
  mysqli_query($con, "DELETE FROM posts WHERE post_id='$current_post_id'");
  header("Location: all_posts.php");
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

        <script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>
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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Aircraft</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo $fullname; ?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="./">My Account</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Admin Panel</li>
                <li><a href="./">Users</a></li>
                <li><a href="./">Security</a></li>
                <li><a tabindex="-1" href="./">Payments</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="sign-out.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    