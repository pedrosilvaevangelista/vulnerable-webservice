<?php
$pageTitle = "Clientes";
require_once 'includes/db.php';
if (!isLoggedIn()) { header("Location: index.php"); exit(); }

$message = '';

// Adicionar Cliente
if (isset($_POST['add_customer'])) {
    $nome     = $_POST['nome'] ?? '';
    $email    = $_POST['email'] ?? '';
    $cpf      = $_POST['cpf'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';

    $foto = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $upload_dir = __DIR__ . "/storage/uploads/";
        $name = basename($_FILES['foto']['name']);
        $tmp = $_FILES['foto']['tmp_name'];
        // VULNERÁVEL: Insecure File Upload (sem validação de extensão)
        move_uploaded_file($tmp, "$upload_dir/$name");
        $foto = $name;
    }

    // VULNERÁVEL: SQL Injection (INSERT)
    $sql = "INSERT INTO clientes (nome, email, cpf, telefone, endereco, foto) 
            VALUES ('$nome','$email','$cpf','$telefone','$endereco','$foto')";
    if ($mysqli->query($sql)) {
        $message = "success|Cliente cadastrado com sucesso.";
    } else {
        $message = "error|Erro ao cadastrar: " . $mysqli->error;
    }
}

$clientes = $mysqli->query("SELECT * FROM clientes ORDER BY id DESC");

include 'includes/layout/header.php';
include 'includes/layout/sidebar.php';
include 'includes/layout/topbar.php';
?>

<?php if ($message): 
    $parts = explode('|', $message);
    $type = $parts[0]; $text = $parts[1];
?>
    <div class="alert alert-<?= $type ?>">
        <i class="fas fa-<?= $type === 'success' ? 'check-circle' : 'circle-xmark' ?>"></i> <?= htmlspecialchars($text) ?>
    </div>
<?php endif; ?>

<div style="display: grid; grid-template-columns: 1fr 380px; gap: 1.5rem; align-items: start;">
    <!-- Lista de Clientes -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Segurados</h3>
            <span style="font-size: 0.75rem; color: var(--text-muted);"><?= $clientes->num_rows ?> registros</span>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Segurado</th>
                            <th>Contato</th>
                            <th>CPF</th>
                            <th>Cidade</th>
                            <th>Doc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($c = $clientes->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <?php if ($c['foto']): 
                                        $is_external = (strpos($c['foto'], 'http') === 0);
                                        $is_assets = (strpos($c['foto'], 'assets/') === 0);
                                        $foto_path = ($is_external || $is_assets) ? $c['foto'] : "storage/uploads/" . $c['foto'];
                                    ?>
                                        <img src="<?= htmlspecialchars($foto_path) ?>" class="avatar-sm" onerror="this.style.display='none'">
                                    <?php endif; ?>
                                    <div>
                                        <div style="font-weight: 600;"><?= $c['nome'] ?></div>
                                        <div style="font-size: 0.7rem; color: var(--text-muted);"><?= $c['email'] ?></div>
                                    </div>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($c['telefone']) ?></td>
                            <td><code style="font-size: 0.75rem;"><?= htmlspecialchars($c['cpf']) ?></code></td>
                            <td style="font-size: 0.8rem;"><?= htmlspecialchars($c['endereco']) ?></td>
                            <td>
                                <?php if ($c['foto']): 
                                    $is_external = (strpos($c['foto'], 'http') === 0);
                                    $is_assets = (strpos($c['foto'], 'assets/') === 0);
                                    $foto_link = ($is_external || $is_assets) ? $c['foto'] : "storage/uploads/" . $c['foto'];
                                ?>
                                    <a href="<?= htmlspecialchars($foto_link) ?>" target="_blank" class="btn btn-outline btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                <?php else: ?>
                                    <span style="color: var(--text-light);">—</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Formulário de Cadastro -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Novo Segurado</h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Nome Completo</label>
                    <input name="nome" class="form-input" placeholder="Nome do segurado" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-input" placeholder="email@empresa.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">CPF</label>
                        <input name="cpf" class="form-input" placeholder="000.000.000-00" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Telefone</label>
                    <input name="telefone" class="form-input" placeholder="(00) 90000-0000">
                </div>
                <div class="form-group">
                    <label class="form-label">Endereço</label>
                    <input name="endereco" class="form-input" placeholder="Rua, número - Cidade/UF">
                </div>
                <div class="form-group">
                    <div class="upload-area">
                        <i class="fas fa-cloud-arrow-up"></i>
                        <p>Documento de identificação</p>
                        <input type="file" name="foto">
                    </div>
                </div>
                <button type="submit" name="add_customer" class="btn btn-primary" style="width: 100%;">
                    <i class="fas fa-user-plus"></i> Cadastrar Segurado
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/layout/footer.php'; ?>
