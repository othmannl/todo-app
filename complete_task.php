<?php
include 'db.php';

$id = $_GET['id'];
if ($id) {
    $stmt = $conn->prepare("UPDATE tasks SET is_completed = TRUE WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
?>
