<?php require_once('header.php'); 
$limit = 4;
$offset = 0;

if( isset( $_GET['post-page']) ){
    $page_number = $_GET['post-page'] - 1;
    $offset = $limit * $page_number;
}

$post_sql = "SELECT * FROM posts
INNER JOIN users ON posts.author_id = users.user_id
INNER JOIN categories ON posts.category_id = categories.cat_id
ORDER BY posts.post_id DESC LIMIT $limit OFFSET $offset
";

$posts_query = mysqli_query($con, $post_sql );
$all_posts = mysqli_fetch_all($posts_query, MYSQLI_ASSOC);


$post_count_query = mysqli_query($con, "SELECT * FROM posts");
$post_numbs = $post_count_query->num_rows;
$page_start = 1;
$total_page = ceil($post_numbs / $limit);
?>



<section id="blog" class="container">

    <div class="center">
        <h2>Blogs</h2>
        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <?php 
                foreach( $all_posts as $key => $value ):?>
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date"><?php echo date('d M', strtotime($value['created_at']) ); ?></span>
                                    <span><i class="fa fa-user"></i> <a href="#"><?php echo $value['user_username'] ; ?></a></span>
                                    <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2 Comments</a></span>
                                    <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                                </div>
                            </div>
                                
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="blog-item.php?slug=<?php echo $value['post_slug']; ?>&post_id=<?php echo $value['post_id']; ?>"><img class="img-responsive img-blog" src="images/blog/blog1.jpg" width="100%" alt="" /></a>
                                <h2><a href="blog-item.php?slug=<?php echo $value['post_slug']; ?>&post_id=<?php echo $value['post_id']; ?>"><?php echo $value['post_title']; ?></a></h2>
                                <h3><?php echo wp_trim_words($value['post_content'], 25); ?></h3>
                                <a class="btn btn-primary readmore" href="blog-item.php?slug=<?php echo $value['post_slug']; ?>&post_id=<?php echo $value['post_id']; ?>">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                <?php 
                endforeach; ?>

                <?php
                if($total_page): ?>   
                <ul class="pagination pagination-lg">
                    <?php                
                    while($page_start <= $total_page): ?>
                        <?php 
                        if( isset( $_GET['post-page'] ) ){
                            if( $_GET['post-page'] == $page_start){
                                $active_class = "active";
                            }else{
                                $active_class = "";
                            }
                        }else{
                            $active_class = "";
                        }
         
                        ?>
                        <li class="<?php echo $active_class; ?>">
                            <a href="<?php echo home_url(); ?>/blog.php?post-page=<?php echo $page_start; ?>">
                                <?php echo $page_start; ?>
                            </a>
                        </li>
                        
                    <?php
                    $page_start++; 
                    endwhile; ?>

                <?php    
                endif;?>
                <!--
                    <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>-->
                </ul> 
            </div><!--/.col-md-8-->

            <?php require_once('sidebar.php'); ?>

        </div><!--/.row-->
    </div>
</section><!--/#blog-->
<?php require_once('footer.php'); ?>