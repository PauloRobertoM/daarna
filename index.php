<?php get_header(); ?>
    
    <?php $page = 'home'; ?>

    <?php include 'components/vitrine.php'; ?>

    <section class="sobre">
    	<div class="container">
    		<h1><img src="<?php echo get_template_directory_uri(); ?>/assets/images/titulo-sobre.jpg" alt=""></h1>
    		<?php
				$args = array(
					'posts_per_page' => 1,
					'post_type'      => 'sobres',
				);
				$sobres = get_posts($args);
			?>

			<?php foreach ($sobres as $sobre) : ?>
				<?php $texto1_sobre = $sobre->post_content; ?>
				<?php $texto2_sobre = $sobre->sobres_texto2; ?>
	    		<div class="itens">
	    			<div class="item">
	    				<?php
				        	$sobres1 = rwmb_meta('sobres_foto1', 'type=plupload_image', $sobre->ID);
				        	foreach ( $sobres1 as $sobre1 ) {
				        		echo "<img src='{$sobre1['url']}' class='img-responsive' alt='{$sobre1['alt']}' />";
				        	}
			        	?>
	    			</div><!-- item -->
	    			<div class="item">
	    				<p><?= $texto1_sobre ?></p>
	    			</div><!-- item -->
	    			<div class="item">
	    				<p><p><?= $texto2_sobre ?></p></p>
	    			</div><!-- item -->
	    			<div class="item">
	    				<?php
				        	$sobres2 = rwmb_meta('sobres_foto2', 'type=plupload_image', $sobre->ID);
				        	foreach ( $sobres2 as $sobre2 ) {
				        		echo "<img src='{$sobre2['url']}' class='img-responsive' alt='{$sobre2['alt']}' />";
				        	}
			        	?>
	    			</div><!-- item -->
	    		</div><!-- itens -->
	    	<?php endforeach; ?>
    	</div><!-- container -->
    </section><!-- sobre -->

    <section class="equipe">
    	<div class="container">
    		<h1 class="text-right"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/titulo-equipe.jpg" alt=""></h1>
    		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/equipe.jpg" class="img-responsive" alt="">

    		<?php
				$args = array(
					'posts_per_page' => 2,
					'post_type'      => 'equipes',
				);
				$equipes = get_posts($args);
			?>
			<div class="row">
				<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
				<?php foreach ($equipes as $equipe) : ?>
					<?php $nome_equipe = $equipe->post_title; ?>
					<?php $texto_equipe = $equipe->post_content; ?>
	    			<div class="col-md-6 col-sm-6">
	    				<div class="accordion"> 
							<ul class="accordion__list">
								<li class="accordion__item">
									<div class="accordion__itemTitleWrap">
										<h3 class="accordion__itemTitle"><?= $nome_equipe ?></h3>
										<div class="accordion__itemIconWrap"><svg viewBox="0 0 24 24"><polyline fill="none" points="21,8.5 12,17.5 3,8.5 " stroke="#FFF" stroke-miterlimit="10" stroke-width="2"/></svg></div>
									</div>
									<div class="accordion__itemContent">
										<p><?= $texto_equipe ?></p>
									</div>
								</li>
							</ul>
						</div>
	    			</div><!-- col-md-6 col-sm-6 -->
	    		<?php endforeach; ?>
	    	</div><!-- row -->
    	</div><!-- container -->
    </section><!-- equipe -->

<?php get_footer(); ?>