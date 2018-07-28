<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function get($where = array()){
		$row = $this->db->where($where)->get("brkdndr_uyeler")->row();
        return $row;
	}
    
    function istatistikler(){
        $data['itiraf_sayisi'] = $this->db->count_all('brkdndr_itiraflar');
        $data['yorum_sayisi'] = $this->db->count_all('brkdndr_itiraf_yorumlar');
        $data['ziyaretci_sayisi'] = $this->db->count_all('brkdndr_itiraflar');
        $data['iletisim_mesaj_sayisi'] = $this->db->count_all('brkdndr_iletisim');
        ## Toplam Görüntülenme Sayısı ##
        $this->db->select_sum('itiraf_goruntulenme');
        $result = $this->db->get('brkdndr_itiraflar')->row();
        $data['itiraf_goruntulenme'] =  $result->itiraf_goruntulenme;
        ## Toplam Görüntülenme Sayısı ##

        return $data;
        
        
        
    }
}
