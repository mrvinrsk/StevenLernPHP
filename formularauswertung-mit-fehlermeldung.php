<?php
if (isset($_POST['s'])) { // check if form was submitted
    $send = true;
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];

    if (!isset($username) || $username == "" || empty($username)) {
        $send = false;
        $missingUsername = true;
    } else {
        if (strlen($username) < 3) {
            $send = false;
            $tooShortUsername = true;
        }
    }
    if (empty($password)) {
        $send = false;
        $missingPassword = true;
    }

    if ($send) {
        // do something
        unset($username, $password);
    }
}
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularauswertung m. Fehlermeldung</title>

    <link rel="stylesheet" href="node_modules/quickstartcss/css/quickstart.css">
    <link rel="stylesheet" href="style/css/global.css">
</head>
<body>

<main>
    <form method="post">
        <div class="messages" style="margin-bottom: 1em; display: flex; flex-direction: column; gap: .35em;">
            <?php if ($send) { ?>
                <div class="message">Formular erfolgreich abgesendet.</div>
            <?php } ?>

            <?php if (isset($missingUsername)) { ?>
                <div class="message">Du musst einen Usernamen angeben.</div>
            <?php } else if (isset($tooShortUsername)) { ?>
                <div class="message">Dein Nutzername ist zu kurz, er muss mindestens drei Zeichen beinhalten.</div>
            <?php } ?>

            <?php if (isset($missingPassword)) { ?>
                <div class="message">Du musst ein Passwort angeben.</div>
            <?php } ?>
        </div>

        <input type="text" name="USERNAME" value="<?php echo((isset($username) ? $username : '')); ?>" placeholder="Username"/>
        <input type="password" name="PASSWORD" placeholder="Password"/>

        <input type="submit" name="s" value="Login">
    </form>
</main>

</body>
</html>