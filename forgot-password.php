<?php
include 'db.php';
include 'send_mailer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $token = bin2hex(random_bytes(16));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?,?,?)");
        $stmt->bind_param('sss', $email, $token, $expiry);
        $stmt->execute();

        $resetLink = "http://localhost/todo-app/reset-password.php?token=$token";
        $subject = "Reset password request";
        $body = "Click <a href='$resetLink'>here</a> to reset your password, this link will expire in 1 hour.";

        sendEmail($email, $subject, $body);
        echo "Password reset email sent!";
    } else {
        echo "Email not found";
    }
    $stmt->close();
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Forgot Password</h1>
    <form action="forgot-password.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
    </form>
</div>
</body>
</html>
