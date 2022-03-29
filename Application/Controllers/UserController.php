<?php
    require_once 'Application/Core/Controller.php';
    require_once 'Application/Models/UserModel.php';
    class UserController extends Controller{
        function __construct()
        {   
            $this->folder = 'user';
        }

        public function index()
        {   
            $this->render('user/auth');
        }

        public function register($username,$password)
        {   
            // die($username . '-'. $password);
            $result = User::register($username,$password);
            // die($result);
            if(!$result){
                $this->render('user/error');
            }
            else{
                $this->render('user/success',array('new_user_id' => $result));
            }
        }


        public function login($username,$password)
        {   
            // die($username . '-'. $password);
            $result = User::login($username,$password);
            if(!$result){
                $this->render('user/error');
            }
            else{
                $this->render('user/success',array('new_user_id' => $result));
            }
        }

        public function show()
        {
            $listUsers = User::getAll();
            $data = array('listUsers'=> $listUsers);
            $this->render('show',$data);
        }
    }
