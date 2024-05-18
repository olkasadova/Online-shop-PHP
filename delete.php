<?php
    require ('connect_db.php');

    if (isset($_GET['item_id'])){
        $id = $_GET['item_id'];
    }
$query = "DELETE FROM products WHERE item_id = '$id'";
if ($link-> query ($query) ===TRUE){
    echo "Item was deleted: .$id. <br>";
    header ("Location: read.php");
}
else{
    echo "Error deleting record:". $link-> error;
}

?>