<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa_model extends CI_Model {

    public function anasayfa_son_itiraf(){
        $this->db->select('itiraflar.*');
        $this->db->where('itiraflar.itiraf_durum', 1);
        $query = $this->db->get('itiraflar')->result();
        return $query;
    }
    public function anasayfa_itiraf_icerik($id){
        $this->db->select('itiraflar.*');
        $this->db->where('itiraflar.itiraf_durum', 1);
        $this->db->where('itiraflar.id', $id);
        $query = $this->db->get('itiraflar');
        return $query->row();
    }

    public function anasayfa_itiraf($id){
        $this->db->where('itiraflar.id', $id);
        $query = $this->db->get('itiraflar');
        return $query->row();
    }

    public function itiraf_sayaci($id){
        $itiraflar = $this->anasayfa_model->anasayfa_itiraf($id);

        if (get_cookie('itiraf_hit_' . $id) != 1) {
            set_cookie('itiraf_hit_' . $id, '1');
            $data = array(
                'itiraf_goruntulenme' => $itiraflar->itiraf_goruntulenme + 1
            );

            $this->db->where('id', $id);
            $this->db->update('itiraflar', $data);
        }

    }

    public function itiraf_sayisi(){
        $this->db->select('itiraflar.*');
        $this->db->where('itiraflar.itiraf_durum', 1);
        $this->db->order_by('itiraflar.id', 'DESC');
        $query = $this->db->get('itiraflar');
        return $query->num_rows();
    }

    public function sayfalama_itiraflari($per_page, $offset){
        $this->db->select('itiraflar.*');
        $this->db->where('itiraflar.itiraf_durum', 1);
        $this->db->order_by('itiraflar.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('itiraflar');
        return $query->result();
    }

    public function insert($data){

        $insert = $this->db->insert("itiraflar", $data);
        return $insert;

    }

    public function itiraf_yorumlari($id){
        $this->db->join('itiraflar', 'itiraf_yorumlar.itiraf_id = itiraflar.id');
        $this->db->where('itiraflar.id', $id);
        $this->db->where('itiraf_yorumlar.yorum_durum', 1);
        $this->db->select('itiraf_yorumlar.*');
        $this->db->order_by('itiraf_yorumlar.id', 'DESC');
        $query = $this->db->get('itiraf_yorumlar');
        return $query->result();
    }
}