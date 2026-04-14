<?php
$pageTitle = "Configurações";
require_once '../includes/db.php';
if (!isLoggedIn()) { header("Location: ../index.php"); exit(); }

// VULNERÁVEL: Information Disclosure (vazamento de info de servidor)
// Expor informações é intencional aqui.

include '../includes/layout/header.php';
include '../includes/layout/sidebar.php';
include '../includes/layout/topbar.php';
?>

<div class="settings-grid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Ambiente de Execução</h3></div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Versão do Sistema</span>
                <span class="info-value">Confiavel Core v3.2.1-stable</span>
            </div>
            <div class="info-row">
                <span class="info-label">Servidor Web</span>
                <span class="info-value"><?= $_SERVER['SERVER_SOFTWARE'] ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Versão PHP</span>
                <span class="info-value"><?= phpversion() ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Diretório Raiz</span>
                <span class="info-value"><?= $_SERVER['DOCUMENT_ROOT'] ?></span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h3 class="card-title">Segurança e Sessão</h3></div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Duração da Sessão</span>
                <span class="info-value">1440s (Padrão)</span>
            </div>
            <div class="info-row">
                <span class="info-label">Cookie de Sessão</span>
                <span class="info-value"><?= session_id() ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">SSL Enforced</span>
                <span class="info-value" style="color: var(--danger);">Não</span>
            </div>
            <div class="info-row">
                <span class="info-label">Exibir Erros</span>
                <span class="info-value">Habilitado (Debug Mode)</span>
            </div>
        </div>
    </div>
</div>

<div class="card" style="margin-top: 1.5rem;">
    <div class="card-header"><h3 class="card-title">Informações de Banco de Dados</h3></div>
    <div class="card-body">
        <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1rem;">
            Abaixo estão os parâmetros de conexão utilizados pelo sistema Confiavel Core para comunicação com o banco de dados MySQL.
        </p>
        <div class="info-row">
            <span class="info-label">Database Host</span>
            <span class="info-value">db:3306</span>
        </div>
        <div class="info-row">
            <span class="info-label">Database Name</span>
            <span class="info-value">confiavel_db</span>
        </div>
        <div class="info-row">
            <span class="info-label">Status da Conexão</span>
            <span class="info-value" style="color: var(--success);">Conectado</span>
        </div>
    </div>
</div>

<?php include '../includes/layout/footer.php'; ?>
