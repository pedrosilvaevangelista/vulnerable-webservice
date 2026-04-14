# Seguros Confiáveis - Offensive Security Laboratory

![Seguros Confiáveis Banner](assets/img/readmeimage.png)

## Overview

**Seguros Confiáveis** is a controlled, "vulnerable by design" environment developed for educational purposes and cybersecurity training. It simulates an enterprise-grade insurance portal with intentional security flaws, providing a realistic scenario for practitioners to explore offensive security techniques.

The entire laboratory operates within a containerized architecture (Docker), ensuring full isolation and zero risks to the host environment.

## Key Features

*   **Enterprise Persona**: A fictional insurance company narrative with consistent branding.
*   **Modular Architecture**: Organized project structure following PHP best practices.
*   **Ready-to-Test**: Pre-seeded database with users, customers, and insurance records.
*   **Isolated**: Containerized setup ensures portability and security.

## Included Vulnerabilities

The following intentional flaws are available for exploration:

*   **SQL Injection (SQLi)**: Login bypass (Authentication) and UNION-based extraction (Policies).
*   **Cross-Site Scripting (XSS)**: Reflected (Search engine) and Stored (Customer registration).
*   **Local File Inclusion (LFI)**: Arbitrary file reading via the Audit Logs viewer.
*   **Insecure File Upload**: Unrestricted upload functionality for webshell practice.
*   **Information Disclosure**: Exposure of technical server metadata and environment details.

## Deployment

### One-Command Setup

Select the command corresponding to your operating system to automatically install dependencies (if missing) and launch the laboratory:

#### Windows (PowerShell as Admin)
```powershell
if (!(Get-Command docker -ErrorAction SilentlyContinue)) { winget install --accept-source-agreements --accept-package-agreements Docker.DockerDesktop }; docker info *>$null; if (-not $?) { Start-Process "$env:ProgramFiles\Docker\Docker\Docker Desktop.exe"; Write-Host "`n⏳ Waiting for Docker..." -ForegroundColor Yellow; do { Start-Sleep 3; docker info *>$null } until ($?) }; if (!(Test-Path vulnerable-webservice)) { git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git }; cd vulnerable-webservice; git pull; docker compose down *>$null; docker compose up -d --build
```

#### Linux (Debian / Ubuntu)
```bash
command -v docker > /dev/null || { curl -fsSL https://get.docker.com | sudo sh; }; sudo systemctl start docker; [ ! -d "vulnerable-webservice" ] && git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git; cd vulnerable-webservice; git pull; sudo docker compose down 2>/dev/null; sudo docker compose up -d --build
```

#### Kali Linux
```bash
command -v docker > /dev/null || { sudo rm -f /etc/apt/sources.list.d/docker.list; sudo apt update; sudo apt install -y ca-certificates curl gnupg; sudo install -m 0755 -d /etc/apt/keyrings; curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg; sudo chmod a+r /etc/apt/keyrings/docker.gpg; echo "deb [arch=amd64 signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian bookworm stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null; sudo apt update; sudo apt install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin; }; sudo systemctl start docker; [ ! -d "vulnerable-webservice" ] && git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git; cd vulnerable-webservice; git pull; sudo docker compose down 2>/dev/null; sudo docker compose up -d --build
```

### Accessing the Portal

Once deployed, the application is accessible at:
[http://localhost:8080](http://localhost:8080)

## Security Disclaimer

> [!CAUTION]
> **THIS ENVIRONMENT IS INSECURE BY DESIGN.**
> * Never deploy this laboratory in public networks or production servers.
> * Use strictly for educational purposes in isolated environments.
> * All vulnerabilities are contained within Docker volumes.
> * Misuse of the techniques explored here is the sole responsibility of the user.

---

**PinkMan** - *Cybersecurity Enthusiast*
[GitHub Profile](https://github.com/pedrosilvaevangelista)
