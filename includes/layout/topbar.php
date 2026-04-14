<div class="main">
    <header class="topbar">
        <div class="page-info">
            <h2 class="page-title"><?= $pageTitle ?? "Portal" ?></h2>
        </div>
        <div class="user-menu">
            <div class="user-info">
                <div class="user-avatar"><?= substr($_SESSION['user'] ?? 'U', 0, 1) ?></div>
                <div class="user-details">
                    <div class="user-name"><?= $_SESSION['user'] ?? 'Usuário' ?></div>
                    <div class="user-role"><?= $_SESSION['role'] ?? 'Colaborador' ?></div>
                </div>
            </div>
            <a href="logout.php" title="Sair" style="color: var(--danger);"><i class="fas fa-right-from-bracket"></i></a>
        </div>
    </header>
    <div class="content">
