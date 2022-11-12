<?php
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $num = "";
    $email = $_POST['email'];
    $isLiked = "";
    $opinion = $_POST['opinion'];

    if (isset($_POST['num'])) {
        if (is_numeric($num)) {
            $num = $_POST['num'];
        }
    }

    if (isset($_POST['isLiked'])) {
        $answers = array('Ano', 'Nie');
        $chosen = $_POST['isLiked'];

        if (in_array($chosen, $answers)) {
            if(strcasecmp($chosen, 'Ano') == 0) {
                $isLiked = "Ano";
            } else {
                $isLiked = "Nie";
            }
        }
    }

    $text = "Meno: " . $name . " " . $surname . "\r\n";
    $text .= "Telefonne cislo: " . $num . "\r\n";
    $text .= "Email: " . $email . "\r\n";
    $text .= "Paci sa mu/jej IPaIoT: " . $isLiked . "\r\n";
    $text .= "Nazor na predmet: " . $opinion;

    $data = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($data, $text);

    fclose($data);
?>

<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>IPaIoT Web Form</title>
</head>
<body>
    <div class="formDiv">
        <h2 class="heading">IPAIOT WEB FORM</h2>
        <form action="" method="POST">
            <label for="name">Vaše meno</label>
            <input type="text" id="name" name="name" placeholder="Meno" autofocus>
            <input type="text" id="surname" name="surname" placeholder="Priezvisko">

            <br><br>
            <label for="num">Telefónne číslo</label>
            <input type="tel" id="num" name="num" placeholder="0912345678">

            <br><br>
            <label for="email">Emailová adresa</label>
            <input type="email" id="email" name="email" placeholder="meno@mail.com">

            <br><br>
            <label for="like">Páči sa ti IPaIoT?</label>
            <input type="radio" id="like" name="isLiked" class="like" value="Ano">
            <p class="ano">Áno</p>

            <input type="radio" id="like" name="isLiked" class="disLike" value="Nie">
            <p class="nie">Nie</p>

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

<script type="text/javascript">
    function thanks() {
        alert("Ďakujem za vyplnenie dotazníka");
    }
</script>
