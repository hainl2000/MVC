<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <link rel="stylesheet" type="text/css" href="">
</head>

<body>
    <?php
        // die(print_r($product));
        if(isset($_POST['edit-product'])){
            $newProduct = new ProductController;
            $newProduct->editProduct($product['product_id'],$_POST['productName'],$_POST['productImage'],$_POST['productPrice'],$_POST['productDescription']);
        }
    ?>
    <div class="add-product-container">
        <form id="add-product-form" action = "" method="post">
            <h1>ID:<?php echo $product['product_id']?></h1>
            <h1>Name: </h1>
            <input class="input" type="text" name="productName" value="<?php echo $product['product_name']?>"><br>
            <h1>Image: </h1>
            <input class="input" type="text" name="productImage" value="<?php echo $product['product_image']?>"><br>
            <h1>Price: </h1>
            <input class="input" type="text" name="productPrice" value="<?php echo $product['product_price']?>"><br>
            <h1>Description: </h1>
            <input class="input" type="text" name="productDescription" value="<?php echo $product['product_description']?>"><br>
            <input id="submit-add-product-button" type="submit" name="edit-product" value="Edit Product">
        </form>
    </div>
</body>
</html>