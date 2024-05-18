
<?php
require 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $text = $_POST["text"];

}
echo "<h2> your text is: ". $text."</h2>"

?>
