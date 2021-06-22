<?php

class User{
    private $db ;


    public function __construct()
    {
        $this->db =new Database ;
    }


public function register($data){
        // die(print_r($data)); 
    $this->db->query('INSERT INTO users (nom , prenom , date_naissance , email , password ) VALUES (:nom, :prenom, :date_naissance, :email, :password)');
   
    // bind value
      $this->db->bind(':nom',$data->first_name);
      $this->db->bind(':prenom',$data->last_name);
      $this->db->bind(':date_naissance',$data->date_naissance);
      $this->db->bind(':password',$data->password);
      $this->db->bind(':email',$data->email);
          
           

        // execute
        if($this->db->execute()){
            return true ;
        } else {
            return false ;
        }
         
          
}

   // Login User
    public function login($datal){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email',$this->data->email);
      $row = $this->db->single();
      if(password_verify($this->data->password,$row->Password)){
          
        return $row;
        
      } else {
        return false;
     
      }
    } 

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email =:email');
        $this->db->bind(':email',$email);
        $row =$this->db->single();
        
        //chck row

        if ($this->db->rowCount()>0){
            return $row ;
        } else {
        return false ;
        }
    }
}