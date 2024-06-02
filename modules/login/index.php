<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo $email . '-----------'. $password;
    $error = [];
    $sql = "SELECT * FROM `users` WHERE `email` = '{$email}'";
    if (db_num_rows($sql) > 0) {
        $user = db_fetch_row($sql);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            redirect("?mod=user&act=index");
        } else {
            $error['password'] = "Les mots de passe ne correspondent pas.";
        }
    } else {
        $error['email'] = "L'e-mail n'existe pas dans le système";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/register.css">
</head>

<body>
    <div class="container">
        <h1>Se connecter</h1>
        <p>Connectez-vous pour continuer</p>
        <form method="POST">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="hello@reallygreatsite.com" required>
            <?php
            if (isset($error['email'])) {
                echo '<p class="text-danger">' . $error['email'] .'</p>';
            }
            ?>
            
            <label for="password">MOT DE PASSE</label>
            <input type="password" id="password" name="password" required>
            <?php
            if (isset($error['password'])) {
                echo '<p class="text-danger">' . $error['password'] .'</p>';
            }
            ?>

            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>

</html>