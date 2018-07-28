<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pitiraflar extends CI_Controller {

public function __construct(){
     parent::__construct();

    $user = $this->session->userdata("user");

    if(!$user){
        redirect(base_url("admin"));
    }
}

public function index(){

    $list = $this->pitiraflar_model->get_all();

    $viewData["list"] = $list;

    //2 Adet data gönderme
    $data = array(
    'list' => $list,
    'title' => "İtiraflar | Admin Paneli",
    );
    $this->load->view("admin/itiraflar", $data);
}

public function update_form($id){


    $where = array(
        "id" => $id
    );


    $itiraflar = $this->pitiraflar_model->get($where);


    $data = array(
    'itiraflar' => $itiraflar,
    'title' => "İtiraf Düzenle | Admin Paneli"
    );
    $data['itiraf_icerik'] = $this->pitiraflar_model->get($where);
    if (empty($data['itiraf_icerik']->itiraf_durum) || ($id == '')) {
        redirect(base_url("admin/itiraflar"));
    }

    $this->load->view("admin/itiraf_duzenle", $data);
}

public function update($id){

        $data = array(
        "itiraf_rumuz" => $this->input->post("itiraf_rumuz"),
        "itiraf_icerik" => $this->input->post("itiraf_icerik"),
        "itiraf_durum" => $this->input->post("itiraf_durum"),
        "updatedAt" => date("Y-m-d H:i:s")
        );

    $where = array(
        "id" => $id,
    );

    $update = $this->pitiraflar_model->update($where, $data);

    if($update){

        $alert = array(
            "title" => "İşlem Başarılıdır",
            "message" => "Güncelleme işlemi başarılıdır...",
            "type" => "success"
        );
    }
    else{
        $alert = array(
            "title" => "İşlem Başarısızdır!!",
            "message" => "Güncelleme işlemi başarısızdır...",
            "type" => "danger"
        );
    }

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("admin/itiraflar"));
}

public function delete($id){

    $where = array(
        "id" => $id
    );

    $delete = $this->pitiraflar_model->delete($where);

    if($delete){

        $alert = array(
            "title" => "İşlem Başarılıdır!!",
            "message" => "Silme işlemi başarılıdır...",
            "type" => "success"
        );
    }else {

        $alert = array(
            "title" => "İşlem Başarısızdır!!",
            "message" => "Silme işlemi başarısızdır...",
            "type" => "danger"
        );
    }

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("admin/itiraflar"));
}


}