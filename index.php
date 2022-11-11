<?php
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameError = "Tvoje krstné meno nie je zapísané správne";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
        $nameError = "Tvoje priezvisko nie je zapísané správne.";
    }

    $num = $_POST['num'];
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Email zapísaný v nesprávnom formáte.";
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

            <label for="email">Emailová adresa</label>
            <input type="email" id="email" name="email" placeholder="meno@mail.com">

            <br><br>
            <label for="like">Páči sa ti IPaIoT?</label>
            <input type="radio" id="like" name="isLiked" class="like">
            <p class="ano">Áno</p>

            <input type="radio" id="like" name="isNotLiked" class="disLike">
            <p class="nie">Nie</p>

            <br><br>
            <label for="favColor">Obľúbená farba?</label>
            <input type="color" id="favColor" name="color" value="<?php $favColor = $_GET['color']; ?>">

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