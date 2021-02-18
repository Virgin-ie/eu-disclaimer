<?php

    class DisclaimerOptions {
    
        private $id_disclaimer; // identifiant du disclaimer
        private $message_disclaimer;  // contenu du message à afficher
        private $redirection_ko;  // url de redirection en cas de réponse négative

        public function __construct( $id_disclaimer = null, $message_disclaimer = null, $redirection_ko = null) {
            $this->id_disclaimer = $id_disclaimer;
            $this->message_disclaimer = $message_disclaimer;
            $this->redirection_ko = $redirection_ko;
        }

        /**
         * Get the value of id_disclaimer
         */
        public function getIdDisclaimer()
        {
            return $this->id_disclaimer;
        }

        /**
         * Get the value of message_disclaimer
         */
        public function getMessageDisclaimer()
        {
            return $this->message_disclaimer;
        }

        /**
         * Set the value of message_disclaimer
         * @return self
         */
        public function setMessageDisclaimer($message_disclaimer)
        {
            $this->message_disclaimer = $message_disclaimer;
            return $this;
        }

        /**
         * Get the value of redirection_ko
         */
        public function getRedirectionko()
        {
            return $this->redirection_ko;
        }

        /**
         * Set the value of redirection_ko
         * @return self
         */
        public function setRedirectionko($redirection_ko)
        {
            $this->redirection_ko = $redirection_ko;
            return $this;
        }
    
    }
