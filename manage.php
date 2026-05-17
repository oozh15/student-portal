<?php 
include 'db.php'; 
$data = getData();

if (isset($_POST['save'])) {
    $id = $_POST['id'] ?: time();
    $new = ['id'=>$id, 'name'=>$_POST['name'], 'dob'=>$_POST['dob'], 'gender'=>$_POST['gender'], 'age'=>$_POST['age']];
    if ($_POST['id']) {
        foreach($data['students'] as $k => $v) if($v['id'] == $id) $data['students'][$k] = $new;
    } else {
        $data['students'][] = $new;
    }
    saveData($data);
}

if (isset($_GET['del'])) {
    $data['students'] = array_filter($data['students'], fn($s) => $s['id'] != $_GET['del']);
    saveData($data);
}
header("Location: dashboard.php");
exit;
?>