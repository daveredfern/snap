<?php get_header(); ?>

<?php if ( have_posts() ) :  $i = 0; ?>
    <?php while ( have_posts() ) : the_post(); $i++; ?>
		<?php
			$image_id = get_post_thumbnail_id();
			$image = wp_get_attachment_image_src( $image_id, 'full' );
			$color = get_post_meta(get_post_thumbnail_id(), 'dominant_color_hex');
		?>
		<div class="panel<?php if($i==1) { echo ' is-active'; } ?>" data-bg-color="<?php echo $color[0]; ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<img
					src="<?php the_post_thumbnail_url('photography-xs'); ?>"
					srcset="<?php the_post_thumbnail_url('photography-md'); ?> 800w,
							<?php the_post_thumbnail_url('photography-sm'); ?> 600w,
							<?php the_post_thumbnail_url('photography-xs'); ?> 400w"
					sizes="80vw"
					alt="<?php the_title(); ?>"
					title="<?php the_title(); ?>" />
			<?php endif; ?>
		</div>
    <?php endwhile; ?>
<?php else : ?>
	<div class="u-container">
		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>
<?php endif; ?>

<?php get_footer(); ?>