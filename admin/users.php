<?php require_once('header.php'); ?>

<?php require_once('sidebar.php'); ?>


    <div class="content">
        <div class="header">
            
            <h1 class="page-title">Users</h1>
                    <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li class="active">Users</li>
        </ul>

        </div>
        <div class="main-content">
            
<div class="btn-toolbar list-toolbar">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> New User</button>
    <button class="btn btn-default">Import</button>
    <button class="btn btn-default">Export</button>
  <div class="btn-group">
  </div>
</div>
<table class="table">
<?php 
$fetch_all_users = mysqli_query($con, "SELECT * FROM users");
$all_users = mysqli_fetch_all($fetch_all_users, MYSQLI_ASSOC);

?>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
      <th>Email Address</th>
      <th>Photo</th>
      <th style="width: 3.5em;"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach( $all_users as $user ): ?>
      <tr>
        <td><?php echo $user['user_id']; ?></td>
        <td><?php echo $user['user_fname']; ?></td>
        <td><?php echo $user['user_lname']; ?></td>
        <td><?php echo $user['user_username']; ?></td>
        <td><?php echo $user['user_email']; ?></td>
        <td><img src="<?php echo $user['user_phpto']; ?>" alt="<?php echo $user['user_fname']." ".$user['user_lname']; ?>"></td>
        <td>
            <a href="user.php?edit_id=<?php echo $user['user_id']; ?>"><i class="fa fa-pencil"></i></a>
            <a href="user.php?delete_id=<?php echo $user['user_id']; ?>"><i class="fa fa-trash-o"></i></a>
        </td>
      </tr>
    <?php 
    endforeach; ?>
    
  </tbody>
</table>

<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>




<?php require_once('footer.php'); ?>