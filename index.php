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
				<div class="col-md-1 col-sm-1"></div>
				<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
				<?php foreach ($equipes as $equipe) : ?>
					<?php $nome_equipe = $equipe->post_title; ?>
					<?php $texto_equipe = $equipe->post_content; ?>
	    			<div class="col-md-5 col-sm-5">
	    				<div class="accordion"> 
							<ul class="accordion__list">
								<li class="accordion__item">
									<div class="accordion__itemTitleWrap">
										<h3 class="accordion__itemTitle"><?= $nome_equipe ?></h3>
										<div class="accordion__itemIconWrap">
											<i class="fa fa-angle-down" aria-hidden="true"></i>
										</div>
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

    <section class="projetos" id="galerias">
    	<div class="container">
    		<h1><img src="<?php echo get_template_directory_uri(); ?>/assets/images/titulo-projetos.jpg" alt=""></h1>
    		<ul>
    			<li><a href="">Todos</a></li>
    			<li><a href="">Arquitetura</a></li>
    			<li><a href="">Interiores</a></li>
    			<li><a href="">Comercial</a></li>
    		</ul>
			<div class="row">
				<?php
					$args = array(
						'posts_per_page' => 10,
						'post_type'      => 'projetos',
					);
					$projetos = get_posts($args);
				?>
				<?php foreach ($projetos as $projeto) : ?>
					<?php $nome_projeto = $projeto->post_title; ?>
					<?php $texto_projeto = $projeto->post_content; ?>
					<div class="col-md-6 col-ms-6">
						<?php
				        	$foto_ps = rwmb_meta('projetos_foto', 'type=plupload_image', $projeto->ID);
				        	$i = 0;
				        	if ($i < 1) {
					        	foreach ( $foto_ps as $foto_p ) {
					        		echo "<a href='{$foto_p['url']}' data-lightbox='album-{$projeto->ID}'>";
					        			echo "<article class='g g_um' style='background-image: url({$foto_p['url']});'>";
					        	}
					        	$i = $i + 1;
					        }
			        	?>
		    					<div class="content">
		    						<h2><?= $nome_projeto ?></h2>
		    						<p><?= $texto_projeto ?></p>
		    					</div><!-- end content -->
		    				</article><!-- end g_um -->
		    			</a>
					</div><!-- md-6 -->	
                    <div class="album">
                    	<?php
				        	$foto_gs = rwmb_meta('projetos_foto', 'type=plupload_image', $projeto->ID);
				        	foreach ( $foto_gs as $foto_g ) {
				        		echo "<a href='{$foto_g['url']}' data-lightbox='album-{$projeto->ID}' title='MASTER VISTA MAR'></a>";
				        	}
			        	?>
                    </div><!-- .album -->
	    		<?php endforeach; ?>
			</div><!-- row -->
    	</div><!-- container -->
    </section><!-- projetos -->

<?php get_footer(); ?>