<?php
if (!isset($_SESSION['user_id'])) {
    redirect('?mod=login&act=index');
    exit();
}

$user_id = $_SESSION['user_id'];
$id =  $_GET['id'];
$cardIdsUser = [];
$myCardIds = [];

$sql_user = "SELECT * FROM `users` WHERE `id` = $id";
$user = db_fetch_row($sql_user);
$sqlCardUser = "SELECT * FROM `card` INNER JOIN `user_card` ON card.id = user_card.card_id WHERE user_card.user_id = $id";
$cardUser = db_fetch_array($sqlCardUser);
foreach ($cardUser as &$item) {
    $energy_id = $item['energy_id'];
    $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
    $energy_name = db_fetch_row($sql_energy);
    $item['energy_name'] = $energy_name;
    $cardIdsUser[] = $item['card_id'];
}
unset($item);

$sqlMyCard = "SELECT * FROM `card` INNER JOIN `user_card` ON card.id = user_card.card_id WHERE user_card.user_id = $user_id";
$myCard = db_fetch_array($sqlMyCard);
foreach ($myCard as &$item) {
    $energy_id = $item['energy_id'];
    $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
    $energy_name = db_fetch_row($sql_energy);
    $item['energy_name'] = $energy_name;
    $myCardIds[] = $item['card_id'];
}
unset($item);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fromUser = $_SESSION['user_id'];
    $toUser = $id;
    $idCardTo = $_POST['idCardUser'];
    $idCardFrom = $_POST['idMyCard'];

    $data = [
        'fromUser' => $fromUser,
        'toUser' => $toUser,
        'idCardFrom' => $idCardFrom,
        'idCardTo' => $idCardTo
    ];
    if (db_insert('card_exchange', $data)) {
        $status = 'Votre demande de remplacement de carte a été envoyée à ' . $user['username'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page personnelle</title>
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
        <h1>Page personnelle</h1>
        <div class="info-user">
            <h2>Informations personnelles</h2>
            <div class="username"><b>Nom d'utilisateur:</b> <?php echo $user['username']; ?></div>
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
                        <th class="exchange-column">Échange de cartes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $temp = 1;
                    foreach ($cardUser as $item) {
                    ?>
                        <tr>
                            <td><?php echo $temp++; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><img src="<?php echo $item['image']; ?>" alt="Alakazam" width="50"></td>
                            <td class="energy-<?php echo $item['energy_id']; ?>"><?php echo $item['energy_name']['name']; ?></td>
                            <?php
                            if (in_array($item['card_id'], $myCardIds)) {
                            ?>
                                <td></td>
                            <?php
                            } else {
                            ?>
                                <td>
                                    <a class="card-exchange open-modal-btn" data-card-user="<?php echo $item['card_id']; ?>"><i class="fa-solid fa-money-bill-transfer"></i></a>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal hide">
        <div class="modal__inner">
            <div class="modal__header">
                <p>Sélectionnez 1 carte que vous souhaitez utiliser</p>
                <i class="fa-solid fa-xmark"></i>
            </div>
            <form action="" method="post">
                <div class="modal__body">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom</th>
                                <th>Image</th>
                                <th>Énergie</th>
                                <th class="exchange-column">Échange de cartes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $temp = 1;
                            foreach ($myCard as $item) {
                                if (!in_array($item['card_id'], $cardIdsUser)) {
                            ?>
                                    <tr>
                                        <td><?php echo $temp++; ?></td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><img src="<?php echo $item['image']; ?>" alt="Alakazam" width="50"></td>
                                        <td class="energy-<?php echo $item['energy_id']; ?>"><?php echo $item['energy_name']['name']; ?></td>
                                        <?php
                                        if (in_array($item['card_id'], $cardIdsUser)) {
                                        ?>
                                            <td></td>
                                        <?php
                                        } else {
                                        ?>
                                            <td>
                                                <a href="" class="card-exchange open-modal-btn" data-my-card="<?php echo $item['card_id']; ?>"><i class="fa-solid fa-money-bill-transfer"></i></a>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="idCardUser" value="">
                <input type="hidden" name="idMyCard" value="">
            </form>
            <div class="modal__footer">
                <button class="btn btn--primary">Fermer</button>
            </div>
        </div>
    </div>

    <script src="public/js/modal-card-exchange.js"></script>
</body>

</html>