<?php

class Index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Index_model', "index");
    }

    function index()
    {
        echo 'no';
        //$this->index->index();
    }
}