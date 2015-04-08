<?php get_header();


?>

<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
<?php
      getMainContentView(45);

      getMainContentView(1);

      getMainContentView(43);

      getMainContentView(44);
?>
</div>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>

<?php get_footer(); ?>