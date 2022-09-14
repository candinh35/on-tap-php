<?php
$dir = str_replace("admin\product", "", __DIR__);  // hàm str_replace là hàm tha đổi giá trị đoạn chuỗi, mhư ở đây cắt phần admin/users
require_once $dir . 'dals/productDAL.php';
require_once $dir . 'config.php';

$userDAL = new productDAL();
$result = $userDAL->getList();
if (isset($_GET['action'])) {
    // hàm xóa
    if (is_numeric($_GET['id']) && $_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $img = $_GET['img'];
        $userDAL->deleteOne($id);
        // lấy đường link của ảnh 
        $checked = $dir . $img;
        // hàm xóa đường link 
        unlink($checked);
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

        <!-- content -->
        <div class="content">
            <!-- layout -->
            <div>
                <?php require_once $dir . 'admin/commons/layout.php' ?>
            </div>
            <div class="body-layout">
                <div>
                    <h2>User</h2>
                    <table border="1px" cellspacing=0 cellpadding=10>
                        <thead>
                            <tr>
                                <th> id</th>
                                <th>name</th>
                                <th> price</th>
                                <th>image</th>
                                <th>content</th>
                                <th>category_id</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($result as $row) :
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $row['product_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['product_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo BASE_URL . $row['image']; ?>" alt="" width="100">

                                    </td>
                                    <td>
                                        <?php echo $row['content']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['category_name']; ?>
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary">sửa</a>
                                        <a class="btn btn-danger" href="?action=delete&id=<?php echo $row['product_id'] ?>&img=<?php echo $row['image']; ?>">xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>
                                    <a class="btn btn-dark" href="add.php">thêm</a>
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