<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adm</title>
</head>
<body>
    <?php
        session_start();
        $senha = "3141592653589CastorChines3141592653589";
        if (!empty($_SESSION["adm"])) {
            if (!empty($_POST["palavra"])) {
                $f = fopen("./palavra.json", "w");
                fwrite($f, json_encode(["word"=>$_POST["palavra"]], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
                echo "<script>(()=>{location.replace('./index.php');})();</script>";
            }

            if ($_SESSION["adm"] == $senha) {?>

    <h1>Logado como adm</h1>
    <div style="display: inline-flex;">
        palavra do dia:
        <form method="post">
            <input type="text" name="palavra">
            <input type="submit" value="trocar">
        </form>
    </div>

                <?php return 0;
            }
        }

        if (!empty($_POST)) {
            if ($_POST["pass"] == $senha) {
                $_SESSION["adm"] = $senha;
                echo "<script>(()=>{location.reload();})();</script>";
            } else {
                echo "<span style='color:red'>senha errada paizão!</span>";
            }
        }
    ?>
    <div style="display: inline-flex;">
        senha:
        <form method="post">
            <input type="text" name="pass">
            <input type="submit" value="sign in">
        </form>
    </div>
</body>
</html>

<?php
// Senha: 3141592653589CastorChines3141592653589
?>