<?php

include_once "Interfaces\CrudInterface.php";

use Interfaces\CrudInterface;

class Crud extends Database Implements CrudInterface {

    public $user_name;
    public $user_email;
    public $user_website;
    public $user_comment;
    public $image;

    //Table Name
    private $table = "employees";

    //Read Data from Database
    public function read()
    {
        $db_query  = "SELECT *FROM " . $this->table . " ORDER BY id ASC";
        $statement = $this->connection->query($db_query);
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement->execute();

        return $statement;
    }

    public function create()
    {
        $db_query = "INSERT INTO " . $this->table . " (
                                                name,
                                                email,
                                                website,
                                                comment)
                                                    VALUES(
                                                        :user_name,
                                                        :user_email,
                                                        :user_website,
                                                        :user_comment)";

        $statement = $this->connection->prepare($db_query);

        //Function to filter the form input
        function user_input( $data ) {
            $data1 = trim($data);
            $data2 = stripslashes($data1);
            $data3 = htmlspecialchars($data2);
            return $data3;
        }

        $user_name    = user_input($this->user_name);
        $user_email   = user_input($this->user_email);
        $user_website = user_input($this->user_website);
        $user_comment = user_input($this->user_comment);

        $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $statement->bindParam(':user_email', $user_email, PDO::PARAM_STR);
        $statement->bindParam(':user_website', $user_website, PDO::PARAM_STR);
        $statement->bindParam(':user_comment', $user_comment, PDO::PARAM_STR);
        // $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->execute();
    }

    public function update()
    {
        
    }
    
    public function delete()
    {

    }
}