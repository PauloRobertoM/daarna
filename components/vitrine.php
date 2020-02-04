<?php
	$args = array(
		'posts_per_page' => 5,
		'post_type'      => 'vitrines',
	);
	$vitrines = get_posts($args);
?>

<section class="vitrine">
	<div class="owl-carousel owl-theme owl-vitrine">
		<?php foreach ($vitrines as $vitrine) : ?>
			<?php $titulo_vitrine = $vitrine->post_title; ?>
			<div class="item">
				<?php
		        	$vitrines = rwmb_meta('vitrines_foto', 'type=plupload_image', $vitrine->ID);
		        	foreach ( $vitrines as $vitrine ) {
		        		echo "<a href='{$titulo_vitrine}'><img src='{$vitrine['url']}' alt='{$vitrine['alt']}' /></a>";
		        	}
	        	?>
			</div><!-- item -->
		<?php endforeach; ?>
    </div><!-- owl-carousel -->
</section><!-- vitrine -->