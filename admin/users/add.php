<?php 
$dir = str_replace("admin\users" , "", __DIR__);
require_once $dir . 'dals/userDAL.php';
$userDAL = new userDAL();
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']) ;
    $userDAL->add($email,$password);
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
    <label for="">Email</label>
    <input type="email" placeholder="Email" name="email">
    <label for="">Password</label>
    <input type="password" placeholder="Password" name="password">
    <button>add</button>
   </form>
</body>
</html>