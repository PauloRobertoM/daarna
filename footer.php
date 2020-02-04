        <section class="livros">
            <div class="container">
                <h1 class="text-center">CONFIRA OS LIVROS ESCRITOS PELO PALESTRANTE MARCOS MEIER</h1>
                <div class="owl-carousel owl-theme owl-livro">
                    <?php
                        $args = array(
                            'posts_per_page' => 20,
                            'post_type'      => 'livros',
                        );
                        $livros = get_posts($args);
                    ?>
                    <?php foreach ($livros as $livro) : ?>
                        <div class="item">
                            <a href="<?php the_permalink($palestra->ID); ?>">
                                <?php
                                    $livros = rwmb_meta('livros_foto', 'type=plupload_image', $livro->ID);
                                    foreach ( $livros as $livro ) {
                                        echo "<img src='{$livro['url']}' alt='{$livro['alt']}' />";
                                    }
                                ?>
                            </a>
                        </div><!-- item -->
                    <?php endforeach; ?>
                </div><!-- owl-carousel -->
            </div><!-- container -->
        </section><!-- livros -->
    
        <footer>
            <div class="rodape">
                <h2><strong>Marcos meier.</strong> Todos os direitos reservados.</h2>
                <h4><i class="fa fa-whatsapp" aria-hidden="true"></i> 41 99248.3040 <span>- 41 3107.6448 - meierpalestras@gmail.com</span></h4>
                <div class="redes-sociais">
                    <a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </div><!-- redes-sociais -->
            </div><!-- rodape -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-footer.jpg">
        </footer>

        <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/jquery.js'></script>
        <script type="text/javascript">
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>
        <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js'></script>
        <script src="https://use.fontawesome.com/6963733f46.js"></script>
        <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js'></script>
        <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/script.js'></script>
    </body>
</html>