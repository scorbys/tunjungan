<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function is_not_login(){
        if ($this->session->userdata('tunjungan@') == FALSE) {
            return true;
        } else {
            return false;
        }
    }

    public function is_not_admin(){
        if ($this->session->userdata('tunjungan@id_level') == 1) {
            return false;
        } else {
            return true;
        }
    }

    public function is_not_kasir(){
        if ($this->session->userdata('tunjungan@id_level') == 2) {
            return false;
        } else {
            return true;
        }
    }

    public function is_not_keanggotaan(){
        if ($this->session->userdata('tunjungan@id_level') == 3) {
            return false;
        } else {
            return true;
        }
    }
}