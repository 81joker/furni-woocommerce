<?php

/**
 * Plugin Name: MV Teams
 * Plugin URI: https://www.wordpress.org/mv-team
 * Description: My plugin's description
 * Version: 1.0
 * Requires at least: 5.6
 * Author: Nehad Altimimi
 * Author URI: https://www.codigowp.net
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: mv-team
 * Domain Path: /languages
 */

 /*
MV team is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
MV team is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with MV team. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if( ! defined( 'ABSPATH') ){
    exit;
}

if( ! class_exists( 'MV_Team' ) ){
    class MV_Team{
        function __construct(){
            
            $this->define_constants();
            require_once( MV_Team_PATH . 'functions/functions.php' );
            
            add_action( 'admin_menu', array( $this, 'add_menu' ) );

            require_once(MV_Team_PATH . 'post-types/class.mv-team-cpt.php');
            $MV_Team_Post_Type = new MV_Team_Post_Type();


            require_once( MV_Team_PATH . 'class.mv-team-settings.php' );
            $MV_Team_Settings = new MV_Team_Settings();

            require_once( MV_Team_PATH . 'shortcodes/class.mv-team-shortcode.php' );
            $MV_Team_Shortcode = new MV_Team_Shortcode;
            
            // add_action('wp_enqueue_scripts' , array($this , 'register_scripts'), 999);
            // // add style and js to admin
            // add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts') );
        }

        public function define_constants(){
            define( 'MV_Team_PATH', plugin_dir_path( __FILE__ ) );
            define( 'MV_Team_URL', plugin_dir_url( __FILE__ ) );
            define( 'MV_Team_VERSION', '1.0.0' );
        }

        public static function activate(){
            update_option( 'rewrite_rules', '' );
        }

        public static function deactivate(){
            flush_rewrite_rules();
            unregister_post_type( 'mv-team' );
        }

        public static function uninstall(){

        }
        public function add_menu(){
            add_menu_page(
            // add_options_page(
            // add_theme_page(
            // add_plugins_page(

            // This diplay page Title in Dashboard (page Title)
                'MV Team Options',

                // This diplay menue Title in Dashboard (menue Title)
                'MV Team',
                'manage_options',
                'mv_team_admin',
                array( $this, 'mv_team_settings_page' ),
                'dashicons-cover-image'
            );
            /*
             add_submenu_page(
             $parent_slug:string, 
             $page_title:string, 
             $menu_title:string, 
             $capability:string, 
             $menu_slug:string, 
             $callback:callable, 
             $position:integer|float|null )
            */
            add_submenu_page(
                'mv_team_admin',
                'Manage Team',
                'Manage Team',
                'manage_options',
                'edit.php?post_type=mv-team',
                null,
                null
            );

            add_submenu_page(
                'mv_team_admin',
                'Add New Team',
                'Add New Team',
                'manage_options',
                'post-new.php?post_type=mv-team',
                null,
                null
            );

        }
        
        public function  mv_team_settings_page(){
            if (! current_user_can('manage_options')) {
                return;
            }
            if (isset($_GET['settings-updated'])) {
                // add_settings_error( $setting:string, $code:string, $message:string, $type:string )
                add_settings_error('mv_slider_options' , 'mv_slider_message' , 'Settings Saved','success');
            } 
            // settings_errors( $setting:string, $sanitize:boolean, $hide_on_update:boolean )
            settings_errors('mv_team_options');

            require_once( MV_Team_PATH . 'views/settings-page.php' );

        }

        // public function register_scripts(){
        //     wp_register_script( 'mv-slider-main-jq', MV_SLIDER_URL . 'vendor/flexslider/jquery.flexslider-min.js', array( 'jquery' ), MV_SLIDER_VERSION, true );
        //     wp_register_script( 'mv-slider-options-js', MV_SLIDER_URL . 'vendor/flexslider/flexslider.js', array( 'jquery' ), MV_SLIDER_VERSION, true );
        //     wp_register_style( 'mv-slider-main-css', MV_SLIDER_URL . 'vendor/flexslider/flexslider.css', array(), MV_SLIDER_VERSION, 'all' );
        //     wp_register_style( 'mv-slider-style-css', MV_SLIDER_URL . 'assets/css/frontend.css', array(), MV_SLIDER_VERSION, 'all' );
        // }

        // public function register_admin_scripts(){
        //     // Return file css admin just to type of 'mv-slider' 
        //     global $typenow;
        //     // global $pagenow;
        //     // if('post.php' == $pagenow){
        //     if( $typenow == 'mv-slider'){
        //         wp_enqueue_style( 'mv-slider-admin', MV_SLIDER_URL . 'assets/css/admin.css' );
        //     }
        // }

    }
}

if( class_exists( 'MV_Team' ) ){
    register_activation_hook( __FILE__, array( 'MV_Team', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'MV_Team', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'MV_Team', 'uninstall' ) );

    $mv_team = new MV_Team();
} 