<?php
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $num = $_POST['num'];
    $isLiked = $_POST['isLiked'];
    $favColor = $_POST['favColor'];
    $opinion = $_POST['opinion'];

    fwrite("data.txt", "w");
?>