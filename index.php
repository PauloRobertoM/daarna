<?php get_header(); ?>
    
    <?php $page = 'home'; ?>

    <?php include 'components/vitrine.php'; ?>

    <section class="sobre" id="sobre">
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

    <section class="equipe" id="equipe">
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
    			<li><a id="todos">Todos</a></li>
    			<li><a id="cat-arquitetura">Arquitetura</a></li>
    			<li><a id="cat-interiores">Interiores</a></li>
    			<li><a id="cat-comercial">Comercial</a></li>
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
					<?php $categoria_projeto = $projeto->projetos_categoria; ?>
					<?php if ($categoria_projeto == 'category-1') { ?>
						<div class="<?= $categoria_projeto ?>">
							<div class="col-md-6 col-ms-6">
								<?php
						        	$foto_ps = rwmb_meta('projetos_foto', 'type=plupload_image', $projeto->ID);
						        	$i = 1;
							        foreach ( $foto_ps as $foto_p ) {
							        	if ($i == 1) {
							        		echo "<a href='{$foto_p['url']}' data-lightbox='album-{$projeto->ID}'>";
							        		echo "<article class='g g_um' style='background-image: url({$foto_p['url']});'>";
							        		$i = $i + 1;
							        	}
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
						        		echo "<a href='{$foto_g['url']}' data-lightbox='album-{$projeto->ID}'></a>";
						        	}
					        	?>
		                    </div><!-- .album -->
						</div>
	                <?php } elseif ($categoria_projeto == 'category-2') { ?>
	                	<div class="<?= $categoria_projeto ?>">
							<div class="col-md-6 col-ms-6">
								<?php
						        	$foto_ps = rwmb_meta('projetos_foto', 'type=plupload_image', $projeto->ID);
						        	$i = 1;
							        foreach ( $foto_ps as $foto_p ) {
							        	if ($i == 1) {
							        		echo "<a href='{$foto_p['url']}' data-lightbox='album-{$projeto->ID}'>";
							        		echo "<article class='g g_um' style='background-image: url({$foto_p['url']});'>";
							        		$i = $i + 1;
							        	}
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
						        		echo "<a href='{$foto_g['url']}' data-lightbox='album-{$projeto->ID}'></a>";
						        	}
					        	?>
		                    </div><!-- .album -->
		                </div>
	                <?php } elseif ($categoria_projeto == 'category-3') { ?>
	                	<div class="<?= $categoria_projeto ?>">
							<div class="col-md-6 col-ms-6">
								<?php
						        	$foto_ps = rwmb_meta('projetos_foto', 'type=plupload_image', $projeto->ID);
						        	$i = 1;
							        foreach ( $foto_ps as $foto_p ) {
							        	if ($i == 1) {
							        		echo "<a href='{$foto_p['url']}' data-lightbox='album-{$projeto->ID}'>";
							        		echo "<article class='g g_um' style='background-image: url({$foto_p['url']});'>";
							        		$i = $i + 1;
							        	}
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
						        		echo "<a href='{$foto_g['url']}' data-lightbox='album-{$projeto->ID}'></a>";
						        	}
					        	?>
		                    </div><!-- .album -->
		                </div>
	                <?php } ?>
	    		<?php endforeach; ?>
			</div><!-- row -->
    	</div><!-- container -->
    </section><!-- projetos -->

	<section class="antes" id="antes">
		<div class="container">
			<h1><img src="<?php echo get_template_directory_uri(); ?>/assets/images/titulo-antes.jpg" alt=""></h1>
			<div class="owl-carousel owl-theme owl-antes">
				<?php
					$args = array(
						'posts_per_page' => 20,
						'post_type'      => 'antes',
					);
					$antes = get_posts($args);
				?>
				<?php foreach ($antes as $ante) : ?>
					<?php $titulo_ante = $ante->post_title; ?>
					<?php $texto_ante = $ante->post_content; ?>
					<div class="item">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<?php
						        	$antes1 = rwmb_meta('antes_foto1', 'type=plupload_image', $ante->ID);
						        	foreach ( $antes1 as $ante1 ) {
						        		echo "<img src='{$ante1['url']}' alt='{$ante1['alt']}' />";
						        	}
					        	?>
							</div><!-- md-6 -->
							<div class="col-md-6 col-sm-6">
								<?php
						        	$antes2 = rwmb_meta('antes_foto', 'type=plupload_image', $ante->ID);
						        	foreach ( $antes2 as $ante2 ) {
						        		echo "<img src='{$ante2['url']}' alt='{$ante2['alt']}' />";
						        	}
					        	?>
							</div><!-- md-6 -->
						</div><!-- row -->
			        	<div class="conteudo">
			        		<h2><?= $titulo_ante ?></h2>
			        		<p><?= $texto_ante ?></p>
			        	</div><!-- conteudo -->
					</div><!-- item -->
				<?php endforeach; ?>
		    </div><!-- owl-carousel -->
		</div><!-- container -->
	</section><!-- antes -->

	<section class="depoimentos" id="depoimentos">
		<div class="container">
			<h1 class="text-right"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/titulo-depoimentos.jpg" alt=""></h1>
			<div class="owl-carousel owl-theme owl-depoimentos">
				<?php
					$args = array(
						'posts_per_page' => 20,
						'post_type'      => 'depoimentos',
					);
					$depoimentos = get_posts($args);
				?>
				<?php foreach ($depoimentos as $depoimento) : ?>
					<?php $titulo_depoimento = $depoimento->post_title; ?>
					<?php $texto_depoimento = $depoimento->post_content; ?>
					<div class="item">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<?php
						        	$img_depoimentos = rwmb_meta('depoimentos_foto', 'type=plupload_image', $depoimento->ID);
						        	foreach ( $img_depoimentos as $img_depoimento ) {
						        		echo "<img src='{$img_depoimento['url']}' alt='{$img_depoimento['alt']}' />";
						        	}
					        	?>
							</div><!-- md-6 -->
							<div class="col-md-6 col-sm-6">
								<div class="conteudo">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icone-aspas.jpg" alt="">
					        		<p><?= $texto_depoimento ?></p>
					        		<h2><?= $titulo_depoimento ?></h2>
					        	</div><!-- conteudo -->
							</div><!-- md-6 -->
						</div><!-- row -->
					</div><!-- item -->
				<?php endforeach; ?>
		    </div><!-- owl-carousel -->
		</div><!-- container -->
	</section><!-- depoimentos -->

	<section class="instagram" id="instagram">
		<div class="container">
			<h1><img src="<?php echo get_template_directory_uri(); ?>/assets/images/titulo-instagram.jpg" alt=""></h1>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.jpg" class="img-responsive img-instagram" alt="">
			
		</div><!-- container -->
	</section><!-- instagram -->

	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-footer.jpg" class="img-bg" alt="">

	<section class="contato" id="contato">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<form action="">
						<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
						<input type="email" name="email" id="email" class="form-control" placeholder="Email">
						<input type="tel" name="telefone" id="telefone" class="form-control" placeholder="Telefone">
						<input type="text" name="mensagem" id="mensagem" class="form-control" placeholder="Mensagem">
						<button>Enviar!</button>
					</form>
				</div><!-- md-6 -->
				<div class="col-md-6 col-sm-6">
					<h1><img src="<?php echo get_template_directory_uri(); ?>/assets/images/titulo-contato.jpg" alt=""></h1>
					<p>Sua mensagem é muito importante para nós!</p>
					<p>Preencha o formulário que retornaremos o mais breve possível.</p>
					<ul>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i> R. Padre Anchieta, 1150 Mercês, Curitiba - PR, 80730-060</li>
						<li><a href="" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> 41 98495.4726</a></li>
						<li><a href="" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> 41 99605.8487</a></li>
					</ul>

					<div class="redes-sociais">
						<a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</div><!-- redes-sociais -->
				</div><!-- md-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- contato -->

<?php get_footer(); ?>