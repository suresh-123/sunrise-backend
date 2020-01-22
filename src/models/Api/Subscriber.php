<?php

namespace Models\Api;

use \Core\Database;

class Subscriber {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /**
     * Function To Save Subscriber Data 
     * @param string $email Email Address
     * @return bool true/false
     */
    public function saveSubscriberData($email): bool {
        if (!$email) {
            return false;
        }
        
        $this->db->query("INSERT INTO subscribers (`email`) VALUES (:email)");
        $this->db->bind(':email', $email);
        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Function To Check Duplicate Email Address
     * @param string $email Email Address
     * @return array Query Response
     */
    public function checkDuplicateEmailAddress($email): bool { 
        if (!$email) {
            return false;
        }

        $this->db->query("SELECT email FROM subscribers WHERE email='" . $email . "'");
        $result = $this->db->single(); 
        return (!empty($result)) ? true : false;
    }

}
