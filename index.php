<?php
require_once 'includes/db.php';

if (isLoggedIn()) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // VULNERÁVEL: SQL Injection (Login Bypass)
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Credenciais inválidas. Verifique seu ID corporativo e senha.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Seguros Confiáveis</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="auth-page">
        <div class="auth-visual">
            <h2>Seguros Confiáveis</h2>
            <p>Plataforma corporativa de gestão de apólices, sinistros e clientes. Acesso restrito a colaboradores
                autorizados.</p>
        </div>

        <div class="auth-form-side">
            <div class="auth-form-container">
                <div class="auth-logo">
                    <div class="logo-icon"><i class="fas fa-shield-halved"></i></div>
                    <div>
                        <h1>Seguros Confiáveis</h1>
                        <span>Portal Corporativo v3.2.1</span>
                    </div>
                </div>

                <?php if ($error): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-circle-exclamation"></i> <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-group">
                        <label class="form-label">ID Corporativo</label>
                        <input type="text" name="username" class="form-input" placeholder="usuário ou e-mail" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Senha</label>
                        <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="width: 100%; padding: 0.75rem; font-size: 0.9rem;">
                        <i class="fas fa-arrow-right-to-bracket"></i> Entrar no Sistema
                    </button>
                </form>

                <div
                    style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); text-align: center;">
                    <h1
                        style="color: var(--primary-color); font-size: 1.75rem; letter-spacing: -0.05em; margin-bottom: 0.5rem;">
                        SEGUROS CONFIÁVEIS</h1>
                    Sistema de uso interno. Acesso monitorado.<br>
                    IP registrado: <?= $_SERVER['REMOTE_ADDR'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>