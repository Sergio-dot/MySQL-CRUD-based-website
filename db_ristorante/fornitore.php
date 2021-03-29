<?php include('config.php'); ?>
<?php
if(isset($_SESSION['role']) && !($_SESSION['role'] == "fornitore")) {
    header('location: index.html');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Fornitore</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/stylePage.css">
</head>

<body>

    <?php include(INCLUDE_PATH . '/layout/fornitore_navbar.php'); ?>

    <h1 class="text-center p-4">Pannello di controllo</h1>
    <div class="containter d-flex justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <br />
            <ul class="list-group">
                <a href="<?php echo BASE_URL . '/admin/orders/p_ordine_fornitore.php' ?>" class="list-group-item">Ordini</a>
            </ul>
        </div>
    </div>

    <?php include(INCLUDE_PATH . '/layout/footer.php'); ?>