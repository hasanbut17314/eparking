<?php

date_default_timezone_set('Asia/Kolkata');

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	/**
     * Benchmark class object
     *
     * @var	object
     */
    public $benchmark;
	function __construct()

	{

		parent::__construct();

		$this->tablename 		= "site_admin";

        $this->templatename 	= "login";

	}


	public function index()

	{

		$data['parking_type_master'] = $this->dbhelper->parking_type_master();
		$this->load->view('front/header');
		$this->load->view('front/index', $data);
		$this->load->view('front/footer');

	}

	public function admin()

	{

	    if($this->session->userdata('is_login') == 1){

			redirect('dashboard', 'refresh');

			die();	

		}

		$this->load->view('login');

	}



	public function login_user()

	{

		if($this->input->post('email') <> "" && $this->input->post('password') <> "")

		{

			$email 			= $this->input->post('email');

			$password 			= $this->input->post('password');

			$usertype = $this->input->post('options');

			

			

			$is_valid 			= $this->dbhelper->validate_user($email,md5($password));

			if($this->dbhelper->getSingleValue($this->tablename,"count(*)","email='".$email."'"))

			{

				$user_data = $this->dbhelper->singleRow($this->tablename,"*","email='$email'");

				if($user_data->status==1)

				{

					if($is_valid == 1)

					{  

						$sess_data = array(

							'admin_id' 		=> $user_data->id,

							'name' 			=> $user_data->name,

							'email' 		=> $user_data->email,

							'person_name' 		=> $user_data->person_name,

							'is_login' 		=> true,
							'user_type' 		=> 4,

						);

						$this->session->set_userdata($sess_data);

						$this->session->set_flashdata('success', 'Login successfully.!!');	

						redirect("dashboard");

					} 

					else // incorrect mobile no/password/$this->templatenamestatus

					{	

						$this->session->set_flashdata('error', 'Incorrect email & password.!');	

						redirect("site_admin");

					}

				}

				else // block user

				{

					$this->session->set_flashdata('error', 'You have a deactive user plz contact administer.!');

					redirect("/");

				}

			}

			else // incorrect mobile no/password/$this->templatenamestatus

			{

				$this->session->set_flashdata('error', 'Incorrect email & password.!');	

				redirect("/");

			}




		}

		else //not enter email & password

		{

			$this->session->set_flashdata('error', 'Plase enter email address & password.!');

			redirect("/");

		}

		if($this->session->userdata('is_login') == 1)

		{

			redirect('dashboard');
			

			die();	

		}

	}



	public function logout(){

		$this->session->set_flashdata("success","You have sucessfull log Out..!");

		$this->session->unset_userdata('logged_in');

		$this->session->set_userdata('is_login','0');

		session_destroy();

		redirect('front/login');

	}



}



