<?php
$pageTitle = "Dashboard";
require_once '../includes/db.php';
if (!isLoggedIn()) { header("Location: ../index.php"); exit(); }

// Stats
$total_clientes = $mysqli->query("SELECT COUNT(*) as c FROM clientes")->fetch_assoc()['c'];
$total_apolices = $mysqli->query("SELECT COUNT(*) as c FROM apolices")->fetch_assoc()['c'];
$apolices_ativas = $mysqli->query("SELECT COUNT(*) as c FROM apolices WHERE status='Ativa'")->fetch_assoc()['c'];
$sinistros = $mysqli->query("SELECT COUNT(*) as c FROM apolices WHERE status='Sinistro'")->fetch_assoc()['c'];

// Recent policies
$recent = $mysqli->query("SELECT a.codigo, a.tipo, a.status, a.premio_mensal, c.nome 
    FROM apolices a JOIN clientes c ON a.cliente_id = c.id ORDER BY a.id DESC LIMIT 8");

include '../includes/layout/header.php';
include '../includes/layout/sidebar.php';
include '../includes/layout/topbar.php';
?>

<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-users"></i></div>
        <div class="stat-value"><?= $total_clientes ?></div>
        <div class="stat-label">Clientes Cadastrados</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-file-contract"></i></div>
        <div class="stat-value"><?= $total_apolices ?></div>
        <div class="stat-label">Total de Apólices</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow"><i class="fas fa-check-circle"></i></div>
        <div class="stat-value"><?= $apolices_ativas ?></div>
        <div class="stat-label">Apólices Ativas</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon red"><i class="fas fa-triangle-exclamation"></i></div>
        <div class="stat-value"><?= $sinistros ?></div>
        <div class="stat-label">Sinistros Abertos</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Apólices Recentes</h3>
        <a href="policies.php" class="btn btn-outline btn-sm">Ver Todas →</a>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Segurado</th>
                        <th>Tipo</th>
                        <th>Prêmio Mensal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $recent->fetch_assoc()): ?>
                    <tr>
                        <td><code style="background: var(--surface-alt); padding: 2px 8px; border-radius: 4px; font-size: 0.75rem;"><?= htmlspecialchars($row['codigo']) ?></code></td>
                        <td style="font-weight: 600;"><?= htmlspecialchars($row['nome']) ?></td>
                        <td><?= htmlspecialchars($row['tipo']) ?></td>
                        <td>R$ <?= number_format($row['premio_mensal'], 2, ',', '.') ?></td>
                        <td><span class="badge <?= badgeClass($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></span></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/layout/footer.php'; ?>
