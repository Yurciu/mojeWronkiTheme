<?php

require_once('inc/tha-theme-hooks.php');

/* General SEO
*************************************************************************************************************************************************/
add_filter('generalSEOElements', 'generalSEOElements');
function generalSEOElements(){
?>
<meta property="og:locale" content="pl_PL">
<meta property="og:type" content="website">
<meta property="og:site_name" content="mojeWronki">
<meta property='og:url' content='http://mojewronki.pl'/>
<meta property="article:publisher" content="https://www.facebook.com/mojewronki">
<link href="https://plus.google.com/103654230087671023091" rel="publisher" />
<meta name="alexaVerifyID" content="Uv5ngd8fswTM68vycTm2-PkuF2w"/>
<meta name="msvalidate.01" content="74B7F74201C2FF6A9B104A9D8FCE92F7" />
<?php
}
/* SEO
*************************************************************************************************************************************************/
add_filter('SEOheader', 'SEOheader');
function SEOheader(){


if(is_tag() || is_category() || is_front_page() || is_page()){
  ?>
    <meta property='og:image' content='http://s.mojewronki.pl/2015/01/Lokalny-portal-informacyjny.png' />
  <?php
    echo "<meta property='og:description' content='"; echo bloginfo('description'); echo "'/>";
    echo "<meta name='description' content='";echo bloginfo('description'); echo "'>";
    echo "<meta name='robots' content='index, follow' />";

}
//Strona z newsem
  if(is_single()){
    echo "<title>mojeWronki.pl";echo ' | '; echo the_title() ;echo"</title>";
    echo "<meta property='og:title' content='mojeWronki.pl | ";echo the_title(); echo"'/>";
    $desc = substr(wp_strip_all_tags(get_post_field('post_content', $post->ID)),0,125);
    $desc = str_replace(array("\r\n", "\r"), "\n", $desc);
    if(empty($desc)) {
      echo "<meta name='description' content='"; echo bloginfo('description'); echo"'>";
      echo "<meta name='og:description' content='"; echo bloginfo('description'); echo"'>";
    } else {
      echo "<meta name='description' content='"; echo $desc; echo "...'>";
      echo "<meta name='og:description' content='"; echo $desc; echo "...'>";
    }

    if(has_post_thumbnail()) echo "<meta property='og:image' content='".wp_get_attachment_url( get_post_thumbnail_id($post->ID) )."' />";
    else echo "<meta property='og:image' content='http://s.mojewronki.pl/2015/01/Lokalny-portal-informacyjny.png' />";

  }

  if(is_front_page() || is_category()){
    echo "<title>"; echo bloginfo('name'); echo "</title>";
    echo "<meta property='og:title' content='"; echo bloginfo('name'); echo "'/>";
  }

  if(is_page()){
    echo "<title>mojeWronki.pl | "; echo the_title(); echo "</title>";
    echo "<meta property='og:title' content='mojeWronki.pl | "; echo the_title(); echo "'/>";
  }

  if(is_tag()){
    echo "<title>mojeWronki.pl | "; echo single_tag_title(); echo "</title>";
    echo "<meta property='og:title' content='mojeWronki.pl | "; echo single_tag_title(); echo "'/>";
  }


}


/* getMainContentView
*************************************************************************************************************************************************/
add_filter('getMainContentView', 'getMainContentView');
function getMainContentView($categoryNumber, $NewsPerCategory = 7){
	echo "<div class='category-place col-lg-12'>";

    	query_posts('cat='.$categoryNumber);

    	echo "<a class='category-label' itemprop='significantLink' href='".get_category_link($categoryNumber)."' >
      "; single_cat_title( '', true );echo "</a>";


    	if ( have_posts() ) : while ( have_posts() ) : the_post();
    	if($NewsPerCategory == 7) {
    		echo "<div class='row'>";
    		echo "<div class='col-lg-12'><a itemprop='relatedLink' href='"; echo the_permalink(); echo "' title='"; the_title_attribute(); echo "' >";

            if ( has_post_thumbnail() )
            	the_post_thumbnail('bigpromo', array('class' => 'thumbnail shadow img-responsive', 'itemprop' => 'thumbnailUrl'));
            else
            	//Jeżeli nie ma miniaturki, pobierz wypełniacz
            	get_the_post_thumbnail(1,'bigpromo', array('class' => 'thumbnail shadow img-responsive', 'itemprop' => 'thumbnailUrl'));


            //echo "<img width='653' height='404' class='thumbnail  img-behavior' src='http://mojewronki.pl/wp-content/uploads/2014/12/16-9rot-653x404.jpg' alt=''/>";


          	echo "<h1 class='article-h1' itemprop='headline'>"; the_title(); echo "</h1>";
          	echo "</a></div>";


  		}else{

      			echo "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-6'>
      			<div class='text-center'><a itemprop='relatedLink' href='"; the_permalink(); echo "' title='"; the_title_attribute(); echo "'>";

            	if ( has_post_thumbnail() )
            		the_post_thumbnail('smallpromo', array('class' => 'thumbnail shadow img-responsive', 'itemprop' => 'thumbnailUrl'));
            	else
            		//Jeżeli nie ma miniaturki, pobierz wypełniacz
            		get_the_post_thumbnail(1,'smallpromo', array('class' => 'thumbnail shadow img-responsive', 'itemprop' => 'thumbnailUrl'));


       //echo "<img width='200' height='144' class='thumbnail  img-behavior' src='http://mojewronki.pl/wp-content/uploads/2014/12/16-9-200x124.jpg' alt='". the_title_attribute()."' />";

          		echo "<h2 itemprop='headline' class='article-h2'>"; the_title(); echo "</h2></a></div></div>"; //</div>
          		if ($NewsPerCategory == 5 || $NewsPerCategory == 3 || $NewsPerCategory == 1) echo "<div class='clearfix visible-xs visible-sm'></div>";
          		if ($NewsPerCategory == 4 || $NewsPerCategory == 1) echo "<div class='clearfix hidden-xs hidden-sm'></div>";


         }
         $NewsPerCategory--;
        endwhile; else :
        _e( 'Sorry, no posts matched your criteria.' );

         endif;

         echo "</div></div>";



    }

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

function paulund_remove_default_image_sizes( $sizes) {
    unset( $sizes['medium']);
    unset( $sizes['large']);

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'paulund_remove_default_image_sizes');

add_image_size( 'medium', 653, 404, true );


function register_my_menus() {
register_nav_menus(
array( 'header-menu' => __( 'Header Menu' ))
);
}

add_action( 'init', 'register_my_menus' );

 require_once('inc/wp_bootstrap_navwalker.php');


function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Left Sidebar',
		'id' => 'left-sidebar',
		'description' => 'Widgety umieszczone po lewej stronie!',
		'before_widget' => '<div class="cont">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => 'Right Sidebar',
		'id' => 'right-sidebar',
		'description' => 'Widgety umieszczone po prawej stronie!',
		'before_widget' => '<div class="cont">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>',
	) );

		register_sidebar( array(
		'name' => 'Footer Sidebar',
		'id' => 'footer-sidebar',
		'description' => 'Widgety umieszczone w stopce strony!',
		'before_widget' => '<div class="cont">',
		'after_widget' => '</div>',
		'before_title' => '<div class="cont"  style="font-size: 12px; margin-bottom: 10px;">',
		'after_title' => '</div>',
	) );


}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {

	function wpex_pagination() {

		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
		$next_arrow = is_rtl() ? '&larr;' : '&rarr;';

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 6,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}

}

remove_action( 'begin_fetch_post_thumbnail_html', '_wp_post_thumbnail_class_filter_add' );

function my_search_form( $form ) {
	$form = "<div itemscope itemtype='http://schema.org/WebSite'>
	<form itemprop='potentialAction' itemscope itemtype='http://schema.org/SearchAction' role='search' method='get' id='searchform' class='searchform' action='" . home_url( '/' ) . "'' >
	<meta itemprop='target' content='http://mojewronki.pl/?s={s}'/>
	<label class='screen-reader-text hidden' for='s'>" . __( 'Search for:' ) . "</label>
	<input itemprop='query-input' type='text' name='s' id='s' value='Szukaj' onblur=\" if (this.value == '') {this.value = 'Szukaj';} \" onfocus=\" if (this.value == 'Szukaj') {this.value ='';} \"/>
	<input type='submit' id='searchsubmit' value='". esc_attr__( 'Search' ) ."' />
	</form>
	</div>";

	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

function officeBase64Thumb($id, $class){

	switch ($id) {
		case 14:
			return "<img class='".$class."' width='128' height='128' src='data:image/jpg;base64,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'/>";break;

		case 11:
			return "<img class='".$class."' width='128' height='128' src='data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD//gAsT3B0aW1pemVkIGJ5IEpQRUdtaW5pIDMuMTEuNC40IDB4MDZmODA4NDUA/9sAQwAGBAUGBQQGBgUGBwcGCAsRCwsKCgsWDxANERkWGhoZFhgYHCApIhweJh8YGCMwIyYqKy0uLRsiMjUyLDUpLC0s/9sAQwEHBwcLCAsVCwsVLBwYHCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCws/8AAEQgAgACAAwEiAAIRAQMRAf/EAB0AAAAHAQEBAAAAAAAAAAAAAAECBAUGBwgDAAn/xAA/EAABAgQEBAIGCQMCBwAAAAABAgMABAURBhIhMQcTQVEigRQyQmFxoSMkM1JicpHR8AixwRXhFiU0Q4LS8f/EABkBAAIDAQAAAAAAAAAAAAAAAAEEAgMFAP/EACQRAAICAgICAgIDAAAAAAAAAAABAhEDEgQhMUETIlFhMoGh/9oADAMBAAIRAxEAPwDTMegY9HHAQEGtCaemmpOWcfmFhDSBckm0B9AOjziG0Z3FBKRuSbARDq1xHw3SB9ZnVKsdmmyq5/z5RXGPuISJ0qaafDconc5tD+/+Yq2rVJTgsxzm1OHwqUgKWeuyvVEKPkuTqCG48dJXNl9L4z0S92KdU1tn21pSj5ExzluOGG1v5Jlmblk31WopUE/oYytUqlNZHmnZh126tFOLvp8Ba8R5YdUvM5ctZglSU6ZYtg5vtsrnGC6R9DabXqTUpFqckajKPSrvquJdFif8GHDMkpzAg32I1Bj57SrjlNLcxKzJLSiPVVkF/wASb6ERZ2EuI9SkeU23OKTa1gFkg+cGWXX0COLbqzXd+0eitsIcSJafbSmpEIWf+4kaDyixGH25htLjSgpChoobGJwyRmrRCUJQdSOsegI9eJkAYAiBgDHHCiAg0BsLmAEI64hppS3FBKEi6lKNgB8YzTxq4nMVaooo1FezSjKvpXQdFG2th1AHeJ9xnx3TKdSXaaWn5h50lBCroav1B6qt2Gm14zC9NsPPeGVQ2gg9NAOv+5+cLZZ7fVeBjDCvsxS9U3XXEOJGWwGTPqUJ/c9Yb5urzE04pphXOt9oq9m0/wDl18vnCBSnKhMrShRDQ9Yjt+5h6l5dKlISEIbYasopSPWPSIRSgWtufgYX2VFWZR5mbY2tfy6CDpY+sZl2DeUKuP0+cSpql8+YQtQSr8J7/wAPygjjTTDrjaUczlq8Kbesdh8zEvkB8LIlPSj0qFBQIzDYHpCCVnJmWdzN6ZdtIujBmBhiGUbmKio57a5dNdvltCHGfDtmlrU5LXDWXT3GAs8fEib40v5RI9hDEk05NIaIHwKiIuvBGOZmjqbl31KdkyfEhZuW/wAojP8ALU5UpMePwr7g6g9P1h8RVJmReQpSs106KOxEVSWstoBX2jUza0nMNTcs2+w4HGnEhSVp2IMKIqvgfXjO0oya/VTdxsXvl+8nyP8AcHvFpXh7HLaNiE46ugYGAvHriJkRVCOpv+jyy3MyUhCStSlbJSBckwthhxwnNhiopKsoU0Qo22T1+URk6RJeTI/ELGMtiSvuT76VPi/LZbSTlQgdAnp3J3PeIi809PqcEu2sJT65VoEjtboIJiGVeotYebbUpDqVlGYEBQ946CLE4WUQTdLU+lHOIcKruagq7q+EITlpHbyaOKO8tH4IpQ6D9Zalnkf9QseEi34ok2IMKvU6YaDX2M2PolHbP0TE3kqDzMSyQCPsHFOEncjr84n9WosrUqeuUmEXaWNR/b4axQskpdjawwSooOgjM1ZSbOqGiTuFpVrEnw3hhp7GTpfRmYU2HWx3iUOYK5VRllSikhpCw4pStVFX/wAiZS1Pk5AtOrKELQDYq6iD2SpJUM0jR10x5XobvLSo6pUnMk/tHLFdNXPUlbd8yyNLCwiSTNSpwXkM1LhR6FwCEvp0lMK5TMw04r7oULxFxCmZgrzMy0lx1SVDkL1BGqYbqfMelNOsOKSlQX4CekXZj7DyJiVnHpdN3FNqUpFrZozrzsoU4yb6aAjeGcP3VP0JchKD2XsvjgJUHZLFok3jkbeBAQTfKq23wMaa6RkPhBVpY4lp7k2gKKjywomxF9AoH7wOh7xriWUpTSSsAL2VbvDODw0xHOu0zrHo9AReUi7aOM00iYl3WXAChxJQoHsRYx3gt7akaDWAExHxqpjcrxAqMjIpWlhFlIUrZSxbMB3sbjyiWcHauyzQKkVJtyVhxTY94tp8Sn5wj/qDlFS2IZFYNnHEocze9alKV8zDVwcd5mKKjTnE2Q8wFJv1yLH/ALGM/Krg/wBGjgdSX7LGUcR1CYW9K8mnIcA8S13VbptCVaMRInOW5i5jTdtCU3h7qlFefnWFLcV6OhXjauUhweW0IGcJ09uuOTUvK3ZVfLLobGRCuqv52ivG4uL7oZlGakqV/wB0TaguuPS7bbi+Y4kaq7wwY2eStfJcKkZb63tYRIsNSKZRxLYCwlKdl7wjrNIbn5vPy0rt7CtjFbbGEkVI/ScNyY9Nml1IpK/tGsykZvzQZl6iTKmlSrky5mPgW5dKx/DFhz2G35qR9CclWFSiVZg0smyYNKYYbbCBMS8sUoTkQlKR4f2iyVapW7KVCSm26r/RkpTj5ZUw46p1i30ZWNU/vGfa3SvQq1PSrS8jjTvhQRopMaqepzMoxZCLWjNXFVXKxFP5T43HUqBG4iXHbcqKeUkoWc8BTaGKuG1+op0BSDoU5tND8bHyjbOG31vUtgvL5igkDOd1e8++MGYdm1TFdlSteRa1pSpe19dz8o3Xg4KFDllOWuttKxbaxEOwVSZnZHcUP3wgI9eAi4pHGCrF0qHcWg0F+EAJlf8AqQeSrE1NSNOVLNpIt1CjcRFeHs4yMeyJSAlaHXWkq+8laCbfqIvji3gxusJRUeRznkrKVJTvy1WSbX6gHN8YztREiQrdOlihXpknViXXcuzdkpAJ23vCOWPmx7BPwacZSlxN1fpC1ptKRqIa5YnwfCHJZujKO2phGJsej1OTnmXnD0GnvhC+tTbilhN7DWGOYrE1KKfQpaRdRykA2hokJutLm8jj7QZcvrl9Uf5i1KkQdX5J9z0uM3BhHMOpbNwf1j1g01dB2GohsnXQqIv8E01Rwqs6C0uxvfaMxcSW3HcWTpIukFOsaJnU231tFCY7rUvNVuZp8tK3faeyOvKtY/wxdxm97QlylHSmxjwpRkz9TYb5hShSxdSSMw94vpf3HeNiYIFfptGYlJtmSm22hlRMJdLZKOmZBH+Yz5w9wM7XJNT9PcDTillPJdXl5hTa+RVtCDcd/KLuwXharU1xKanOvGXSNEuu5z8NNLQ4m3K0ZkkkqLMli4Wru5cx+7tHW8EaSENpSOgg0MFA59ICPXgIARLOMB5rKQDY3EZU4iUGp0nEc40ZdtEnWp9Uw0rxFxplo21GwSo+IddI1pENx7hs1kszUuSmaZQUBQ10vmtbqLjUdRFc42icJasjFJmOfTJd9QyqcaQ4R2g9QqrcoxnmXOW2TluASSfKG6mM1OQ9KZq8sprI4eU4Acpb9n4Q5ymVxpSTqq28ZUo6Spm5jyLJFMY5yqyjjN3ZR0JHqkIVf5QkVVXUs3lKW8+hPXlqBt5w+Ti56WR9WabXr7RtDd/zSbHjKW/ckbRamqGNsdUJadWpqaeWhVPnZVKeryRlMLFPZnPFCxDRYlsqjmv6xPWItUqk3LqWM+3S8Uydsq6T6FFUnUJQsnS28ZqnEOPz87NLH0j8wu1jv4ou2WcdrL7iG03YQPGfvfhipaBVpKSxHKqq0q4/T2X1IdaRorLDXFTt0Ic2SdNmkuAtIYmcKTjc82tbiJk523NC2rKNiNthFrsU+XZN08xVtgtwqA8jDXgpdFmKE3OYbeamJCaVzC6g3Kl2AIVfUKFgLHUQ/Q/GNIzG7dhrx64gseiQB0gIGCwAgXgsDCefnJaQl1Pz8yzLMJFy464EJHmY44Ccl2plhxp9tLjaxlKVdorrEVJmMOlubl1LmZNasq0W8bfb80NONuPeG6IlxmiocrU4Ni34GQfzneKjmeLmIKrX6JO1yYQ3THZotGVZTlaQn1c34tVfKKc2NTj2uy7BkcJKn0XW3WJN2X5iVtrTbdJvCOYxDKsNbtpsTpeGqboFMqC3PSJfK8fbaWW1KHlvEaqWDqa2q6w6vXZbqlf3jPSVGttI51/H3OWuWpyee6rokbQzyNNnai5nmnCM257w7S1HYlsrcswhtJ6IFok0lTgkN26dBtHV+CcI2+zlJSzNKp63AlKG2kFUZ3rSWuc3kAzhS1qP5tT8zFycW8Qf6XRvQZZQ575Gb8vWKLedLp5hBGf+0O8SGsXJ+zM5uRSkor0SvhzjurYIqi5ilrS5LvW50q7ctOjoSOih0UNY1ngDHNIxrS0zFPcS1Np+1k3Fjmtq9w9pPYj5RiJoddYWSc27JvJfl3VtPJIyrSopI8xDYib6v3j14y9hPjRiOmtoanltVRgdJm4WB7ljX9bxbeGuLuHawUNTpdpcwro94myfzjbzAgHWW1EWx3jej4LkEzFWeKn3AeVLNauO/AdB7zpDzXarLUSjTtTnlZZaUaU6v3gDb4naMPYrxDO4mrc1VKk6pb76ibE6Np9lA7ACAEsfFXHjEVRzt0hDFJlzoCgcx235joPIRUtcrlRq7xdqU7Mzbh1KnXCs/OEbhKoTOC9h3gnHNN1LzK8odsTyx/4KoTw9VTr9yO8Nlh0iWzcoqe4Wy6h4vR33FBPbxxF+iUS2OG9eGI8J0+acc+ttpDL2vtp/nziSTEgpbmdxea3fWM6cJcT/AOhVNcs+u0rMkJWCfVV0VGhWKlzG9DfTQxn5IaSaNbDk3gmC3LpDua1+2kKJuYTKSylkDNbQdzHBp0ZsxVEN4kV4yNFdUyuzzn0TVu/X9BHY8e8v0dmzfFHryVJjapvVfEMwtayppCi2lQOh+9/PcIYFHO7YaJEdFqITp7I0grA6xpJV0Y7d9s7W0tcR01y7+0IKlNz/ALR0XoG/ertBAKpYAjt8IXsOqbVYm8N0uf7woSvxWT53jjj/2Q=='/>";break;

		case 13:
			return "<img class='".$class."' width='128' height='128' src='data:image/jpg;base64,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'/>";break;

	case 3:
			return "<img class='".$class."' width='128' height='128' src='data:image/jpg;base64,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'/>";break;

	case 7:
			return "<img class='".$class."' width='128' height='128' src='data:image/jpg;base64,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'/>";break;

	case 4:
			return "<img class='".$class."' width='128' height='128' src='data:image/jpg;base64,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'/>";break;

		case 12:
			return "<img class='".$class."' width='128' height='128' src='data:image/jpg;base64,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'/>";break;
	}
}
?>