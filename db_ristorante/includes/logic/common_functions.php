<?php

function authentication($username)
{
    global $conn;

    // query su amministrativo
    $sql = "SELECT * FROM amministrativo WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_POST['role'] = 'amministrativo';
        return $result;
    }

    // query su servizio
    $sql = "SELECT * FROM servizio WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_POST['role'] = 'servizio';
        return $result;
    }

    // query su culinario
    $sql = "SELECT * FROM culinario WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_POST['role'] = 'culinario';
        return $result;
    }

    // query su fornitore
    $sql = "SELECT * FROM fornitore WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_POST['role'] = 'fornitore';
        return $result;
    }
}

function visualizzaRistorante()
{
    global $conn;

    // query su ristorante
    $sql = "SELECT * FROM ristorante";

    $result = $conn->query($sql);
    return $result;
}

function eliminaRistorante($conn, $id_ristorante)
{

    // query su ristorante
    $sql = "DELETE FROM ristorante WHERE id_ristorante = $id_ristorante";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function modificaRistorante($conn, $id_ristorante, $nome, $recapito)
{

    // query su ristorante
    $sql = "UPDATE ristorante SET nome = '$nome', recapito = '$recapito' WHERE id_ristorante = $id_ristorante";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiRistorante($conn, $nome, $recapito)
{

    // query sul ristorante
    $sql = "INSERT INTO ristorante(nome, recapito) VALUES ('$nome', '$recapito')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaServizio()
{
    global $conn;

    // query su servizio
    $sql = "SELECT servizio.id_servizio, servizio.nome, servizio.cognome,
            servizio.email, servizio.data_nascita, turno.ora_inizio, turno.ora_fine
            FROM servizio 
            INNER JOIN turno 
            ON servizio.id_turno = turno.id_turno";

    $result = $conn->query($sql);
    return $result;
}

function visualizzaCulinario()
{
    global $conn;

    // query su culinario
    $sql = "SELECT culinario.id_culinario, culinario.nome, culinario.cognome,
            culinario.email, culinario.data_nascita, turno.ora_inizio, turno.ora_fine
            FROM culinario 
            INNER JOIN turno 
            ON culinario.id_turno = turno.id_turno";

    $result = $conn->query($sql);
    return $result;
}

function visualizzaTurno()
{
    global $conn;

    // query su turno
    $sql = "SELECT * FROM turno";

    $result = $conn->query($sql);
    return $result;
}

function eliminaCulinario($conn, $id_culinario)
{
    // query su culinario
    $sql = "DELETE FROM culinario WHERE id_culinario = $id_culinario";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiCulinario($conn, $nome, $cognome, $email, $username, $password, $data)
{

    // query su culinario
    $sql = "INSERT INTO culinario(nome, cognome, email, username, password, data_nascita) VALUES ('$nome', '$cognome', '$email', '$username', '$password', '$data')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function modificaCulinario($conn, $id_culinario, $nome, $cognome, $email, $username, $password, $data, $turno)
{

    // query su culinario
    $sql = "UPDATE culinario SET nome = '$nome', cognome = '$cognome', email = '$email',
            username = '$username', password = '$password', data_nascita = '$data', id_turno = '$turno'
            WHERE id_culinario = $id_culinario";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function eliminaServizio($conn, $id_servizio)
{
    // query su servizio
    $sql = "DELETE FROM servizio WHERE id_servizio = $id_servizio";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiServizio($conn, $nome, $cognome, $email, $username, $password, $data)
{

    // query su servizio
    $sql = "INSERT INTO servizio(nome, cognome, email, username, password, data_nascita) VALUES ('$nome', '$cognome', '$email', '$username', '$password', '$data')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function modificaServizio($conn, $id_servizio, $nome, $cognome, $email, $username, $password, $data)
{

    // query su servizio
    $sql = "UPDATE servizio SET nome = '$nome', cognome = '$cognome', email = '$email', username = '$username', password = '$password', data_nascita = '$data' 
    WHERE id_servizio = $id_servizio";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaOrdine()
{
    global $conn;

    // query su ordine
    $sql = "SELECT * FROM ordine ORDER BY stato DESC";

    $result = $conn->query($sql);
    return $result;
}

function eliminaOrdine($conn, $id_ordine)
{
    // query su ordine
    $sql = "DELETE FROM ordine WHERE id_ordine = $id_ordine";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiOrdine($conn, $id_amministrativo, $ingrediente, $quantita, $data)
{

    // query su ordine
    $sql = "INSERT INTO ordine(id_amministrativo, ingrediente, quantita, data) VALUES ('$id_amministrativo', '$ingrediente', '$quantita' , '$data')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaIngrediente()
{
    global $conn;

    // query su ingrediente
    $sql = "SELECT * FROM ingrediente";

    $result = $conn->query($sql);
    return $result;
}

function accettaOrdine($conn, $id_ordine, $id_fornitore)
{

    // query su ordine
    $sql = "UPDATE ordine SET id_fornitore = '$id_fornitore', stato = '1' WHERE id_ordine = '$id_ordine'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function consegnaOrdine($conn, $id_ordine)
{

    // query su ordine
    $sql = "UPDATE ordine SET stato = '2' WHERE id_ordine = '$id_ordine'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiornaIngrediente($conn, $id_ordine, $ingrediente, $quantita)
{
    $result = trovaIdMagazzino();
    $row = $result->fetch_assoc();
    $id_magazzino = $row['id_ambiente'];

    // query su ingrediente
    $sql = "UPDATE ingrediente SET id_ambiente = '$id_magazzino', id_ordine = '$id_ordine', quantita = quantita + '$quantita' WHERE nome = '$ingrediente'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaFornitore()
{
    global $conn;

    // query su fornitore
    $sql = "SELECT * FROM fornitore";

    $result = $conn->query($sql);
    return $result;
}

function eliminaFornitore($conn, $id_fornitore)
{
    // query su fornitore
    $sql = "DELETE FROM fornitore WHERE id_fornitore = $id_fornitore";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiFornitore($conn, $nome, $email, $username, $password)
{

    // query su fornitore
    $sql = "INSERT INTO fornitore(nome, email, username, password) VALUES ('$nome', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function modificaFornitore($conn, $id_fornitore, $nome, $email, $username, $password)
{

    // query su fornitore
    $sql = "UPDATE fornitore SET nome = '$nome', email = '$email', username = '$username', password = '$password' 
    WHERE id_fornitore = $id_fornitore";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaSegnalazione()
{
    global $conn;

    $sql = "SELECT * FROM segnalazione";

    $result = $conn->query($sql);
    return $result;
}

function eliminaSegnalazione($conn, $id_segnalazione)
{
    // query su segnalazione
    $sql = "DELETE FROM segnalazione WHERE id_segnalazione = $id_segnalazione";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function inserisciSegnalazione($conn, $id_culinario, $data, $ingrediente)
{

    $result = trovaIdMagazzino();
    $row = $result->fetch_assoc();
    $id_ambiente = $row['id_ambiente'];

    // query su segnalazione
    $sql = "INSERT INTO segnalazione(id_culinario, id_ambiente, data, ingrediente) VALUES ('$id_culinario', '$id_ambiente', '$data', '$ingrediente')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function trovaIdMagazzino()
{
    global $conn;

    // query su ambiente
    $sql = "SELECT id_ambiente FROM ambiente WHERE nome = 'Magazzino' LIMIT 1";
    $result = $conn->query($sql);
    if ($result) {
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return $result;
    }
}

function aggiungiIngrediente($conn, $categoria, $ingrediente, $quantita)
{
    $result = trovaIdMagazzino();
    $row = $result->fetch_assoc();
    $id_ambiente = $row['id_ambiente'];

    // query su ingrediente
    $sql = "INSERT INTO ingrediente(id_categoria, id_ambiente, nome, quantita) VALUES ('$categoria', '$id_ambiente', '$ingrediente', '$quantita')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaCategoria()
{
    global $conn;

    // query su categoria
    $sql = "SELECT * FROM categoria";

    $result = $conn->query($sql);
    if ($result) {
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return $result;
    }
}

function visualizzaTavolo()
{
    global $conn;

    // query su tavolo JOIN su ambiente
    $sql = "SELECT t.id_tavolo AS 'num_tavolo', t.posti AS 'posti', a.nome AS 'sala'
            FROM tavolo t, ambiente a
            WHERE t.id_ambiente = a.id_ambiente";

    $result = $conn->query($sql);
    if ($result) {
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return $result;
    }
}

function visualizzaPrenotazione()
{
    global $conn;

    // query su prenotazione
    $sql = "SELECT * FROM prenotazione";

    $result = $conn->query($sql);
    return $result;
}

function eliminaPrenotazione($conn, $id_prenotazione)
{

    // query su prenotazione
    $sql = "DELETE FROM prenotazione WHERE id_prenotazione = $id_prenotazione";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiPrenotazione($conn, $nome, $cognome, $data, $tavolo)
{

    // query su prenotazione
    $sql = "INSERT INTO prenotazione(nome, cognome, data, id_tavolo) VALUES ('$nome', '$cognome', '$data', '$tavolo')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function eliminaTavolo($conn, $id_tavolo)
{

    // query su tavolo
    $sql = "DELETE FROM tavolo WHERE id_tavolo = $id_tavolo";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiTavolo($conn, $sala, $posti)
{

    // query su tavolo
    $sql = "INSERT INTO tavolo(id_ambiente, posti) VALUES ('$sala', '$posti')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaComanda()
{
    global $conn;

    // query su comanda
    $sql = "SELECT * FROM comanda";

    $result = $conn->query($sql);
    return $result;
}

function eliminaComanda($conn, $id_comanda)
{

    // query su comanda
    $sql = "DELETE FROM comanda WHERE id_comanda = $id_comanda";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function aggiungiComanda($conn, $id_tavolo, $id_servizio, $data)
{

    // query su comanda
    $sql = "INSERT INTO comanda(id_tavolo, id_servizio, data) VALUES ('$id_tavolo', '$id_servizio', '$data')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaMenu()
{
    global $conn;

    // query su menu
    $sql = "SELECT * FROM menu";

    $result = $conn->query($sql);
    return $result;
}

function aggiungiPiatto($conn, $id_comanda, $id_menu)
{
    // query su piatto
    $sql = "INSERT INTO piatto(id_comanda, id_menu, stato) VALUES ('$id_comanda', '$id_menu', '0')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function visualizzaPiatto($id_comanda)
{
    global $conn;

    // query su piatto
    $sql = "SELECT menu.nome, menu.prezzo, piatto.id_piatto, piatto.stato
            FROM comanda INNER JOIN piatto ON comanda.id_comanda = piatto.id_comanda
            INNER JOIN menu ON piatto.id_menu = menu.id_menu
            WHERE comanda.id_comanda = '$id_comanda'";

    $result = $conn->query($sql);
    return $result;
}

function aggiornaPiatto($conn, $id_piatto)
{

    // query su piatto
    $sql = "UPDATE piatto SET stato = '1' WHERE id_piatto = '$id_piatto'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function eliminaPiatto($conn, $id_piatto)
{

    // query su piatto
    $sql = "DELETE FROM piatto WHERE id_piatto = $id_piatto";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function scontrino($conn, $id_comanda)
{
    // query per calcolare lo scontrino
    $sql = "SELECT menu.nome, menu.prezzo, piatto.id_piatto, piatto.stato, SUM(menu.prezzo) AS totale
    FROM comanda INNER JOIN piatto ON comanda.id_comanda = piatto.id_comanda
    INNER JOIN menu ON piatto.id_menu = menu.id_menu
    WHERE comanda.id_comanda = '$id_comanda'";

    $result = $conn->query($sql);
    return $result;
}
