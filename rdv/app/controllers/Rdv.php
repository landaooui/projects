<?php
class Rdv extends Controller{


    public function __construct()
    {
       $this->RdvModel =$this->model('Rdv');
    }
  
     public function add()
    {
      $RDV = $this->RdvModel->add($this->data);
        print_r(json_encode(array(
        "message" => "RDV Created with success",
         "data" => $this->data
       )));
     }  
      
    

    

}
