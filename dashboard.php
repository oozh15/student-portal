<?php 
include 'db.php'; 
if(!isset($_SESSION['user'])) { header("Location: index.php"); exit; }
$data = getData();
$students = $data['students'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container"><span class="navbar-brand">Admin: <?= $_SESSION['user'] ?></span><a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a></div>
    </nav>
    <div class="container">
        <div class="bg-white p-4 shadow-sm rounded">
            <div class="d-flex justify-content-between mb-3">
                <h3 class="fw-bold">Student List</h3>
                <a href="form.php" class="btn btn-success btn-sm">+ Add New</a>
            </div>
            <table class="table table-hover border">
                <thead class="table-light"><tr><th>Name</th><th>DOB</th><th>Gender</th><th>Age</th><th class="text-end">Actions</th></tr></thead>
                <tbody>
                    <?php foreach($students as $s): ?>
                    <tr>
                        <td><?= $s['name'] ?></td><td><?= $s['dob'] ?></td><td><?= $s['gender'] ?></td><td><?= $s['age'] ?></td>
                        <td class="text-end">
                            <a href="form.php?edit=<?= $s['id'] ?>" class="btn btn-info btn-sm text-white">Edit</a>
                            <a href="manage.php?del=<?= $s['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>