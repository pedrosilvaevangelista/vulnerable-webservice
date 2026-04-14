# 🛡️ Seguros Confiáveis (Offensive Security Lab)

<p align="center">
  <img src="assets/img/shield_logo.png" alt="Seguros Confiáveis Logo" width="180">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Dificuldade-3%2F10-orange" alt="Dificuldade">
  <img src="https://img.shields.io/badge/Ambiente-Enterprise%20Vulnerable-blue" alt="Ambiente">
  <img src="https://img.shields.io/badge/Tecnologias-Docker%2C%20PHP%2C%20MySQL-orange" alt="Techs">
  <img src="https://img.shields.io/badge/Seguran%C3%A7a-Insecure%20by%20Design-red" alt="Security">
</p>

---

## 📖 Sobre o Projeto

O **Vulnerable Web Service** é um laboratório de testes de invasão (Pentest) desenvolvido para fins educacionais. Ele simula um ambiente web real com falhas críticas de segurança, permitindo que estudantes e profissionais de cibersegurança pratiquem técnicas de exploração em um cenário controlado e seguro.

O ambiente roda **100% isolado via Docker**, garantindo que nenhuma vulnerabilidade afete a máquina host.

### 🎯 Objetivos
*   **Aprendizado Prático:** Compreender na prática como funcionam vulnerabilidades comuns.
*   **Treinamento:** Servir como ambiente base para workshops de CTF e treinamentos internos.
*   **Segurança Ofensiva:** Testar ferramentas de scanning e exploração sem riscos colaterais.

---

## ⚠️ Vulnerabilidades Incluídas (Vulnerable by Design)

O sistema foi propositalmente configurado com as seguintes falhas críticas para treinamento:

*   💉 **SQL Injection (Login Bypass):** Autenticação vulnerável no portal de login.
*   📊 **SQL Injection (UNION-based):** Extração de dados sensíveis via busca de apólices.
*   📂 **Local File Inclusion (LFI):** Acesso a arquivos do sistema via visualizador de logs.
*   📤 **Insecure File Upload:** Permite o upload de scripts não autorizados (Webshells).
*   🌐 **Cross-Site Scripting (XSS):** Refletido na busca e armazenado no registro de clientes.
*   🚪 **Information Disclosure:** Vazamento de detalhes técnicos do servidor nas configurações.

---

## 🚀 Como Iniciar (Quick Start)

Copie e cole **um único comando** no seu terminal. Ele instala as dependências, clona o projeto e sobe o laboratório completo:

### 🪟 Windows (PowerShell como Admin)
```powershell
if (!(Get-Command docker -ErrorAction SilentlyContinue)) { winget install --accept-source-agreements --accept-package-agreements Docker.DockerDesktop }; docker info *>$null; if (-not $?) { Start-Process "$env:ProgramFiles\Docker\Docker\Docker Desktop.exe"; Write-Host "`n⏳ Aguardando Docker iniciar..." -ForegroundColor Yellow; do { Start-Sleep 3; docker info *>$null } until ($?) }; if (!(Test-Path vulnerable-webservice)) { git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git }; cd vulnerable-webservice; git pull; docker compose down *>$null; docker compose up -d --build
```

### 🐧 Linux (Debian / Ubuntu)
```bash
command -v docker > /dev/null || { curl -fsSL https://get.docker.com | sudo sh; }; sudo systemctl start docker; [ ! -d "vulnerable-webservice" ] && git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git; cd vulnerable-webservice; git pull; sudo docker compose down 2>/dev/null; sudo docker compose up -d --build
```

🐉 Kali Linux

⚠️ O Kali Linux requer configuração manual do repositório do Docker, pois o instalador automático não é compatível com kali-rolling.

Execute o comando abaixo:

```bash
command -v docker > /dev/null || { sudo rm -f /etc/apt/sources.list.d/docker.list; sudo apt update; sudo apt install -y ca-certificates curl gnupg; sudo install -m 0755 -d /etc/apt/keyrings; curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg; sudo chmod a+r /etc/apt/keyrings/docker.gpg; echo "deb [arch=amd64 signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian bookworm stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null; sudo apt update; sudo apt install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin; }; sudo systemctl start docker; [ ! -d "vulnerable-webservice" ] && git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git; cd vulnerable-webservice; git pull; sudo docker compose down 2>/dev/null; sudo docker compose up -d --build
```

### 🌍 Acesso à Aplicação
Após a inicialização, a aplicação estará disponível em:
👉 **[http://localhost:8080](http://localhost:8080)**

---

## 🛠️ Requisitos
*   **Git** (para clonar o repositório)
*   **Docker** (instalado automaticamente pelo comando acima)

---

## 🛡️ Aviso Geral de Segurança

> [!CAUTION]
> **ESTE AMBIENTE É INSEGURO POR DESIGN.**
> *   **NUNCA** execute este container em redes públicas ou servidores de produção.
> *   Utilize apenas em ambientes isolados (VLANs de teste ou localhost).
> *   As vulnerabilidades estão 100% isoladas dentro dos containers Docker, sem risco para a máquina host.
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
