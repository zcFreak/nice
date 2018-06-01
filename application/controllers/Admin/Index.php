<?php

class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Index_model', "index");
    }

    function index()
    {
        $this->index->index();
    }
}