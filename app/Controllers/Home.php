<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data['content'] = 'home_view'; // refers to the view
        $this->load->view('template', $data);
    }
}



