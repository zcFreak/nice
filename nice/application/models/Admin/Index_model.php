<?php

class Index_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data = array('num' => 2);

        $this->db->insert('test', $data);
    }

}