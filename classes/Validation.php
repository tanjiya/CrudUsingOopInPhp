<?php

include_once "Interfaces\ValidationInterface.php";

use Interfaces\ValidationInterface;

class Validation Implements ValidationInterface {

    public function check_empty_field($data, $fields)
    {
        $err_message = null;

        foreach($fields as $field):
            if(empty($data[$field])):
                $err_message .= "<p class='error'>$field field is required!</p>"; 
            endif;
        endforeach;

        return $err_message;
    }

    public function is_valid_data($name)
    {
        if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $name)):
            return false; //Will stay on same page and won't submit data
        endif;
    }
    
    public function is_valid_email($email)
    {
        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)):
            if (filter_var($email, FILTER_VALIDATE_EMAIL)): 
                return true;  
            endif;
            return false; //Will stay on same page and won't submit data
        endif;
    }

    public function is_valid_website($website)
    {
        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)):
            return false; //Will stay on same page and won't submit data
        endif;
    }
}