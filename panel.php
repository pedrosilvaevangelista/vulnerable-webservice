<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$mysqli = new mysqli("db", "root", "root", "azul_db");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_SESSION['auth'])) {
    die("❌ Acesso negado! Faça login primeiro.");
}

$message = '';

if (isset($_POST['add'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $apolice = $_POST['apolice'] ?? '';

    $foto = '';
    if (isset($_FILES['foto'])) {
        $upload_dir = __DIR__ . "/upload/";
        $name = basename($_FILES['foto']['name']);
        $tmp_name = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp_name, "$upload_dir/$name");
        $foto = $name;
    }

    // Vulnerável a SQLi
    $sql = "INSERT INTO clientes (nome, email, cpf, apolice, foto) VALUES ('$nome','$email','$cpf','$apolice','$foto')";
    if ($mysqli->query($sql)) {
        $message = "✅ Cliente adicionado!";
    } else {
        $message = "❌ Erro: " . $mysqli->error;
    }
}

$result = $mysqli->query("SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Vulnerable Web Service</title>
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
        }
        h1, h2 {
            color: #ff3333;
        }
        .message {
            background: #1f1f1f;
            border-left: 4px solid #00cc66;
            padding: 15px;
            margin-bottom: 30px;
            color: #00cc66;
            border-radius: 6px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        th, td {
            padding: 12px 16px;
            border: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #222;
            color: #ff3333;
            text-transform: uppercase;
            font-size: 14px;
        }
        tr:nth-child(even) {
            background-color: #1e1e1e;
        }
        img {
            max-width: 80px;
            border-radius: 6px;
        }
        .form-container {
            background: #1c1c1c;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(255, 51, 51, 0.3);
        }
        form {
            display: grid;
            gap: 15px;
        }
        label {
            font-weight: bold;
            color: #ccc;
        }
        input[type="text"],
        input[type="email"],
        input[type="file"] {
            padding: 10px;
            border: 1px solid #333;
            border-radius: 6px;
            background: #2a2a2a;
            color: #fff;
        }
        button {
            background: #ff3333;
            border: none;
            padding: 12px;
            color: white;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Vulnerable Web Service - Admin Panel</h1>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <h2>Registered Clients</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Policy</th>
            <th>Photo</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['cpf']) ?></td>
                <td><?= htmlspecialchars($row['apolice']) ?></td>
                <td>
                    <?php if ($row['foto']): ?>
                        <img src="upload/<?= htmlspecialchars($row['foto']) ?>" alt="Cliente">
                    <?php else: ?>
                        (Sem foto)
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <div class="form-container">
        <h2>Add New Client</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="nome">Name</label>
            <input id="nome" name="nome" required>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>

            <label for="cpf">CPF</label>
            <input id="cpf" name="cpf" required>

            <label for="apolice">Policy</label>
            <input id="apolice" name="apolice" required>

            <label for="foto">Photo</label>
            <input id="foto" type="file" name="foto" required>

            <button type="submit" name="add">Add Client</button>
        </form>
    </div>
</div>
</body>
</html>

