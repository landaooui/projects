<?php

class Rdv{
    private $db ;


    public function __construct()
    {
        $this->db =new Database ;
    }

        public function add($data){
      $this->db->query('INSERT INTO rdv (date_rdv,time_rdv,id_user ) VALUES(:date_rdv,:time_rdv,:id_user)');
      // Bind values
      $this->db->bind(':date_rdv',$data->date_rdv);
      $this->db->bind(':time_rdv',$data->time_rdv);
      $this->db->bind(':id_user',$data->id_user);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function update($data){
      $this->db->query('UPDATE rdv  SET  date_rdv=:date_rdv,time_rdv=:time_rdv WHERE id=:id');
      // Bind values
      $this->db->bind(':date_rdv',$data->date_rdv);
      $this->db->bind(':time_rdv',$data->time_rdv);
      $this->db->bind(':id',$data->id);
 
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
     public function delete($data){
      $this->db->query('DELETE FROM rdv WHERE id=:id');
      $this->db->bind(':id' ,$data->id );

       // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    } 

    
        
}