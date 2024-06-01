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
    <link rel="stylesheet" href="public/css/register.css">
</head>

<body>
    <div class="container">
        <h1>Se connecter</h1>
        <p>Connectez-vous pour continuer</p>
        <form method="POST">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="hello@reallygreatsite.com" required>
            <p class="error"> <?php echo form_error('email'); ?></p>
            
            <label for="password">MOT DE PASSE</label>
            <input type="password" id="password" name="password" required>
            <p class="error"> <?php echo form_error('password'); ?></p>

            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>

</html>