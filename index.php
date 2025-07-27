<?php
session_start();

$mysqli = new mysqli("db", "root", "root", "azul_db");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$error = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // VULNERÁVEL A SQLi
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $_SESSION['auth'] = true;
        header("Location: panel.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vulnerable Web Service - Login</title>
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px #ff3333;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-box img {
            max-width: 100px;
            margin-bottom: 20px;
        }
        .login-box h1 {
            margin-bottom: 20px;
            color: #ff3333;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            background-color: #2c2c2c;
            color: white;
        }
        .login-box input[type="submit"] {
            background-color: #ff3333;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-box input[type="submit"]:hover {
            background-color: #cc0000;
        }
        .error {
            margin-top: 15px;
            color: #ff6666;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="assets/logo.png" alt="Logo">
        <h1>Vulnerable Web Service</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
    </div>
</body>
</html>

