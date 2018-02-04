<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="container mb-4">
	
	    <div class="row">
			<div class="col-lg-8 mt-4 mt-3 ">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					
					<h2 class="card-title"><?php the_title(); ?></h2>
					
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

					<div class="entry card-text">
						
						<?php the_content(); ?>

						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
						
						<?php the_tags( 'Tags: ', ', ', ''); ?>

					</div>
					
					<?php edit_post_link('Edit this entry','','.'); ?>
					
				</div>
			</div>
			<div class="col-lg-4 mt-4 mt-3">
			<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<div class="container mb-4">
	
	    <div class="row">
		<div class="col-lg-12 mt-4 mt-3">
			<?php comments_template(); ?>
			</div>
	

	<?php endwhile; endif; ?>
	

</div>
</div>
<?php get_footer(); ?>