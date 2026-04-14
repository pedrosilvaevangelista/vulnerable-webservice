<?php
$pageTitle = "Apólices";
require_once '../includes/db.php';
if (!isLoggedIn()) { header("Location: ../index.php"); exit(); }

$search = $_GET['q'] ?? '';
$filter = $_GET['status'] ?? '';

// VULNERÁVEL: SQL Injection (UNION-based via busca)
$sql = "SELECT a.*, c.nome as segurado FROM apolices a JOIN clientes c ON a.cliente_id = c.id WHERE 1=1";
if ($search) {
    $sql .= " AND (a.codigo LIKE '%$search%' OR c.nome LIKE '%$search%' OR a.tipo LIKE '%$search%')";
}
if ($filter) {
    $sql .= " AND a.status = '$filter'";
}
$sql .= " ORDER BY a.id DESC";
$result = $mysqli->query($sql);

include '../includes/layout/header.php';
include '../includes/layout/sidebar.php';
include '../includes/layout/topbar.php';
?>

<?php if ($search): ?>
    <div class="alert alert-info">
        <i class="fas fa-search"></i> Resultados para: <strong><?= $search ?></strong>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Gestão de Apólices</h3>
        <div style="display: flex; gap: 0.75rem;">
            <form method="GET" class="search-box">
                <input type="text" name="q" placeholder="Buscar apólice, segurado..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
            </form>
            <div style="display: flex; gap: 4px;">
                <a href="policies.php" class="btn btn-outline btn-sm <?= !$filter ? 'btn-primary' : '' ?>">Todas</a>
                <a href="policies.php?status=Ativa" class="btn btn-outline btn-sm">Ativas</a>
                <a href="policies.php?status=Pendente" class="btn btn-outline btn-sm">Pendentes</a>
                <a href="policies.php?status=Sinistro" class="btn btn-outline btn-sm">Sinistros</a>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Segurado</th>
                        <th>Tipo de Seguro</th>
                        <th>Cobertura</th>
                        <th>Prêmio Mensal</th>
                        <th>Vigência</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><code style="background: var(--surface-alt); padding: 2px 8px; border-radius: 4px; font-size: 0.75rem;"><?= htmlspecialchars($row['codigo']) ?></code></td>
                            <td style="font-weight: 600;"><?= htmlspecialchars($row['segurado']) ?></td>
                            <td><?= htmlspecialchars($row['tipo']) ?></td>
                            <td>R$ <?= number_format($row['valor_cobertura'], 2, ',', '.') ?></td>
                            <td>R$ <?= number_format($row['premio_mensal'], 2, ',', '.') ?></td>
                            <td style="font-size: 0.75rem;">
                                <?= date('d/m/Y', strtotime($row['data_inicio'] ?? '')) ?> — <?= date('d/m/Y', strtotime($row['data_fim'] ?? '')) ?>
                            </td>
                            <td><span class="badge <?= badgeClass($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></span></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="fas fa-folder-open"></i>
                                    Nenhuma apólice encontrada com os critérios informados.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/layout/footer.php'; ?>
