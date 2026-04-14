<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="icon"><i class="fas fa-shield-halved"></i></div>
        <h1>SEGUROS CONFIÁVEIS</h1>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-section-title">Principal</div>
            <a href="dashboard.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a href="customers.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'active' : '' ?>">
                <i class="fas fa-users"></i> Clientes
            </a>
            <a href="policies.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'policies.php' ? 'active' : '' ?>">
                <i class="fas fa-file-contract"></i> Apólices
            </a>
        </div>
        <div class="nav-section">
            <div class="nav-section-title">Relatórios & Sist.</div>
            <a href="logs.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'logs.php' ? 'active' : '' ?>">
                <i class="fas fa-clipboard-list"></i> Auditoria de Logs
            </a>
            <a href="settings.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : '' ?>">
                <i class="fas fa-cog"></i> Configurações
            </a>
        </div>
    </nav>
    <div class="sidebar-footer">
        Seguros Confiáveis S.A. &copy; 2026<br>
        v3.2.1-stable
    </div>
</aside>
