<?php get_header(); ?>


	<div class="twelve columns" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php post_class('blogPost'); ?>>
		<div class="row" itemscope itemtype="http://schema.org/BlogPosting">
			
			<div class="twelve columns">
				
				<h3 itemprop="name headline" class="entry-title p-name"><?php the_title(); ?></h3>
				<h5><span datetime="<?php the_time( 'c' ); ?>" itemprop="datePublished" class="updated dtstart"><?php the_time( 'D, jS M, Y' ); ?></h5>
				<?php the_content(); ?>
			</div>			
			
		</div>
	</div>
	
	<?php endwhile; ?>
	
	<?php endif; ?>

	</div>


<?php get_footer(); ?>