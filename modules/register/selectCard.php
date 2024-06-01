<?php
$sql_card = "SELECT * FROM `card`";
$card = db_fetch_array($sql_card);
foreach ($card as &$item) {
    $energy_id = $item['energy_id'];
    $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
    $energy_name = db_fetch_row($sql_energy);
    $item['energy_name'] = $energy_name;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez 20 cartes pour votre collection</title>
    <link rel="stylesheet" href="public/css/select.css">
</head>

<body>
    <div class="container">
        <form method="post">
            <h1>Page personnelle</h1>
            <table>
                <thead>
                    <tr>
                        <th>Choisir la carte</th>
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
                            <td><input type="checkbox" name="selected_cards[]" value="<?php echo $item['id']; ?>"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><img src="<?php echo $item['image']; ?>" alt="Alakazam" width="50"></td>
                            <td class="energy-<?php echo $item['energy_id']; ?>"><?php echo $item['energy_name']['name']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="d-flex">
                <button class="btn-submit" type="submit">Soumettre</button>
            </div>
        </form>
    </div>

    <script src="public/js/select.js"></script>
</body>

</html>