# Vulnerable Web Service – Basic Pentest Lab

![Difficulty Level](https://img.shields.io/badge/Dificuldade-2%2F10-green)
![Controlled Environment](https://img.shields.io/badge/Ambiente-Controlado-blue)

A deliberately vulnerable web application designed to practice basic pentesting techniques in a safe environment.

## 🎯 Objective

* Provide a simple platform to understand common vulnerabilities
* Simulate a realistic environment for testing and training
* Allow experimentation without risk in controlled environments

## ⚠️ Included Vulnerabilities

* SQL Injection (Login Bypass)
* Insecure File Upload
* Weak Authentication
* Insecure Configurations

## 📦 Dependencies

You need to have installed:

* Docker Engine (20.x+)
* Docker Compose (v1 or v2)
* Compatible operating system (Linux, Windows, Mac)
* Permission to use Docker (root or user in the docker group)

## 🚀 How to Use

1. Clone the repository:

```bash
git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git
cd vulnerable-webservice
```

2. Start the environment:

```bash
docker-compose build
docker-compose up -d
```

3. Access the application in your browser:

```
http://<MACHINE-IP>:8080
```

4. Try to exploit the vulnerabilities!

## ⚠️ Important Warning

❗ **This lab is INSECURE BY DESIGN**
❗ Never run it in production or on a public network without proper isolation
❗ Use only in isolated environments for training

## 🛑 Disclaimer

This project is for educational purposes only. The developer is not responsible for misuse.

## 👨‍💻 Developed by

**PinkMan**
[![GitHub](https://img.shields.io/badge/GitHub-Profile-blue)](https://github.com/pedrosilvaevangelista)

**TRY TO BREAK IN IF YOU CAN!** 😈
