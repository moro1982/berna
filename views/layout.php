<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
    if (!isset($inicio)) {
        $inicio = false;
    }
?>

<?php include __DIR__ . "/templates/header.php" ?>

<?php echo $contenido; ?>

<?php include __DIR__ . "/templates/footer.php" ?>