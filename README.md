# 🛡️ Vulnerable Web Service (Basic Pentest Lab)

<p align="center">
  <img src="assets/logo.png" alt="Vulnerable Web Service Logo" width="200">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Dificuldade-2%2F10-green" alt="Dificuldade">
  <img src="https://img.shields.io/badge/Ambiente-Controlado-blue" alt="Ambiente">
  <img src="https://img.shields.io/badge/Tecnologias-Docker%2C%20PHP%2C%20MySQL-orange" alt="Techs">
  <img src="https://img.shields.io/badge/Seguran%C3%A7a-Insecure%20by%20Design-red" alt="Security">
</p>

---

## 📖 Sobre o Projeto

O **Vulnerable Web Service** é um laboratório de testes de invasão (Pentest) desenvolvido para fins educacionais. Ele simula um ambiente web real com falhas críticas de segurança, permitindo que estudantes e profissionais de cibersegurança pratiquem técnicas de exploração em um cenário controlado e seguro.

### 🎯 Objetivos
*   **Aprendizado Prático:** Compreender na prática como funcionam vulnerabilidades comuns.
*   **Treinamento:** Servir como ambiente base para workshops de CTF e treinamentos internos.
*   **Segurança Ofensiva:** Testar ferramentas de scanning e exploração sem riscos colaterais.

---

## ⚠️ Vulnerabilidades Incluídas

O sistema foi propositalmente configurado com as seguintes falhas:

*   💉 **SQL Injection (Login Bypass):** Autenticação vulnerável que permite acesso sem senha.
*   📂 **Insecure File Upload:** Permite o upload de scripts maliciosos (Webshells).
*   🔐 **Weak Authentication:** Políticas de senha e sessão fragilizadas.
*   🛠️ **Insecure Configurations:** Má configuração de servidor e banco de dados.

---

## 🚀 Como Iniciar (Quick Start)

Basta copiar e colar **um único comando** no seu terminal. Ele faz tudo automaticamente:
> ✅ Clona o repositório (ou atualiza se já existir) · ✅ Inicia o Docker se estiver parado · ✅ Sobe o laboratório completo

### 🪟 Windows (PowerShell)
```powershell
if (!(Test-Path vulnerable-webservice)) { git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git }; cd vulnerable-webservice; git pull; docker info *>$null; if (-not $?) { Start-Process "$env:ProgramFiles\Docker\Docker\Docker Desktop.exe"; Write-Host "`n⏳ Aguardando Docker iniciar..." -ForegroundColor Yellow; do { Start-Sleep 3; docker info *>$null } until ($?) }; docker compose down *>$null; docker compose up -d --build
```

### 🐧 Linux / macOS
```bash
[ ! -d "vulnerable-webservice" ] && git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git; cd vulnerable-webservice; git pull; if ! docker info > /dev/null 2>&1; then echo "⏳ Aguardando Docker iniciar..."; sudo systemctl start docker; while ! docker info > /dev/null 2>&1; do sleep 3; done; fi; docker compose down 2>/dev/null; docker compose up -d --build
```

---

### 🌍 Acesso à Aplicação
Após a inicialização, a aplicação estará disponível em:
👉 **[http://localhost:8080](http://localhost:8080)**

---

## 🛠️ Requisitos
*   **Docker Engine** (20.x+)
*   **Docker Compose** (v2+)
*   **Git**

---

## 🛡️ Aviso Geral de Segurança

> [!CAUTION]
> **ESTE AMBIENTE É INSEGURO POR DESIGN.**
> *   **NUNCA** execute este container em redes públicas ou servidores de produção.
> *   Utilize apenas em ambientes isolados (VLANs de teste ou localhost).
> *   Este projeto foi criado estritamente para fins educacionais. O uso indevido das técnicas aprendidas aqui é de total responsabilidade do usuário.

---

## 👨‍💻 Desenvolvedor

**PinkMan** - *Cybersecurity Enthusiast*

[![GitHub](https://img.shields.io/badge/GitHub-Profile-blue?style=flat-square&logo=github)](https://github.com/pedrosilvaevangelista)

---
<p align="center">
  <b>TRY TO BREAK IN IF YOU CAN! 😈</b><br>
  <i>Boa caçada e bons estudos!</i>
</p>
