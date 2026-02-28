<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "Jammy" && $password === "jamjam") {
        $_SESSION['username'] = "Jammy";
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="/santi_assessment/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-card {
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 2.5rem 3rem;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 1000px;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--text-muted);
            max-width: 1000px;
        }

        .login-card form {
            margin: 5 auto;
            max-width: 1000px;}

        .login-card button {
            width: 100%;
            max-width: 1000px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Hi, Welcome to Login</h2>

    <?php if ($error != ""): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>