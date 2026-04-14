<?php
session_start();

$db_host = "db";
$db_user = "root";
$db_pass = "root";
$db_name = "confiavel_db";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Helpers
function isLoggedIn() {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
}

function badgeClass($status) {
    switch($status) {
        case 'Ativa': return 'badge-success';
        case 'Pendente': return 'badge-warning';
        case 'Sinistro': return 'badge-danger';
        case 'Cancelada': return 'badge-secondary';
        default: return '';
    }
}
?>
