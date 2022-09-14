<?php
$dir = str_replace("admin\users", "", __DIR__);  // hàm str_replace là hàm tha đổi giá trị đoạn chuỗi, mhư ở đây cắt phần admin/users
require_once $dir . 'dals/userDAL.php';

$userDAL = new userDAL();
$result = $userDAL->getList();
if (isset($_GET['action'])) {
    if (is_numeric($_GET['id']) && $_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $userDAL->deleteOne($id);
        header('location:list.php');
    }
}
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
                <h2>User</h2>
                    <table border="1" cellspacing=0 cellpadding=10>
                        <thead>
                            <tr>
                                <th> id</th>
                                <th>email</th>
                                <th> password</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($result as $row) :
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['password']; ?>
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">sửa</a>
                                        <a class="btn btn-danger" href="?action=delete&id=<?php echo $row['id']; ?>">xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>
                                    <a href="add.php">thêm</a>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>