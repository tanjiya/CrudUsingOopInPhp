<?php

$page_title = "Index | PHP Practice";

include "inc/header.php";

include "utility/autoload.php";

$crud = new Crud;

$show_data = $crud->read();

// Show the Record Create, Update and Delete Status
if(isset($_REQUEST['record_add_status'])):
    echo "<p>Record has added successfully..!</p>";
elseif(isset($_REQUEST['record_update_status'])):
    echo "<p>Record has updated successfully..!</p>";
elseif(isset($_REQUEST['record_delete_status'])):
    echo "<p>Record has deleted successfully..!</p>";
endif;

if(!empty($show_data)):

?>
    <div class="bottom-margin">
        <a href="create.php"><button>Create Record</button></a>
    </div>
    <div class="data-container">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php foreach($show_data as $data) : ?>    
                <tr>
                    <td><?php echo ucwords($data['name']); ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['website']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                    </td>
                    <td>
                        <!-- <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> -->
                        <a href="delete.php?id=<?php echo htmlentities($data['id']);?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<?php

else:
    echo "<h2>There is no record!</h2>";
endif;

include "inc/footer.php";
?>