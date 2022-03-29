<?php
    $controllers = array(
        // 'page' => ['home','error'],
        'user' => ['index','login','register','getAllUsers'],
        'product' => ['index','show','addProduct','editProduct','showOneProduct']
    );
    // die($controller) ;
    if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
        $controller = 'user';
        $action = 'index';
    }
    $controllerPath = 'Application/Controllers/' . ucwords(strtolower($controller)) . 'Controller.php';
    // Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
    require_once($controllerPath) ;
    // Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
    $klass = str_replace('_', '', ucwords(strtolower($controller), '_')) . 'Controller';
    $obj = new $klass;
    $obj->$action();

    
      
?>