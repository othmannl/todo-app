<?php
include 'db.php';

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

if ($id) {
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param('ii', $id, $user_id);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
?>
