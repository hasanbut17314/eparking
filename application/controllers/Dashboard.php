<?php

date_default_timezone_set('Asia/Kolkata');

defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0);

class Dashboard extends CI_Controller {



	public function __construct(){

        parent::__construct();

        $this->tablename 		= "";

        $this->templatename 	= "dashboard"; 

        $this->admin_id 		= $this->session->userdata('admin_id');

        if(!$this->session->userdata('is_login'))

		{

			redirect("front/login");

		}

    }

	public function index()
	{
		$data['title'] 					= "Manage Dashboard";
		$data['title'] 					= "Manage Dashboard";
		$data['total_sub_admin'] 		= 1;
		$this->load->template($this->templatename,$data);
	}

}

