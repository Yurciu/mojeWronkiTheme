</div>
<?php tha_footer_before(); ?>
<div class="row footer text-center" itemscope itemtype='https://schema.org/Organization'>
<?php tha_footer_top(); ?>
  <a class='arrow-link hidden-print' rel="nofollow" href="<?php add_query_arg( $wp->query_string, '', home_url( $wp->request ) ); ?>#header">
    <div class="shadow arrow">^</div>
  </a>
  <h4>
    <em>Sprawdź, czy pisaliśmy o tym, co Ciebie interesuje.</em>
  </h4>
  <?php get_search_form(); ?>
  <hr>
  <strong>
  <h4>
    <a href='http://mojewronki.pl/wp-login.php' rel="nofollow" >
        <?php echo bloginfo('name'); ?>
    </a>
  </h4>
  <?php echo bloginfo('description'); ?>
  </strong>
  <hr>

  <?php
$blogusers = get_users( array( 'role' => 'administrator', 'fields' => array('ID','display_name' ) ) );
// Array of stdClass objects.
shuffle($blogusers);
$ediOffice = count($blogusers);
foreach ($blogusers as $user){
if($ediOffice >= 4){
  echo "<div class='col-lg-3 col-sm-3 col-xs-6' itemprop='employee'>". officeBase64Thumb($user->ID, "avatar-64")."<h5>" . esc_html( $user->display_name ) . "</h5></div>";
}
  else{

    if ($ediOffice == 4) echo "<div class='cleafix'></div>";
    echo "<div class='col-lg-4 col-sm-4 col-xs-6' itemprop='employee'>". officeBase64Thumb($user->ID, "avatar-64")."<h5>" . esc_html( $user->display_name ) . "</h5></div>";
  }

  $ediOffice--;
} ?>

<?php tha_footer_bottom(); ?>
</div>
<small class='optronet'>Wspierane technologicznie przez <a href="http://optronet.pl" rel="nofollow">optronet.pl</a></small>

<link rel="stylesheet" href="//mojewronki.pl/wp-content/themes/wronczanie/ench.css" type="text/css" media="none" onload="if(media!='all')media='all'"/>
<noscript><link rel="stylesheet" href="//mojewronki.pl/wp-content/themes/wronczanie/ench.css"></noscript>

<?php
if(!isset($_COOKIE['cookie'])) echo "
<div class='cookies text-center hidden-print hidden-xs'><button class='cookieButton' onclick='zamknijCookie();'>Akceptuje!</button><p>Portal mojeWronki.pl wykorzystuje pliki cookies do przechowywania treści na Twoim komputerze. <span class='hidden-xs'>Pomagają nam jeszcze lepiej informować Ciebie co się dzieje w gminie. <br /> <a href='http://ciasteczka.eu/#jak-wylaczyc-ciasteczka' rel='nofollow'/>Cookies statystyczne, reklamowe i funkcionalne w każdej chwili możesz wyłączyć w swojej przeglądarce.</a></span><br /> </p></div>"; ?>

<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-18538939-12', 'auto' );
  ga('send', 'pageview');

function zamknijCookie() {

  document.cookie="cookie=1; expires=Thu, 01 Jan 2029 00:00:00 UTC";
  document.getElementsByClassName("cookies")[0].style.display = 'none';

}

</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php tha_footer_after(); ?>

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
