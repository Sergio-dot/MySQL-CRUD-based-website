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
                    <th scope="col">Stato</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = visualizzaPiatto($id_comanda);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['stato'] == 0) {
                            $row['stato'] = 'In preparazione';
                        } else if ($row['stato'] == 1) {
                            $row['stato'] = 'Pronto';
                        }
                        echo '
                            <tr>
                            <td>' . $row["nome"] . '</td>
                            <td>' . $row["prezzo"] . ' €</td>
                            <td>' . $row["stato"] . '</td>
                            <form action="../../includes/logic/hold.php" method="post">
                                <td>
                                <button title="Cambia stato a \'Pronto\'" type="submit" class="btn btn-primary p-2" value="' . $row["id_piatto"] . '" name="bt_up_piatto"><i class="fas fa-check"></i></button>
                                <button title="Elimina" type="submit" class="btn btn-danger p-2" value="' . $row["id_piatto"] . '" name="bt_del_piatto"><i class="fas fa-trash-alt"></i></button>
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