<?php

// Définition du chemin d'accès à la classe DisclaimerOptions
define( 'MY_PLUGIN_PATH', plugin_dir_path(__FILE__) );
include( MY_PLUGIN_PATH . '../Entity/DisclaimerOptions.php');

class DisclaimerGestionTable {

    public function creerTable() {
       
        // Instanciation de la classe DisclaimerOptions
        $message = new DisclaimerOptions();
        // On alimente l'objet message avec les valeurs par défaut grâce au setter
        $message->setMessageDisclaimer("Au regard de la loi européenne, vous devez nous confirmer que vous avez plus de 18 ans pour visiter ce site ?");
        $message->setRedirectionko("https://www.google.com/");

        // Interagir avec la base de données de WordPress
        global $wpdb;

        // Création de la table
        $tableDisclaimer = $wpdb->prefix . 'disclaimer_options';
            if ($wpdb->get_var("SHOW TABLES LIKE $tableDisclaimer") != $tableDisclaimer) {
               
                $sql = "CREATE TABLE $tableDisclaimer (
                    id_disclaimer INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    message_disclaimer TEXT NOT NULL,
                    redirection_ko TEXT NOT NULL )
                    ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 
                    COLLATE=utf8mb4_unicode_ci";

                    // Message d'erreur
                    if (!$wpdb->query($sql)) {
                        die("Une erreur est survenue, contactez le développeur du plugin !");
                    }

                    // Insertion du message par défaut
                    $wpdb->insert(
                        $wpdb->prefix . 'disclaimer_options',
                        array(
                            'message_disclaimer' => $message->getMessageDisclaimer(),
                            'redirection_ko' => $message->getRedirectionko(),
                        ),
                        array ('%s', '%s'));
                    $wpdb->query($sql);
            }
    }

    // Suppression de la table
    public function supprimerTable() {
        // $wpdb sert à récuperer l'objet contenant les informations relatives à la base de données
        global $wpdb;
        $table_disclaimer = $wpdb->prefix . "disclaimer_options";
        $sql = "DROP TABLE $table_disclaimer";
        $wpdb->query($sql);
    }

    // Mettre à jour les données saisies dans le formulaire
    static function insererDansTable(DisclaimerOptions $option) {
       
    $message_inserer_valeur = '';
    global $wpdb;
    try {
        $table_disclaimer = 'va_disclaimer_options';
        $sql = $wpdb->prepare(
            "UPDATE $table_disclaimer SET message_disclaimer = '%s', redirection_ko = '%s' WHERE id_disclaimer = '%s'", $option->getMessageDisclaimer(), $option->getRedirectionko(), 1);

            $wpdb->query($sql);

            return $message_inserer_valeur = '<span style="color:green; font-size:16px;">Les données ont correctement été mises à jour !</span>';
    }
    catch (Exception $e) {
        
        return $message_inserer_valeur = '<span style="color:red; font-size:16px;">Une erreur est survenue !</span>';
    }
}

    // Afficher le modal et son contenu
    static function AfficherDonneModal() {

        global $wpdb;
        $query = "SELECT * FROM va_disclaimer_options";
        $row = $wpdb->get_row($query);
        $message_disclaimer = $row->message_disclaimer;
        $lien_redirection = $row->redirection_ko;

        return '<div id="monModal" class="modal">
                <p>Le vapobar, vous souhaite la bienvenue !</p>
                <p>' . $message_disclaimer. '<p>
                <a href="' . $lien_redirection. '" type="button" class="btn-red">Non</a>
                <a href="#" type="button" rel="modal:close" class="btn-green" id="actionDisclaimer">Oui</a>
                </div>';
    }
 
};


