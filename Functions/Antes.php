<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Antes {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'antes_register_meta_boxes'));
   }

   public function init() {
      $this->antes_post_type();
   }

   public function antes_post_type() {

      $labels = array(
         'name'                => _x( 'Antes e Depois', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Antes e Depois', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Antes e Depois', 'text_domain' ),
         'name_admin_bar'      => __( 'Antes e Depois', 'text_domain' ),
         'parent_item_colon'   => __( 'Antes e Depois pai:', 'text_domain' ),
         'all_items'           => __( 'Todas as Antes e Depoiss', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar nova Antes e Depois', 'text_domain' ),
         'add_new'             => __( 'Adicionar nova', 'text_domain' ),
         'new_item'            => __( 'Nova Antes e Depois', 'text_domain' ),
         'edit_item'           => __( 'Ediar Antes e Depois', 'text_domain' ),
         'update_item'         => __( 'Atualizar Antes e Depois', 'text_domain' ),
         'view_item'           => __( 'Ver Antes e Depois', 'text_domain' ),
         'search_items'        => __( 'Procurar Antes e Depois', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'Antes e Depois', 'text_domain' ),
         'description'         => __( 'Cadastro de Antes e Depois', 'text_domain' ),
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
         'menu_icon'           => 'dashicons-images-alt2',
      );
      register_post_type( 'antes', $args );
   }

   public function antes_register_meta_boxes( $meta_boxes ) {
      $prefix = 'antes_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto1",
         'title'      => 'Foto do Antes',
         'post_types' => array( 'antes' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}foto1",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto do Antes',
               'max_file_uploads' => 1,
            ),
         )
      );
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto",
         'title'      => 'Foto do Depois',
         'post_types' => array( 'antes' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}foto",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto do Depois',
               'max_file_uploads' => 1,
            ),
         )
      );
      
      return $meta_boxes;
   }
}