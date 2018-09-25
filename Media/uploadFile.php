<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.09.2018
 * Time: 11:46
 */

if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else
{
    move_uploaded_file($_FILES['file']['tmp_name'], 'Images/' . $_FILES['file']['name']);
    echo "File uploaded successfully!!";
}
?>