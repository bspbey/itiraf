<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends Genel_MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('fonksiyonlar');

    }

    public function index(){

        //sayfalama
        $sayfa = $this->security->xss_clean($this->input->get('sayfa'));
        if (empty($sayfa)) {
            $sayfa = 0;
        }

        if ($sayfa != 0) {
            $sayfa = $sayfa - 1;
        }
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->anasayfa_model->brkdndr_itiraf_sayisi();
        $config['per_page'] = $this->ayarlar->anasayfa_itiraf_sayisi;
        $this->pagination->initialize($config);

        //Ayarları veritabanından getirme
        $brkdndr_genel_ayarlar = $this->ayarlar_model->get_all();
        //Yazıların listesini veritabanından getirme
        $brkdndr_itiraf_listesi = $this->anasayfa_model->brkdndr_sayfalama_itiraflari($config['per_page'], $sayfa * $config['per_page']);

        $data = array(
            'itiraf_listesi' => $brkdndr_itiraf_listesi,
            'genel_ayarlar' => $brkdndr_genel_ayarlar
        );
        $this->load->view("anasayfa", $data);

    }

    public function brkdndr_itiraf_icerik($id){

        $itiraf_id_v2 = $this->security->xss_clean($id);
        $data['itiraf_icerik'] = $this->anasayfa_model->brkdndr_anasayfa_itiraf_icerik($itiraf_id_v2);
        $data['yorumlar'] = $this->anasayfa_model->itiraf_yorumlari($id);

        $id = $data['itiraf_icerik']->id;
        if (empty($data['itiraf_icerik']->itiraf_durum) || ($id == '')) {
            redirect(base_url());
        }

        $this->load->view("icerik", $data);

        $this->load->helper('cookie');
        $this->anasayfa_model->brkdndr_itiraf_sayaci($id);
    }

    public function brkdndr_insert(){
        $itiraf_icerik = $this->input->post("itiraf_icerik");
        $itiraf_rumuz = $this->input->post("itiraf_rumuz");
        $itiraf_cinsiyet    = $this->input->post("itiraf_cinsiyet");
        $itiraf_durum    = '0';
        $createdAt   = date("Y-m-d H:i:s");

        if($itiraf_icerik && $itiraf_rumuz){

                $data = array(
                    "itiraf_icerik"   => $itiraf_icerik,
                    "itiraf_rumuz"   => $itiraf_rumuz,
                    "itiraf_cinsiyet"      => $itiraf_cinsiyet,
                    "itiraf_durum"    => $itiraf_durum,
                    "createdAt"     => $createdAt
                );
                $insert = $this->anasayfa_model->insert($data);



                if($insert){
                    $alert = array(
                        "title" => "",
                        "message" => "İtirafınız başarıyla gönderilmiştir, onaylandıktan sonra yayınlanacaktır...",
                        "type" => "success"
                    );
                }
                else{
                    $alert = array(
                        "title" => "",
                        "message" => "İtirafınız gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyiniz...",
                        "type" => "danger"
                    );
                }

        }else{

            $alert = array(
                "title" => "",
                "message" => "Lütfen boş alan bırakmayınız.",
                "type" => "danger"
            );
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("anasayfa"));


    }

    public function yorum_ekle(){
        $itiraf_id = $this->input->post("itiraf_id");
        $yorum_rumuz = $this->input->post("yorum_rumuz");
        $yorum_email    = $this->input->post("yorum_email");
        $yorum_icerik = $this->input->post("yorum_icerik");
        $yorum_cinsiyet = $this->input->post("yorum_cinsiyet");
        $createdAt   = date("Y-m-d H:i:s");

        if($yorum_rumuz && $yorum_email && $yorum_icerik){

            $data = array(
                "itiraf_id"   => $itiraf_id,
                "yorum_rumuz"   => $yorum_rumuz,
                "yorum_email"   => $yorum_email,
                "yorum_icerik"   => $yorum_icerik,
                "yorum_cinsiyet"   => $yorum_cinsiyet,
                "createdAt"     => $createdAt
            );
            $insert = $this->yorumlar_model->yorum_ekle($data);

            if($insert){
                $alert = array(
                    "title" => "",
                    "message" => "Yorum ekleme işlemi başarılıdır, yorumunuzun görünmesi için yönetici onayı gereklidir.",
                    "type" => "success"
                );
            }
            else{
                $alert = array(
                    "title" => "",
                    "message" => "Yorum ekleme işlemi başarısızdır, lütfen tekrar deneyin.",
                    "type" => "danger"
                );
            }
        }else{

            $alert = array(
                "title" => "",
                "message" => "Lütfen boş alan bırakmayınız...",
                "type" => "danger"
            );
        }


        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("itiraf/".$itiraf_id));

    }
}
