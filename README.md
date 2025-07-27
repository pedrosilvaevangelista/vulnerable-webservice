# Vulnerable WebService - Laboratório de Pentest Básico  

![Nível de Dificuldade](https://img.shields.io/badge/Dificuldade-2%2F10-green)  
![Ambiente Controlado](https://img.shields.io/badge/Ambiente-Controlado-blue)  

Uma aplicação web propositalmente vulnerável para treinar técnicas básicas de pentest em um ambiente seguro.  

## 🎯 Objetivo  
- Oferecer uma plataforma simples para entender vulnerabilidades comuns  
- Simular um ambiente realista para testes e treinamentos  
- Permitir experimentação sem riscos em ambientes controlados  

## ⚠️ Vulnerabilidades Incluídas  
- SQL Injection (Login Bypass)  
- Upload Inseguro de Arquivos  
- Autenticação Fraca  
- Configurações Inseguras  

## 📦 Dependências  
Você precisa ter instalado:  
- Docker Engine (20.x+)  
- Docker Compose (v1 ou v2)  
- Sistema operacional compatível (Linux, Windows, Mac)  
- Permissão para usar Docker (root ou usuário no grupo docker)  

## 🚀 Como Usar  

1. Clone o repositório:  
```bash
git clone https://github.com/pedrosilvaevangelista/vulnerable-webservice.git
cd vulnerable-webservice
```

2. Suba o ambiente:  
```bash
docker-compose build
docker-compose up -d
```

3. Acesse a aplicação no navegador:  
```
http://<IP-DA-MAQUINA>:8080
```

4. Tente explorar as vulnerabilidades!  

## ⚠️ Aviso Importante  
❗ **Este laboratório é INSEGURO POR DESIGN**  
❗ Nunca rode em produção ou em rede pública sem controle  
❗ Use apenas em ambientes isolados para treinamento  

## 🛑 Responsabilidade  
Este projeto é apenas para fins educacionais. O desenvolvedor não se responsabiliza por uso indevido.  

## 👨‍💻 Desenvolvido por  
**PinkMan**  
[![GitHub](https://img.shields.io/badge/GitHub-Profile-blue)](https://github.com/pedrosilvaevangelista)  

**TENTE INVADIR SE FOR CAPAZ!** 😈
