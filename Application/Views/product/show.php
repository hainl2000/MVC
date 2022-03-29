<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <link rel="stylesheet" type="text/css" href="product.css">
</head>

<body>
    <div id="add-product-button"> 
        <a href="index.php?controller=product&action=index">Add Product</a>
    </div>

    <table class="show-product-container">
        <tr>
            <th class = "product-width">Name</th>
            <th class = "product-width">Image</th>
            <th class = "product-width">Price</th>
            <th class = "product-width">Description</th>
        </tr>
          <?php
            foreach($listProducts as $product){
          ?>
        <tr>
            <td class="product-td"><?php echo $product['product_name'] ?></td>
            <td class="product-td"><img class="product-image" src=<?php echo $product['product_image'] ?>></img></td>
            <td class="product-td"><?php echo $product['product_price'] ?></td>
            <td class="product-td"><?php echo $product['product_description'] ?></td>
            <td class="product-td"><a href="index.php?controller=product&action=showOneProduct&id=<?php echo $product['product_id'] ;?>">Edit</a>
        </tr>
        <?php } ?>
    </table>
        
</body>
</html>
