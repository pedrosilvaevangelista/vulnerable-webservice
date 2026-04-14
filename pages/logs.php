<?php
$pageTitle = "Auditoria de Logs";
require_once '../includes/db.php';
if (!isLoggedIn()) { header("Location: ../index.php"); exit(); }

// VULNERÁVEL: Local File Inclusion (LFI)
$page = $_GET['page'] ?? '../storage/logs/system.log';

include '../includes/layout/header.php';
include '../includes/layout/sidebar.php';
include '../includes/layout/topbar.php';
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Documento: <?= htmlspecialchars($page) ?></h3>
        <div style="display: flex; gap: 10px;">
            <a href="logs.php?page=../storage/logs/system.log" class="btn btn-outline btn-sm">Logs</a>
            <a href="logs.php?page=../infra/legal.txt" class="btn btn-outline btn-sm">Termos</a>
        </div>
    </div>
    <div class="card-body">
        <div class="file-viewer">
            <?php 
            // A vulnerabilidade ocorre aqui ao usar include() diretamente com entrada do usuário
            if ($page) {
                // Tentativa de inclusão de arquivo local
                include($page); 
            }
            ?>
        </div>
    </div>
</div>

<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> <strong>Nota:</strong> Este visualizador é utilizado para auditar registros de sistema e documentos internos (.txt, .log).
</div>

<?php include '../includes/layout/footer.php'; ?>
