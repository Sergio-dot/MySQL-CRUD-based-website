<?php

include('../../config.php');
include(INCLUDE_PATH . '/logic/common_functions.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione prenotazioni</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/stylePage.css">
</head>

<body>

    <?php include('../../includes/layout/servizio_navbar.php'); ?>

    <div class="container p-4">
        <h1>Gestione prenotazioni</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Tavolo n°</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = visualizzaPrenotazione();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <tr>
                            <td>' . $row["id_tavolo"] . '</td>
                            <td>' . $row["nome"] . '</td>
                            <td>' . $row["cognome"] . '</td>
                            <td>' . $row["data"] . '</td>
                            <form action="../../includes/logic/hold.php" method="post">
                                <td>
                                <button title="Elimina" type="submit" class="btn btn-danger p-2" value="' . $row["id_prenotazione"] . '" name="bt_del_prn"><i class="fas fa-trash-alt"></i></button>
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
            <button type="submit" name="bt_add_prn" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi</button>
        </form>
    </div>


    <?php include('../../includes/layout/footer.php'); ?>