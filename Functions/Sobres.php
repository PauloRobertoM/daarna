<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Sobres {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'sobres_register_meta_boxes'));
   }

   public function init() {
      $this->sobres_post_type();
   }

   public function sobres_post_type() {

      $labels = array(
         'name'                => _x( 'Sobre', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Sobre', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Sobre', 'text_domain' ),
         'name_admin_bar'      => __( 'Sobre', 'text_domain' ),
         'parent_item_colon'   => __( 'Sobre pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os sobre', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo sobre', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo sobre', 'text_domain' ),
         'edit_item'           => __( 'Ediar sobre', 'text_domain' ),
         'update_item'         => __( 'Atualizar sobre', 'text_domain' ),
         'view_item'           => __( 'Ver sobre', 'text_domain' ),
         'search_items'        => __( 'Procurar sobre', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'sobre', 'text_domain' ),
         'description'         => __( 'Cadastro do sobre', 'text_domain' ),
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
         'menu_icon'           => 'dashicons-book',
      );

      register_post_type( 'sobres', $args );

   }

   public function sobres_register_meta_boxes( $meta_boxes ) {
      $prefix = 'sobres_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto1",
         'title'      => 'Foto do Sobre 1',
         'post_types' => array( 'sobres' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}foto1",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto 1',
               'max_file_uploads' => 1,
            ),
         )
      );
      $meta_boxes[] = array(
         'id'         => "{$prefix}texto2",
         'title'      => 'Texto 2',
         'post_types' => array( 'sobres' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => 'true',
         'fields' => array(
            array(
               'id'   => "{$prefix}texto2",
               'type' => 'textarea',
               'name' => null,
            ),
         ),
      );
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto2",
         'title'      => 'Foto do Sobre 2',
         'post_types' => array( 'sobres' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}foto2",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto 2',
               'max_file_uploads' => 1,
            ),
         )
      );
      
      return $meta_boxes;
   }
}