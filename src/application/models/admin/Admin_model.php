<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function get($where = array()){
		$row = $this->db->where($where)->get("uyeler")->row();
        return $row;
	}
    
    function istatistikler(){
        $data['itiraf_sayisi'] = $this->db->count_all('itiraflar');
        $data['yorum_sayisi'] = $this->db->count_all('itiraf_yorumlar');
        $data['ziyaretci_sayisi'] = $this->db->count_all('itiraflar');
        $data['iletisim_mesaj_sayisi'] = $this->db->count_all('iletisim');
        ## Toplam Görüntülenme Sayısı ##
        $this->db->select_sum('itiraf_goruntulenme');
        $result = $this->db->get('itiraflar')->row();
        $data['itiraf_goruntulenme'] =  $result->itiraf_goruntulenme;
        ## Toplam Görüntülenme Sayısı ##

        return $data;
        
        
        
    }
}
