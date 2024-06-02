<?php
$sql_card = "SELECT * FROM `card`";
$card = db_fetch_array($sql_card);
$sql_energy = "SELECT * FROM `energy`";
$energy = db_fetch_array($sql_energy);
foreach ($card as &$item) {
    $energy_id = $item['energy_id'];
    $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
    $energy_name = db_fetch_row($sql_energy);
    $item['energy_name'] = $energy_name;
}
unset($item);
if (isset($_POST['btnSubmit'])) {
    $error = [];
    if (isset($_POST['selected_cards'])) {
        $selected_cards =  $_POST['selected_cards'];
        $count = count($selected_cards);
        if ($count < 20) {
            $error['card'] = "Le nombre de cartes sélectionnées n'est pas suffisant, 20 cartes doivent être sélectionnées";
        } else {
            foreach ($selected_cards as $key => $value) {
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'card_id' => $value
                ];
                db_insert('user_card', $data);
            }
            redirect("?mod=user&act=index");
        }
    } else {
        $error['card'] = "Veuillez choisir les 20 cartes";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez 20 cartes pour votre collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/select.css">
</head>

<body>
    <div class="container">
        <h1>Choisissez 20 cartes pour votre collection</h1>
        <form method="post">
            <?php
            if (isset($error['card'])) {
                echo '<div class="alert alert-danger" role="alert">' . $error['card'] . '</div>';
            }
            ?>
            <table>
                <thead>
                    <tr>
                        <th width="100">Choisir la carte</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Énergie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($card as $item) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="selected_cards[]" value="<?php echo $item['id']; ?>" class="checkboxItem"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="imageCard" width="50"></td>
                            <td class="energy-<?php echo $item['energy_id']; ?>"><?php echo $item['energy_name']['name']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="d-flex">
                <button class="btn-submit" name="btnSubmit" type="submit">Soumettre</button>
            </div>
        </form>
    </div>
    <div class="count-select d-flex justify-content-end align-items-end d-none"><span>3</span></div>
    <script src="public/js/select.js"></script>
</body>

</html>