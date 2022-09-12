<?php 
session_start();
$dir = str_replace("admin\users" , "" ,__DIR__);
require_once $dir.'dals/userDAL.php';
$userDAL = new userDAL();
if($_GET['id'] && !is_numeric($_GET['id'])){
    header('Location:list.php');
} // kiểm tra xem có id gửi sang hay không
    $id = $_GET['id'];
    // nếu có dữ liệu gửi lên thì bắt đầu gọi hàm sửa
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userDAL->edit($id,$email,$password);
       
    }
$row = $userDAL->getOne($id);
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
    <input type="email" value="<?php echo $row['email']?>" name="email">
    <label for="">Password</label>
    <input type="password" value="<?php echo $row['password']?>" name="password">
    <button  class="btn btn-dark">edit</button>
   </form>
</body>
</html>