<?php

include('../../config.php');
include(ROOT_PATH . '/includes/logic/common_functions.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione ordini</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/stylePage.css">
</head>

<body>

    <?php include(INCLUDE_PATH . '/layout/admin_navbar.php'); ?>

    <div class="container p-4 w-50">
        <h1>Modulo di creazione</h1>
        <h5><small class="text-muted">Compila il modulo per creare un nuovo ordine, un fornitore lo prenderà in carico al più presto</small></h5>
        <form action="../../includes/logic/hold.php" method="post">
            <div class="form-group">
                <label>Ingrediente</label>
                <br>
                <select name="nome_ingrediente">
                    <br>
                    <?php
                    $result = visualizzaIngrediente();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <option value=' . $row["nome"] . '>' . $row["nome"] . '</option>
                            ';
                        }
                    }
                    ?>
                </select>
                <br><br>
                <div class="w-50">
                    <label>Quantità</label>
                    <br>
                    <span class="input-number input-number-adaptive">
                        <input type="number" name="quantita" value="1" step="1">
                    </span>
                </div>
            </div>
            <button type="submit" name="bt_conf_add_ord" class="btn btn-primary mt-2">Conferma</button>
        </form>
    </div>

    <?php include(INCLUDE_PATH . '/layout/footer.php'); ?>