<?php 
include 'db.php'; 
if(!isset($_SESSION['user'])) { header("Location: index.php"); exit; }
$s = ['id'=>'','name'=>'','dob'=>'','gender'=>'Male','age'=>''];
if(isset($_GET['edit'])) {
    foreach(getData()['students'] as $item) { if($item['id'] == $_GET['edit']) $s = $item; }
} ?>
<!DOCTYPE html>
<html>
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light p-5">
    <div class="card mx-auto shadow-sm p-4" style="max-width: 400px;">
        <h4 class="mb-3 text-center"><?= $s['id'] ? 'Edit' : 'Add' ?> Student</h4>
        <form action="manage.php" method="POST">
            <input type="hidden" name="id" value="<?= $s['id'] ?>">
            <div class="mb-2"><label>Name</label><input name="name" value="<?= $s['name'] ?>" class="form-control" required></div>
            <div class="mb-2"><label>DOB</label><input type="date" name="dob" value="<?= $s['dob'] ?>" class="form-control" required></div>
            <div class="mb-2"><label>Gender</label><select name="gender" class="form-select"><option <?= $s['gender']=='Male'?'selected':'' ?>>Male</option><option <?= $s['gender']=='Female'?'selected':'' ?>>Female</option></select></div>
            <div class="mb-3"><label>Age</label><input type="number" name="age" value="<?= $s['age'] ?>" class="form-control" required></div>
            <button name="save" class="btn btn-primary w-100">Save</button>
            <a href="dashboard.php" class="btn btn-link w-100 text-muted">Cancel</a>
        </form>
    </div>
</body>
</html>