<?php
include "includes/nav.php";
?>
<?php
include "includes/footer.php";
?>

<h1> Please add your item </h1>

<form method = "POST" action = "create.php" >
        <label for = "name"> Item Name: </label> <br>
        <input type =  "text" id = "item_name" name = "item_name" 
            value = "<?php if (isset($_POST["item_name"])) echo $_POST["item_name"]; ?>"
            required>
    
        <label for = "description"> Item Description: </label> <br>
        <input type = "text" id = "item_desc" name = "item_desc"
            value = "<?php if (isset($_POST["item_desc"])) echo $_POST ["item_desc"]; ?>"
            required>
        
        <label for = "price"> Item Price: </label> <br>
        <input type = "text" id = "item_price" name = "item_price"
            value = "<?php if (isset($_POST["item_price"])) echo $_POST ["item_price"]; ?>"
            required>
        
        <label for = "image"> Item Image: </label> <br>
        <input type = "text" id = "item_image" name = "item_image"
            value = "<?php if (isset($_POST["item_image"])) echo $_POST ["item_image"]; ?>"
            required>
        <input type="submit" class="btn btn-dark" value="Submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        require ('connect_db.php');
    

//initialize error array
$errors = array();

if (empty ($_POST ['item_name']))
    {
        $errors[] = 'Enter the item name' ;
    }
 else
    {
        $name = mysqli_real_escape_string( $link, trim ($_POST ['item_name']));
    }
if (empty ($_POST['item_desc']))
    {
        $errors[] = 'Enter item description';
    }
 else
    {
        $desc = mysqli_real_escape_string( $link, trim ($_POST['item_desc']));
    }
if (empty ($_POST['item_price']))
    {
        $errors[] = 'Please provide item price';
    }
else
    {
        $price = mysqli_real_escape_string ($link, trim($_POST['item_price']));
    }
if (empty ($_POST['item_image']))
    {
        $errors[] = 'Please provide item image';
    }
else
    {
        $img = mysqli_real_escape_string ($link,trim($_POST['item_image'] ));
    }

//if all fields are not empty
if (empty ($errors))
    {
        $query = "INSERT INTO products (item_name, item_desc, item_price, item_img)
            VALUES ('$name', '$desc', '$price', '$img')";
        $result = mysqli_query ($link, $query);
        if ($result)
            {echo '<p> New record was created successfully</p>';
            }

        //close db connection
        mysqli_close ($link);
        exit();
    }
    else 
    {
      echo '<p>The following error(s) occurred:</p>' ;
      foreach ( $errors as $msg )
      { echo "$msg<br>" ; }
      echo '<p>Please try again.</p></div>';
      # Close database connection.
      mysqli_close( $link );
      
    }  
    }

?>