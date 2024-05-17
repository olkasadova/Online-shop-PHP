<?php 
include ('includes/nav.php');

require ('connect_db.php');

$query = "SELECT * from products ";
$res = mysqli_query($link, $query);

if (mysqli_num_rows($res) > 0 )
{
?>

    <!DOCTYPE html>
    <html>
        <title> 
            <head> Display read data </head>
        </title>
    <body>
        <?php while ($row = mysqli_fetch_array($res))
        {
            ?>
    
    <div class="col-md-3 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                <img src = "./img/<?php echo $row['item_img']; ?>"
                    class="card-img-top" 
                    alt="T-Shirt">
                <div class="card-body">
                <h5 class="card-title text-center"><?php echo $row ['item_name']; ?>'</h5>
                <p class="card-text"><?php echo $row ['item_desc']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><p class="text-center"><?php echo $row ['item_price'] ;?></p></li>
                <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id='.$row['item_id'].'">
                Update</a></li>
                <li class="list-group-item"><a class="btn btn-dark" href="delete.php?item_id='.$row['item_id'].'">
                Delete Item</a></li>
                </ul>
                </div>
        
            </div>
        <?php
        }
        ?>
    </body>
    <html>;
    <?php
    mysqli_close ($link);
    }
else
 {echo '<p> There are no items in the DB to display. </p>'; }

 include ('includes/footer.php');

