<?php 
$dir = str_replace("admin\product" , "", __DIR__);
require_once $dir . 'dals/productDAL.php';
require_once $dir . 'dals/categoryDAL.php';
$categoryDAL = new categoryDAL();
$result = $categoryDAL->getList();
$productDAL = new productDAL();
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $content = $_POST['content'];
    if(isset($_FILES['image']) && $_FILES['image']['name'] != null){
        $relativeDir = 'uploads/' . date('m'). '-' . date('y');
        $dirImg = $dir. $relativeDir;
        if(!file_exists($dirImg) && !is_file($dirImg)){
           mkdir($dirImg);
        }
        $imgName = time(). $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $image = $dirImg . '/' . $imgName;
        move_uploaded_file($imgTmp,$image);
        $upImage = $relativeDir . '/'. $imgName;
    }
$productDAL->add($name,$price,$upImage,$content,$category_id);

     
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

   <form action="" method="post" enctype="multipart/form-data">
    <label for="">name</label>
    <input type="name" placeholder="name" name="name">
    <label for="">price</label>
    <input type="price" placeholder="price" name="price">
    <input type="file" name="image">
            <label for="">category</label>
    <select name="category_id">
        <?php foreach($result as $row): ?>
        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
        <?php endforeach; ?>
    </select>
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <button class="btn btn-dark">add</button>
   </form>
</body>
</html>