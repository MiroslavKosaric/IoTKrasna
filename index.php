<?php

    // data variables
    $name = $surname = $num = $isLiked = $email = $opinion = "";
    
    // error variables
    $nameError = $surnameError = $numError = "";

    // ak sa dotaznik odoslal skontroluju sa hodnoty
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // skontroluje ci je meno zlozene len z pismen
        if (isset($_POST['name'])) {
            if (var_dump(IntlChar::isalpha($_POST['name']))) {
                $name = $_POST['name'];
            } else {
                $nameError = "Meno sa musí skladať z písmen.";   
            }
        } elseif (empty($_POST["name"])) {
            $nameError = "Meno je povinné.";
        }

        // skontroluje ci je priezvisko zlozene len z pismen
        if (isset($_POST['surname'])) {
            if (var_dump(IntlChar::isalpha($_POST['surname']))) {
                $surname = $_POST['surname'];
            } else {
                $surnameError = "Priezvisko sa musí skladať z písmen.";   
            }
        } elseif (empty($_POST["surname"])) {
            $surnameError = "Priezvisko je povinné.";
        }

        // skontroluje ci je telefonne cislo zlozene len z cisiel
        if (isset($_POST['num'])) {
            if (is_numeric($_POST['num'])) {
                $num = $_POST['num'];
            } else {
                $numError = "Telefónne číslo sa musí skladať len z čísiel vo formáte 09...";   
            }
        } elseif empty($_POST["num"]) {
            $numError = "Telefónne číslo je povinné.";   
        } 
        
        // zisti aku moznost ano/nie pouzivatel zaskrtol
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
        } elseif (empty($_POST["isLiked"])) {
            $isLiked = "";
        }

        // uloží email
        if (empty($_POST['email'])) {
            $email = "";
        } else {
            $email = $_POST['email'];
        }

        // uloží názor
        if (empty($_POST['opinion'])) {
            $opinion = "";
        } else {
            $opinion = $_POST['opinion'];
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="name">Vaše meno</label>
            <input type="text" id="name" name="name" placeholder="Meno" autofocus>
            <span class="required">* <?php echo $nameError;?></span>
            <input type="text" id="surname" name="surname" placeholder="Priezvisko">
            <span class="required">* <?php echo $surnameError;?></span>

            <br><br>
            <label for="num">Telefónne číslo</label>
            <input type="tel" id="num" name="num" placeholder="0912345678">
            <span class="required">* <?php echo $numError;?></span>

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
