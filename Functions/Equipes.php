<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Equipes {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'equipes_register_meta_boxes'));
   }

   public function init() {
      $this->equipes_post_type();
   }

   public function equipes_post_type() {

      $labels = array(
         'name'                => _x( 'Equipe', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Equipe', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Equipe', 'text_domain' ),
         'name_admin_bar'      => __( 'Equipe', 'text_domain' ),
         'parent_item_colon'   => __( 'Equipe pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os equipe', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo equipe', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo equipe', 'text_domain' ),
         'edit_item'           => __( 'Ediar equipe', 'text_domain' ),
         'update_item'         => __( 'Atualizar equipe', 'text_domain' ),
         'view_item'           => __( 'Ver equipe', 'text_domain' ),
         'search_items'        => __( 'Procurar equipe', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'equipe', 'text_domain' ),
         'description'         => __( 'Cadastro do equipe', 'text_domain' ),
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
         'menu_icon'           => 'dashicons-groups',
      );

      register_post_type( 'equipes', $args );

   }

   public function equipes_register_meta_boxes( $meta_boxes ) {
      $prefix = 'equipes_';
      
      return $meta_boxes;
   }
}