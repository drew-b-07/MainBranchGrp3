<?php

require_once __DIR__ ."/database/dbconnection.php";

session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if(!isset($_GET['token'])){
    echo "<script>alert('No token provided.'); window.location.href = 'index.php';</script>";
    exit;
}

$db = new Database();
$pdo = $db->dbConnection();
$stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$stmt->execute([":id" => $_GET['id']]);
if($stmt->rowCount() == 0) {
    // Gawa ka error pop up.
    // Redirect sa Forgot Pass.
    exit();
}

$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if($_GET['tokencode'] != $admin['tokencode']) {
    // Gawa ka error message.
    // Redirect sa Forgot Pass.
    exit();
}
$token = $_GET['token'];

// Optionally, verify the token's existence and validity before showing the form
// This can also be handled in the resetPassword method
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="POST" action="dashboard/admin/authentication/admin-class.php">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <label for="new_password">Enter your new password:</label>
            <input type="password" name="new_password" required>
            <button type="submit" name="btn-reset-password">Reset Password</button>
        </form>
    </div>
</body>
</html>