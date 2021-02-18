<?php
/**
 * Plugin Name: eu-disclaimer
 * Plugin URI: https://github.com/Virgin-ie/eu-disclaimer
 * Description: Plugin sur la législation des produits à base de nicotine.
 * Version: 1.0
 * Author: Evrard Virginie
 * Author URI: http://evrardvirginie.fr
 * License: GPLv3
 */

 // Création de la fonction ajouter au menu
 function ajouterAuMenu() {
     $page = 'eu-disclaimer';
     $menu = 'eu-disclaimer';
     $capability = 'edit_pages';
     $slug = 'eu-disclaimer';
     $function = 'disclaimerFonction';
     $icon = '';
     $position = 80;

     if (is_admin()) {
         add_menu_page($page, $menu, $capability, $slug, $function, $icon, $position);
     }
 }

  // hook pour réaliser l'action 'admin_menu' <- emplacement / ajouterAuMenu <- fonction à appeler / <- priorité.
  add_action("admin_menu", "ajouterAuMenu", 10);

  // fonction à appeler lorsque l'on clic sur le menu.
  function disclaimerFonction() {
      require_once ('views/disclaimer-menu.php');
 
  }
  // On requiert le fichier "DisclaimerGestionTable.php"
  require_once ('Model/Repository/DisclaimerGestionTable.php');
      // Création d'un objet "$gerer_table"  
      if (class_exists("DisclaimerGestionTable")) {
          $gerer_table = new DisclaimerGestionTable();
      }
      // On utilise 2 hook, un pour l'installation puis l'autre pour la désinstallation de la table
      if (isset($gerer_table)) {
          register_activation_hook(__FILE__, array($gerer_table, 'creerTable'));
          register_deactivation_hook(__FILE__, array($gerer_table, 'supprimerTable'));
      }
    
  // Ajout du JS à l'activation du plugin    
  add_action('init', 'inserer_js_dans_footer');

  function inserer_js_dans_footer() {
      if (!is_admin()):
        wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js', null, null, true);
        wp_enqueue_script('jQuery');
        wp_register_script('jQuery_modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', null, null, true);
        wp_enqueue_script('jQuery_modal');
        wp_register_script('jQuery_eu', plugins_url ('assets/js/eu-disclaimer.js', __FILE__), array('jQuery'), '1.1', true);
        wp_enqueue_script('jQuery_eu');
      endif;
  }

  // Ajout du css à l'activation du plugin
  add_action('wp_head', 'ajouter_css', 1);

  function ajouter_css() {
      if(!is_admin()):
        wp_register_style('eu-disclaimer-css', plugins_url ('assets/css/eu-disclaimer-css.css', __FILE__), null, null, false);
        wp_enqueue_style('eu-disclaimer-css');
        wp_register_style('modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css', null, null, false);
        wp_enqueue_style('modal');
      endif;
  }
  
  /**
   * Active le modal sans utilisation du shortcode. 
   * Utilisation: add_action('nom du hook', 'nom de la fonction');
   */
  add_action('wp_body_open', 'afficherModalDansBody');
  function afficherModalDansBody() {
      echo DisclaimerGestionTable::AfficherDonneModal();
  }

  
 