<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $error = [];
    $sql = "SELECT * FROM users WHERE email = '{$email}'";
    if (db_num_rows($sql) > 0) {
        $error['email'] = "l'email existe déjà";
    } else {
        if ($password === $confirm_password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password
            ];
            $user_id = db_insert('users', $data);
            $_SESSION['user_id'] = $user_id;
            redirect("?mod=register&act=selectCard");
        } else {
            $error['password'] = "Les mots de passe ne correspondent pas.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/register.css">
</head>

<body>
    <div class="container">
        <h1>Registre</h1>
        <p>Inscrivez-vous pour commencer</p>
        <form method="POST">
            <label for="username">NOM DU COMPTE</label>
            <input type="text" name="username" id="username">

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

            <label for="confirm-password">CONFIRMEZ LE MOT DE PASSE</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <button type="submit">Registre</button>
        </form>
    </div>
</body>

</html>