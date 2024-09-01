<?php 

error_reporting(0);

date_default_timezone_set('Asia/Kolkata');

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){

        parent::__construct();

        $this->tablename 		= "user_login";

        $this->templatename 	= "profile";

        $this->load->model('dbhelper');

        $this->admin_id			= $this->session->userdata('admin_id');

        $this->directory        = "./assets/uploads/admin/";

        if(!$this->session->userdata('is_login'))

		{

			redirect(BASE_URL);

		} 

    }

	public function index()

	{	

		$data['title'] = "Profile";
		$person_name =$this->session->userdata('person_name');
		if($person_name == 'Admin'){
			$data['user_details'] = $this->dbhelper->singleRow('site_admin', "*", "id='".$this->admin_id."'");
		}else{
			$data['user_details'] = $this->dbhelper->singleRow($this->tablename, "*", "id='".$this->admin_id."'");
		}
		

		$this->load->template($this->templatename,$data);

	}



	public function profile_update(){

		$mode = $this->input->post('mode');

		if($mode == "update")

		{

			$name 			= $this->input->post('name');

			$email 			= $this->input->post('email');
			$phonenumber 	= $this->input->post('phonenumber');
			

			$vatnum 	= $this->input->post('vatnum');

			$address 	= $this->input->post('address');

			$city = $this->input->post('city');

			$post_code 	= $this->input->post('post_code');

			$data['name'] 		= $name ? $name :'';

			$data['email'] 		= $email ? $email :'';

			$data['phonenumber']= $phonenumber ? $phonenumber :'';

			$data['vatnum']	= $vatnum ? $vatnum :'';

			$data['address']	= $address ? $address :'';
			$data['city']	= $city ? $city :'';
			$data['post_code']	= $post_code ? $post_code :'';


			$person_name =$this->session->userdata('person_name');
		if($person_name == 'Admin'){
			$this->dbhelper->updateRow('site_admin',$data,"id",$this->admin_id);
		}else{
			$this->dbhelper->updateRow($this->tablename,$data,"id",$this->admin_id);
		}
			

			$this->session->set_flashdata('success','Profile updated successFully...!!');

			redirect(BASE_URL.'profile');

		}

		else

		{

			$this->session->set_flashdata('error','Oops.try again...!!');

			redirect(BASE_URL.'profile');	

		}

	}

}



