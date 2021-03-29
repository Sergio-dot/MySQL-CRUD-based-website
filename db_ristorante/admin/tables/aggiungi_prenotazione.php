<?php

include('../../config.php');
include(ROOT_PATH . '/includes/logic/common_functions.php');

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

    <?php include(INCLUDE_PATH . '/layout/servizio_navbar.php'); ?>

    <div class="container p-4 w-50">
        <h1>Modulo di creazione</h1>
        <h5><small class="text-muted">Compila il modulo per creare una nuova prenotazione.</small></h5>
        <form action="../../includes/logic/hold.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome" placeholder="Inserisci il nome del cliente">
            </div>
            <div class="form-group">
                <label>Cognome</label>
                <input class="form-control" type="text" name="cognome" placeholder="Inserisci il cognome del cliente">
            </div>
            <div class="form-group">
                <label>Tavolo</label>
                <input class="form-control" type="text" name="tavolo" placeholder="Inserisci il tavolo del cliente">
            </div>
            <div class="form-group">
                <label>Data</label>
                <input class="form-control" type="text" name="data" placeholder="Inserisci la data nel formato Y-M-D h:m">
            </div>
            <button type="submit" name="bt_conf_add_prn" class="btn btn-primary mt-2">Conferma</button>
        </form>
    </div>

    <?php include(INCLUDE_PATH . '/layout/footer.php'); ?>