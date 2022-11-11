<?php
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $num = $_POST['num'];
    if ($isLiked == True) { 
        $isLiked = $_POST['isLiked'];
    } else {
        $isLiked = $_POST['isDisLiked'];
    }
    $favColor = $_POST['favColor'];
    $opinion = $_POST['opinion'];

    $text = "Meno: " . $name . " " . $surname . "\r\n";
    $text .= "Telefonne cislo: " . $num . "\r\n";
    $text .= "Paci sa mu/jej IPaIoT: " . $isLiked . "\r\n";
    $text .= "Oblubena farba: " . $favColor . "\r\n";
    $text .= "Nazor na predmet: " . $opinion;

    $data = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($data, $text);

    fclose($data);
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>IPaIoT Web Form</title>
</head>
<body>
    <script type="text/javascript">
        function thanks() {
            alert("Ďakujem za vyplnenie dotazníka");
        }
    </script>

    <div class="formDiv">
        <h2 class="heading">IPAIOT WEB FORM</h2>
        <form action="/" method="post">
            <label for="name">Vaše meno</label>
            <input type="text" id="name" name="name" placeholder="Meno" autofocus>
            <input type="text" id="surname" name="surname" placeholder="Priezvisko">

            <br><br>
            <label for="num">Telefónne číslo</label>
            <input type="tel" id="num" name="num" placeholder="0912345678">

            <br><br>
            <label for="like">Páči sa ti IPaIoT?</label>
            <input type="radio" id="like" name="isLiked" class="like">
            <p class="ano">Áno</p>

            <input type="radio" id="like" name="isNotLiked" class="disLike">
            <p class="nie">Nie</p>

            <br><br>
            <label for="favColor">Obľúbená farba?</label>
            <input type="color" id="favColor" name="color">

            <br><br>
            <label for="opinion">Názor na predmet</label>
            <input type="text" id="opinion" name="opinion">

            <br><br><br><br>
            <hr>
            <button class="submitButton" onclick="thanks()">ODOSLAŤ</button>
        </form>
    </div>
</body>
</html>