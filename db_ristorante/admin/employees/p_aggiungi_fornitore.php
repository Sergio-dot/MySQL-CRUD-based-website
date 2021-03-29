<?php

include('../../config.php');
include(ROOT_PATH . '/includes/logic/common_functions.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione fornitori</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/stylePage.css">
</head>

<body>

    <?php include(INCLUDE_PATH . '/layout/admin_navbar.php'); ?>

    <div class="container p-4 w-50">
        <h1>Modulo di creazione</h1>
        <h5><small class="text-muted">Compila il form con le informazioni richieste per aggiungere un fornitore</small></h5>
        <form action="../../includes/logic/hold.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome_fornitore" placeholder="Inserisci il nome del fornitore">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email_fornitore" placeholder="Inserisci l'email del fornitore">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username_fornitore" placeholder="Inserisci username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pass_fornitore" placeholder="Inserisci password">
            </div>
            <button type="submit" name="bt_conf_add_for" class="btn btn-primary mt-2">Conferma</button>
        </form>
    </div>

    <?php include(INCLUDE_PATH . '/layout/footer.php'); ?>