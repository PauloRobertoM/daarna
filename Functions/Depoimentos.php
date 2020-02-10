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
         'singular_name'       => _x( 'Depoimentos', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Depoimentos', 'text_domain' ),
         'name_admin_bar'      => __( 'Depoimentos', 'text_domain' ),
         'parent_item_colon'   => __( 'Depoimentos pai:', 'text_domain' ),
         'all_items'           => __( 'Todas as Depoimentoss', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar nova Depoimentos', 'text_domain' ),
         'add_new'             => __( 'Adicionar nova', 'text_domain' ),
         'new_item'            => __( 'Nova Depoimentos', 'text_domain' ),
         'edit_item'           => __( 'Ediar Depoimentos', 'text_domain' ),
         'update_item'         => __( 'Atualizar Depoimentos', 'text_domain' ),
         'view_item'           => __( 'Ver Depoimentos', 'text_domain' ),
         'search_items'        => __( 'Procurar Depoimentos', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'Depoimentos', 'text_domain' ),
         'description'         => __( 'Cadastro de Depoimentos', 'text_domain' ),
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
         'menu_icon'           => 'dashicons-admin-comments',
      );
      register_post_type( 'depoimentos', $args );
   }

   public function depoimentos_register_meta_boxes( $meta_boxes ) {
      $prefix = 'depoimentos_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto",
         'title'      => 'Foto do Depoimento',
         'post_types' => array( 'depoimentos' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}foto",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto do Depoimento',
               'max_file_uploads' => 1,
            ),
         )
      );
      
      return $meta_boxes;
   }
}