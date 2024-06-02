<?php
$sql_card = "SELECT * FROM `card`";
$card = db_fetch_array($sql_card);
$sql_energy = "SELECT * FROM `energy`";
$energy = db_fetch_array($sql_energy);
$energyId = [];
foreach ($card as &$item) {
    $energy_id = $item['energy_id'];
    $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
    $energy_name = db_fetch_row($sql_energy);
    $item['energy_name'] = $energy_name;
}
unset($item);

if (isset($_POST['searchName'])) {
    $namePokemon = $_POST['namePokemon'];
    if (empty($namePokemon)) {
        $sql_card = "SELECT * FROM `card`";
    } else {
        $sql_card = "SELECT * FROM `card` WHERE `name` LIKE '%$namePokemon%' ";
    }
    $card = db_fetch_array($sql_card);
    foreach ($card as &$item) {
        $energy_id = $item['energy_id'];
        $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
        $energy_name = db_fetch_row($sql_energy);
        $item['energy_name'] = $energy_name;
    }
    unset($item);
}

if (isset($_POST['filterEnergy'])) {
    $energyId = $_POST['energy-name'];
    if (empty($energyId)) {
        $sql_card = "SELECT * FROM `card`";
    } else {
        $sql_card = "SELECT * FROM `card` WHERE `energy_id` = $energyId";
    }
    $card = db_fetch_array($sql_card);
    foreach ($card as &$item) {
        $energy_id = $item['energy_id'];
        $sql_energy = "SELECT `name` FROM `energy` WHERE `id` = $energy_id";
        $energy_name = db_fetch_row($sql_energy);
        $item['energy_name'] = $energy_name;
    }
    unset($item);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cartes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/select.css">
</head>

<body>
    <div class="container">
        <h1>Liste des cartes</h1>
        <form method="post">
            <div class="d-flex justify-content-between align-items-center my-4 custom-container">
                <div>
                    <select name="energy-name" id="select-energy" class="form-control custom-select">
                        <option value="">Défaut</option>
                        <?php
                        foreach ($energy as $item) {
                        ?>
                            <option <?php if($item['id'] == $energyId){ echo "selected"; } ?> value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <button name="filterEnergy" class="btn btn-primary custom-button">Filtre</button>
                </div>
                <div>
                    <input type="text" name="namePokemon" id="" class="form-control custom-input">
                    <button name="searchName" class="btn btn-danger custom-button">Rechercher</button>
                </div>
            </div>
            <?php
            if (isset($error['card'])) {
                echo '<div class="alert alert-danger" role="alert">' . $error['card'] . '</div>';
            }
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Énergie</th>
                        <th width="140">Les joueurs ont</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($card as $item) {
                    ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="imageCard" width="50"></td>
                            <td class="energy-<?php echo $item['energy_id']; ?>"><?php echo $item['energy_name']['name']; ?></td>
                            <td>
                                <a href="?mod=user&act=listUser&cardId=<?php echo $item['id']; ?>" class="icon-link">
                                    <i class="fa-solid fa-bullseye icon-bullseye"></i>
                                    <i class="fa-regular fa-eye icon-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <div class="count-select d-flex justify-content-end align-items-end d-none"><span>3</span></div>
    <script src="public/js/select.js"></script>
</body>

</html>