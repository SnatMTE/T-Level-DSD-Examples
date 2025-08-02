<?php
// Basic login script
// This script checks user credentials and starts a session if they are valid.
// Note: This is a simplified example. In a real application, you should use prepared statements to prevent SQL injection.
// Make sure to replace the hardcoded credentials with a database check.

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // TODO: Replace this with a PDO query to check credentials from a database
    // Example:
    // $pdo = new PDO(...);
    // $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    // $stmt->execute([$username, $password]);
    // $user = $stmt->fetch();

    if ($username === 'user' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        header('Location: protected.php');
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Username: <input type="text" name="username" /></label><br>
        <label>Password: <input type="password" name="password" /></label><br>
        <input type="submit" value="Login" />
    </form>
</body>
</html>