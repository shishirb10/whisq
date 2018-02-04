<?php 
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage WhisQ
 */

get_header(); ?>

	<header>
		<?php 
		$slides = CFS()->get( 'slides' );
		$b=0;
		?>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
		<?php for($i=0; $i<count($slides); $i++ ) 
		{
				
		?>
			<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
		<?php 
		}
		?>
          <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
		  <?php 
			foreach($slides as $slide)
			{
				if ($b == 0) {
			?>	
			<div class="carousel-item active ">
				<img class="card-img-top" src="<?php echo $slide['slide_image']; ?>" alt="">
				<div class="carousel-caption d-none d-md-block">
				  <h3><?php echo $slide['slide_title']; ?></h3>
				  <p><?php echo $slide['slide_description']; ?></p>
				  <?php $slide_button = $slide['slide_button']; ?>
				  <a class="btn btn-slider" href="<?php echo $slide_button['url'] ?>" target="<?php echo $slide_button['target'] ?>"><?php echo $slide_button['text'] ?></a>
				</div>
			</div>
			<?php } else {?>
			<div class="carousel-item ">
				<img class="card-img-top" src="<?php echo $slide['slide_image']; ?>" alt="">
				<div class="carousel-caption d-none d-md-block">
				  <h3><?php echo $slide['slide_title']; ?></h3>
				  <p><?php echo $slide['slide_description']; ?></p>
				  <?php $slide_button = $slide['slide_button']; ?>
				  <a class="btn btn-slider" href="<?php echo $slide_button['url'] ?>" target="<?php echo $slide_button['target'] ?>"><?php echo $slide_button['text'] ?></a>
				</div>
			</div>
			<?php
			}
			$b++;
			}	
		  
		  ?>
         
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
	<!-- Page Content -->
    <div class="container-fluid mb-4">	
	    <div class="row">
			<?php 
			$terms = get_terms( array(
				'taxonomy' => 'category',
				'hide_empty' => false,
				'number'=> 4,
			) );
			//print_r ($terms);
			
			?>
			<?php 
			foreach($terms as $term)
			{			
				?>
			<div class="col-lg-6 portfolio-item mt-4 mt-3 animated fadeInUpBig wow">
			  <div class="card h-100">
				<a href="<?php  echo $term_link = get_term_link( $term ); ?>"><img class="card-img-top" src="<?php echo get_wp_term_image($term->term_id);	 ?>" alt=""></a>
				<div class="card-body">
				  <h4 class="card-title text-center">
					<a href="<?php  echo $term_link = get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
				  </h4>				  
				</div>
			  </div>
			 
			<a class="overlay" href="<?php  echo $term_link = get_term_link( $term ); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/bowl.png" alt=""></a>
		    
			</div>		
			<?php } ?>
			
			
			
			</div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <!-- container -->
	<div class="container-fluid container-bg mb-4 ">
	
		<?php $args = array(
		 'posts_per_page'   => 3,
		 'orderby'          => 'date',
		 'order'            => 'DESC',
		 'post_type'        => 'testimonial',
		 'post_status'      => 'publish',
		);
		$testimonial_array = get_posts( $args ); 
		//print_r ($testimonial_array );
		$i=0;		
		$j=0;		
		?>
	<!-- row -->
		<div class="row">				
	        <div class="col-lg-12">
			<div class="col-md-8 col-md-offset-2 pull-right testimonial-con animated fadeInLeftBig wow ">
                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
				<div class="carousel slide testimonial" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
				  <!-- Carousel indicators -->
                  <ol class="carousel-indicators">
					<?php for($a=0; $a<count($testimonial_array); $a++ ) 
					{
						if ($j == 0) {	
					?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $a; ?>" class="active" ></li>
					<?php } else {?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $a; ?>"  ></li>
					<?php 
					}
					$j++;
					}	
					?>
				    
				  </ol>
				  <!-- Carousel items -->
				  <div class="carousel-inner">
				  <?php 
					foreach($testimonial_array as $t)
					{
						if ($i == 0) {	
					?>
					
					<div class=" carousel-item active">
				    	<blockquote>
				    		<p class="text-center  mt-3"><?php echo $t->post_content; ?></p>
				    		<p class="text-center mt-5"><strong>- <?php echo $t->post_name; ?></strong></p>
				    	</blockquote>
				    </div>
						<?php } else {?>
						<div class=" carousel-item">
				    	<blockquote>
				    		<p class="text-center mt-3"><?php echo $t->post_content; ?></p>
				    		<p class="text-center mt-5"><strong>- <?php echo $t->post_name; ?></strong></p>
				    	</blockquote>
				    </div>
					<?php
					}
					$i++;
					}				  
				    ?>
				    
				  </div>
				</div>
			</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
	<!-- container -->
	<div class="container-fluid mb-4 recipe-background">
	<!-- row -->
		<div class="row">
		<div class="col-lg-12">
		<h2 class = "mt-4 mb-3 text-center fontcolor" ><?php echo $recipes = CFS()->get( 'recipes_title' ); ?></h2>
		<p class="mt-4 mb-3 text-center"><?php echo $recipes = CFS()->get( 'recipes_description' ); ?></p>
		</div>
		<?php $args = array(
		 'posts_per_page'   => 2,
		 'orderby'          => 'date',
		 'order'            => 'DESC',
		 'post_type'        => 'post',
		 'post_status'      => 'publish',
		);
		$posts_array = get_posts( $args ); 
		//print_r ($posts_array );
		//$i=0;		
		?>
		 <?php 
			foreach($posts_array as $p)
			{
			?>
			<div class="col-lg-6 portfolio-item mt-4 mt-3 animated fadeInDownBig wow">
			  <div class="card h-100">
			  <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $p->ID ), 'full' );
				// print_r ($image);
			  ?>
				<a href="<?php echo get_permalink($p->ID); ?>">
				
				<img class="card-img-top" src="<?php echo $image[0]; ?>" alt=""></a>
				<div class="card-body">
				<a class="img-post-arrow " href="<?php echo get_permalink($p->ID); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/arrow_2.png" alt=""></a>
				  <h4 class="card-title text-center">
					<a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->post_title; ?></a>					
				  </h4>
				<ul>
				<li class="card-text "><?php echo $p->post_excerpt; ?></li>	
				</ul>	
				</div>
			  </div>
			</div>
			
			<?php  }
			
			?>
		
		
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
	<!-- container -->
	<div class="container-fluid mb-4 animated fadeInRightBig wow">	
	<!-- row -->
		<div class="row">
		<?php
     echo do_shortcode('[instagram-feed]');
	?>
		</div>
	</div>
	<!-- <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?> -->

<?php //get_sidebar(); ?>

<?php get_footer(); ?>