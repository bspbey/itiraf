<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("confession_comments")->result();
        
        return $result;
	}

    public function get(){
		
	}
    
    public function insert(){
		
	}
    
    public function update(){
		
	}
    
    public function delete(){
		
	}
}
