<?php
$dir = str_replace("admin\category", "", __DIR__);
require_once $dir . 'dals/categoryDAL.php';
$userDAL = new categoryDAL();
if (isset($_POST['name'])) {
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
                    <form action="" method="post">
                        <label for="">name</label>
                        <input type="name" placeholder="name" name="name">
                        <button>add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>