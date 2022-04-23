<?php require_once('header.php'); ?>			
<?php require_once('sidebar.php'); ?>			
			
<div class="content">
    <div class="header">
        <h1 class="page-title">Edit Post</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li><a href="edit_post.php">Edit Post</a> </li>
            <li class="active"><?php echo $full_username; ?></li>
        </ul>
    </div>
    <div class="main-content">
            
<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      	<div class="tab-pane active in" id="home">
          <form id="tab" action="" method="POST">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="update_title" value="<?php echo $current_post['post_title']; ?>" class="form-control">
            </div>

            <div class="form-group">
              <label>Content</label>
              <textarea name="update_content" id="" class="form-control" cols="30" rows="10"><?php echo $current_post['post_content']; ?></textarea>
            </div>

            <div class="btn-toolbar list-toolbar">
              <button type="submit" class="btn btn-primary" name="update_post"><i class="fa fa-save"></i> Update Post</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>


<?php require_once('footer.php'); ?>