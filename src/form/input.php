<?php
session_start();
session_regenerate_id();

if (!isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(32));
}
$token = $_SESSION["csrfToken"];
function Sanitize() {
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
        }
    }
}
Sanitize();
echo !empty($_POST["name"]) ? "\$_POST[name]の値は{$_POST['name']}です" : "\$_POST[name]の値はemptyです";
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
    <form method="POST" action="input.php">
        <label>指名<input type="input" name="name"></label>
        <input type="hidden" name="csrf" value=<?php $token ?>>
        <button type="submit">送信</button>
    </form>
</body>
<?php
echo $_SESSION["csrfToken"] = $token ? "正常値" : "不正値";
?>

</html>