<?php get_header(); ?>


<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
        <article class="news news-list">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="entry">
<?php the_post_thumbnail(); ?>

<h1 class='text-center'><?php the_title(); ?></h1><hr>

<a href="<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'single-post', array('class' => 'entry-thumb') ); } ?>
</a>
<?php the_content('Czytaj więcej &rarr;'); ?>

<?php //$child_pages = $wpdb->get_results("SELECT *    FROM $wpdb->posts WHERE post_parent = ".$post->ID."    AND post_type = 'page' ORDER BY menu_order", 'OBJECT');    ?>
<?php //if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
<!-- <div class="child-thumb"> -->
  <?php //echo get_the_post_thumbnail($pageChild->ID, 'thumbnail'); ?>
<!--  <a href="<?php //echo  get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php //echo $pageChild->post_title; ?>"><?php //echo $pageChild->post_title; ?></a> -->
<!-- </div> -->
<?php //endforeach; endif; ?>

<div class="clear"></div>
</div> <!-- end entry -->



<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<!-- <div class=”commentsblock”>
<?php //comments_template(); ?>
</div> -->

          <div class="clearfix"></div>
        </article>

      </div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>