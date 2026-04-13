# 🛡️ Vulnerable Web Service (Basic Pentest Lab)

<p align="center">
  <img src="assets/logo.png" alt="Vulnerable Web Service Logo" width="200">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Dificuldade-2%2F10-green" alt="Dificuldade">
  <img src="https://img.shields.io/badge/Ambiente-Controlado-blue" alt="Ambiente">
  <img src="https://img.shields.io/badge/Tecnologias-PHP%2C%20SQLite-orange" alt="Techs">
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

Basta ter o **Git** e o **PHP** instalados. Copie e cole **um único comando** no seu terminal:

### 🪟 Windows (PowerShell)
```powershell
git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git; cd vulnerable-webservice; php start.php
```

### 🐧 Linux / macOS
```bash
git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git && cd vulnerable-webservice && php start.php
```

### 🌍 Acesso à Aplicação
Após a inicialização, a aplicação estará disponível em:
👉 **[http://localhost:8080](http://localhost:8080)**

---

## 🛠️ Requisitos
*   **PHP** (7.4+ com extensão SQLite — já vem habilitada por padrão)
*   **Git**

---

## 🐳 Alternativa com Docker

Se preferir usar Docker, o projeto também suporta execução via container:

```bash
docker compose up -d --build
```
> Acesso em **http://localhost:8080** · Requisitos: Docker Engine (20.x+) e Docker Compose (v2+)

---

## 🛡️ Aviso Geral de Segurança

> [!CAUTION]
> **ESTE AMBIENTE É INSEGURO POR DESIGN.**
> *   **NUNCA** execute este servidor em redes públicas ou servidores de produção.
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
