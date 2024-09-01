<?php

date_default_timezone_set('Asia/Kolkata');

defined('BASEPATH') OR exit('No direct script access allowed');

class Site_admin extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->tablename 		= "Site_admin";

        $this->templatename 	= "login";

	}



	public function index()

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

						);

						$this->session->set_userdata($sess_data);

						$this->session->set_flashdata('success', 'Login successfully.!!');	

						redirect("dashboard");

					} 

					else // incorrect mobile no/password/$this->templatenamestatus

					{	

						$this->session->set_flashdata('error', 'Incorrect email & password.!');	

                        redirect('Site_admin');

					}

				}

				else // block user

				{

					$this->session->set_flashdata('error', 'You have a deactive user plz contact administer.!');

                    redirect(base_url('Site_admin'));

				}

			}

			else // incorrect mobile no/password/$this->templatenamestatus

			{

				$this->session->set_flashdata('error', 'Incorrect email & password.!');	

                redirect(base_url('Site_admin'));

			}


		}

		else //not enter email & password

		{

			$this->session->set_flashdata('error', 'Plase enter email address & password.!');

			redirect("site_admin");

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

        redirect(base_url('Site_admin'));

	}



}



