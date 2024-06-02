<?php
$user_id = $_SESSION['user_id'];
$sql_count_bell = "SELECT * FROM `card_exchange` WHERE `toUser` = $user_id OR `fromUser` = $user_id";
$sql_count_bell_other = "SELECT * FROM `card_exchange` WHERE `fromUser` = $user_id AND `status` != 'waiting'";
$sql_count_bell_waiting = "SELECT * FROM `card_exchange` WHERE `toUser` = $user_id AND `status` = 'waiting'";
$sql_count_bell_to = "SELECT * FROM `card_exchange` WHERE `toUser` = $user_id";
$sql_notify = "SELECT * FROM `card_exchange` WHERE `toUser` = $user_id";
$sql_notify_fromRq = "SELECT * FROM `card_exchange` WHERE `fromUser` = $user_id";
$announcements = db_fetch_array($sql_notify);
$announcements_fromRq = db_fetch_array($sql_notify_fromRq);
$count_bell_waiting = db_num_rows($sql_count_bell_waiting);
$count_bell_other = db_num_rows($sql_count_bell_other);
$count_bell = db_num_rows($sql_count_bell);
$count_bell_to = db_num_rows($sql_count_bell_to);
// show_array($announcements_fromRq);


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
unset($item);

if (isset($_POST['btn_accept'])) {
    $fromUser = $_POST['fromUser'];
    $toUser = $_POST['toUser'];
    $idCardFrom = $_POST['idCardFrom'];
    $idCardTo = $_POST['idCardTo'];
    $whereFrom = "`user_id` = $fromUser AND `card_id` = $idCardFrom";
    $whereTo = "`user_id` = $toUser AND `card_id` = $idCardTo";
    $dataFrom = [
        'card_id' => $idCardTo
    ];
    $dataTo = [
        'card_id' => $idCardFrom
    ];
    db_update('user_card', $dataFrom, $whereFrom);
    db_update('user_card', $dataTo, $whereTo);
    $dataStatus = [
        'status' => 'accept'
    ];
    $whereCardExchange = "`fromUser` = $fromUser AND `toUser` = $toUser AND `idCardFrom` = $idCardFrom AND `idCardTo` = $idCardTo";

    if (db_update('card_exchange', $dataStatus, $whereCardExchange)) {
        $status = 'Échange de carte réussi!';
    }
}
if (isset($_POST['btn_ignore'])) {
    $fromUser = $_POST['fromUser'];
    $toUser = $_POST['toUser'];
    $idCardFrom = $_POST['idCardFrom'];
    $idCardTo = $_POST['idCardTo'];
    $dataStatus = [
        'status' => 'ignore'
    ];
    $whereCardExchange = "`fromUser` = $fromUser AND `toUser` = $toUser AND `idCardFrom` = $idCardFrom AND `idCardTo` = $idCardTo";
    if (db_update('card_exchange', $dataStatus, $whereCardExchange)) {
        $status = 'Échange de carte annulé!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page personnelle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/select.css">
</head>

<body>
    <div class="container">
        <?php if (!empty($status)) : ?>
            <div class="status-message">
                <?php echo $status; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <h1>Page personnelle</h1>
            <div class="info-user">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Informations personnelles</h2>
                    <div class="notification">
                        <a class="open-modal-btn bell">
                            <i class="fa-solid fa-bell"></i>
                        </a>
                        <span><?php echo $count_bell_waiting; ?></span>
                    </div>
                </div>

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

    <div class="modal">
        <div class="modal__inner__notify">
            <div class="modal__header">
                <p>Notification</p>
                <i class="fa-solid fa-xmark"></i>
            </div>
            <form action="" method="post">
                <div class="modal__body__notify">
                    <?php
                    if ($count_bell > 0) {
                        if ($count_bell_other > 0) {
                            foreach ($announcements_fromRq as $item) {
                                if ($item['status'] == 'accept') {
                                    $toUser = $item['toUser'];
                                    $sql_user = "SELECT `username` FROM `users` WHERE `id` = $toUser";
                                    $user = db_fetch_row($sql_user);
                    ?>
                                    <div class="detail-notify">
                                        <p class="py-3">Le joueur <span class="font-bold"><?php echo $user['username']; ?></span> a accepté d'échanger des cartes</p>
                                    </div>
                                <?php
                                }
                                if ($item['status'] == 'ignore') {
                                    $toUser = $item['toUser'];
                                    $sql_user = "SELECT `username` FROM `users` WHERE `id` = $toUser";
                                    $user = db_fetch_row($sql_user);
                                ?>
                                    <div class="detail-notify">
                                        <p class="py-3">Le joueur <span class="font-bold"><?php echo $user['username']; ?></span> n'accepte pas d'échanger des cartes</p>
                                    </div>
                                <?php
                                }
                            }
                        }
                        if ($count_bell_to > 0) {
                            foreach ($announcements as $item) {
                                $fromUser = $item['fromUser'];
                                $idCardFrom = $item['idCardFrom'];
                                $idCardTo = $item['idCardTo'];
                                $sql_user = "SELECT `username` FROM `users` WHERE `id` = $fromUser";
                                $sql_card_from = "SELECT * FROM `card` WHERE `id` = $idCardFrom";
                                $sql_card_to = "SELECT * FROM `card` WHERE `id` = $idCardTo";
                                $user = db_fetch_row($sql_user);
                                $card_from = db_fetch_row($sql_card_from);
                                $card_to = db_fetch_row($sql_card_to);
                                $energy_id_from = $card_from['energy_id'];
                                $sql_name_energy_from = "SELECT * FROM `energy` WHERE `id` = $energy_id_from";
                                $energy_from = db_fetch_row($sql_name_energy_from);
                                $energy_id_to = $card_to['energy_id'];
                                $sql_name_energy_to = "SELECT * FROM `energy` WHERE `id` = $energy_id_to";
                                $energy_to = db_fetch_row($sql_name_energy_to);
                                ?>
                                <div class="detail-notify">
                                    <p class="title-notify">Demande d'<span><?php echo $user['username']; ?></span></p>
                                    <p class="py-3">Le joueur <span class="font-bold"><?php echo $user['username']; ?></span> veut échanger des cartes avec vous</p>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p>Exchange</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <img class="img-card mx-2" src="<?php echo $card_from['image'] ?>" alt="<?php echo $card_from['name'] ?>">
                                            <div>
                                                <p><?php echo $card_from['name'] ?></p>
                                                <p class="energy-<?php echo $energy_from['id']; ?>"><?php echo $energy_from['name']; ?></p>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <img class="img-card mx-2" src="<?php echo $card_to['image'] ?>" alt="<?php echo $card_to['name'] ?>">
                                            <div>
                                                <p><?php echo $card_to['name'] ?></p>
                                                <p class="energy-<?php echo $energy_to['id']; ?>"><?php echo $energy_to['name']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($item['status'] === 'waiting') {
                                    ?>
                                        <form method="post">
                                            <div class="d-flex justify-content-around align-items-center mb-3">
                                                <button type="submit" class="btn btn-primary" name="btn_accept" id="btn_accept">Accepter</button>
                                                <button type="submit" class="btn btn-danger" name="btn_ignore" id="btn_ignore">N'accepte pas</button>
                                                <input type="hidden" name="fromUser" value="<?php echo $item['fromUser'] ?>">
                                                <input type="hidden" name="toUser" value="<?php echo $item['toUser'] ?>">
                                                <input type="hidden" name="idCardFrom" value="<?php echo $item['idCardFrom'] ?>">
                                                <input type="hidden" name="idCardTo" value="<?php echo $item['idCardTo'] ?>">
                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                    <?php
                            }
                        }
                    } else {
                        echo '<h3>Aucune notification</h3>';
                    }
                    ?>
                </div>
            </form>
            <div class="modal__footer">
                <button class="btn btn--primary">Fermer</button>
            </div>
        </div>
    </div>

    <script src="public/js/modal.js"></script>
</body>

</html>