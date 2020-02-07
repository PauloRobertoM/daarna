<?php if (! defined('ABSPATH')) exit('No direct script access allowed');

class Projetos {

   public function __construct() {
      add_action('init', array($this, 'init'), 0);
      add_filter('rwmb_meta_boxes', array($this, 'projetos_register_meta_boxes'));
   }

   public function init() {
      $this->projetos_post_type();
   }

   public function projetos_post_type() {

      $labels = array(
         'name'                => _x( 'Projetos', 'Post Type General Name', 'text_domain' ),
         'singular_name'       => _x( 'Projeto', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'           => __( 'Projetos', 'text_domain' ),
         'name_admin_bar'      => __( 'Projetos', 'text_domain' ),
         'parent_item_colon'   => __( 'Projeto pai:', 'text_domain' ),
         'all_items'           => __( 'Todas as projetos', 'text_domain' ),
         'add_new_item'        => __( 'Adicionar nova projeto', 'text_domain' ),
         'add_new'             => __( 'Adicionar nova', 'text_domain' ),
         'new_item'            => __( 'Nova projeto', 'text_domain' ),
         'edit_item'           => __( 'Ediar projeto', 'text_domain' ),
         'update_item'         => __( 'Atualizar projeto', 'text_domain' ),
         'view_item'           => __( 'Ver projeto', 'text_domain' ),
         'search_items'        => __( 'Procurar projeto', 'text_domain' ),
         'not_found'           => __( 'Não encontrado', 'text_domain' ),
         'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'text_domain' ),
      );
      $args = array(
         'label'               => __( 'projetos', 'text_domain' ),
         'description'         => __( 'Cadastro de projetos', 'text_domain' ),
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
         'menu_icon'           => 'dashicons-format-gallery',
      );
      register_post_type( 'projetos', $args );
   }

   public function projetos_register_meta_boxes( $meta_boxes ) {
      $prefix = 'projetos_';
      $meta_boxes[] = array(
         'id'         => "{$prefix}foto",
         'title'      => 'Foto do projeto',
         'post_types' => array( 'projetos' ),
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
               'max_file_uploads' => 100,
            ),
         )
      );
      $meta_boxes[] = array(
         'id'         => '{$prefix}categoria',
         'title'      => 'Selecione uma Categoria',
         'post_types' => array( 'projetos' ),
         'context'    => 'advanced',
         'priority'   => 'default',
         'autosave'   => true,
         'fields'     => array(
            array(
               'id'          => "{$prefix}categoria",
               'type'        => 'select',
               'placeholder' => 'Selecione uma Categoria',
               'options'     => array(
                  'category-1' => 'Arquitetura',
                  'category-2' => 'Interiores',
                  'category-3' => 'Comercial',
               ),
            ),
         ),
      );
      
      return $meta_boxes;
   }
}