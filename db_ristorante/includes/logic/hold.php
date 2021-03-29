<?php

include('../../config.php');
include(INCLUDE_PATH . '/logic/common_functions.php');

// AZIONE: eliminazione ristorante
if (isset($_POST['bt_del_rist'])) {
    $id_ristorante = $_POST['bt_del_rist'];

    eliminaRistorante($conn, $id_ristorante);
    header('location: ../../admin/restaurant/p_ristorante.php');
}

// AZIONE: modifica ristorante
if (isset($_POST['bt_mod_rist'])) {
    $id_ristorante = $_POST['bt_mod_rist'];
    $_SESSION['id_mod'] = $id_ristorante;

    header('location: ../../admin/restaurant/p_modifica_ristorante.php');
}

if (isset($_POST['bt_conf_mod_rist'])) {
    $nome = $_POST['nome_ristorante'];
    $recapito = $_POST['recapito'];
    $id_ristorante = $_SESSION['id_mod'];

    modificaRistorante($conn, $id_ristorante, $nome, $recapito);
    header('location: ../../admin/restaurant/p_ristorante.php');
}

// AZIONE: aggiunta ristorante
if (isset($_POST['bt_add_rist'])) {
    header('location: ../../admin/restaurant/p_aggiungi_ristorante.php');
}

if (isset($_POST['bt_conf_add_rist'])) {
    $nome = $_POST['nome_ristorante'];
    $recapito = $_POST['recapito'];

    aggiungiRistorante($conn, $nome, $recapito);
    header('location: ../../admin/restaurant/p_ristorante.php');
}

// AZIONE: eliminazione personale culinario
if (isset($_POST['bt_del_cul'])) {
    $id_culinario = $_POST['bt_del_cul'];

    eliminaCulinario($conn, $id_culinario);
    header('location: ../../admin/employees/p_culinario.php');
}

// AZIONE: aggiunta personale culinario
if (isset($_POST['bt_add_cul'])) {
    header('location: ../../admin/employees/p_aggiungi_culinario.php');
}

if (isset($_POST['bt_conf_add_cul'])) {
    $nome = $_POST['nome_culinario'];
    $cognome = $_POST['cognome_culinario'];
    $email = $_POST['email_culinario'];
    $data = $_POST['data_culinario'];
    $username = $_POST['username_culinario'];
    $password = md5($_POST['pass_culinario']);

    aggiungiCulinario($conn, $nome, $cognome, $email, $username, $password, $data);
    header('location: ../../admin/employees/p_culinario.php');
}

// AZIONE: modifica personale culinario
if (isset($_POST['bt_mod_cul'])) {
    $id_culinario = $_POST['bt_mod_cul'];
    $_SESSION['id_mod'] = $id_culinario;

    header('location: ../../admin/employees/p_modifica_culinario.php');
}

if (isset($_POST['bt_conf_mod_cul'])) {
    $nome = $_POST['nome_culinario'];
    $cognome = $_POST['cognome_culinario'];
    $email = $_POST['email_culinario'];
    $data = $_POST['data_culinario'];
    $username = $_POST['username_culinario'];
    $password = md5($_POST['pass_culinario']);
    $turno = $_POST['turno'];
    $id_culinario = $_SESSION['id_mod'];

    modificaCulinario($conn, $id_culinario, $nome, $cognome, $email, $username, $password, $data, $turno);
    header('location: ../../admin/employees/p_culinario.php');
}

// AZIONE: eliminazione personale servizio
if (isset($_POST['bt_del_srv'])) {
    $id_servizio = $_POST['bt_del_srv'];

    eliminaServizio($conn, $id_servizio);
    header('location: ../../admin/employees/p_servizio.php');
}

// AZIONE: aggiunta personale servizio
if (isset($_POST['bt_add_srv'])) {
    header('location: ../../admin/employees/p_aggiungi_servizio.php');
}

if (isset($_POST['bt_conf_add_srv'])) {
    $nome = $_POST['nome_servizio'];
    $cognome = $_POST['cognome_servizio'];
    $email = $_POST['email_servizio'];
    $data = $_POST['data_servizio'];
    $username = $_POST['username_servizio'];
    $password = md5($_POST['pass_servizio']);

    aggiungiServizio($conn, $nome, $cognome, $email, $username, $password, $data);
    header('location: ../../admin/employees/p_servizio.php');
}

// AZIONE: modifica personale servizio
if (isset($_POST['bt_mod_srv'])) {
    $id_servizio = $_POST['bt_mod_srv'];
    $_SESSION['id_mod'] = $id_servizio;

    header('location: ../../admin/employees/p_modifica_servizio.php');
}

if (isset($_POST['bt_conf_mod_srv'])) {
    $nome = $_POST['nome_servizio'];
    $cognome = $_POST['cognome_servizio'];
    $email = $_POST['email_servizio'];
    $data = $_POST['data_servizio'];
    $username = $_POST['username_servizio'];
    $password = md5($_POST['pass_servizio']);
    $id_servizio = $_SESSION['id_mod'];

    modificaServizio($conn, $id_servizio, $nome, $cognome, $email, $username, $password, $data);
    header('location: ../../admin/employees/p_servizio.php');
}

// AZIONE: eliminazione ordine
if (isset($_POST['bt_del_ord'])) {
    $id_ordine = $_POST['bt_del_ord'];

    eliminaOrdine($conn, $id_ordine);
    header('location: ../../admin/orders/p_ordine.php');
}

// AZIONE: aggiunta ordine
if (isset($_POST['bt_add_ord'])) {
    header('location: ../../admin/orders/p_aggiungi_ordine.php');
}

if (isset($_POST['bt_conf_add_ord'])) {
    $data = date("Y-m-d");
    $id_amministrativo = $_SESSION['session_user'];
    $ingrediente = $_POST['nome_ingrediente'];
    $quantita = $_POST['quantita'];


    aggiungiOrdine($conn, $id_amministrativo, $ingrediente, $quantita, $data);
    header('location: ../../admin/orders/p_ordine.php');
}

// AZIONE: accetta ordine
if (isset($_POST['bt_acc_ord'])) {
    $id_ordine = $_POST['bt_acc_ord'];
    $stato = $_POST["hiddenStato"];
    $id_fornitore = $_SESSION['session_user'];

    if ($stato == 'In attesa') {
        accettaOrdine($conn, $id_ordine, $id_fornitore);
        header('location: ../../admin/orders/p_ordine_fornitore.php');
    } else {
        $_SESSION['error'] = "L'ordine è gia stato consegnato.";
        header('location: ../../admin/orders/p_ordine_fornitore.php');
    }
}

// AZIONE: conferma ordine consegnato
if (isset($_POST['bt_conf_ord'])) {
    $id_ordine = $_POST['bt_conf_ord'];
    $stato = $_POST["hiddenStato"];
    $ingrediente = $_POST["hiddenIngrediente"];
    $quantita = $_POST["hiddenQuantita"];

    if ($stato == 'Preso in carico') {
        consegnaOrdine($conn, $id_ordine);
        aggiornaIngrediente($conn, $id_ordine, $ingrediente, $quantita);
        header('location: ../../admin/orders/p_ordine_fornitore.php');
    } else {
        $_SESSION['error'] = "L'ordine deve essere prima preso in carico.";
        header('location: ../../admin/orders/p_ordine_fornitore.php');
    }
}

// AZIONE: eliminazione fornitore
if (isset($_POST['bt_del_for'])) {
    $id_fornitore = $_POST['bt_del_for'];

    eliminaFornitore($conn, $id_fornitore);
    header('location: ../../admin/employees/p_fornitore.php');
}

// AZIONE: aggiunta fornitore
if (isset($_POST['bt_add_for'])) {
    header('location: ../../admin/employees/p_aggiungi_fornitore.php');
}

if (isset($_POST['bt_conf_add_for'])) {
    $nome = $_POST['nome_fornitore'];
    $email = $_POST['email_fornitore'];
    $username = $_POST['username_fornitore'];
    $password = md5($_POST['pass_fornitore']);

    aggiungiFornitore($conn, $nome, $email, $username, $password);
    header('location: ../../admin/employees/p_fornitore.php');
}

// AZIONE: modifica fornitore
if (isset($_POST['bt_mod_for'])) {
    $id_fornitore = $_POST['bt_mod_for'];
    $_SESSION['id_mod'] = $id_fornitore;

    header('location: ../../admin/employees/p_modifica_fornitore.php');
}

if (isset($_POST['bt_conf_mod_for'])) {
    $nome = $_POST['nome_fornitore'];
    $email = $_POST['email_fornitore'];
    $username = $_POST['username_fornitore'];
    $password = md5($_POST['pass_fornitore']);
    $id_fornitore = $_SESSION['id_mod'];

    modificaFornitore($conn, $id_fornitore, $nome, $email, $username, $password);
    header('location: ../../admin/employees/p_fornitore.php');
}

// AZIONE: apri segnalazione
if (isset($_POST['bt_opn_seg'])) {
    $id_culinario = $_SESSION['session_user'];
    $data = date("Y-m-d");
    $ingrediente = $_POST['hiddenIngrediente'];

    inserisciSegnalazione($conn, $id_culinario, $data, $ingrediente);
    header('location: ../../admin/rooms/magazzino.php');
}

// AZIONE: elimina segnalazione
if (isset($_POST['bt_del_seg'])) {
    $id_segnalazione = $_POST['bt_del_seg'];

    eliminaSegnalazione($conn, $id_segnalazione);
    header('location: ../../admin/orders/p_segnalazione.php');
}

// AZIONE: aggiungi ingrediente al magazzino
if (isset($_POST['bt_add_ing'])) {
    header('location: ../../admin/orders/p_aggiungi_ingrediente.php');
}

if (isset($_POST['bt_conf_add_ing'])) {
    $categoria = $_POST['nome_categoria'];
    $ingrediente = $_POST['nome_ingrediente'];
    $quantita = $_POST['quantita'];

    aggiungiIngrediente($conn, $categoria, $ingrediente, $quantita);
    header('location: ../../admin/rooms/magazzino.php');
}

// AZIONE: elimina prenotazione
if (isset($_POST['bt_del_prn'])) {
    $id_prenotazione = $_POST['bt_del_prn'];

    eliminaPrenotazione($conn, $id_prenotazione);
    header('location: ../../admin/tables/prenotazione.php');
}

// AZIONE: aggiungi prenotazione
if (isset($_POST['bt_add_prn'])) {
    header('location: ../../admin/tables/aggiungi_prenotazione.php');
}

if (isset($_POST['bt_conf_add_prn'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $data = $_POST['data'];
    $tavolo = $_POST['tavolo'];

    aggiungiPrenotazione($conn, $nome, $cognome, $data, $tavolo);
    header('location: ../../admin/tables/prenotazione.php');
}

// AZIONE: elimina tavolo
if (isset($_POST['bt_del_tav'])) {
    $id_tavolo = $_POST['bt_del_tav'];

    eliminaTavolo($conn, $id_tavolo);
    header('location: ../../admin/tables/tavolo.php');
}

// AZIONE: aggiungi tavolo
if (isset($_POST['bt_add_tav'])) {
    header('location: ../../admin/tables/aggiungi_tavolo.php');
}

if (isset($_POST['bt_conf_add_tav'])) {
    $sala = $_POST['sala'];
    $posti = $_POST['posti'];

    aggiungiTavolo($conn, $sala, $posti);
    header('location: ../../admin/tables/tavolo.php');
}

// AZIONE: elimina comanda
if (isset($_POST['bt_del_com'])) {
    $id_comanda = $_POST['bt_del_com'];

    eliminaComanda($conn, $id_comanda);
    header('location: ../../admin/tables/comanda.php');
}

// AZIONE: aggiungi comanda
if (isset($_POST['bt_add_com'])) {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'servizio')) {
        header('location: ../../admin/tables/aggiungi_comanda.php');
    } else {
        $_SESSION['error'] = "Non sei autorizzato ad eseguire quest'operazione";
        header('location: ../../admin/tables/comanda.php');
    }
}

if (isset($_POST['bt_conf_add_com'])) {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'servizio')) {
        $id_tavolo = $_POST['num_tavolo'];
        $id_servizio = $_SESSION['session_user'];
        $data = date("Y-m-d H:i");

        aggiungiComanda($conn, $id_tavolo, $id_servizio, $data);
        header('location: ../../admin/tables/comanda.php');
    } else {
        $_SESSION['error'] = "Non sei autorizzato ad eseguire quest'operazione";
        header('location: ../../admin/tables/comanda.php');
    }
}

// AZIONE: aggiungi piatto alla comanda
if (isset($_POST['bt_fill_com'])) {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'servizio')) {
        $id_comanda = $_POST['bt_fill_com'];
        $_SESSION['id_comanda'] = $id_comanda;

        header('location: ../../admin/tables/aggiungi_piatto.php');
    } else {
        $_SESSION['error'] = "Non sei autorizzato ad eseguire quest'operazione";
        header('location: ../../admin/tables/comanda.php');
    }
}

if (isset($_POST['bt_conf_fill_com'])) {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'servizio')) {
        $id_comanda = $_SESSION['id_comanda'];
        $id_menu = $_POST['menu'];

        aggiungiPiatto($conn, $id_comanda, $id_menu);
        header('location: ../../admin/tables/comanda.php');
    } else {
        $_SESSION['error'] = "Non sei autorizzato ad eseguire quest'operazione";
        header('location: ../../admin/tables/comanda.php');
    }
}

// AZIONE: visualizza dettagli comanda
if (isset($_POST['bt_check_com'])) {
    $_SESSION['id_comanda'] = $_POST['bt_check_com'];
    header('location: ../../admin/tables/comanda_details.php');
}

// AZIONE: contrassegna piatto come 'Pronto'
if (isset($_POST['bt_up_piatto'])) {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'culinario')) {
        $id_piatto = $_POST['bt_up_piatto'];
        aggiornaPiatto($conn, $id_piatto);
        header('location: ../../admin/tables/comanda_details.php');
    } else {
        $_SESSION['error'] = "Non sei autorizzato ad eseguire quest'operazione";
        header('location: ../../admin/tables/comanda_details.php');
    }
}

// AZIONE: elimina piatto dalla comanda
if (isset($_POST['bt_del_piatto'])) {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'servizio')) {
        $id_piatto = $_POST['bt_del_piatto'];
        eliminaPiatto($conn, $id_piatto);
        header('location: ../../admin/tables/comanda_details.php');
    } else {
        $_SESSION['error'] = "Non sei autorizzato ad eseguire quest'operazione";
        header('location: ../../admin/tables/comanda_details.php');
    }
}

// AZIONE: calcolo scontrino
if (isset($_POST['bt_pay'])) {
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'servizio')) {
        $_SESSION['id_comanda'] = $_POST['bt_pay'];
        header('location: ../../admin/tables/bill.php');
    } else {
        $_SESSION['error'] = "Non sei autorizzato ad eseguire quest'operazione";
        header('location: ../../admin/tables/comanda.php');
    }
}