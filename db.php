<?php

$connection = mysqli_connect('localhost', 'root', '', 'cms');
if ($connection) {
    echo "Connected";
// } else {
//     echo "Connection failed: " . mysqli_connect_error();
}

?>