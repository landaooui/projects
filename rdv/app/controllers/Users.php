

<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  class Users extends Controller {
    
 


    public function __construct(){
     
      $this->userModel = $this->model('User');

      
    }

    public function register(){

        
            
         $this->data->password=password_hash($this->data->password ,PASSWORD_DEFAULT);
        // die(var_dump($this->data));
             $user = $this->userModel->register($this->data);
            
             print_r(json_encode($user));
                
               
    }
    

    public function login(){
      // Check for POST

      $user = $this->userModel->findUserByEmail($this->data->email);
    //  die(print_r($user));
        if ($user) {       
             if(password_verify($this->data->password,$user->password)){
                 echo 'hamza landaoui';
             }
                
    }
    }
    public function createUserSession($user){
      $_SESSION['user_id'] =$user->ID_U ;
      $_SESSION['user_email'] =$user->email ;
      $_SESSION['user_name'] =$user->name ;
      $_SESSION['status'] =$user->satusU ;
      $_SESSION['logged'] =true ;

      if($_SESSION['status']==1){
             
      }
      else{
          
      }
      

      
      
    }
     public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
    
    }
  
  }