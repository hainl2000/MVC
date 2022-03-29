<?php
    include_once "connectDB.php";

    class Product{
        public $product_id;
        public $product_name;
        public $product_image;
        public $product_price;
        public $product_description;
        
        function __construct($product_id,$product_name,$product_image,$product_price,$product_description){
            $this->product_id = $id;
            $this->product_name = $product_name;
            $this->product_image = $product_image;
            $this->product_price = $product_price;
            $this->product_description = $product_description;
        }

        public static function addProduct($name,$image,$price,$description){
            $conn = Database::getConnection();
            try{
                $sql = 'INSERT INTO products(product_name, product_image,product_price,product_description) VALUES (:name , :image, :price, :description)';
                $statement = $conn->prepare($sql);
                $statement->execute([
                    ':name' => $name,
                    ':image' => $image,
                    ':price' => $price,
                    ':description' => $description
                ]);
                $new_product_id = $conn->lastInsertId();
                return $new_product_id;
            }catch(Exception $e)
            {
                die("die in addProductModel" . $e);
            }
        }

        public static function editProduct($id,$name,$image,$price,$description){
            // die($id . $name . $image . $price . $description);
            $conn = Database::getConnection();
            try{
                $sql1 = 'UPDATE products SET product_name = :name, product_image = :image, product_price = :price, product_description = :description WHERE product_id = :id';
                $statement = $conn->prepare($sql1);
                $statement->execute([
                    ':id' => $id,
                    ':name' => $name,
                    ':image' => $image,
                    ':price' => $price,
                    ':description' => $description
                ]);
                return true;
            }catch(Exception $e)
            {
                die("die in editProductModel" . $e);
            }
        }


        public static function removeProduct($id){
            $conn = Database::getConnection();
            try{
                $sql1 = 'DELETE FROM products WHERE product_id = :id';
                $statement = $conn->prepare($sql1);
                $statement->execute([
                    ':id' => $id
                ]);
                return true;
            }catch(Exception $e)
            {
                die("die in removeProductModel" . $e);
            }
        }

        public static function getAllProducts(){
            $conn = Database::getConnection();
            try{
                $sql = 'SELECT * FROM products';
                $statement = $conn->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }catch(Exception $e)
            {
                die("die in getAllProductsModel" . $e);
            }
        }

        public static function getOneProduct($id){
            // die($id);
            $conn = Database::getConnection();
            try{
                $sql = 'SELECT * FROM products WHERE product_id = :id';
                $statement = $conn->prepare($sql);
                $statement->execute([
                    ':id' => $id
                ]);
                $response = $statement->fetch();
                return $response;
            }catch(Exception $e)
            {
                die("die in getOneProduct" . $e);
            }
        }
    }

?>


<?php
/*        public function index(){
            $this->render('product/add');
            // self::show();
        }

        public function show(){
            $listProducts = Product::getAllProducts();
            $data = array('listProducts'=> $listProducts);
            $this->render('product/show',$data);
        }

        public function addProduct($name,$image,$price,$description){
            $result = Product::addProduct($name,$image,$price,$description);
            self::show();
            // $this->render('product/show');
        }
*/
        ?>