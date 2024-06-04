<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit("You can not access plugin file directly.");// Exit if accessed directly
 }
 $args = array(
  'post_type'        => 'portfolio',
  'posts_per_page'   => -1,
  'post_status'      => 'publish',
  'order_by'         => 'ASC'
 );
 $query = new WP_Query( $args ); 

/***
Template Name: Resolute Template
*/
get_header();
?>
<p>
<?php the_content();?>
</p>
<div class="row">
<h1 class="align-item">Resolute CPT Post</h1>

  <?php
   if($query->have_posts()){
      while($query->have_posts()){
          $query->the_post();
          $postId =  $query->post->ID; 
          //echo '<pre>';print_r($query);echo '</pre>';
          ?>
           <div class="column" style="background-color:#eee;">
              <h2><?php the_title();?></h2>
              <?php if (has_post_thumbnail($postId)){
		            	      $image = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'single-post-thumbnail' ); ?>
					            	<div class="full-img">
					            		<img class="fetured-img" src="<?php echo $image[0];?>" />
					            	</div>
		          <?php } ?>
              
              <p>Client Name: <?php echo get_post_meta($postId,'project_offer_by',true);?></p>
              <p>Company Name: <?php echo get_post_meta($postId,'company_name',true);?></p>
              <p>Project Start Date: <?php echo get_post_meta($postId,'project_start_date',true);?></p>
              <p>Project End Date: <?php echo get_post_meta($postId,'project_end_date',true);?></p>
            </div
          <?php
      } // end while
    } // end if 
    wp_reset_query();
  ?>
   >
    <div class="column" style="background-color:#eee;">
      <h2>Column 2</h2>
      <p>Some text..</p>
    </div>
</div>
<div class="row">
<div class="home-demo">
  <h1 class="align-item">Gallary</h1>
  <div class="owl-carousel owl-theme">
        <div class="item">
        <img src="https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg"/>
        </div>
        <div class="item">
            <img src="https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg"/>
        </div>

        <div class="item">
            <img src="https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg"/>
        </div>
        <div class="item">
            <img src="https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg"/>
        </div>
    </div>
</div>
</div>

<?php get_footer();?>