<?php 

require_once 'DB.php';
class productDAL extends DB {

    function getList(){
        $sql = "SELECT *, products.name as product_name, products.id as product_id , category.name as category_name,category.id as category_id
          FROM products LEFT JOIN category ON products.category_id = category.id";
        $result = mysqli_query($this->connect, $sql);
        return $result;
    }

     function getOne($id){
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($this->connect, $sql);
        return mysqli_fetch_assoc($result);
    }

    function deleteOne($id){
        $sql = "DELETE FROM products WHERE id=$id";
        mysqli_query($this->connect,$sql);
    }

    function add ($name,$price,$image,$content,$category_id){
        $sql = "INSERT INTO products (name,price,content,image,category_id) value ('$name', '$price','$content','$image','$category_id') ";
        mysqli_query($this->connect, $sql);
    }

    function edit( $id,$name,$price,$content,$image,$category_id){
        $sql = "UPDATE `products` SET `name`='$name',`price`='$price' ,`content`='$content',`image`='$image',`category_id`='$category_id' WHERE id=$id";
        mysqli_query($this->connect,$sql);
    }
}

   
    
    

?>
