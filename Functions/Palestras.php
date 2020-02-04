<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Palestras {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'palestras_register_meta_boxes'));
   }

   public function init() {
      $this->palestras_post_type();
   }

   public function palestras_post_type() {

      $labels = array(
         'name'                => _x( 'Palestras', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Palestra', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Palestras', 'text_domain' ),
         'name_admin_bar'      => __( 'Palestras', 'text_domain' ),
         'parent_item_colon'   => __( 'Palestra pai:', 'text_domain' ),
         'all_items'           => __( 'Todas as palestras', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar nova palestra', 'text_domain' ),
         'add_new'             => __( 'Adicionar nova', 'text_domain' ),
         'new_item'            => __( 'Nova palestra', 'text_domain' ),
         'edit_item'           => __( 'Ediar palestra', 'text_domain' ),
         'update_item'         => __( 'Atualizar palestra', 'text_domain' ),
         'view_item'           => __( 'Ver palestra', 'text_domain' ),
         'search_items'        => __( 'Procurar palestra', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'palestras', 'text_domain' ),
         'description'         => __( 'Cadastro de palestras', 'text_domain' ),
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
         'menu_icon'           => 'dashicons-editor-ul',
      );
      register_post_type( 'palestras', $args );
   }

   public function palestras_register_meta_boxes( $meta_boxes ) {
      $prefix = 'palestras_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}subtitulo",
         'title'      => 'Subtítulo',
         'post_types' => array( 'palestras' ),
         'context'    => 'advanced',
         'priority'   => 'default',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'   => "{$prefix}subtitulo",
               'type' => 'text',
               'name' => null,
               'desc' => 'Adicionar Subtítulo',
            ),
         ),
      );
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto",
         'title'      => 'Foto da palestra',
         'post_types' => array( 'palestras' ),
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