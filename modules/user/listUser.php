<?php
if (!isset($_SESSION['user_id'])) {
    redirect('?mod=login&act=index');
    exit();
}

if (isset($_GET['cardId'])) {
    $cardId = $_GET['cardId'];
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` INNER JOIN `user_card` ON users.id = user_card.user_id WHERE user_card.card_id = $cardId AND users.id != $user_id";
    $usersCard = db_fetch_array($sql);
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `users` WHERE `id` != $user_id";
    $users = db_fetch_array($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/list.css">
    <title>Liste d'utilisateur</title>
</head>

<body>
    <div class="main-container">
        <h1 class="text-center">Liste d'utilisateur</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Page personnelle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($users)) {
                    foreach ($users as $user) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $user['username']; ?></th>
                            <td>
                                <a href="?mod=user&act=detail&id=<?php echo $user['id']; ?>" class="detail-user">
                                    <i class="fa-regular fa-address-card"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                }
                if (isset($usersCard)) {
                    foreach ($usersCard as $user) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $user['username']; ?></th>
                            <td>
                                <a href="?mod=user&act=detail&id=<?php echo $user['user_id']; ?>" class="detail-user">
                                    <i class="fa-regular fa-address-card"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                }   
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>