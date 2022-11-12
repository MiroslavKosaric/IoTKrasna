<?php
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameError = "Tvoje krstné meno nie je zapísané správne";
    } elseif (empty($_POST['name'])) {
        $nameError = "Musíš zadať krstné meno";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $surname)) {
        $surnameError = "Tvoje priezvisko nie je zapísané správne.";
    } elseif (empty($_POST['surname'])) {
        $surnameError = "Musíš zadať priezvisko";
    }

    $num = $_POST['num'];
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Email zapísaný v nesprávnom formáte.";
    } elseif (empty($_POST['email'])) {
        $emailError = "Musíš zadať email."
    }

    if (isset($_POST['isLiked'])) {
        $isLiked = "Ano";
    } elseif (isset($_POST['isNotLiked'])) {
        $isLiked = "Nie";
    } else {
        $isLiked = "";
    }

    $favColor = $_POST['favColor'];
    $opinion = $_POST['opinion'];

    $text = "Meno: " . $name . " " . $surname . "\r\n";
    $text .= "Telefonne cislo: " . $num . "\r\n";
    $text .= "Email: " . $email . "\r\n";
    $text .= "Paci sa mu/jej IPaIoT: " . $isLiked . "\r\n";
    $text .= "Nazor na predmet: " . $opinion;

    $data = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($data, $text);

    fclose($data);
?>