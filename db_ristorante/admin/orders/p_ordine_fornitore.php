<?php

include('../../config.php');
include(INCLUDE_PATH . '/logic/common_functions.php');

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

    <?php include('../../includes/layout/fornitore_navbar.php'); ?>

    <div class="container p-4">
        <h1>Storico ordini</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID_Ordine</th>
                    <th scope="col">Ingrediente</th>
                    <th scope="col">Quantità</th>
                    <th scope="col">Data</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = visualizzaOrdine();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['stato'] == 0) {
                            $row['stato'] = 'In attesa';
                        } else if ($row['stato'] == 1) {
                            $row['stato'] = 'Preso in carico';
                        } else if ($row['stato'] == 2) {
                            $row['stato'] = 'Consegnato';
                        }
                        echo '
                            <tr>
                            <td>' . $row["id_ordine"] . '</td>
                            <td>' . $row["ingrediente"] . '</td>
                            <td>' . $row["quantita"] . '</td>
                            <td>' . $row["data"] . '</td>
                            <td>' . $row["stato"] . '</td>
                            <form action="../../includes/logic/hold.php" method="post">
                                <td>
                                <button title="Prendere in carico" type="submit" class="btn btn-primary p-2" value="' . $row["id_ordine"] . '" name="bt_acc_ord"><i class="fas fa-check"></i></button>
                                <button title="Consegnare" type="submit" class="btn btn-success p-2" value="' . $row["id_ordine"] . '" name="bt_conf_ord"><i class="far fa-thumbs-up"></i></button>
                                <input type="hidden" name="hiddenStato" value="' . $row['stato'] . '">
                                <input type="hidden" name="hiddenIngrediente" value="' . $row['ingrediente'] . '">
                                <input type="hidden" name="hiddenQuantita" value="' . $row['quantita'] . '">
                                </td>
                            </form>
                            </tr>
                            ';
                            if (!empty($_SESSION['error'])) {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                echo '</div>';
                            }
                    }
                } else {
                    echo '<div class="alert alert-info" role="alert">
                    Non sono stati trovati i dati richiesti, riprova più tardi.
                  </div>';
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php include('../../includes/layout/footer.php'); ?>