<?php 
$dir = str_replace("admin\category" , "", __DIR__);
require_once $dir . 'dals/categoryDAL.php';
$userDAL = new categoryDAL();
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $userDAL->add($name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once $dir . 'admin/commons/head.php' ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
    <?php require_once $dir . 'admin/commons/nav.php'?>
    </nav>

   <form action="" method="post">
    <label for="">name</label>
    <input type="name" placeholder="name" name="name">
    <button>add</button>
   </form>
</body>
</html>