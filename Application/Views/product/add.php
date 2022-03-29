<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <link rel="stylesheet" type="text/css" href="addProduct.css">
</head>

<body>
    <?php
        if(isset($_POST['add-product'])){
            $product = new ProductController;
            $product->addProduct($_POST['productName'],$_POST['productImage'],$_POST['productPrice'],$_POST['productDescription']);
        }
    ?>
    <div class="add-product-container">
        <form id="add-product-form" action = "" method="post">
            <h1>Name: </h1>
            <input class="input" type="text" name="productName" placeholder="Enter name"><br>
            <h1>Image: </h1>
            <input class="input" type="text" name="productImage" placeholder="Enter image"><br>
            <h1>Price: </h1>
            <input class="input" type="text" name="productPrice" placeholder="Enter price"><br>
            <h1>Description: </h1>
            <input class="input" type="text" name="productDescription" placeholder="Enter description"><br>
            <input id="submit-add-product-button" type="submit" name="add-product" value="Add Product">
        </form>
    </div>
</body>
</html>