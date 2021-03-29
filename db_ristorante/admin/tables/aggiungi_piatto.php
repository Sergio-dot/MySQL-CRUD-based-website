<?php

include('../../config.php');
include(ROOT_PATH . '/includes/logic/common_functions.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione comande</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/stylePage.css">
</head>

<body>

    <?php include(INCLUDE_PATH . '/layout/servizio_navbar.php'); ?>

    <div class="container p-4 w-50">
        <h1>Modulo di creazione</h1>
        <h5><small class="text-muted">Scegli dal menu cosa aggiungere alla comanda.</small></h5>
        <form action="../../includes/logic/hold.php" method="post">
            <div class="form-group">
                <select name="menu">
                <?php
                $result = visualizzaMenu();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <option value=' . $row["id_menu"] . '>' . $row["nome"] . ' - ' . $row['peso'] . 'g/cl</option>
                            ';
                        }
                    }
                    ?>
                </select>
                <br>
            <button type="submit" name="bt_conf_fill_com" class="btn btn-primary mt-2">Conferma</button>
        </form>
    </div>

    <?php include(INCLUDE_PATH . '/layout/footer.php'); ?>