<?php 
include 'db.php'; 
$msg = ""; $type = "danger";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = getData(); 
    $user = trim($_POST['user']);
    $pass = $_POST['pass'];

    if (isset($_POST['signup'])) {
        if(!isset($data['users'][$user])) {
            $data['users'][$user] = password_hash($pass, PASSWORD_DEFAULT);
            saveData($data); 
            $msg = "Account created! You can login now."; $type = "success";
        } else { $msg = "Username already exists!"; }
    } else {
        if (isset($data['users'][$user]) && password_verify($pass, $data['users'][$user])) {
            $_SESSION['user'] = $user; 
            header("Location: dashboard.php");
            exit;
        } else { $msg = "Login failed! Check credentials."; }
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; align-items: center; }
        .card { border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); border: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4">
                    <h2 class="text-center mb-4 fw-bold text-dark">Student Portal</h2>
                    <?php if($msg): ?>
                        <div class="alert alert-<?= $type ?> alert-dismissible fade show"><?= $msg ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php">
                        <div class="mb-3"><label class="small fw-bold">USERNAME</label><input name="user" class="form-control" required></div>
                        <div class="mb-4"><label class="small fw-bold">PASSWORD</label><input type="password" name="pass" class="form-control" required></div>
                        <button class="btn btn-primary w-100 mb-2">Login</button>
                        <button name="signup" class="btn btn-outline-secondary w-100 btn-sm">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>