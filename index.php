<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://icons.veryicon.com/png/o/miscellaneous/building-materials-website/speaking-speak.png">
    <title>Palavra do dia</title>
    <style>
        body {
            background-color: #68478d;
        }

        #palavra {
            background-color: wheat;
            outline: 0;
            padding: 110px 100px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 50px;
            border: 0;
            color: black;
            width: fit-content;
            height: fit-content;
            border-radius: 8px;
            transition: padding .1s linear;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            user-select: none;
            box-shadow: 10px 10px 0 5   px black;
        }

        #palavra:hover {
            padding: 111px 101px;
        }


        #request {
            background-color: #9f9;
            outline: 0;
            padding: 6px 12px;
            font-size: 24px;
            border: 0;
            color: #666;
            width: 130px;
            height: 40px;
            border-radius: 8px;
            transition: background-color .1s linear, border-radius .1s linear, width .1s linear, height .1s linear, font-size .1s linear;
            cursor: pointer;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,-50%)
        }

        #request:hover {
            background-color: #4f4;
            border-radius: 0px;
            width: 160px;
            height: 80px;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if (!empty($_POST) || !empty($_SESSION["clicked"])) {
            $db = new PDO("mysql:dbname=railway;host=localhost;port=3306", "root", "166G55Cc6EHBG23aeHeBfCD224a5aBFa");
            if (empty($_SESSION["clicked"])) echo "<script>(()=>{location.reload();})();</script>";
            $_SESSION["clicked"] = "1";
        ?>

        <center><h2 style="color: white;">Volte amanhã às 18:40 para uma nova palavra.</h2></center>
        <h1 id="palavra"><?= $db->query("SELECT * FROM Word")->fetch()["word"] ?></h1>

        <?php }

        else {?>

    <form method="post">
        <button id="request" name="request">palavra</button>
    </form>

    <?php } ?>
</body>
</html>