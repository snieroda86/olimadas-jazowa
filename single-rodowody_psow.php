<?php
/**
 * The template for displaying single dog business card
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php  get_template_part( 'template-parts/page', 'header' ); ?>
		<!-- <div class="container-lg"> -->
        <!-- Page content-->
        <div class="container pt-4">
        	<?php
			while ( have_posts() ) : the_post(); ?>

				<div class="row">
	                <!-- Blog entries-->
	                <div class="col-lg-8">
	                    <!-- Featured blog post-->
	                    <div class="card mb-4">
	                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
	                        <div class="card-body">
	                            <div class="small text-muted">January 1, 2023</div>
	                            <h2 class="card-title">Featured Post Title</h2>
	                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
	                            <a class="btn btn-primary" href="#!">Read more →</a>
	                        </div>
	                    </div>
	                   
	                </div>
	                <!-- Side widgets-->
	                <div class="col-lg-4">
	                    <!-- Search widget-->
	                    <div class="card mb-4">
	                        <div class="card-header">Search</div>
	                        <div class="card-body">
	                            <div class="input-group">
	                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
	                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- Categories widget-->
	                    <div class="card mb-4">
	                        <div class="card-header">Categories</div>
	                        <div class="card-body">
	                            <div class="row">
	                                <div class="col-sm-6">
	                                    <ul class="list-unstyled mb-0">
	                                        <li><a href="#!">Web Design</a></li>
	                                        <li><a href="#!">HTML</a></li>
	                                        <li><a href="#!">Freebies</a></li>
	                                    </ul>
	                                </div>
	                                <div class="col-sm-6">
	                                    <ul class="list-unstyled mb-0">
	                                        <li><a href="#!">JavaScript</a></li>
	                                        <li><a href="#!">CSS</a></li>
	                                        <li><a href="#!">Tutorials</a></li>
	                                    </ul>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- Side widget-->
	                    <div class="card mb-4">
	                        <div class="card-header">Side Widget</div>
	                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
	                    </div>
	                </div>
	            </div>

			<?php endwhile; ?>
           
        </div>
		<!-- </div> -->

	</main><!-- #main -->

	<script type="text/javascript">
    jQuery(document).ready(function($) {
     
    })
    
</script>

<?php
get_footer();
