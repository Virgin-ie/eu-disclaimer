<?php
        // Utiliser la fonction htmlspecialchars() permet de protéger le formulaire contre la faille XSS
        if(!empty($_POST['message_disclaimer']) && !empty($_POST['url_redirection'])) {
            $text = new DisclaimerOptions();
            $text->setMessageDisclaimer(htmlspecialchars($_POST['message_disclaimer']));
            $text->setRedirectionko(htmlspecialchars($_POST['url_redirection']));
            $message = DisclaimerGestionTable::insererDansTable($text);
        }
?>
<!-- Formulaire du plugin --> 
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="<?php bloginfo('charset'); ?>" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
       </head>
        <body>
            <h1>EU DISCLAIMER</h1>
                <br>
            <h2>Configuration</h2>
                <p><?php if(isset($message)) echo $message; ?></p>
            <form method="post" action="" novalidate="novalidate">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="blogname">Message du disclaimer</label></th>
                        <td><input name="message_disclaimer" type="text" id="message_disclaimer" value="" class="regular-text" placeholder="Votre message !" required/></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="blogname">Url de redirection</label></th>
                        <td><input name="url_redirection" type="text" id="url_redirection" value="" class="regular-text" placeholder="Exemple: https://www.google.com/" required/></td>
                    </tr>
                </table>
                <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Enregistrer les modifications"/></p>
            </form>
                <br>
                    <p>Exemple: La législation nous impose de vous informer sur la nocivité des produits à base de nicotine, vous devez avoir plus de 18 ans pour consulter ce site !</p>
                <br>
                <h3>Centre AFPA / session DWWM</h3>
                    <img src="<?php echo plugin_dir_url( dirname(__FILE__) ) . 'assets/image/logo_afpa.jpg'; ?>" width="10%">
        </body>
    </html>

   



   

