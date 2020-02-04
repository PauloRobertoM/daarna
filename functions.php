<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Bootstrap.php';
require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Contato.php';
require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Vitrines.php';
require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Palestras.php';
require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Depoimentos.php';
require TEMPLATEPATH . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'Livros.php';

$Bootstrap = new Bootstrap;
$Contato = new Contato;
$Vitrines = new Vitrines;
$Palestras = new Palestras;
$Depoimentos = new Depoimentos;
$Livros = new Livros;

function new_excerpt_length($length) {
   return 999999999;
}
add_filter('excerpt_length', 'new_excerpt_length');


function excerpt($length, $text) {
   if (strlen($text) <= $length)
      return $text;

   $new = substr($text, 0, $length);

   return $new.'...';
}

function wordpress_pagination() {
    global $wp_query;

    $big = 999999999;

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    ) );
}