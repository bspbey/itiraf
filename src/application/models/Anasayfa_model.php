<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa_model extends CI_Model {

    public function brkdndr_anasayfa_son_itiraf(){
        $this->db->select('brkdndr_itiraflar.*');
        $this->db->where('brkdndr_itiraflar.itiraf_durum', 1);
        $query = $this->db->get('brkdndr_itiraflar')->result();
        return $query;
    }
    public function brkdndr_anasayfa_itiraf_icerik($id){
        $this->db->select('brkdndr_itiraflar.*');
        $this->db->where('brkdndr_itiraflar.itiraf_durum', 1);
        $this->db->where('brkdndr_itiraflar.id', $id);
        $query = $this->db->get('brkdndr_itiraflar');
        return $query->row();
    }

    public function brkdndr_anasayfa_itiraf($id){
        $this->db->where('brkdndr_itiraflar.id', $id);
        $query = $this->db->get('brkdndr_itiraflar');
        return $query->row();
    }

    public function brkdndr_itiraf_sayaci($id){
        $brkdndr_itiraflar = $this->anasayfa_model->brkdndr_anasayfa_itiraf($id);

        if (get_cookie('itiraf_hit_' . $id) != 1) {
            set_cookie('itiraf_hit_' . $id, '1');
            $data = array(
                'itiraf_goruntulenme' => $brkdndr_itiraflar->itiraf_goruntulenme + 1
            );

            $this->db->where('id', $id);
            $this->db->update('brkdndr_itiraflar', $data);
        }

    }

    public function brkdndr_itiraf_sayisi(){
        $this->db->select('brkdndr_itiraflar.*');
        $this->db->where('brkdndr_itiraflar.itiraf_durum', 1);
        $this->db->order_by('brkdndr_itiraflar.id', 'DESC');
        $query = $this->db->get('brkdndr_itiraflar');
        return $query->num_rows();
    }

    public function brkdndr_sayfalama_itiraflari($per_page, $offset){
        $this->db->select('brkdndr_itiraflar.*');
        $this->db->where('brkdndr_itiraflar.itiraf_durum', 1);
        $this->db->order_by('brkdndr_itiraflar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('brkdndr_itiraflar');
        return $query->result();
    }

    public function insert($data){

        $insert = $this->db->insert("brkdndr_itiraflar", $data);
        return $insert;

    }

    public function itiraf_yorumlari($id){
        $this->db->join('brkdndr_itiraflar', 'brkdndr_itiraf_yorumlar.itiraf_id = brkdndr_itiraflar.id');
        $this->db->where('brkdndr_itiraflar.id', $id);
        $this->db->where('brkdndr_itiraf_yorumlar.yorum_durum', 1);
        $this->db->select('brkdndr_itiraf_yorumlar.*');
        $this->db->order_by('brkdndr_itiraf_yorumlar.id', 'DESC');
        $query = $this->db->get('brkdndr_itiraf_yorumlar');
        return $query->result();
    }
}