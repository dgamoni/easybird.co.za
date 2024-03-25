<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Soup
 */

$soup_opt = new Soup();
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	        <!-- Page Content -->
	        <div class="page-content bg-light">

	            <div class="container clearfix">
	                <div class="main left">
						<?php
						if ( have_posts() ) :  
							/* Start the Loop */
							while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/content' ); 
							endwhile; 
						else : 
							get_template_part( 'template-parts/content', 'none' );
						endif; ?> 
	                    <!-- Pagination -->
	                    <nav aria-label="Page navigation" class="mt-5">
	                    	<?php soup_pagination(); ?> 
	                    </nav>
	                </div>
	                <div class="sidebar right">
	                	<?php get_sidebar(); ?> 
	                </div>
	            </div>
	            
	        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
