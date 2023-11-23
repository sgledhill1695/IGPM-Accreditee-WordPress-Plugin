<?php
/**
 * @package IGPMRegisterPlugin
 */
/* 
Plugin Name: Accreditee
Description: Add, edit and delete accreditee's.
Version: 1.0.0
Author: Dene Healthcare
Licence: GPLv2 or Later
*/

//If the ABSPATH constant variable is not defined then die, if the user is trying to access this from outside wordpress this will cause die
defined('ABSPATH') or die('You cant access this file');






class AccrediteePlugin 
{

    function __construct() {

        add_action('init', array( $this, 'custom_post_type'));
        
    }




    function activate(){

        $this->custom_post_type();
        
        //flush wordpress
        flush_rewrite_rules();
    }





    function deactivate(){

        //flush wordpress
        flush_rewrite_rules();
    }




    function uninstall(){

    }


    function custom_post_type(){

        $args = array(
            'public' => true,
            'show_in_rest' => true,
            'label' => 'Accreditee'
        );

        register_post_type('book', $args);
        
    }


};


//If this call exists create a variable
if (class_exists('AccrediteePlugin')){
    $accrediteePlugin = new AccrediteePlugin();
};


//Use wordpress hook, when the plugin is activated access the method activate within the igpmPlugin class
register_activation_hook(__FILE__, array($accrediteePlugin, 'activate'));

//Use wordpress hook, when the plugin is deactivated access the method deactive within the igpmPlugin class
register_deactivation_hook(__FILE__, array($accrediteePlugin, 'deactivate'));

//uninstall


