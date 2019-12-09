<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pitiraflar_model extends CI_Model {

	public function get_all(){
		
        $result = $this->db->get("itiraflar")->result();
        
        return $result;
	}

    public function get($where){
        
		$result = $this->db->where($where)->get("itiraflar")->row();
        
        return $result;
	}
    
    public function update($where, $data){
		
        $update = $this->db->where($where)->update("itiraflar", $data);
        return $update;
	}
    
    public function delete($where){
		
        $delete = $this->db->where($where)->delete("itiraflar");
        return $delete;
	}
    
    //Ziyaretçi sayacı
    function update_counter($id) {
    // return current article views 
    $this->db->where('id', $id);
    $this->db->select('itiraf_goruntulenme');
    $count = $this->db->get('itiraflar')->row();
    // then increase by one 
    $this->db->where('id', $id);
    $this->db->set('itiraf_goruntulenme', ($count->itiraf_goruntulenme + 1));
    $this->db->update('itiraflar');
    }

    public function admin_son_itiraf(){
        $this->db->select('itiraflar.*');
        $this->db->where('itiraflar.itiraf_durum', 1);
        $query = $this->db->get('itiraflar')->result();
        return $query;
    }
}
