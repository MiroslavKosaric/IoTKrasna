<?php
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $num = $_POST['num'];
    $like = $_POST['like'];
    $favColor = $_POST['favColor'];
    $opinion = $_POST['opinion'];

    fwrite("data.txt", "w");
?>