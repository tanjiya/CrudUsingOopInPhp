<?php

$page_title = "Create | PHP Practice";

include "inc/header.php";

include "utility/autoload.php";

$crud = new Crud;

if($_SERVER['REQUEST_METHOD'] == "POST"):

    $name_error = $email_error = $website_error = $comment_error = '';

    if(empty($_POST['f_name'])) {
        $name_error = "Name is required";
    } else {
        $crud->user_name = $_POST['f_name'];
        
        if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_error = "Only letter and white space are allowed";
        }
    }
    if(empty($_POST['f_email'])) {
        $email_error = "Email is required";
    } else {
        $crud->user_email = $_POST['f_email'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }
    }
    if(empty($_POST['f_website'])) {
        $website_error = "Website address is required";
    } else {
        $crud->user_website = $_POST['f_website'];

        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $website_error = "Invalid website URL";
        }
    }
    if(empty($crud->user_comment)) {
        $comment_error = "";
    } else {
        $crud->user_comment = $_POST['f_comment'];
    }


    // $crud->user_name    = $_POST['f_name'];
    // $crud->user_email   = $_POST['f_email'];
    // $crud->user_website = $_POST['f_website'];
    // $crud->user_comment = $_POST['f_comment'];

    $store_data = $crud->create();

    if($store_data):
        header("location:index.php?record_add_status=success");      
    endif;

endif;

?>

<div class="bottom-margin">
    <a href="index.php"><button>Back to Record</button></a>
</div>

<div class="form-data">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="f_name" id="name">
            <p class="error"><?php echo $name_error; ?></p>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="f_email" id="email">
            <p class="error"><?php echo $email_error; ?></p>
        </div>
        <div>
            <label for="website">Website</label>
            <input type="website" name="f_website" id="website">
            <p class="error"><?php echo $website_error; ?></p>
        </div>
        <div>
            <label for="comment">Comment</label>
            <textarea name="f_comment" id="comment"></textarea>
        </div>
        <!-- <div class="bottom-margin">
            <label for="fileToUpload">Upload Image</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div> -->
        <div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>

<?php include "inc/footer.php"; ?>