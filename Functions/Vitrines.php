<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Vitrines {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'vitrines_register_meta_boxes'));
   }

   public function init() {
      $this->vitrines_post_type();
   }

   public function vitrines_post_type() {

      $labels = array(
         'name'                => _x( 'Vitrines', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Vitrine', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Vitrines', 'text_domain' ),
         'name_admin_bar'      => __( 'Vitrines', 'text_domain' ),
         'parent_item_colon'   => __( 'Vitrine pai:', 'text_domain' ),
         'all_items'           => __( 'Todos os vitrines', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar novo vitrine', 'text_domain' ),
         'add_new'             => __( 'Adicionar novo', 'text_domain' ),
         'new_item'            => __( 'Novo vitrine', 'text_domain' ),
         'edit_item'           => __( 'Ediar vitrine', 'text_domain' ),
         'update_item'         => __( 'Atualizar vitrine', 'text_domain' ),
         'view_item'           => __( 'Ver vitrine', 'text_domain' ),
         'search_items'        => __( 'Procurar vitrine', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'vitrines', 'text_domain' ),
         'description'         => __( 'Cadastro dos vitrines', 'text_domain' ),
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
         'menu_icon'           => 'dashicons-format-image',
      );

      register_post_type( 'vitrines', $args );

   }

   public function vitrines_register_meta_boxes( $meta_boxes ) {
      $prefix = 'vitrines_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto",
         'title'      => 'Foto da Vitrine',
         'post_types' => array( 'vitrines' ),
         'context'    => 'normal',
         'priority'   => 'high',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'               => "{$prefix}foto",
               'name'             => null,
               'type'             => 'image_advanced',
               'force_delete'     => false,
               'desc'             => 'Adicionar foto',
               'max_file_uploads' => 1,
            ),
         )
      );
      
      return $meta_boxes;
   }

}