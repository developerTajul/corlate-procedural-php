<?php require_once('header.php'); ?>			
<?php require_once('sidebar.php'); ?>			
			
<div class="content">
	<div class="header">           
		<h1 class="page-title">Add New Post</h1>
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a> </li>
			<li class="active">Add New Post</li>
		</ul>
	</div>
	<div class="main-content">      
		<div class="row">
			<div class="col-md-4">
				<form  action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="post_title" class="form-control">
					</div>

					<div class="form-group">
						<label>Content</label>
						<textarea name="post_content" rows="10" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" name="post_thumbnail" />
					</div>
					<div class="form-group">
						<label>Categories</label>
						<select name="category_id" class="form-control">
							<option value="default">Select Category</option>
							<?php 
							if(is_array( $cats )):
								foreach($cats as $cat ): ?>
									<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
								<?php 
								endforeach; 
							endif;
							?>
						</select>
					</div>

					<div class="form-group">
						<input type="submit" name="post_info" class="btn btn-primary" value="Submit Post">
					</div>
				</form>
			</div>
		</div>


<?php require_once('footer.php'); ?>