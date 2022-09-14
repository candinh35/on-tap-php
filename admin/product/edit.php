<?php
session_start();
$dir = str_replace("admin\product", "", __DIR__); // đường dẫn tuyệt đối
if ($_GET['id'] && !is_numeric($_GET['id'])) {
    header('Location:list.php');
}

$id = $_GET['id'];
require_once $dir . 'dals/categoryDAL.php';
require_once $dir . 'dals/productDAL.php';

// kết nối tới class category
$categoryDAL = new categoryDAL();
$result = $categoryDAL->getList();

// kết nối tới class product
$productDAL = new productDAL();
$row =  $productDAL->getOne($id);
// kiểm tra xem id có được gửi xang hay không nếu không thì trả về trang trước

// nếu có dữ liệu gửi lên thì bắt đầu gọi hàm sửa
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    if (isset($_FILES['image']) && $_FILES['image'] != null) {
        $relativeDir = 'uploads/' . date('m') . '-' . date('y');
        $newDir = $dir . $relativeDir;
        if (!file_exists($newDir) && !is_file($newDir)) {
            mkdir($newDir);
        }
        $nameImg = time() . $_FILES['image']['name'];
        $nameTMP = $_FILES['image']['tmp_name'];
        $uploadImg =  $newDir . '/' . $nameImg;
        $checked = move_uploaded_file($nameTMP, $uploadImg);
        if ($checked) {
            unlink($dir . $row['image']);
        }
        $image = $relativeDir . '/' . $nameImg;
    }
    $productDAL->edit($id, $name, $price, $content, $image, $category_id);
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
                    <h2>Product</h2>

                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="">name</label>
                        <input type="name" value="<?php echo $row['name'] ?>" name="name">
                        <label for="">price</label>
                        <input type="price" value="<?php echo $row['price'] ?>" name="price">
                        <input type="file" name="image" value="<?php echo $row['image'] ?>">
                        <label for="">category</label>
                        <select name="category_id">
                            <?php foreach ($result as $row1) : ?>
                                <option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <textarea name="content" id="" cols="30" rows="10"><?php echo $row['name'] ?></textarea>
                        <button class="btn btn-dark">add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>