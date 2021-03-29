<?php

include('../../config.php');
include(INCLUDE_PATH . '/logic/common_functions.php');

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

    <?php
    if (isset($_SESSION['role']) && ($_SESSION['role'] == "culinario")) {
        include('../../includes/layout/culinario_navbar.php');
    } else {
        include('../../includes/layout/servizio_navbar.php');
    }
    ?>

    <div class="container p-4">
        <h1>Dettagli comanda
            <?php
            $id_comanda = $_SESSION['id_comanda'];
            echo $id_comanda;
            ?>
        </h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Piatto</th>
                    <th scope="col">Prezzo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = visualizzaPiatto($id_comanda);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <tr>
                            <td>' . $row["nome"] . '</td>
                            <td>' . $row["prezzo"] . ' €</td>
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
                <tr>
                    <th scope="col">Totale</th>
                    <th scope="col">Prezzo</th>
                </tr>
                <?php
                $result = scontrino($conn, $id_comanda);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <tr>
                            <td>Totale</td>
                            <td>' . $row["totale"] . ' €</td>
                            </tr>
                            ';
                        if (!empty($_SESSION['error'])) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            echo '</div>';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <form action="../../includes/logic/hold.php" method="post">
            <button type="submit" name="bt_add_com" class="btn btn-success"><i class="fas fa-plus"></i> Aggiungi</button>
        </form>
    </div>

    <?php include('../../includes/layout/footer.php'); ?>