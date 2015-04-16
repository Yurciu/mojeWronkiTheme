<?php
if ($pageUser->isMobile() || $pageUser->isTablet() ) get_header('mobile');
    else get_header();
?>

<?php tha_content_before(); ?>
<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3">
<?php tha_content_top(); ?>
<?php
      getMainContentView(45);

      getMainContentView(1);

      getMainContentView(43);

      getMainContentView(44);
?>
<?php tha_content_bottom(); ?>
</div>
<?php tha_content_after(); ?>

<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>


<?php
if ($pageUser->isMobile() || $pageUser->isTablet() ) get_footer('mobile');
    else get_footer();
?>