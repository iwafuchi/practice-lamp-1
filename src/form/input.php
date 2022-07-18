<?php

function Sanitize() {
    if (!empty($_GET)) {
        foreach ($_GET as $key => $value) {
            $_GET[$key] = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
        }
    }
}
Sanitize();
echo !empty($_GET["name"]) ? "\$_GET[name]の値は{$_GET['name']}です" : "\$_GET[name]の値はemptyです";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="input.php">
        <label>指名<input type="input" name="name"></label>
        <button type="submit">送信</button>
    </form>
</body>

</html>