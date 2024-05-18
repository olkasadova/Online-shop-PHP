<?php
include ('includes/nav.php');
?>

<form action = 'update.php' method = 'POST'>
    

    <label for = "item_name"> Item Name: </label> <br>
    <input type='text' name = 'item_name' class = 'form_control' value = '<?php if (isset ($_POST['item_name'])) echo $_POST ['item_name']; ?>'>

    <label for = "item_desc"> Item Description: </label> <br>
    <input type='text' name = 'item_desc' class = 'form_control' value = '<?php if (isset ($_POST['item_desc'])) echo $_POST ['item_desc']; ?>'>

    <label for = "item_price"> Item Price: </label> <br>
    <input type='text' name = 'item_price' class = 'form_control' value = '<?php if (isset ($_POST['item_price'])) echo $_POST ['item_price']; ?>'>

    <label for = "item_img"> Item Image: </label> <br>
    <input type='text' name = 'item_img' class = 'form_control' value = '<?php if (isset ($_POST['item_img'])) echo $_POST ['item_img']; ?>'>

    <label for = "item_id"> Item ID: </label> <br>
    <input type='text' name = 'item_id' class = 'form_control' value = '<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>'>

    <input type="submit" class="btn btn-dark" value="Submit">

</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require ('connect_db.php');


$errors=array();

if (empty ($_POST ['item_id'])){
    $errors[] = 'Item ID is empty';
}
    else {
        $item_id = mysqli_real_escape_string ($link, trim($_POST['item_id']));
    }

if (empty ($_POST ['item_name'])){
    $errors[] = 'Item name is empty';
}
    else{
        $item_name = mysqli_real_escape_string ($link, $_POST['item_name']);
    }

if (empty ($_POST ['item_desc'])){
    $errors[] = 'Item description is not set';
}
    else{
        $item_desc = mysqli_real_escape_string ($link, trim($_POST['item_desc']));
    }

if (empty ($_POST['item_price'])){
    $errors[] = 'Item price is not set';
}
    else{
        $item_price = mysqli_real_escape_string ($link, trim($_POST['item_price']));
    }

if (empty ($_POST ['item_img'])){
        $errors[] = 'Item image is empty';
    }
    else {
        $item_img = mysqli_real_escape_string($link, trim($_POST['item_img']));
    }

if (empty ($errors)){
    $query = "UPDATE products 
                SET  item_name = '$item_name', item_desc = '$item_desc', item_price = '$item_price', item_img = '$item_img' WHERE item_id = '$item_id' ";
    $res = mysqli_query($link, $query);

    if ($res)
    { echo '<p> records were updated successfully </p>';
    header ("Location: read.php"); }
    mysqli_close ($link);
    exit();
}
else{
    echo "Error updating record: <br>";
    foreach ($errors as $msg) {
        echo "$msg <br>";
    }
    mysqli_close($link);
}
}
?>

