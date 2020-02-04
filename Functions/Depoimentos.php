<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Depoimentos {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'depoimentos_register_meta_boxes'));
   }

   public function init() {
      $this->depoimentos_post_type();
   }

   public function depoimentos_post_type() {

      $labels = array(
         'name'                => _x( 'Depoimentos', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Depoimento', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Depoimentos', 'text_domain' ),
         'name_admin_bar'      => __( 'Depoimentos', 'text_domain' ),
         'parent_item_colon'   => __( 'Depoimento pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os Depoimentos', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo Depoimento', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo Depoimento', 'text_domain' ),
         'edit_item'           => __( 'Ediar Depoimento', 'text_domain' ),
         'update_item'         => __( 'Atualizar Depoimento', 'text_domain' ),
         'view_item'           => __( 'Ver Depoimento', 'text_domain' ),
         'search_items'        => __( 'Procurar Depoimento', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'depoimentos', 'text_domain' ),
         'description'         => __( 'Cadastro dos depoimentos', 'text_domain' ),
         'labels'              => $labels,
         'supports'            => array( 'title', 'editor', ),
         'taxonomies'          => array( ),
         'hierarchical'        => false,
         'public'              => true,
         'show_ui'             => true,
         'show_in_menu'        => true,
         'menu_position'       => 5,
         'show_in_admin_bar'   => true,
         'show_in_nav_menus'   => true,
         'can_export'          => true,
         'has_archive'         => true,
         'exclude_from_search' => false,
         'publicly_queryable'  => true,
         'capability_type'     => 'page',
         'menu_icon'           => 'dashicons-format-status',
      );
      register_post_type( 'depoimentos', $args );
   }

   public function depoimentos_register_meta_boxes( $meta_boxes ) {
      $prefix = 'depoimentos_';

      return $meta_boxes;
   }
}