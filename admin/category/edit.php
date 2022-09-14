<?php
session_start();
$dir = str_replace("admin\category", "", __DIR__);
require_once $dir . 'dals/categoryDAL.php';
$userDAL = new categoryDAL();
if ($_GET['id'] && !is_numeric($_GET['id'])) {
    header('Location:list.php');
} // kiểm tra xem có id gửi sang hay không
$id = $_GET['id'];
// nếu có dữ liệu gửi lên thì bắt đầu gọi hàm sửa
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $checked = $userDAL->edit($id, $name);
    if ($checked) {
        //flash session
        $_SESSION['add-status'] = [
            'success' => 1,
            'message' => 'Edit successfully'
        ];
    } else {
        $_SESSION['add-status'] = [
            'success' => 0,
            'message' => 'Edit failed'
        ];
    }
}
$row = $userDAL->getOne($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once $dir . 'admin/commons/head.php' ?>
</head>

<body>

    <div class="container">
        <?php require_once $dir . 'admin/commons/nav.php' ?>
        <div class="content">
            <!-- layout -->
            <div>
                <?php require_once $dir . 'admin/commons/layout.php' ?>
            </div>
            <div class="body-layout">
                <div>
                    <h2>Category</h2>

                    <?php
                    if (isset($_SESSION['add-status'])) {
                        if ($_SESSION['add-status']['success'] == 1) {
                            echo '<div class="alert alert-success" role="alert">
                    ' . $_SESSION['add-status']['message'] . '
                  </div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                    ' . $_SESSION['add-status']['message'] . '
                  </div>';
                        }
                        unset($_SESSION['add-status']);
                    }
                    ?>
                    <form action="" method="post">
                        <label for="">name</label>
                        <input type="name" value="<?php echo $row['name'] ?>" name="name">
                        <label for="">Password</label>
                        <button class="btn btn-dark">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>