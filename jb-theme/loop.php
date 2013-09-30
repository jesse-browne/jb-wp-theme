<?php
/* Set often used urls in variable for re use */
$site_url =      get_site_url();
$template_url =  get_bloginfo('template_url');

/* Render home page */
if (is_home()) { ?>
    	            <!-- Main Heading -->
                    <h1>Snippets of web development and experiments in html5 and js games</h1>
                    <!-- Tag Line -->
                    <h5>The playground of web application developer, Jesse Browne</h5>
                    <!-- Container with Site Description and article excerpts -->
                    <div id="big-container">
                        <div class="big-container-body">
                            Aside from working on <a href="http://www.greenpag.es/">greenpag.es</a>, 
                            Jesse is learning to make games for the browser, 
                            begrudgingly finding out more about server administration than he 
                            ever intended, learning to illustrate and happily 
                            experimenting with different Python frameworks. 
                        </div>
                        <div class="big-container-body">
                            <div class="small-container">
                                <div class="small-container-title">
                                    <a href="<?php echo $site_url; ?>/projects/projects-list.html">
                                        <span>HTML/JS Game</span>
                                    </a>   
                                </div>
                                <div class="small-container-body">
                                    <div class="small-container-image">
                                        <img src="<?php echo $template_url;?>/images/jewel-thief.png" alt="Use games to get more cool stuff" />
                                    </div>                  
                                </div> 
                            </div>
                            <div class="small-container">
                                <div class="small-container-title">
                                    <a href="<?php echo $site_url; ?>/articles/change-the-world.html">
                                        <span>World Changing</span>
                                    </a>   
                                </div>
                                <div class="small-container-body">
                                    <div class="small-container-image">
                                        <img src="<?php echo $template_url;?>/images/map-green3.jpg" alt="Change the world through games" />
                                    </div>                  
                                </div> 
                            </div>
                            <div class="small-container">
                                <div class="small-container-title">
                                    <a href="<?php echo $site_url; ?>/articles/html5-games.html">
                                        <span>Browser Games</span>
                                    </a>   
                                </div>
                                <div class="small-container-body">
                                    <div class="small-container-image">
                                        <img src="<?php echo $template_url;?>/images/html5-logo.jpg" alt="Games could change the world" />
                                    </div>                  
                                </div> 
                            </div>
                            <div class="small-container">
                                <div class="small-container-title">
                                    <a href="<?php echo $site_url; ?>/articles/skyrim-better-than-life.html">
                                        <span>Skyrim Review</span>
                                    </a> 
                                </div>
                                <div class="small-container-body">
                                    <div class="small-container-image">
                                        <img src="<?php echo $template_url;?>/images/skyrim-tavern.png" alt="Skyrim Tavern" />
                                    </div>                  
                                </div>
                            </div>
                        </div>                              
                    </div> <?php 
}

/* Render list view of articles and projects */
if ( (!is_home()) && (!is_single()) ) {
    if ( have_posts() ) {
        global $post;
		while ( have_posts() ) {
			the_post();
			default_loop_title();
			get_post_image($post);
		} 
	}
}

/* Render single pages */
if (is_single()) {
    default_single();
}

if (is_page()) {
    default_single();
}

function default_single() {
    if ( have_posts() ) {
	    global $post; 
	    the_post();
        if (!is_page()) {
	        default_single_title();
        }
        the_content();
    }
}

/* Get titles and images */
function default_loop_title() {
	/**
	 * Print title of post to product index page
	 * with link to product page
	 */
    global $post;
	$title = $post->post_title;
	$link = get_permalink($post->ID);
	?><h1><a href="<?php  echo $link ?>" title="<?php $title ?>" rel="bookmark"><?php echo $title; ?></a></h1><?php 
}

function default_single_title() {
	/**
	 * Print title of post to product pages
	 */
    global $post;
	$title = esc_attr(get_the_title($post->ID));
	
	?><h1><?php echo $title; ?></h1><?php 
}

function get_post_image($post) {
    global $post;
    if ( has_post_thumbnail() ) {
        $link = get_permalink($post->ID);
		?><a href="<?php echo $link; ?>"><?php
		the_post_thumbnail('jb_custom');
		?></a><?php
    }
}
?>