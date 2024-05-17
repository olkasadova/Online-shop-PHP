<?php
$link = mysqli_connect('localhost','root','','codespace');

if (!$link){
    die('could not connect to MySQL:' . mysqli_error());
}
echo 'Connected to the database successfully';

?>