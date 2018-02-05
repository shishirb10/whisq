<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="container">	
		<div class="post" id="post-<?php the_ID(); ?>">

			<h2 class="mt-4 mb-3"><?php the_title(); ?></h2>

			<?php// include (TEMPLATEPATH . '/inc/meta.php' ); ?>
		<div class="row">

			<div class="entry col-lg-12 mt-4 mb-3">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>
		</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
		</div>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>