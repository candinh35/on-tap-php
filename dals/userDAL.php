<?php 

require_once 'DB.php';
class userDAL extends DB {

    function getList(){
        $sql = "SELECT * FROM users";
        $result = mysqli_query($this->connect, $sql);
        return $result;
    }

     function getOne($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($this->connect, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function deleteOne($id){
        $sql = "DELETE FROM users WHERE id=$id";
        mysqli_query($this->connect,$sql);
    }

    function add ($email , $password){
        $sql = "INSERT INTO users (email,password) value ('$email', '$password') ";
        mysqli_query($this->connect, $sql);
    }

    function edit( $id,$email,$password){
        $sql = "UPDATE `users` SET `email`='$email',`password`='$password' WHERE id=$id";
        mysqli_query($this->connect,$sql);
    }
}

   
    
    

?>
