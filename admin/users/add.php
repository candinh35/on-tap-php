<?php
$dir = str_replace("admin\users", "", __DIR__);
require_once $dir . 'dals/userDAL.php';
$userDAL = new userDAL();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $userDAL->add($email, $password);
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
                    <form action="" method="post">
                        <div>
                            <label for="">Email</label>
                        </div>

                        <input type="email" placeholder="Email" name="email">
                        <div>
                            <label for="">Password</label>
                        </div>

                        <input type="password" placeholder="Password" name="password">
                        <button>add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>