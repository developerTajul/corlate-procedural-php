<?php require_once('header.php'); ?>			
<?php require_once('sidebar.php'); ?>			
			
    <div class="content">
        <div class="header">
            <h1 class="page-title">Edit User</h1>
              <ul class="breadcrumb">
                <li><a href="index.php">Home</a> </li>
                <li><a href="users.php">Users</a> </li>
                <li class="active"><?php echo $full_username; ?></li>
              </ul>
        </div>
        <div class="main-content">
            
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
  <li><a href="#profile" data-toggle="tab">Password</a></li>
</ul>

<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      	<div class="tab-pane active in" id="home">
          	<form id="tab" action="" method="POST">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="update_username" value="<?php echo $current_user['user_username']; ?>" disabled class="form-control">
				</div>

				<div class="form-group">
					<label>First Name</label>
					<input type="text" name="update_fname" value="<?php echo $current_user['user_fname']; ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Last Name</label>
					<input type="text" name="update_lname" value="<?php echo $current_user['user_lname']; ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" name="update_email" value="<?php echo $current_user['user_email']; ?>" class="form-control">
				</div>

				<div class="btn-toolbar list-toolbar">
					<button type="submit" class="btn btn-primary" name="update_info"><i class="fa fa-save"></i> Update</button>
				</div>
          </form>
      </div>

      <div class="tab-pane fade" id="profile">

        <form id="tab2">
          <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control">
          </div>
          <div>
              <button class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php require_once('footer.php'); ?>