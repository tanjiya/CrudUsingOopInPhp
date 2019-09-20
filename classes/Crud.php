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
    private $table_name = "employees";

    //Read Data from Database
    public function read()
    {
        $db_query  = "SELECT *FROM " . $this->table_name . " ORDER BY id ASC";
        $statement = $this->connection->query($db_query);
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement->execute();

        return $statement;
    }

    //Store Data into Database
    public function create()
    {
        try {
            $db_query = "INSERT INTO
                            ". $this->table_name . "
                                (name,
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
            function sanitize_data( $data ) {
                $trimmed_data    = trim($data);
                $str_splash_data = stripslashes($trimmed_data);
                $html_chars_data = htmlspecialchars($str_splash_data);
                return $html_chars_data;
            }

            $user_name    = sanitize_data($this->user_name);
            $user_email   = sanitize_data($this->user_email);
            $user_website = sanitize_data($this->user_website);
            $user_comment = sanitize_data($this->user_comment);

            $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $statement->bindParam(':user_email', $user_email, PDO::PARAM_STR);
            $statement->bindParam(':user_website', $user_website, PDO::PARAM_STR);
            $statement->bindParam(':user_comment', $user_comment, PDO::PARAM_STR);
            $statement->execute();

            return true;

        } catch (PDOException $e) {
            echo "Error Message: " . $e->getMessage();
        } 
    }

    //Show Single Record by ID form Database 
    public function show($id)
    {
        $db_query  = "SELECT *FROM " . $this->table_name . " WHERE id = '$id' LIMIT 0,1";
        $statement = $this->connection->prepare($db_query);
        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement->execute();

        return $statement;
    }

    //Update Data of Database
    public function update()
    {
        try {
            $db_query = "UPDATE
                            " . $this->table_name . "
                        SET
                            name    = :user_name,
                            email   = :user_email,
                            website = :user_website,
                            comment = :user_comment
                        WHERE
                            id = :id";

            $statement = $this->connection->prepare($db_query);

            //Function to filter the form input
            function sanitize_data( $data ) {
                $trimmed_data    = trim($data);
                $str_splash_data = stripslashes($trimmed_data);
                $html_chars_data = htmlspecialchars($str_splash_data);
                return $html_chars_data;
            }

            $user_name    = sanitize_data($this->user_name);
            $user_email   = sanitize_data($this->user_email);
            $user_website = sanitize_data($this->user_website);
            $user_comment = sanitize_data($this->user_comment);
            $id           = sanitize_data($this->id);

            $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $statement->bindParam(':user_email', $user_email, PDO::PARAM_STR);
            $statement->bindParam(':user_website', $user_website, PDO::PARAM_STR);
            $statement->bindParam(':user_comment', $user_comment, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error Message: " . $e->getMessage();
        } 
    }
    
    //Delete Data from Database
    public function delete()
    {
        try {
            $db_query  = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            $statement = $this->connection->prepare($db_query);
            $statement->bindParam(1, $this->id, PDO::PARAM_INT);
            $statement->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error Message: " . $e->getMessage();
        } 
    }
}