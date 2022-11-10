<?php
    <link rel="stylesheet" type="text/css" href="style.css">

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
            <form action="data.txt" method="post">
                <label for="name">Vaše meno</label>
                <input type="text" id="name" name="Meno" placeholder="Meno" autofocus>
                <input type="text" id="surname" placeholder="Priezvisko">

                <br><br>
                <label for="num">Telefónne číslo</label>
                <input type="tel" id="num" placeholder="0912345678">

                <br><br>
                <label for="like">Páči sa ti IPaIoT?</label>
                <input type="radio" id="like" name="isLiked" class="like">
                <p class="ano">Áno</p>

                <input type="radio" id="like" name="isLiked" class="disLike">
                <p class="nie">Nie</p>

                <br><br>
                <label for="favColor">Obľúbená farba?</label>
                <input type="color" id="favColor">

                <br><br>
                <label for="opinion">Názor na predmet</label>
                <input type="text" id="opinion">

                <br><br><br><br>
                <hr>
                <button class="submitButton" onclick="thanks()">ODOSLAŤ</button>
            </form>
        </div>
    </body>
?>
