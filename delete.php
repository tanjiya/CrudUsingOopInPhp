<?php

include "utility/autoload.php";

$crud = new Crud;
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');


//Delete Record form Database
if($_SERVER['REQUEST_METHOD'] == "GET"): 
    $crud->id    = $id; var_dump($crud->id);
    $delete_data = $crud->delete();

    if($delete_data):
        header("location:index.php?record_delete_status=success");
    else:
        echo "<p>Data has not been deleted</p>";   
    endif;
endif;