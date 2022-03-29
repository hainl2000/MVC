<?php
    require_once 'Application/Core/Controller.php';
    require_once 'Application/Models/ProductModel.php';

    class ProductController extends Controller{
        function __construct(){

        }
        
        public function index(){
            $this->render('product/add');
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
        
        public function showOneProduct()
        {
            $id = $_GET['id'];
            $product = Product::getOneProduct($id);
            $data = array('product'=> $product);
            // die(print_r($product));
            $this->render('product/edit',$data);
        }

        public function editProduct($id,$name,$image,$price,$description){
            $result = Product::editProduct($id,$name,$image,$price,$description);
            self::show();
        }
    }

?>