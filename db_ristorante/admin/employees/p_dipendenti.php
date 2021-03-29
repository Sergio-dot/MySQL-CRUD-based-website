<?php

include('../../config.php');
include(ROOT_PATH . '/includes/logic/common_functions.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione dipendenti</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/stylePage.css">
</head>

<body>

    <?php include(INCLUDE_PATH . '/layout/admin_navbar.php'); ?>

    <h1 class="text-center p-4">Pannello di gestione del personale</h1>
    <div class="containter d-flex justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <br />
            <ul class="list-group">
                <a href="p_culinario.php" class="list-group-item">Personale culinario</a>
                <a href="p_servizio.php" class="list-group-item">Personale di servizio</a>
                <a href="p_fornitore.php" class="list-group-item">Fornitori</a>
            </ul>
        </div>
    </div>

    <?php include(INCLUDE_PATH . '/layout/footer.php'); ?>