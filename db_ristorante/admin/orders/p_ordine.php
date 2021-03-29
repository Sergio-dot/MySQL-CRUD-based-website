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

    <?php include('../../includes/layout/admin_navbar.php'); ?>

    <div class="container p-4">
        <h1>Storico ordini</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID_Ordine</th>
                    <th scope="col">ID_Fornitore</th>
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
                        if($row['stato'] == 0) {
                            $row['stato'] = 'In attesa';
                        } else if ($row['stato'] == 1) {
                            $row['stato'] = 'Preso in carico';
                        } else if ($row['stato'] == 2) {
                            $row['stato'] = 'Consegnato';
                        }
                        echo '
                            <tr>
                            <td>' . $row["id_ordine"] . '</td>
                            <td>' . $row["id_fornitore"] . '</td>
                            <td>' . $row["ingrediente"] . '</td>
                            <td>' . $row["quantita"] . '</td>
                            <td>' . $row["data"] . '</td>
                            <td>' . $row["stato"] . '</td>
                            <form action="../../includes/logic/hold.php" method="post">
                                <td>
                                <button title="Elimina" type="submit" class="btn btn-danger p-2" value="' . $row["id_ordine"] . '" name="bt_del_ord"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </form>
                            </tr>
                            ';
                    }
                } else {
                    echo '<div class="alert alert-info" role="alert">
                    Non sono stati trovati i dati richiesti, riprova più tardi.
                  </div>';
                }
                ?>
            </tbody>
        </table>
        <form action="../../includes/logic/hold.php" method="post">
            <button type="submit" name="bt_add_ord" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi</button>
        </form>
    </div>


    <?php include('../../includes/layout/footer.php'); ?>