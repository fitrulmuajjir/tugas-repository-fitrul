<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Bank extends REST_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Bank_model');
    }

public function index_get(){
        $id = $this->get('id');
        if($id != ''){
            $data_mhs = $this->Bank_model->getBank($id);
        }else{
            $data_mhs = $this->Bank_model->getBank();
        }
        if($data_mhs == true){
          $this->response(array(
            'status'  => 'true',
            'code'    => '200',
            'data'    => $data_mhs
          ), REST_Controller::HTTP_CREATED);
        }else{
            $this->response(array(
            'status'  => 'false',
            'code'    => 'data belum ada'
          ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function tambah_post(){
      if($this->Bank_model->tambahDataBank($_POST) > 0) {
         $this->response(array(
          'status'  => 'true',
          'code'    => '200',
          'data'    => 'data berhasil dihapus'
         ), REST_Controller::HTTP_CREATED);
      } else {
        $this->response(array(
          'status'  => 'false',
          'code'    => '401',
          'data'    => 'data gagal disimpan disisi server'
        ), REST_Controller::HTTP_BAD_REQUEST);
      }
    }

    public function ubah_post(){
      if($this->Bank_model->ubahDataBank($_POST) > 0) {
        $this->reponse(array(
          'status' =>'true',
          'code'   => '200',
          'data'   => 'data berhasil diubah'
        ), REST_Controller::HTTP_CREATED);
      }else {
        $this->response(array(
          'status '=>'false',
          'code'   => '401',
          'data'   => 'data gagal di ubah disisi server'
          ), REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  public function hapus_get($id){
      if($this->Bank_model->hapusDataBank($id)) {
         $this->response(array(
          'status'  => 'true',
          'code'    => '200',
          'data'    => 'data berhasil dihapus'
         ), REST_Controller::HTTP_CREATED);
      } else {
        $this->response(array(
          'status'  => 'false',
          'code'    => '401',
          'data'    => 'data gagal dihapus disisi server'
        ), REST_Controller::HTTP_BAD_REQUEST);
      }
    }
}