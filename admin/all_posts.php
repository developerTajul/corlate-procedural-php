<?php require_once('header.php'); ?>			
<?php require_once('sidebar.php'); ?>			
			

<div class="content">
        <div class="header">
          <h1 class="page-title">Posts</h1>
          <ul class="breadcrumb">
              <li><a href="index.html">Home</a> </li>
              <li class="active">All Posts</li>
          </ul>
        </div>
        <div class="main-content">
            

<table class="table">
<?php 
$fetch_all_posts = mysqli_query($con, "SELECT * FROM posts");
$all_posts = mysqli_fetch_all($fetch_all_posts, MYSQLI_ASSOC);

?>
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Description</th>
      <th>Photo</th>
      <th style="width: 3.5em;"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach( $all_posts as $post ): ?>
      <tr>
        <td><?php echo $post['post_id']; ?></td>
        <td><?php echo $post['post_title']; ?></td>
        <td><?php echo wp_trim_words($post['post_content'], 15); ?></td>
        <td><img style="width:100px; height: 100px" src="../uploads/blog/<?php echo $post['post_thumbnail']; ?>" alt="<?php echo $post['post_title']; ?>"></td>
        <td>
            <a href="edit_post.php?post_edit_id=<?php echo $post['post_id']; ?>"><i class="fa fa-pencil"></i></a>
            <a href="edit_post.php?post_delete_id=<?php echo $post['post_id']; ?>"><i class="fa fa-trash-o"></i></a>
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