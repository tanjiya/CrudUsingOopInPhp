<?php

$page_title = "Create | PHP Practice Update";

include "inc/header.php";

include "utility/autoload.php";

$crud = new Crud;
$validation = new Validation;

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

$data = $crud->show($id);

foreach ($data as $dd) {
    $name    = $dd['name']; //Database Field Name
    $email   = $dd['email'];
    $website = $dd['website'];
    $comment = $dd['comment'];
}

if($_SERVER['REQUEST_METHOD'] == "POST"):
    
    $err_message = $validation->check_empty_field($_POST, ['f_name', 'f_email', 'f_website']);

    $crud->id           = $id;
    $crud->user_name    = $_POST['f_name'];
    $crud->user_email   = $_POST['f_email'];
    $crud->user_website = $_POST['f_website'];
    $crud->user_comment = $_POST['f_comment'];

    //Validation Starts
    $check_data  = $validation->is_valid_data($crud->user_name);
    $check_email = $validation->is_valid_email($crud->user_email);
    $check_web   = $validation->is_valid_website($crud->user_website);

    if($err_message != null):
        echo $err_message;
    elseif($check_data):
        echo "Please provide name in letters";
    elseif($check_email):
        echo "Please provide proper email";
    elseif($check_web):
        echo "Please provide proper web address";
    else:
        $update_data = $crud->update(); //var_dump($update_data);exit();

        if($update_data):
            header("location:index.php?record_update_status=success");      
        endif;
    endif;

endif;

if(!empty($data)):

?>

<div class="bottom-margin">
    <a href="index.php"><button>Back to Record</button></a>
</div>

<div class="form-data">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="f_name" id="name" value="<?php echo $name; ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="f_email" id="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label for="website">Website</label>
            <input type="website" name="f_website" id="website" value="<?php echo $website; ?>">
        </div>
        <div>
            <label for="comment">Comment</label>
            <textarea name="f_comment" id="comment"><?php echo $comment; ?></textarea>
        </div>
        <div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>

<?php

endif;

include "inc/footer.php";

?>