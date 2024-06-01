<?php
$user_id = $_SESSION['user_id'];
$sql_user = "SELECT * FROM `users` WHERE `id` = $user_id";
$user = db_fetch_row($sql_user);
$sql_card = "SELECT * FROM `card` INNER JOIN `user_card` ON card.id = user_card.card_id WHERE user_card.user_id = $user_id";
$card = db_fetch_array($sql_card);
foreach ($card as &$item) {
    $energy_id = $item['energy_id'];
    $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
    $energy_name = db_fetch_row($sql_energy);
    $item['energy_name'] = $energy_name;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page personnelle</title>
    <link rel="stylesheet" href="public/css/select.css">
</head>

<body>
    <div class="container">
        <form method="post">
            <h1>Page personnelle</h1>
            <div class="info-user">
                <h2>Informations personnelles</h2>
                <div class="username"><b>Nom d'utilisateur:</b> <?php echo $user['username']; ?></div>
                <div class="email"><b>Email:</b> <?php echo $user['email']; ?></div>
                <a href="?mod=user&act=list" class="search-user">Rechercher des utilisateurs</a>
                <a href="?mod=user&act=logout" class="logout">Logout</a>
            </div>
            <div class="info-card">
                <h2>Informations sur votre collection</h2>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Image</th>
                            <th>Énergie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $temp = 1;
                        foreach ($card as $item) {
                        ?>
                            <tr>
                                <td><?php echo $temp++; ?></td>
                                <td><?php echo $item['name']; ?></td>
                                <td><img src="<?php echo $item['image']; ?>" alt="Alakazam" width="50"></td>
                                <td class="energy-<?php echo $item['energy_id']; ?>"><?php echo $item['energy_name']['name']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <script src="public/js/select.js"></script>
</body>

</html>