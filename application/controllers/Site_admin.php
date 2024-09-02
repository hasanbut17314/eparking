<?php 

date_default_timezone_set('Asia/Kolkata');

error_reporting(1);

defined('BASEPATH') OR exit('No direct script access allowed');
use Mpdf\Mpdf;
class Site_admin extends CI_Controller 

{



	public function __construct()

	{

        parent::__construct();

        $this->tablename 		= "site_admin";

        $this->templatename 	= "site_admin/index";

		$this->templatenames = "site_admin/master";

        $this->admin_id 		= $this->session->userdata('admin_id');

        //check login

        // if(!$this->session->userdata('is_login'))

		// {

		// 	redirect(BASE_URL);

		// } 

    }


	public function index()

	{

	    // if($this->session->userdata('is_login') == 1){

		// 	redirect(BASE_URL.'dashboard', 'refresh');

		// 	die();	

		// }

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

                        redirect(base_url('Site_admin'));

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

			redirect(BASE_URL);

		}

		if($this->session->userdata('is_login') == 1)

		{

			redirect(BASE_URL.'dashboard');

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

	public function userlist()

	{

		$data['title'] 				= "Manage  User";

		$data['getoperation_master']         =  $this->dbhelper->user_details();

 		$this->load->template($this->tablename.'/userlist',$data);

	}

	public function parkinglist()

	{

		$data['title'] 				= "Manage  Parking";
		$admin_id =$this->session->userdata('admin_id');
		$person_name =$this->session->userdata('person_name');
		if($person_name == 'Admin'){
			$data['getoperation_master']         =  $this->dbhelper->parking_master_admin();
		}else{
			$data['getoperation_master']         =  $this->dbhelper->parking_master($admin_id);
		}
		

 		$this->load->template($this->tablename.'/parkinglist',$data);

	}

	public function bookinglist()

	{

		$data['title'] 				= "Manage  Booking Details";
		$admin_id =$this->session->userdata('admin_id');
		$data['getBokingInfo']         =  $this->dbhelper->getBokingInfo();

 		$this->load->template($this->tablename.'/bookinglist',$data);

	}

	public function feedbacklist()

	{

		$data['title'] 				= "Manage  Feedback Details";
		$admin_id =$this->session->userdata('admin_id');
		$data['feedbacklist']         =  $this->dbhelper->feedbacklist();

 		$this->load->template($this->tablename.'/feedbacklist',$data);

	}

	

	public function parkingtypelist()

	{

		$data['title'] 				= "Manage  Parking Type";
		$admin_id =$this->session->userdata('admin_id');
		$data['getoperation_master']         =  $this->dbhelper->parking_type_master();
		$data['admin_id'] = $admin_id;
 		$this->load->template($this->tablename.'/parkingtypelist',$data);

	}

	
	public function edit_mobiledata_entry($id) {
		$postArr = $this->input->post();
		if($postArr['sim_type'] == 1){
			$simTypInfo = $postArr['sim_number'];
			$sim_number_1 = '';
			$sim_number_2 = '';
			$sim_number_3 = '';
		}else{
			$simTypInfo = "";
			$sim_number_1 = $postArr['sim_number_1'];
			$sim_number_2 = $postArr['sim_number_2'];
			$sim_number_3 = $postArr['sim_number_2'];
		}
		$data = [
			'account_type' => $postArr['account_type'],
			'operator_name' => $postArr['operator_name'],
			'account_limit' => $postArr['account_limit'],
			'user_name' => $postArr['user_name'],
		   'package_name' => $postArr['package_name'],
		   'voice' => $postArr['voice'],
			'sim_type' => $postArr['sim_type'],
		   'state' => $postArr['state'],
			'sim_number' => $simTypInfo,
		   'sim_number_1' => $sim_number_1,
		   'sim_number_2' => $sim_number_2,
		   'sim_number_3' => $sim_number_3,
		   'service_number' => $postArr['service_number'],
		   'account_number' => $postArr['account_number'],
		   'class_name' => $postArr['class_name'],
		   'descption' => $postArr['descption'],
		];

		$insert_id = $this->dbhelper->updateMobileData($data, $id);
		//log data
		$log_data = [
			'log_date' => date('d-m-Y'),
			'change_type' => 'Update',
			'account' => $postArr['account_number'],
			'service' => $postArr['service_number'],
			'new' => $postArr['state'],
			'reason' => $postArr['descption'],
			'accountType' => "Mobile",
		];
		$this->dbhelper->inserLogMaster($log_data);
//end
		$this->session->set_flashdata('success', 'Account update data successfully..!');

        redirect(BASE_URL . "site_admin/mobilelist");
	}

	public function editParkingType($id)

	{

			$data['parkinginfo'] = $this->dbhelper->getParkingTypeInfo($id);
			
	
		$this->load->template('/site_admin/editParkingType',$data);

	}

	public function editParkingInfo($id)

	{
		$admin_id =$this->session->userdata('admin_id');
		$data['parking_type_master']         =  $this->dbhelper->parking_type_master();
			$data['parkinginfo'] = $this->dbhelper->getParkingArrInfo($id);
			
	
		$this->load->template('/site_admin/editParkingInfo',$data);

	}

	public function edit_parking_type_entry($id) {
		$postArr = $this->input->post();
	   $data = [
				   'parking_type_name' => $postArr['parking_type_name'],
				];
			   $insert_id = $this->dbhelper->updateParkingInfo($data, $id);
   
			   //log data
		   
   //end
   $admin_id =$this->session->userdata('admin_id');
				   $this->session->set_flashdata('success', 'Parking data update successfully..!');
   
		   redirect(BASE_URL . "site_admin/parkingtypelist");
   
   }

   public function edit_datacircuit_entry($id) {
	$postArr = $this->input->post();
   $data = [
			   'account_type' => $postArr['account_type'],
			   'operator_name' => $postArr['operator_name'],
			   'account_limit' => $postArr['account_limit'],
			   'user_name' => $postArr['user_name'],
			  'package_name' => $postArr['package_name'],
			  'voice' => $postArr['voice'],
			   'state' => $postArr['state'],
			   'service_number' => $postArr['service_number'],
			  'account_number' => $postArr['account_number'],
			  'service_description' => $postArr['service_description'],
			  'number_service' => $postArr['number_service'],
			  'class_name' => $postArr['class_name'],
			  'descption' => $postArr['descption'],
			  'location_name' => $postArr['location_name'],
			  'accountType' => "Data Circuit",
		   ];
		   $insert_id = $this->dbhelper->updateDataCircuit($data, $id);

		   //log data
	   $log_data = [
		   'log_date' => date('d-m-Y'),
		   'change_type' => 'Update',
		   'account' => $postArr['account_number'],
		   'service' => $postArr['service_number'],
		   'new' => $postArr['state'],
		   'reason' => $postArr['descption'],
	   ];
	   $this->dbhelper->inserLogMaster($log_data);
//end

			   $this->session->set_flashdata('success', 'Data circuit update successfully..!');

	   redirect(BASE_URL . "site_admin/datacircuitlist");

}

	public function editMobile($id)

	{

			$data['single_account_mobile_master'] = $this->dbhelper->single_account_mobile_master($id);
			
		$data['package_master']         =  $this->dbhelper->package_master();



		$data['operator_master']         =  $this->dbhelper->operator_master();

		$data['user_master']         =  $this->dbhelper->package_user();

		$data['location_master']         =  $this->dbhelper->location_master();

		$this->load->template($this->templatenames . '/editMobile',$data);

	}

    public function downloadReport() {
        // Load mPDF library
          require_once APPPATH.'third_party/mpdf2/vendor/autoload.php';
$data['getoperation_master']         =  $this->dbhelper->package_user();
        // Retrieve HTML content from a view file
        $html = $this->load->view('pdf_template', $data, true);

        // Create mPDF object
        $mpdf = new Mpdf();

        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        // Output PDF
        $mpdf->Output('user_report.pdf', 'D'); // 'D' for download

        exit;
    }



    public function downloadAccountReport() {
        // Load mPDF library
          require_once APPPATH.'third_party/mpdf2/vendor/autoload.php';
$data['title'] 				= "Account Report";

		$mobiledata         =  $this->dbhelper->package_account();
		$landlinedata         =  $this->dbhelper->landline_account();
		$datacircutdata         =  $this->dbhelper->data_circuit_account();
		$arraydata = array_merge($mobiledata, $landlinedata, $datacircutdata);
		$data['getoperation_master'] = $arraydata;
        // Retrieve HTML content from a view file
        $html = $this->load->view('account_pdf_template', $data, true);

        // Create mPDF object
        $mpdf = new Mpdf();

        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        // Output PDF
        $mpdf->Output('account_report.pdf', 'D'); // 'D' for download

        exit;
    }





    public function submit_operation_entry() {

        $postArr = $this->input->post();



		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|callback_alpha_space');
		$this->form_validation->set_rules('account_manager', 'Account manager', 'required|callback_alpha_space');
		$this->form_validation->set_message('alpha_space', 'The {field} field may only contain alphabetic characters and spaces.');


		if ($this->form_validation->run() == FALSE) {
			$data['getoperation_master']         =  $this->dbhelper->package_master();
$data['get_location']         =  $this->dbhelper->location_master();	

			$this->load->template($this->templatenames . '/addOperation',$data);
        } else {

			$data = [

				'name' => $postArr['name'],
	
				// 'package_name' => $postArr['package_name'],
	
				'location' => $postArr['location'],
	
				'account_manager' => $postArr['account_manager'],
	
				'contact' => $postArr['contact'],
	
				'email' => $postArr['email'],
	
				'website' => $postArr['website'],
	
				'support_email' => $postArr['support_email'],
	
				'support_phone' => $postArr['support_phone'],
	
				'status' => $postArr['status'],
	
			];
	
			$insert_id = $this->dbhelper->saveOperation($data);
	$this->session->set_flashdata('success', 'Operation data successfully..!');
	
			redirect(BASE_URL . "site_admin/operatorlist");
	
		}


      
    }



	

	public function getDepartmentData() {

		$locationid = $this->input->post('data_id');

	//	$getLocationNameData = $this->dbhelper->getLocationNameData($locationid);

		$data['department_name'] = $this->dbhelper->getDepartmentNameData($locationid);
		$this->load->view($this->templatenames . '/ajaxDepartReport',$data);

		

	}

	public function getDepartmentManagerData() {

		$locationid = $this->input->post('data_id');

	//	$getLocationNameData = $this->dbhelper->getLocationNameData($locationid);

		$department_name = $this->dbhelper->getDepartmentNameManagerData($locationid);
		$managerName= $department_name[0]->reporting_to;
		if(!empty($department_name)){
			echo $managerName;exit;
		}else{
			
			echo '1';exit;
		}
		
		

	}

	public function getUserAccountData() {

		$locationid = $this->input->post('data_id');
		$mobiledata         =  $this->dbhelper->package_account_get_user($locationid);
		if(empty($mobiledata)){
			$landline         =  $this->dbhelper->landline_account_get_user($locationid);
			if(empty($landline)){
				$datacircuitlandline         =  $this->dbhelper->account_data_circuit_master($locationid);
				if(!empty($datacircuitlandline)){
					$data['mobile'] = $datacircuitlandline;
			$this->load->view($this->templatenames . '/ajaxUserAccountDataCirCit',$data);
				}
			}else{

				$data['mobile'] = $landline;
				$this->load->view($this->templatenames . '/ajaxUserAccountLandline',$data);
			}
		}else{
			$data['mobile'] = $mobiledata;
			$this->load->view($this->templatenames . '/ajaxUserAccountMobile',$data);
		}
		
	}


	public function getUserAccountData_bk() {

		$locationid = $this->input->post('data_id');
		$mobiledata         =  $this->dbhelper->package_account_get_user($locationid);
		if(empty($mobiledata)){
			$landline         =  $this->dbhelper->landline_account_get_user($locationid);
			if(empty($landline)){
				$datacircuitlandline         =  $this->dbhelper->account_data_circuit_master($locationid);
				if(!empty($datacircuitlandline)){
					$data['mobile'] = $datacircuitlandline;
			$this->load->view('ajaxUserAccountDataCirCit',$data);
				}
			}else{

				$data['mobile'] = $landline;
				$this->load->view('ajaxUserAccountLandline',$data);
			}
		}else{
			$data['mobile'] = $mobiledata;
			$this->load->view('ajaxUserAccountMobile',$data);
		}
		
	}


	public function submit_location_entry() {

        $postArr = $this->input->post();

 $data = [

            // 'department_name' => $postArr['department'],

			'location_name' => $postArr['location_name'],

            'status' => $postArr['status'],

        ];

        $insert_id = $this->dbhelper->saveLocation($data);
   $this->session->set_flashdata('success', 'Location data successfully..!');

        redirect(BASE_URL . "site_admin/locationlist");

    }







    public function submit_package_entry() {

        $postArr = $this->input->post();



        $this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('monthly_fee', 'Monthly fee', 'required|numeric');
		
        if ($this->form_validation->run() == FALSE) {
			$data['getoperation_master']         =  $this->dbhelper->operator_master();
      

			$this->load->template($this->templatenames . '/addPackage',$data);
        } else {
			$data = [
				'operator_id' => $postArr['operator_id'],
				'name' => $postArr['name'],
	
				'monthly_fee' => $postArr['monthly_fee'],
	
				// 'minutes_in' => $postArr['minutes_in'],
				// 'minutes_out' => $postArr['minutes_out'],
				// 'internet_on_net' => $postArr['internet_on_net'],
				// 'internet_off_net' => $postArr['internet_off_net'],

				// 'data_volum_info' => $postArr['data_volum_info'],
				// 'data_volumn' => $postArr['data_volumn'],
				'internet' => $postArr['internet'],
				'minutes_in_net' => $postArr['minutes_in_net'],
				'minutes_off_net' => $postArr['minutes_off_net'],
				'class_name' => $postArr['class_name'],
				
	
				'data_voice' => $postArr['data_voice'],
				'package_type' => $postArr['package_type'],
				
	
				'descption' => $postArr['descption'],
	
				'status' => $postArr['status'],
	
			];
	
			$insert_id = $this->dbhelper->savePackage($data);
	 $this->session->set_flashdata('success', 'Package data successfully..!');
	
			redirect(BASE_URL . "site_admin/packagelist");
        }





     

    }

	public function submit_change_user_entry() {
		$postArr = $this->input->post();
		
		$userId = $postArr['user_id'];
		$data = [
			'user_change_status' => $postArr['user_change_status'],
			'user_end_date' => $postArr['user_end_date'],
			'user_reson' => $postArr['user_reson'],
			'account_number' => ''
		];
		$insert_id = $this->dbhelper->updateuser_master($data, $userId);
		redirect(BASE_URL . "site_admin/userrestrict");
	}



	public function submit_user_entry() {

        $postArr = $this->input->post();


		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|callback_alpha_space');
		$this->form_validation->set_rules('account_name', 'Account name', 'required|callback_alpha_space');
		$this->form_validation->set_message('alpha_space', 'The {field} field may only contain alphabetic characters and spaces.');

        if ($this->form_validation->run() == FALSE) {
			$data['get_department']         =  $this->dbhelper->package_department();

			$data['get_location']         =  $this->dbhelper->location_master();

			$this->load->template($this->templatenames . '/addUser',$data);
        } else {
			$data = [

				'name' => $postArr['name'],
	
				'account_name' => $postArr['account_name'],
	
				'department' => $postArr['department'],
	
				'location' => $postArr['location'],
	
				'start_date' => $postArr['start_date'],
	
				'account_number' => $postArr['account_number'],
	
				'manage_name' => $postArr['manage_name'],
	
				'status' => $postArr['status'],
	
			];
	
			
	
			$insert_id = $this->dbhelper->inserUserMaster($data);
	$customer_code = sprintf("#EMP%04d", $insert_id);
	
		   $data12 = array(     
	
				  'employee_id'    => $customer_code,
	
		   );
	
		   $this->dbhelper->updateUserEmployeeData($data12, $insert_id);
	 $this->session->set_flashdata('success', 'User data successfully..!');
	
			redirect(BASE_URL . "site_admin/userlist");
		}


	

    }



	public function alpha_space($str) {
		if (!preg_match('/^[A-Za-z\s]+$/', $str)) {
			$this->form_validation->set_message('alpha_space', 'The {field} field may only contain alphabetic characters and spaces.');
			return false;
		}
		return true;
	}
	public function submit_department_entry() {

        $postArr = $this->input->post();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|callback_alpha_space');
		$this->form_validation->set_rules('position_name', 'Position name', 'required|callback_alpha_space');
		$this->form_validation->set_rules('department_name', 'Department name', 'required|callback_alpha_space');
		$this->form_validation->set_rules('reporting_to', 'Reporting to', 'required|callback_alpha_space');
		$this->form_validation->set_message('alpha_only', 'The {field} field may only contain alphabetic characters.');

        if ($this->form_validation->run() == FALSE) {
			$data['get_location']         =  $this->dbhelper->location_master();
      

			$this->load->template($this->templatenames . '/addDepartment',$data);
        } else {
			$data = [

				'name' => $postArr['name'],
	
				'position_name' => $postArr['position_name'],
				'location_id' => $postArr['location_id'],
				'department_name' => $postArr['department_name'],
	
				'reporting_to' => $postArr['reporting_to'],
	
			   'status' => $postArr['status'],
	
			];
	
			$insert_id = $this->dbhelper->inserDepartmentMaster($data);
	 $this->session->set_flashdata('success', 'Department data successfully..!');
	
			redirect(BASE_URL . "site_admin/departmentlist");
		}

	

    }


	
	public function submit_mobile_entry() {
		$postArr = $this->input->post();
		if($postArr['sim_type'] == 1){
			$simTypInfo = $postArr['sim_number'];
			$sim_number_1 = '';
			$sim_number_2 = '';
			$sim_number_3 = '';
		}else{
			$simTypInfo = "";
			$sim_number_1 = $postArr['sim_number_1'];
			$sim_number_2 = $postArr['sim_number_2'];
			$sim_number_3 = $postArr['sim_number_2'];
		}
		$data = [
			'account_type' => 1,
			'operator_name' => $postArr['operator_name'],
			'account_limit' => $postArr['account_limit'],
			// 'user_name' => $postArr['user_name'],
		   'package_name' => $postArr['package_name'],
		//    'voice' => $postArr['voice'],
			'sim_type' => $postArr['sim_type'],
		   'state' => $postArr['state'],
			'sim_number' => $simTypInfo,
		   'sim_number_1' => $sim_number_1,
		   'sim_number_2' => $sim_number_2,
		   'sim_number_3' => $sim_number_3,
		   'service_number' => $postArr['service_number'],
		   'account_number' => $postArr['account_number'],
		   'class_name' => $postArr['class_name'],
		   'descption' => $postArr['descption'],
		];

		$insert_id = $this->dbhelper->inserAccountMaster($data);
		//log data
		$log_data = [
			'log_date' => date('d-m-Y'),
			'change_type' => 'insert',
			'account' => $postArr['account_number'],
			'service' => $postArr['service_number'],
			'new' => $postArr['state'],
			'reason' => $postArr['descption'],
			'accountType' => "Mobile",
		];
		$this->dbhelper->inserLogMaster($log_data);
//end
		$this->session->set_flashdata('success', 'Account data successfully..!');

        redirect(BASE_URL . "site_admin/mobilelist");
	}

public function submit_landline_entry() {
	 $postArr = $this->input->post();
	$data = [
				'account_type' => 2,
				'operator_name' => $postArr['operator_name'],
				'account_limit' => $postArr['account_limit'],
				// 'user_name' => $postArr['user_name'],
			   'package_name' => $postArr['package_name'],
			//    'voice' => $postArr['voice'],
			   'state' => $postArr['state'],
				'service_number' => $postArr['service_number'],
			   'account_number' => $postArr['account_number'],
			   'service_description' => $postArr['service_description'],
			   'number_service' => $postArr['number_service'],
			   'class_name' => $postArr['class_name'],
			   'descption' => $postArr['descption'],
			];
			$insert_id = $this->dbhelper->inserAccountLandlineMaster($data);

			//log data
		$log_data = [
			'log_date' => date('d-m-Y'),
			'change_type' => 'insert',
			'account' => $postArr['account_number'],
			'service' => $postArr['service_number'],
			'new' => $postArr['state'],
			'reason' => $postArr['descption'],
			'accountType' => "Landline",
		];
		$this->dbhelper->inserLogMaster($log_data);
//end

				$this->session->set_flashdata('success', 'Account data successfully..!');

        redirect(BASE_URL . "site_admin/landlinelist");

}

public function submit_datacircuit_entry() {
	 $postArr = $this->input->post();
	$data = [
				'account_type' => 3,
				'operator_name' => $postArr['operator_name'],
				'account_limit' => $postArr['account_limit'],
				// 'user_name' => $postArr['user_name'],
			   'package_name' => $postArr['package_name'],
			//    'voice' => $postArr['voice'],
				'state' => $postArr['state'],
				'service_number' => $postArr['service_number'],
			   'account_number' => $postArr['account_number'],
			   'service_description' => $postArr['service_description'],
			   'number_service' => $postArr['number_service'],
			   'class_name' => $postArr['class_name'],
			   'descption' => $postArr['descption'],
			   'location_name' => $postArr['location_name'],
			   'accountType' => "Data Circuit",
			];
			$insert_id = $this->dbhelper->inserAccountDataCircuitMaster($data);

			//log data
		$log_data = [
			'log_date' => date('d-m-Y'),
			'change_type' => 'insert',
			'account' => $postArr['account_number'],
			'service' => $postArr['service_number'],
			'new' => $postArr['state'],
			'reason' => $postArr['descption'],
			'accountType' => "Data Circuit",
			
		];
		$this->dbhelper->inserLogMaster($log_data);
//end

				$this->session->set_flashdata('success', 'Account data successfully..!');

        redirect(BASE_URL . "site_admin/landlinelist");

}


	public function submit_account_entry() {

        $postArr = $this->input->post();


		if($postArr['account_type'] == 1){
			if($postArr['sim_type'] == 1){
				$simTypInfo = $postArr['sim_type'];
				$sim_number_1 = '';
				$sim_number_2 = '';
				$sim_number_3 = '';
			}else{
				$simTypInfo = "";
				$sim_number_1 = $postArr['sim_number_1'];
				$sim_number_2 = $postArr['sim_number_2'];
				$sim_number_3 = $postArr['sim_number_2'];
			}
			$data = [
				'account_type' => $postArr['account_type'],
				'operator_name' => $postArr['operator_name'],
				'account_limit' => $postArr['account_limit'],
				'user_name' => $postArr['user_name'],
			   'package_name' => $postArr['package_name'],
			   'voice' => $postArr['voice'],
				'sim_type' => $postArr['sim_type'],
			   'state' => $postArr['state'],
				'sim_number' => $simTypInfo,
			   'sim_number_1' => $sim_number_1,
			   'sim_number_2' => $sim_number_2,
			   'sim_number_3' => $sim_number_3,
			   'service_number' => $postArr['service_number'],
			   'account_number' => $postArr['account_number'],
			   'class_name' => $postArr['class_name'],
			   'descption' => $postArr['descption'],
			];

			$insert_id = $this->dbhelper->inserAccountMaster($data);
		}else if($postArr['account_type'] == 2){
			$data = [
				'account_type' => $postArr['account_type'],
				'operator_name' => $postArr['operator_name'],
				'account_limit' => $postArr['account_limit'],
				'user_name' => $postArr['user_name'],
			   'package_name' => $postArr['package_name'],
			   'voice' => $postArr['voice'],
			   'state' => $postArr['state'],
				'service_number' => $postArr['service_number'],
			   'account_number' => $postArr['account_number'],
			   'service_description' => $postArr['service_description'],
			   'number_service' => $postArr['number_service'],
			   'class_name' => $postArr['class_name'],
			   'descption' => $postArr['descption'],
			];
			$insert_id = $this->dbhelper->inserAccountLandlineMaster($data);
		}else{
			$data = [
				'account_type' => $postArr['account_type'],
				'operator_name' => $postArr['operator_name'],
				'account_limit' => $postArr['account_limit'],
				'user_name' => $postArr['user_name'],
			   'package_name' => $postArr['package_name'],
			   'voice' => $postArr['voice'],
				'state' => $postArr['state'],
				'service_number' => $postArr['service_number'],
			   'account_number' => $postArr['account_number'],
			   'service_description' => $postArr['service_description'],
			   'number_service' => $postArr['number_service'],
			   'class_name' => $postArr['class_name'],
			   'descption' => $postArr['descption'],
			   'location_name' => $postArr['location_name'],
			];
			$insert_id = $this->dbhelper->inserAccountDataCircuitMaster($data);
		}
		

        

//log data
		$log_data = [
			'log_date' => date('d-m-Y'),
			'change_type' => 'insert',
			'account' => $postArr['account_number'],
			'service' => $postArr['service_number'],
			'new' => $postArr['state'],
			'reason' => $postArr['descption'],
		];
		$this->dbhelper->inserLogMaster($log_data);
//end







        $this->session->set_flashdata('success', 'Account data successfully..!');

        redirect(BASE_URL . "site_admin/accountlist");

    }















	    public function ajaxSalesData($postData=null)

    {

        // code...

        $response = array();

         $draw = $postData['draw'];

     $start = $postData['start'];

     $rowperpage = $postData['length']; // Rows display per page

     $columnIndex = $postData['order'][0]['column']; // Column index

     $columnName = $postData['columns'][$columnIndex]['data']; // Column name

     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc

     $searchValue = $postData['search']['value']; // Search value





     $this->db->select('count(*) as allcount');

      $this->db->where('isDeleted', '1');

      

     $records = $this->db->get('product')->result();

     $totalRecords = $records[0]->allcount;







     $this->db->select('count(*) as allcount');

     $this->db->where('isDeleted', '1');



     $records = $this->db->get('product')->result();

     $totalRecordwithFilter = 10;





      ## Fetch records

     $this->db->select('*');

      $this->db->where('isDeleted', '1');

  

     $this->db->order_by($columnName, $columnSortOrder);

     $this->db->limit($rowperpage, $start);

     $records = $this->db->get('product')->result();



     

      $data = array();



     foreach($records as $record ){

    if($record->status == 1){

       $btnData =  '<button style="    padding: 4px;" class="btn btn-primary">Active</button></td>';

    } else {

       $btnData =  '<button style="    padding: 4px;" class="btn btn-danger">DeActive</button></td>';

     } 



       $data[] = array( 

         "id"=>$record->id,

         "productcode"=>$record->product_code,

         "productname"=>$record->product_name,

         "qty"=>$record->product_quantity,

         'saleamount' => $record->product_sales_rate,

         'purchaseamount' => $record->product_purchase_rate,

         "stauts"=>$btnData,

         

       ); 

     }



       ## Response

     $response = array(

       "draw" => intval($draw),

       "iTotalRecords" => $totalRecords,

       "iTotalDisplayRecords" => $totalRecords,

       "aaData" => $data

     );

  //   echo '<pre>';print_r($response);exit;

    // return $response; 

 echo json_encode($response);

        exit;





    }


	public function userReport() {
		$data['title'] 				= "User Report";

		$data['getoperation_master']         =  $this->dbhelper->package_user();

 		
		$this->load->template($this->templatenames . '/userReport',$data);
	}

	public function accountReport() {
		$data['title'] 				= "Account Report";

		$mobiledata         =  $this->dbhelper->package_account();
		$landlinedata         =  $this->dbhelper->landline_account();
		$datacircutdata         =  $this->dbhelper->data_circuit_account();
		$arraydata = array_merge($mobiledata, $landlinedata, $datacircutdata);
		$data['getoperation_master'] = $arraydata;
 		
		$this->load->template($this->templatenames . '/accountReport',$data);
	}

		public function loghistory() {
		$data['title'] 				= "Log History";

		$data['logdata']         =  $this->dbhelper->logHistory();
		$this->load->template($this->templatenames . '/loghistory',$data);
	}

	
	public function useraccountloghistory() {
		$data['title'] 				= "User Log History";
		$data['getoperation_master']         =  $this->dbhelper->package_user();
		$data['logdata']         =  $this->dbhelper->logHistory();
		$this->load->template($this->templatenames . '/useraccountloghistory',$data);
	}

	public function getAjaxUserInfo() {
		
		$postarr = $this->input->post();

        $getAjaxUserInfo = $postarr['getbranchname'];

		$data['getoperation_master']         =  $this->dbhelper->getAjaxUSerData($getAjaxUserInfo);

 		
		$this->load->view($this->templatenames . '/ajaxUserReport',$data);
	}

	public function getAjaxAccountInfo() {
		
		$postarr = $this->input->post();

        $getAjaxUserInfo = $postarr['getbranchname'];

		$data['getoperation_master']         =  $this->dbhelper->getaccount_master($getAjaxUserInfo);

 		
		$this->load->view($this->templatenames . '/getAjaxAccountInfo',$data);
	}
	


	public function salesdetails() {

        $data['salesData'] = $this->dbhelper->getAllAdminTodayProductSales();

        $data['allsalesData'] = $this->dbhelper->getAllAdminTodayProductSalesAll();

        $totalRev = 0;

        foreach ($data['salesData'] as $key => $value) {

            $totalRev = $totalRev + $value->net_amount_value;    

        }

          $allsalesData = 0;

        foreach ($data['allsalesData'] as $key => $value) {

            $allsalesData = $allsalesData + $value->net_amount_value;    

        }

      //  echo '<pre>';print_r($data['salesData']);exit;

        $data['totalRev'] = $totalRev;

        $data['allsalesData'] = $allsalesData;

     //  $data['salesData'] = [];

       $data['getBranchs'] 		= $this->dbhelper->getBranchs();





       $this->admin_id = 1;

               $getCash = $this->dbhelper->getCash_today($this->admin_id);

        $totalCash = 0;

        foreach ($getCash as $key => $value) {

            $totalCash = $totalCash + $value->net_amount_value; 

        }

        $data['totalCash'] = $totalCash;

        $getdebit = $this->dbhelper->getDebit_today($this->admin_id);

        $totaldebit = 0;

        foreach ($getdebit as $key => $value) {

            $totaldebit = $totaldebit + $value->net_amount_value;   

        }

        $data['totaldebit'] = $totaldebit;

        $getonline = $this->dbhelper->getOnline_today($this->admin_id);

        $online = 0;

        foreach ($getonline as $key => $value) {

            $online = $online + $value->net_amount_value;   

        }

        $data['online'] = $online;











       // $this->load->view('branch/header', $data);

        $this->load->template('site_admin/salesdetails', $data);

     //   $this->load->view('branch/footer', $data);

    }



            public function getSalesDetailsCommision()

    {

        $postarr = $this->input->post();

        $selectdate = $postarr['selectdate'];

         $getbranchname = $postarr['getbranchname'];

         $data['salesData'] = $this->dbhelper->getAllAdmiProductSalesCommisionDateWise($selectdate, $getbranchname);

          $data['salesDatass'] = $this->dbhelper->getAllDateAdmiProductSalesCommisionDateWise($getbranchname);

         $totalRev = 0;

         $data['test'] = 1;

         $totalCommision = 0;

          $totalAllRev = 0;

        foreach ($data['salesData'] as $key => $value) {

            $totalRev = $totalRev + $value->net_amount_value; 

             

        }

        foreach ($data['salesDatass'] as $key => $value) {

        	$totalAllRev = $totalAllRev + $value->net_amount_value; 

            $totalRev = $totalRev + $value->net_amount_value; 

              $salesInfo = getsales_stock($value->sales_id);

            $salesInfos = $salesInfo->commision;

          

            $totalCommision= $totalCommision + $value->net_amount_value * ($salesInfos / 100);

        }







        $getCash = $this->dbhelper->getCash_date_bra($getbranchname, $selectdate);

        $totalCash = 0;

        foreach ($getCash as $key => $value) {

            $totalCash = $totalCash + $value->net_amount_value; 

        }

        $data['totalCash'] = $totalCash;

        $getdebit = $this->dbhelper->getDebit_date_branc($getbranchname, $selectdate);

        $totaldebit = 0;

        foreach ($getdebit as $key => $value) {

            $totaldebit = $totaldebit + $value->net_amount_value;   

        }

        $data['totaldebit'] = $totaldebit;

        $getonline = $this->dbhelper->getOnlinedatewise_branch($getbranchname, $selectdate);

        $online = 0;

        foreach ($getonline as $key => $value) {

            $online = $online + $value->net_amount_value;   

        }

        $data['online'] = $online;













        $data['totalCommision'] = $totalCommision;

         $data['totalRev'] = $totalRev;

          $data['totalAllRev'] = $totalAllRev;

       

        $this->load->view('site_admin/ajaxsalesdetails', $data);

     

    }



                public function transactions()

    {

       

           $data['salesData'] = $this->dbhelper->getAllAdminTranc();

        

       $data['getBranchs'] 		= $this->dbhelper->getBranchs();

       // $this->load->view('branch/header', $data);

        $this->load->template('site_admin/transctiondetails', $data);

     

    }



                    public function getAdminTrans()

    {

       	 $postarr = $this->input->post();

        $selectdate = $postarr['selectdate'];

         $getbranchname = $postarr['getbranchname'];

          $trantype = $postarr['trantype'];

           $data['salesData'] = $this->dbhelper->getAllAdminTranc($selectdate, $getbranchname, $trantype);

        

       $data['getBranchs'] 		= $this->dbhelper->getBranchs();

       // $this->load->view('branch/header', $data);

       $this->load->view('site_admin/ajaxAdminTransdetails', $data);

     

    }







        public function saleman_commision() {

        $data['salesData'] = $this->dbhelper->getAllAdminTodayProductSalesman();

        $data['allsalesData'] = $this->dbhelper->getAllAdminTodayProductSalesmanAll();

        $totalRev = 0;

        $todaycomm = 0;

        foreach ($data['salesData'] as $key => $value) {

            $totalRev = $totalRev + $value->net_amount_value;   

             $commisiondata = $this->dbhelper->commisiondata($value->sales_id);   

            if(!empty($commisiondata->commision)){

                $todaycomm = $todaycomm + (($value->net_amount_value * $commisiondata->commision) /100);

            } 

        }

        $data['getBranchs'] 		= $this->dbhelper->getBranchs();

         $allsalesData = 0;

         $totalcommision = 0;

        foreach ($data['allsalesData'] as $key => $value) {

            $allsalesData = $allsalesData + $value->net_amount_value; 

            $commisiondata = $this->dbhelper->commisiondata($value->sales_id);   

            if(!empty($commisiondata->commision)){

                $totalcommision = $totalcommision + (($value->net_amount_value * $commisiondata->commision) /100);

            }

        }





      //  echo '<pre>';print_r($data['salesData']);exit;

        $data['totalcommision'] = $totalcommision;

         $data['todaycomm'] = $todaycomm;

        $data['totalRev'] = $totalRev;

         $data['allsalesData'] = $allsalesData;

     //  $data['salesData'] = [];

       

      //  $this->load->view('branch/header', $data);

        $this->load->template('site_admin/saleman_commision', $data);

     //   $this->load->view('branch/footer', $data);

    }



        public function getSalesDetails()

    {

        $postarr = $this->input->post();

        $selectdate = $postarr['selectdate'];

         $getbranchname = $postarr['getbranchname'];

         $data['salesData'] = $this->dbhelper->getAllAdminProductSalesDateWise($selectdate, $getbranchname);

       //  echo '<pre>';print_r($data['salesData']);exit;

         $totalRev = 0;

        foreach ($data['salesData'] as $key => $value) {

            $totalRev = $totalRev + $value->net_amount_value;    

        }







  $getCash = $this->dbhelper->getCash_date_bra($getbranchname, $selectdate);

        $totalCash = 0;

        foreach ($getCash as $key => $value) {

            $totalCash = $totalCash + $value->net_amount_value; 

        }

        $data['totalCash'] = $totalCash;

        $getdebit = $this->dbhelper->getDebit_date_branc($getbranchname, $selectdate);

        $totaldebit = 0;

        foreach ($getdebit as $key => $value) {

            $totaldebit = $totaldebit + $value->net_amount_value;   

        }

        $data['totaldebit'] = $totaldebit;

        $getonline = $this->dbhelper->getOnlinedatewise_branch($getbranchname, $selectdate);

        $online = 0;

        foreach ($getonline as $key => $value) {

            $online = $online + $value->net_amount_value;   

        }

        $data['online'] = $online;













        

         $data['totalRev'] = $totalRev;

        $data['test'] = 0;

        $this->load->view('site_admin/ajaxsalesdetails', $data);

     

    }



	

		public function addBranch()

	{	

		$data['title'] 				= "Manage Branch";

		$data['branchdata']         =  $this->dbhelper->getBranchs();

 		$data['results'] 			= $this->dbhelper->selectRows($this->tablename, "*", "1=1","created_at","DESC");

		$this->load->template("site_admin/addBranch",$data);

	}



	public function add()

	{	

		$data['title'] 				= "Add new sub admin";

		$this->load->template("site_admin/add",$data);

	}



	public function edit()

	{	

		$data['title'] 				= "Update sub admin details";

		$id 						= base64_decode($this->input->get('id'));

		if ($id != '') 

		{

			$data['result'] 			= $this->dbhelper->singleRow($this->tablename, "*", "id='$id'");

			$this->load->template("site_admin/edit",$data);

		}

		else

		{

			redirect(BASE_URL."sub_admin");

		}

	}



	

	// Add and edit

	public function submit_entry()

	{

		$mode 								= $this->input->post('mode');

		$data 								= array();



		$data['name']						= $this->input->post('name');

		$data['email']						= $this->input->post('email');

		$data['mobile_no']					= $this->input->post('mobile_no');

		$password							= $this->input->post('password');

		$data['gender']						= $this->input->post('gender');

		$data['address']					= $this->input->post('address');

		$data['city']						= $this->input->post('city');

		$data['state']						= $this->input->post('state');

		$data['pin_code']					= $this->input->post('pin_code');

		$data['pan_number']					= $this->input->post('pan_number');

		$data['adhar_number']				= $this->input->post('adhar_number');

		if($mode == "edit") // UPDATE DATA

		{

			$id	= $this->input->post('id');	

			// attchment

			if(isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name']))

			{

				$dir = "./assets/uploads/site_admin/";

				$upload = $this->dbhelper->doUpload('profile_image',$dir);

				if(isset($upload['error']) && $upload['error']) 

				{

					$this->session->set_flashdata('error',$upload['error']);		

					redirect(BASE_URL."sub_admin");

				} 

				else 

				{

					$find_old_icon	= $this->dbhelper->getSingleValue($this->tablename ,"profile_image","id='$id'");

					if(file_exists("./assets/uploads/site_admin/".$find_old_icon))

					{

						unlink("./assets/uploads/site_admin/".$find_old_icon);

					}

					$data['profile_image'] = $upload;

				}

			}

			if ($password != '') 

			{

				$data['password'] 			= md5($password);

			}

			$this->dbhelper->updateRow($this->tablename,$data,"id",$id); 

			$this->session->set_flashdata('success','Sub admin details updated successfully..!');	

			redirect(BASE_URL."sub_admin");

		}

		else // ADD DATA

		{

			// attchment 

			if(isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name']))

			{

				if (!file_exists('assets/uploads/site_admin/')) {

				    mkdir('assets/uploads/site_admin/', 0777, true);

				}

				$dir22 = "./assets/uploads/site_admin/";

				$upload22 = $this->dbhelper->doUpload('profile_image',$dir22);

				if(isset($upload22['error']) && $upload22['error']) 

				{

					$this->session->set_flashdata('error',$upload22['error']);		

					redirect(BASE_URL."sub_admin");

				} 

				else 

				{

					$data['profile_image'] = $upload22;

				}

			}

			else

			{

				$data['profile_image'] = "";

			}

			$data['password'] 			= md5($password);

			$data['status'] 			= 1;

			$this->dbhelper->addRow($this->tablename,$data);

			$this->session->set_flashdata('success','New sub admin added successfully..!');	

			redirect(BASE_URL."sub_admin");

		}

	}



	//Check Mobile Unique

    function isMobileUnique()

	{

		$mobile_no = $this->input->get_post('mobile_no');

		// echo $mobile_no; die();

		if(!$this->dbhelper->getSingleValue($this->tablename,"count(*)","mobile_no='".$mobile_no."'"))

		{

			echo "true";

		}

		else

		{

			echo "false";

		}



	}





	// active/deactive

	public function active_deactive()

	{

		$data = array();

		$id	= $this->input->post('id');

		if ($id != '') {

			$user_status = $this->dbhelper->getSingleValue($this->tablename,"status","id=$id");

			if ($user_status == 1) {

				$data['status'] = 0;

			}else{

				$data['status'] = 1;

			}

			$this->dbhelper->updateRow($this->tablename,$data,"id",$id); 

			$this->session->set_flashdata("success","Sub admin status changed successfull..!");

			redirect(BASE_URL."sub_admin");

		}else{

			$this->session->set_flashdata("error","Plz try again..!");

			redirect(BASE_URL."sub_admin");

		}		

	}



	// delete

	public function delete()

	{

		$id	= $this->input->get_post('id');

		if ($id != '') {

			$find_old_icon	= $this->dbhelper->getSingleValue($this->tablename ,"profile_image","id='$id'");

			if(file_exists("./assets/uploads/site_admin/".$find_old_icon))

			{

				unlink("./assets/uploads/site_admin/".$find_old_icon);

			}

			$this->dbhelper->delRow($this->tablename,"id",$id);

			$this->session->set_flashdata("success","Sub admin delete successfull..!");

			redirect(BASE_URL."sub_admin");

		}else{

			$this->session->set_flashdata("error","Plz try again..!");

			redirect(BASE_URL."sub_admin");

		}	

	}

	

	public function savebranch()

	{

		$postArr  =$this->input->post();

		$branchData = $this->dbhelper->getBranchData();

			// if(!empty($branchData)){

			// 	$int_var = (int)filter_var($branchData->branchcode, FILTER_SANITIZE_NUMBER_INT);

			// 	$brachCode = $int_var + 1;

			// 	$brachCode = "#BRC000".$brachCode;

			// }else{

			// 	$brachCode = "#BRC0001";

			// }





//save image icon

            $config['upload_path']          = './uploads/';

            $config['allowed_types']        = '*';

            $config['encrypt_name']         = true;

            $config['max_width']            = 6024;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            if (!$this->upload->do_upload('branchlogo')) {

              

                $error = array('error' => $this->upload->display_errors());

                

            } else {

                if ($_FILES['branchlogo']['name'] != '') {

                    $fileData = $this->upload->data();

                    $branchlogo = $fileData['file_name'];

                    

                }

            }







			$data = [

				'branchname'=>$postArr['branchname'],

				'mobileno'=>$postArr['mobileno'],

				'password'=> md5($postArr['password']),

				'location'=>$postArr['location'],

				'branchlogo'=>$branchlogo,

				'finacialyear'=>$postArr['finacialyear'],

				'branchcode'=> "#BRC0001",

				'pannumber'=>$postArr['pannumber'],

				'gstnumber'=>$postArr['gstnumber'],

				'adharnumber'=> $postArr['adharnumber'],

				'branchcode'=> "#BRC0001",

				'address'=>$postArr['address'],

				'city'=>$postArr['city'],

				'pincode1'=>$postArr['pincode1'],

				'phoneno'=>$postArr['phoneno'],

				'fax'=>$postArr['fax'],

				'branchemail'=>$postArr['branchemail'],

				'website'=>$postArr['website'],

				'branchcode'=> "#BRC0001",

				'bankname'=>$postArr['bankname'],

				'bacnkbranchname'=>$postArr['bacnkbranchname'],

				'bankaddress'=> $postArr['bankaddress'],

				'bankifscode'=>$postArr['bankifscode'],

				'accounumber'=>$postArr['accounumber'],

				'ibanno'=>$postArr['ibanno'],

				'sqiftcode'=>$postArr['sqiftcode'],

				'upicode'=>$postArr['upicode'],

				'status' => $postArr['status']

			];

			$insert_id = $this->dbhelper->saveBranchData($data);

			 $customer_code = sprintf("#BRC%04d", $insert_id);

            $data = array(     

                   'branchcode'    => $customer_code,

            );

            $this->dbhelper->updateBranchData($data, $insert_id);

			$this->session->set_flashdata('success','Branch data successfully..!');	

			redirect(BASE_URL."sub_admin");

	}



	public function savebranchss($value='')

	{

		$postArr  =$this->input->post();

		if(!empty($postArr['branchname'])){



		

		$brachcode = $postArr['branchcode'];

		if($brachcode == 0){

			$branchData = $this->dbhelper->getBranchData();

			if(!empty($branchData)){

				$int_var = (int)filter_var($branchData->branchcode, FILTER_SANITIZE_NUMBER_INT);

				$brachCode = $int_var + 1;

				$brachCode = "#BRC000".$brachCode;

			}else{

				$brachCode = "#BRC0001";

			}

			$data = [

				'branchcode'=> $brachCode,

				'branchname'=>$postArr['branchname'],

				'mobileno'=>$postArr['mobileno'],

				'password'=> md5($postArr['password']),

				'location'=>$postArr['location'],

				'finacialyear'=>$postArr['finacialyear'],

			];

			$insert_id = $this->dbhelper->saveBranchData($data);

			echo $insert_id;exit;

		}else{

			$data = [

				'branchname'=>$postArr['branchname'],

				'mobileno'=>$postArr['mobileno'],

				'password'=> md5($postArr['password']),

				'location'=>$postArr['location'],

				'finacialyear'=>$postArr['finacialyear'],

			];

			$this->dbhelper->updateBranchData($data, $brachcode);

			echo $brachcode;exit;

			

		}

		}

	}



	public function savestatitory($value='')

	{

		$postArr  =$this->input->post();

		$brachcode = $postArr['branchcode'];

		if($brachcode == 0){

			$data = [

				'branchcode'=> "#BRC0001",

				'pannumber'=>$postArr['pannumber'],

				'gstnumber'=>$postArr['gstnumber'],

				'adharnumber'=> $postArr['adharnumber'],

				

			];

			$insert_id = $this->dbhelper->saveBranchData($data);

			echo $insert_id;exit;

		}else{

			$data = [

				'pannumber'=>$postArr['pannumber'],

				'gstnumber'=>$postArr['gstnumber'],

				'adharnumber'=> $postArr['adharnumber'],

				

			];

			$this->dbhelper->updateBranchData($data, $brachcode);

			echo $brachcode;exit;

			

		}

		

	}





		public function saveaddress($value='')

	{

		$postArr  =$this->input->post();

		$brachcode = $postArr['branchcode'];

		if($brachcode == 0){

			$data = [

				'branchcode'=> "#BRC0001",

				'address'=>$postArr['address'],

				'city'=>$postArr['city'],

				'pincode1'=>$postArr['pincode1'],

				'phoneno'=>$postArr['phoneno'],

				'fax'=>$postArr['fax'],

				'branchemail'=>$postArr['branchemail'],

				'website'=>$postArr['website'],

			];

			$insert_id = $this->dbhelper->saveBranchData($data);

			echo $insert_id;exit;

		}else{

			$data = [

				

				'address'=>$postArr['address'],

				'city'=>$postArr['city'],

				'pincode1'=>$postArr['pincode1'],

				'phoneno'=>$postArr['phoneno'],

				'fax'=>$postArr['fax'],

				'branchemail'=>$postArr['branchemail'],

				'website'=>$postArr['website'],

			];

			$this->dbhelper->updateBranchData($data, $brachcode);

			echo $brachcode;exit;

			

		}

		

	}





	public function savebankdetails($value='')

	{

		$postArr  =$this->input->post();

		$brachcode = $postArr['branchcode'];

		if($brachcode == 0){

			$data = [

				'branchcode'=> "#BRC0001",

				'bankname'=>$postArr['bankname'],

				'bacnkbranchname'=>$postArr['bacnkbranchname'],

				'bankaddress'=> $postArr['bankaddress'],

				'bankifscode'=>$postArr['bankifscode'],

				'accounumber'=>$postArr['accounumber'],

				'ibanno'=>$postArr['ibanno'],

				'sqiftcode'=>$postArr['sqiftcode'],

				'upicode'=>$postArr['upicode'],

			];

			$insert_id = $this->dbhelper->saveBranchData($data);

			echo $insert_id;exit;

		}else{

			$data = [

				

				'bankname'=>$postArr['bankname'],

				'bacnkbranchname'=>$postArr['bacnkbranchname'],

				'bankaddress'=> $postArr['bankaddress'],

				'bankifscode'=>$postArr['bankifscode'],

				'accounumber'=>$postArr['accounumber'],

				'ibanno'=>$postArr['ibanno'],

				'sqiftcode'=>$postArr['sqiftcode'],

				'upicode'=>$postArr['upicode'],

			];

			$this->dbhelper->updateBranchData($data, $brachcode);

			echo $brachcode;exit;

			

		}

		

	}











	public function sizelist()

	{

		$data['title'] 				= "Manage Size";

		$data['getsize_master']         =  $this->dbhelper->getsize_master();

 		$this->load->template($this->tablename.'/sizelist',$data);

	}



	public function submit_size_entry($value='')

	{

		$postArr = $this->input->post();

		$data = [

			'sizename' => $postArr['sizename'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->saveSize($data);

		$this->session->set_flashdata('success','Size data successfully..!');	

			redirect(BASE_URL."site_admin/sizelist");

	}



	public function editsize($id)

	{

		$data['sizeData'] = $this->dbhelper->getSizeData($id);

		$data['title'] 				= "Manage Size";

		$data['getsize_master']         =  $this->dbhelper->getsize_master();



 		$this->load->template($this->tablename.'/editsizelist',$data);



	}



	public function edit_size_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

			'sizename' => $postArr['sizename'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->updateSize($data, $id);

		$this->session->set_flashdata('success','Size data successfully..!');	

			redirect(BASE_URL."site_admin/sizelist");

	}


	public function edit_location_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

            // 'department_name' => $postArr['department'],

			'location_name' => $postArr['location_name'],

            'status' => $postArr['status'],

        ];

		$this->dbhelper->updateLocations_master($data, $id);

		$this->session->set_flashdata('success', 'Location data successfully..!');

        redirect(BASE_URL . "site_admin/locationlist");

	}



		public function deletesize($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteSize($data, $id);

		$this->session->set_flashdata('success','Size data successfully..!');	

			redirect(BASE_URL."site_admin/sizelist");

	}



	

	public function attributelist()

	{

		$data['title'] 				= "Manage Attribute";

		$data['getsize_master']         =  $this->dbhelper->getattribute_master();

 		$this->load->template($this->tablename.'/attributelist',$data);

	}





	public function submit_attribute_entry($value='')

	{

		$postArr = $this->input->post();

		$data = [

			'attribute_name' => $postArr['attributename'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->saveAttribute($data);

		$this->session->set_flashdata('success','Attribute data successfully..!');	

			redirect(BASE_URL."site_admin/attributelist");

	}





	public function editattribute($id)

	{

			$data['sizeData'] = $this->dbhelper->getAttributeData($id);

		$data['title'] 				= "Manage Attribute";

		$data['getsize_master']         =  $this->dbhelper->getattribute_master();



 		$this->load->template($this->tablename.'/editattributelist',$data);

	}

	

	



	public function edit_attribute_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

			'attribute_name' => $postArr['attributename'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->updateAttribute($data, $id);

		$this->session->set_flashdata('success','Attribute data successfully..!');	

			redirect(BASE_URL."site_admin/attributelist");

	}







		public function deleteattribute($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteAttribute($data, $id);

		$this->session->set_flashdata('success','Attribute data successfully..!');	

			redirect(BASE_URL."site_admin/attributelist");

	}









	public function attribute_valuelist()

	{

		$data['title'] 				= "Manage Attribute Value";

		$data['getsize_master']         =  $this->dbhelper->getattribute_value_master();

 		$this->load->template($this->tablename.'/attributevaluelist',$data);

	}







	public function submit_attribute_value_entry($value='')

	{

		$postArr = $this->input->post();

		$data = [

			'atribute_value_name' => $postArr['attributevaluename'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->saveAttributeValue($data);

		$this->session->set_flashdata('success','Attribute Value data successfully..!');	

			redirect(BASE_URL."site_admin/attribute_valuelist");

	}





	public function editattributevalue($id)

	{

			$data['sizeData'] = $this->dbhelper->getAttributeValueData($id);

		$data['title'] 				= "Manage Attribute Value";

		$data['getsize_master']         =  $this->dbhelper->getattribute_value_master();



 		$this->load->template($this->tablename.'/editattributevalue',$data);

	}









	public function edit_attribute_value_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

			'atribute_value_name' => $postArr['attributevaluename'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->updateAttributeValue($data, $id);

		$this->session->set_flashdata('success','Attribute Value data successfully..!');	

			redirect(BASE_URL."site_admin/attribute_valuelist");

	}





		public function deleteattributevalue($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteAttributeValue($data, $id);

		$this->session->set_flashdata('success','Attribute Value data successfully..!');	

			redirect(BASE_URL."site_admin/attribute_valuelist");

	}





	public function brandlist()

	{

		$data['title'] 				= "Manage  Brand";

		$data['getsize_master']         =  $this->dbhelper->brand_master();

 		$this->load->template($this->tablename.'/brandlist',$data);

	}



		public function unitview()

	{

		$data['title'] 				= "Manage  Unit";

		$data['getunit_master']         =  $this->dbhelper->unit_master();

 		$this->load->template($this->tablename.'/unitview',$data);

	}



	public function submit_brand_entry($value='')

	{

		$postArr = $this->input->post();

		//$branchcode = "#BRC".rand(00,99);

		$data = [

			//'brand_code' => $branchcode,

			'brand_name' => $postArr['brandname'],

			'status' => $postArr['sizestatus']

		];

		$insert_id = $this->dbhelper->saveBrand($data);

		 $customer_code = sprintf("#BRD%04d", $insert_id);

            $data = array(     

                   'brand_code'    => $customer_code,

            );

            $this->dbhelper->updateBrand($data, $insert_id);

		$this->session->set_flashdata('success','Brand data successfully..!');	

			redirect(BASE_URL."site_admin/brandlist");

	}



		public function submit_unit_entry($value='')

	{

		$postArr = $this->input->post();

	//	$branchcode = "#UN".rand(00,99);

		$data = [

			'unit_name' => $postArr['unit_name'],

			'status' => $postArr['status']

		];

		$this->dbhelper->saveUnit($data);

		$this->session->set_flashdata('success','Unit data successfully..!');	

			redirect(BASE_URL."site_admin/unitview");

	}



		public function editbrandname($id)

	{

			$data['sizeData'] = $this->dbhelper->getBrandData($id);

		$data['title'] 				= "Manage Brand";

		$data['getsize_master']         =  $this->dbhelper->brand_master();



 		$this->load->template($this->tablename.'/editbrandname',$data);

	}



			public function editunitname($id)

	{

			$data['sizeData'] = $this->dbhelper->getUnitData($id);

		$data['title'] 				= "Manage Unit";

		$data['getunit_master']         =  $this->dbhelper->unit_master();



 		$this->load->template($this->tablename.'/editunitname',$data);

	}



	public function edit_brand_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

			'brand_name' => $postArr['brandname'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->updateBrand($data, $id);

		$this->session->set_flashdata('success','Brand data successfully..!');	

			redirect(BASE_URL."site_admin/brandlist");

	}



		public function edit_unit_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

			'unit_name' => $postArr['unit_name'],

			'status' => $postArr['status']

		];

		$this->dbhelper->updateUnit($data, $id);

		$this->session->set_flashdata('success','Unit data successfully..!');	

			redirect(BASE_URL."site_admin/unitview");

	}



	





		public function deletebrandname($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteBrand($data, $id);

		$this->session->set_flashdata('success','Brand data successfully..!');	

			redirect(BASE_URL."site_admin/brandlist");

	}



			public function deleteunitname($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteUnit($data, $id);

		$this->session->set_flashdata('success','Unit data successfully..!');	

			redirect(BASE_URL."site_admin/unitview");

	}







	public function grouplist()

	{

		$data['title'] 				= "Manage  Group";

		$data['getsize_master']         =  $this->dbhelper->group_master();

 		$this->load->template($this->tablename.'/grouplist',$data);

	}





	public function submit_group_entry($value='')

	{

		$postArr = $this->input->post();

	//	$group_code = "#GRP".rand(00,99);

		$data = [

			//'group_code' => $group_code,

			'group_name' => $postArr['group_name'],

			'status' => $postArr['sizestatus']

		];

		$insert_id = $this->dbhelper->saveGroup($data);

		 $customer_code = sprintf("#GRP%04d", $insert_id);

            $data = array(     

                   'group_code'    => $customer_code,

            );

            $this->dbhelper->updateGroup($data, $insert_id);

		$this->session->set_flashdata('success','Group data successfully..!');	

			redirect(BASE_URL."site_admin/grouplist");

	}



	

			public function editgroup($id)

	{

			$data['sizeData'] = $this->dbhelper->getGroupData($id);

		$data['title'] 				= "Manage Group";

		$data['getsize_master']         =  $this->dbhelper->group_master();



 		$this->load->template($this->tablename.'/editgroup',$data);

	}



	



		public function edit_group_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

				'group_name' => $postArr['group_name'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->updateGroup($data, $id);

		$this->session->set_flashdata('success','Group data successfully..!');	

			redirect(BASE_URL."site_admin/grouplist");

	}





		public function deletegroup($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteGroup($data, $id);

		$this->session->set_flashdata('success','Group data successfully..!');	

			redirect(BASE_URL."site_admin/grouplist");

	}



	public function deleteBranchData($id)

	{

		

		$this->dbhelper->delRowBranch($id);

		$this->session->set_flashdata('success','Group data successfully..!');	

			redirect(BASE_URL."sub_admin");

	}







	public function operatorlist()

	{

		$data['title'] 				= "Manage  Operator";

		$data['getoperation_master']         =  $this->dbhelper->operator_master();

 		$this->load->template($this->tablename.'/operatorlist',$data);

	}



	public function packagelist()

	{

		$data['title'] 				= "Manage  Package";

		$data['getoperation_master']         =  $this->dbhelper->package_master();

 		$this->load->template($this->tablename.'/packagelist',$data);

	}









	public function userrestrict()

	{
		$data['title'] 				= "Manage  User";

		$data['getoperation_master']         =  $this->dbhelper->package_user();

 		$this->load->template($this->tablename.'/userrestrict',$data);

	}

	


	public function mobilelist()
	{
		$data['title'] 				= "Manage  Mobile";
		$data['getoperation_master']         =  $this->dbhelper->account_mobile_master();
		$this->load->template($this->tablename.'/mobilelist',$data);
	}
	public function landlinelist()
	{
		$data['title'] 				= "Manage  Landline";
		$data['getoperation_master']         =  $this->dbhelper->account_landline_master();
		$this->load->template($this->tablename.'/landlinelist',$data);
	}
	public function datacircuitlist()
	{
		$data['title'] 				= "Manage  Data Circuit";
		$data['getoperation_master']         =  $this->dbhelper->account_data_circuit_master();
		$this->load->template($this->tablename.'/datacircuitlist',$data);
	}



	public function accountlist()

	{

		

		$data['title'] 				= "Manage  Account";

		$mobiledata         =  $this->dbhelper->package_account();
		$landlinedata         =  $this->dbhelper->landline_account();
		$datacircutdata         =  $this->dbhelper->data_circuit_account();
		$arraydata = array_merge($mobiledata, $landlinedata, $datacircutdata);
		$data['getoperation_master'] = $arraydata;
 		$this->load->template($this->tablename.'/accountlist',$data);

	}



	public function departmentlist()

	{

		$data['title'] 				= "Manage  Department";

		$data['getoperation_master']         =  $this->dbhelper->package_department();

 		$this->load->template($this->tablename.'/departmentlist',$data);

	}



	public function addOperation($value = '') {

        $data['title'] = "Add Operation";

     

		$data['getoperation_master']         =  $this->dbhelper->package_master();
		$data['get_location']         =  $this->dbhelper->location_master();

		$this->load->template($this->templatenames . '/addOperation',$data);

    }



	public function addPaekingType($value = '') {

        $data['title'] = "Add Parking Type";

	

		$this->load->template('site_admin/addPaekingType',$data);

    }

	public function addPaeking($value = '') {

        $data['title'] = "Add Parking";
		$admin_id =$this->session->userdata('admin_id');
		$data['parking_type_master']         =  $this->dbhelper->parking_type_master();

		$this->load->template('site_admin/addPaeking',$data);

    }


	
	public function addMobileData($value = '') {

        $data['title'] = "Add Account";

		$data['package_master']         =  $this->dbhelper->package_master();



		$data['operator_master']         =  $this->dbhelper->operator_master();

		$data['user_master']         =  $this->dbhelper->package_user();

		$data['location_master']         =  $this->dbhelper->location_master();

		$this->load->template($this->templatenames . '/addMobileData',$data);

    }

    	public function addLandlineData($value = '') {

        $data['title'] = "Add Account";

		$data['package_master']         =  $this->dbhelper->package_master();



		$data['operator_master']         =  $this->dbhelper->operator_master();

		$data['user_master']         =  $this->dbhelper->package_user();

		$data['location_master']         =  $this->dbhelper->location_master();

		$this->load->template($this->templatenames . '/addLandlineData',$data);

    }


    	public function addCircuitData($value = '') {

        $data['title'] = "Add Account";

		$data['package_master']         =  $this->dbhelper->package_master();



		$data['operator_master']         =  $this->dbhelper->operator_master();

		$data['user_master']         =  $this->dbhelper->package_user();

		$data['location_master']         =  $this->dbhelper->location_master();

		$this->load->template($this->templatenames . '/addCircuitData',$data);

    }


	



	public function addPackage($value = '') {

        $data['title'] = "Add Package";

     
		$data['getoperation_master']         =  $this->dbhelper->operator_master();
      

		$this->load->template($this->templatenames . '/addPackage',$data);

    }



	public function addLocation($value = '') {

        $data['title'] = "Add Location";

     

		$data['get_department']         =  $this->dbhelper->package_department();

		$this->load->template($this->templatenames . '/addLocation',$data);

    }



	public function addUser($value = '') {

        $data['title'] = "Add User";
		$mobiledata         =  $this->dbhelper->package__user_account();
		$landlinedata         =  $this->dbhelper->landline_user_account();
		$datacircutdata         =  $this->dbhelper->data_circuit_user_account();
		$arraydata = array_merge($mobiledata, $landlinedata, $datacircutdata);
		$getoperation_master = $arraydata;
	
		$package_user         =  $this->dbhelper->package_user();



		$accountNumbersToRemove = array_map(function ($obj) {
			return $obj->account_number;
		}, $package_user);
		
		// Filter the first array based on account numbers to remove
		$filteredArray = array_filter($getoperation_master, function ($obj) use ($accountNumbersToRemove) {
			return !in_array($obj->account_number, $accountNumbersToRemove);
		});
		
		// Convert the filtered array back to indexed array if needed
		$filteredArray = array_values($filteredArray);
		$data['filteredArray'] = $filteredArray;
		// account_number

		$data['get_department']         =  $this->dbhelper->package_department();

		$data['get_location']         =  $this->dbhelper->location_master();

		$this->load->template($this->templatenames . '/addUser',$data);

    }



	public function addDepartment($value = '') {

        $data['title'] = "Add Department";

		$data['get_location']         =  $this->dbhelper->location_master();

      

		$this->load->template($this->templatenames . '/addDepartment',$data);

    }



	

		public function submit_category_entry($value='')

	{

		$postArr = $this->input->post();

		//save image icon

            $config['upload_path']          = './uploads/';

            $config['allowed_types']        = '*';

            $config['encrypt_name']         = true;

            $config['max_width']            = 6024;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            if (!$this->upload->do_upload('category_image')) {

              

                $error = array('error' => $this->upload->display_errors());

                

            } else {

                if ($_FILES['category_image']['name'] != '') {

                    $fileData = $this->upload->data();

                    $category_image = $fileData['file_name'];

                    

                }

            }

            

		$category_code = "#CAT".rand(00,99);

		$data = [

		//	'category_code' => $category_code,

			'category_name' => $postArr['category_name'],

			'category_image' => $category_image,

			'status' => $postArr['sizestatus']

		];

		$insert_id = $this->dbhelper->saveCategry($data);

		 $customer_code = sprintf("#CAT%04d", $insert_id);

            $data = array(     

                   'category_code'    => $customer_code,

            );

            $this->dbhelper->updatecategory_master($data, $insert_id);

		$this->session->set_flashdata('success','Category data successfully..!');	

			redirect(BASE_URL."site_admin/operatorlist");

	}



	

	public function editOperation($id)

	{

			$data['operationData'] = $this->dbhelper->getMasterData($id);

			$data['getoperation_master']         =  $this->dbhelper->package_master();

		$data['title'] 				= "Manage Operation";





 		$this->load->template($this->templatenames.'/editOperation',$data);

	}

	public function editLocation($id)

	{

			$data['operationData'] = $this->dbhelper->getLocationEditData($id);

	

		$data['title'] 				= "Manage Operation";





 		$this->load->template($this->templatenames.'/editLocation',$data);

	}



	public function editPackage($id)

	{

			$data['operationData'] = $this->dbhelper->getpackageData($id);
			$data['getoperation_master']         =  $this->dbhelper->operator_master();
		$data['title'] 				= "Manage Package";





 		$this->load->template($this->templatenames.'/editPackage',$data);

	}


	// 	public function editMobile($id)

	// {

	// 		$data['single_account_mobile_master'] = $this->dbhelper->single_account_mobile_master($id);
			
	// 	$data['package_master']         =  $this->dbhelper->package_master();



	// 	$data['operator_master']         =  $this->dbhelper->operator_master();

	// 	$data['user_master']         =  $this->dbhelper->package_user();

	// 	$data['location_master']         =  $this->dbhelper->location_master();

	// 	$this->load->template($this->templatenames . '/editMobile',$data);

	// }

	public function editLandline($id)

	{

			$data['single_account_landline_master'] = $this->dbhelper->single_account_landline_master($id);
			
	$data['package_master']         =  $this->dbhelper->package_master();



		$data['operator_master']         =  $this->dbhelper->operator_master();

		$data['user_master']         =  $this->dbhelper->package_user();

		$data['location_master']         =  $this->dbhelper->location_master();

		$this->load->template($this->templatenames . '/editLandline',$data);

	}


	public function editManageUser($id)

	{

			$data['operationData'] = $this->dbhelper->getuserdata($id);

		$data['title'] 				= "Manage User";

		$data['get_department']         =  $this->dbhelper->package_department();

		$data['get_location']         =  $this->dbhelper->location_master();


		$mobiledata         =  $this->dbhelper->package__user_account();
		$landlinedata         =  $this->dbhelper->landline_user_account();
		$datacircutdata         =  $this->dbhelper->data_circuit_user_account();
		$arraydata = array_merge($mobiledata, $landlinedata, $datacircutdata);
		$getoperation_master = $arraydata;
	
		$package_user         =  $this->dbhelper->package_user();



		$accountNumbersToRemove = array_map(function ($obj) {
			return $obj->account_number;
		}, $package_user);
		
		// Filter the first array based on account numbers to remove
		$filteredArray = array_filter($getoperation_master, function ($obj) use ($accountNumbersToRemove) {
			return !in_array($obj->account_number, $accountNumbersToRemove);
		});
		
		// Convert the filtered array back to indexed array if needed
		$filteredArray = array_values($filteredArray);
		$data['filteredArray'] = $filteredArray;
		// account_number


 		$this->load->template($this->templatenames.'/editManageUser',$data);

	}



	public function editDepartment($id)

	{

			$data['operationData'] = $this->dbhelper->getDepartmentData($id);

		$data['title'] 				= "Manage Department";


		$data['get_location']         =  $this->dbhelper->location_master();


 		$this->load->template($this->templatenames.'/editDepartment',$data);

	}

	
	public function getPackgeDtaa()
	{
		$postArr = $this->input->post();
		
		$data['get_location']         =  $this->dbhelper->getpackageData($postArr['package_name']);
	
		$this->load->view($this->templatenames.'/getPackageInfo',$data);
	}

	public function getPackageDataAjax()
	{
		$postArr = $this->input->post();
		if($postArr['package_name'] == 1){
			$types = "mobile";
		}else if($postArr['package_name'] == 2){
			$types = "landline";
		}else{
			$types = "datacircuit";
		}
		$data['get_package']         =  $this->dbhelper->getpackageTypeData($types);
	
		$this->load->view($this->templatenames.'/getPackageDataAjax',$data);
	}





	public function edit_operation_entry($id)

	{

		$postArr = $this->input->post();



		 



        $data = [

			'name' => $postArr['name'],

			// 'package_name' => $postArr['package_name'],

            'location' => $postArr['location'],

            'account_manager' => $postArr['account_manager'],

            'contact' => $postArr['contact'],

            'email' => $postArr['email'],

            'website' => $postArr['website'],

            'support_email' => $postArr['support_email'],

            'support_phone' => $postArr['support_phone'],

            'status' => $postArr['status'],

		];

	

		$this->dbhelper->updateoperation_master($data, $id);

		$this->session->set_flashdata('success','Operation data successfully..!');	

			redirect(BASE_URL."site_admin/operatorlist");

	}



	public function edit_user_entry($id)

	{

		$postArr = $this->input->post();



		 



		$data = [

            'name' => $postArr['name'],

		    'account_name' => $postArr['account_name'],

            'department' => $postArr['department'],

            'location' => $postArr['location'],

            'start_date' => $postArr['start_date'],

            'account_number' => $postArr['account_number'],

			'manage_name' => $postArr['manage_name'],

			'status' => $postArr['status'],

        ];

	

		$this->dbhelper->updateuser_master($data, $id);

		$this->session->set_flashdata('success','User data successfully..!');	

			redirect(BASE_URL."site_admin/userlist");

	}



	public function edit_department_entry($id)

	{

		$postArr = $this->input->post();



		 



        $data = [

			'name' => $postArr['name'],

			'position_name' => $postArr['position_name'],
			'location_id' => $postArr['location_id'],
            'department_name' => $postArr['department_name'],

            'reporting_to' => $postArr['reporting_to'],

           'status' => $postArr['status'],

		];

	

		$this->dbhelper->updateDepartment($data, $id);

		$this->session->set_flashdata('success','Department data successfully..!');	

			redirect(BASE_URL."site_admin/departmentlist");

	}



	public function edit_package_entry($id)

	{

		$postArr = $this->input->post();



		 



        $data = [

            'name' => $postArr['name'],
			'operator_id' => $postArr['operator_id'],
            'monthly_fee' => $postArr['monthly_fee'],

			// 'minutes_in' => $postArr['minutes_in'],
			// 'minutes_out' => $postArr['minutes_out'],
			// 'internet_on_net' => $postArr['internet_on_net'],
			// 'internet_off_net' => $postArr['internet_off_net'],	
            // 'data_volumn' => $postArr['data_volumn'],


			'internet' => $postArr['internet'],
				'minutes_in_net' => $postArr['minutes_in_net'],
				'minutes_off_net' => $postArr['minutes_off_net'],
				'class_name' => $postArr['class_name'],

            'data_voice' => $postArr['data_voice'],
			'data_volum_info' => $postArr['data_volum_info'],
			'package_type' => $postArr['package_type'],
            'descption' => $postArr['descption'],

            'status' => $postArr['status'],

        ];

		$this->dbhelper->updatePackage($data, $id);

		$this->session->set_flashdata('success','Package data successfully..!');	

			redirect(BASE_URL."site_admin/packagelist");

	}







		public function deleteoperation()

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->updateoperation_master($data, $postArr['getbranchname']);

		$this->session->set_flashdata('success','Operation data successfully..!');	

			// redirect(BASE_URL."site_admin/operatorlist");
			echo '1';exit;

	}





	

	public function deletepackage()

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];


		
		$getUserMobileData = $this->dbhelper->getUserMobileData($postArr['getbranchname']);
		if(empty($getUserMobileData)){
			$getUserLandlineData = $this->dbhelper->getUserLandlineData($postArr['getbranchname']);
			if(empty($getUserLandlineData)){
				$getUserDatalineData = $this->dbhelper->getUserDatalineData($postArr['getbranchname']);
				if(empty($getUserDatalineData)){
					$this->dbhelper->updatePackage($data, $postArr['getbranchname']);
					$this->session->set_flashdata('success','Package data successfully..!');	
					echo '1';exit;
				}else{
					echo '2';exit;
				}
			}else{
				echo '2';exit;
			}
		}else{
			echo '2';exit;
		}

		

		
		//	redirect(BASE_URL."site_admin/packagelist");

	}



	public function deleteuser($id)

	{

		$postArr = $this->input->post();

		$getUserMobile = $this->dbhelper->getUserMobile($id);
		if(empty($getUserMobile)){
			$getUserlandline = $this->dbhelper->getUserlandline($id);
			if(empty($getUserlandline)){
				$getUserlandline = $this->dbhelper->getUserdatacricuite($id);
				if(empty($getUserlandline)){
					$data = [

							'isdelete' => 0
					];
					$this->dbhelper->updateuser_master($data, $id);
					$statusInfo = 1;
				}else{
					$statusInfo = 2;
				}
			}else{
				$statusInfo = 2;
			}
					
		}else{
			$statusInfo = 2;
		}


		if($statusInfo == 1){
			$this->session->set_flashdata('success','User data successfully..!');	
		}else{
			$this->session->set_flashdata('success','You can not remove this data..!');	
		}

		

			redirect(BASE_URL."site_admin/userlist");

	}



	public function deleteParkingType($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteParkingType($id);

		$this->session->set_flashdata('success','Parking data successfully..!');	

			redirect(BASE_URL."site_admin/parkingtypelist");

	}

	
	public function deletemobileacc($id)
	{
		$single_account_mobile_master = $this->dbhelper->single_account_mobile_master($id);
			//log data
			$log_data = [
				'log_date' => date('d-m-Y'),
				'change_type' => 'Delete',
				'account' => $single_account_mobile_master->account_number,
				'service' => $single_account_mobile_master->service_number,
				'new' => $single_account_mobile_master->state,
				'reason' => $single_account_mobile_master->descption,
				'accountType' => "Mobile",
			];
			$this->dbhelper->inserLogMaster($log_data);
	//end
		$this->dbhelper->deleteMobileInfoD($id);
		$this->session->set_flashdata('success','Mobile data successfully..!');	
		redirect(BASE_URL."site_admin/mobilelist");
	}

	
	public function deleteLandlineacc($id)
	{
		$single_account_landline_master = $this->dbhelper->single_account_landline_master($id);
			//log data
			$log_data = [
				'log_date' => date('d-m-Y'),
				'change_type' => 'Delete',
				'account' => $single_account_landline_master->account_number,
				'service' => $single_account_landline_master->service_number,
				'new' => $single_account_landline_master->state,
				'reason' => $single_account_landline_master->descption,
				'accountType' => "Landline",
			];
			$this->dbhelper->inserLogMaster($log_data);
	//end
		$this->dbhelper->deleteLandlineInfoD($id);
		$this->session->set_flashdata('success','Landline data successfully..!');	
		redirect(BASE_URL."site_admin/landlinelist");
	}

	public function deletedatacircuitacc($id)
	{
		$single_account_datacircuit_master = $this->dbhelper->single_account_datacircuit_master($id);
			//log data
			$log_data = [
				'log_date' => date('d-m-Y'),
				'change_type' => 'Delete',
				'account' => $single_account_datacircuit_master->account_number,
				'service' => $single_account_datacircuit_master->service_number,
				'new' => $single_account_datacircuit_master->state,
				'reason' => $single_account_datacircuit_master->descption,
				'accountType' => "Data Circuit",
			];
			$this->dbhelper->inserLogMaster($log_data);
	//end
		$this->dbhelper->deleteDataCircuitInfoD($id);
		$this->session->set_flashdata('success','Data Circuit data successfully..!');	
		redirect(BASE_URL."site_admin/datacircuitlist");
	}
	


	public function deleteLocation()

	{

		$postArr = $this->input->post();

		$getUserUser = $this->dbhelper->getUserUser($postArr['getbranchname']);
		
		if(empty($getUserUser)){
			$getUserUserDepartment = $this->dbhelper->getUserUserDepartment($postArr['getbranchname']);
			
			if(empty($getUserUserDepartment)){
				$data = [

						'isdelete' => 0
				];
				$this->dbhelper->updateLocationInfo($data, $postArr['getbranchname']);
					$this->session->set_flashdata('success','Department data successfully..!');	
					echo '1';exit;	
			}else{
				echo '2';exit;
			}
			
		}else{
			echo '2';exit;
		}



			//redirect(BASE_URL."site_admin/departmentlist");

	}


	public function deletedepartment()

	{

		$postArr = $this->input->post();

		$getUserDepartment = $this->dbhelper->getUserDepartment($postArr['getbranchname']);
		if(empty($getUserDepartment)){
					$data = [

					'isdelete' => 0
			];
			$this->dbhelper->updateDepartment($data, $postArr['getbranchname']);
				$this->session->set_flashdata('success','Department data successfully..!');	
				echo '1';exit;
		}else{
			echo '2';exit;
		}



			//redirect(BASE_URL."site_admin/departmentlist");

	}



	

	public function edit_branch_data($value='')

	{

		$postArr = $this->input->post('data_id');

		$data['branchData'] = $this->dbhelper->getBranchDeetails($postArr);

		$this->load->view('site_admin/editBranchData',$data);

	}







		public function editBranchData($id)

	{

			$data['branchData'] = $this->dbhelper->getEditBranchData($id);

		$data['title'] 				= "Manage Branch";

		$data['getsize_master']         =  $this->dbhelper->getattribute_master();



 		$this->load->template('site_admin/editBranchData',$data);

	}



	public function editBranchDetails($id)

	{

		$postArr  =$this->input->post();



		//save image icon

            $config['upload_path']          = './uploads/';

            $config['allowed_types']        = '*';

            $config['encrypt_name']         = true;

            $config['max_width']            = 6024;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

		    if (!$this->upload->do_upload('branchlogo')) {

             // echo $this->upload->display_errors();

             // exit;

            //get data

           

            $get_image = $this->dbhelper->getBranchDeetails($id);

            $branchlogo = $get_image->branchlogo;

            //end data

                $error = array('error' => $this->upload->display_errors());

            } else {

                if ($_FILES['branchlogo']['name'] != '') {

                    $fileData = $this->upload->data();

                    $branchlogo = $fileData['file_name'];

                    

                }

            }

            $getPassword = $get_image->password;

            if(md5($getPassword) != md5($postArr['password'])){

            	$updatePasswod = md5($postArr['password']);

            }else{

            	$updatePasswod = $getPassword;

            }

            // if(!empty($postArr['password'])){



            // }



         if(!empty($postArr['password'])){

         	

         	$data = [

				'branchname'=>$postArr['branchname'],

				'mobileno'=>$postArr['mobileno'],

				'password'=> $updatePasswod,

				'location'=>$postArr['location'],

				'branchlogo'=>$branchlogo,

				'finacialyear'=>$postArr['finacialyear'],

				'pannumber'=>$postArr['pannumber'],

				'gstnumber'=>$postArr['gstnumber'],

				'adharnumber'=> $postArr['adharnumber'],

				'address'=>$postArr['address'],

				'city'=>$postArr['city'],

				'pincode1'=>$postArr['pincode1'],

				'phoneno'=>$postArr['phoneno'],

				'fax'=>$postArr['fax'],

				'branchemail'=>$postArr['branchemail'],

				'website'=>$postArr['website'],

				'bankname'=>$postArr['bankname'],

				'bacnkbranchname'=>$postArr['bacnkbranchname'],

				'bankaddress'=> $postArr['bankaddress'],

				'bankifscode'=>$postArr['bankifscode'],

				'accounumber'=>$postArr['accounumber'],

				'ibanno'=>$postArr['ibanno'],

				'sqiftcode'=>$postArr['sqiftcode'],

				'upicode'=>$postArr['upicode'],

				'status' => $postArr['status']

			];

         }else{

         	$data = [

				

				'branchname'=>$postArr['branchname'],

				'mobileno'=>$postArr['mobileno'],

				'location'=>$postArr['location'],

				'branchlogo'=>$branchlogo,

				'finacialyear'=>$postArr['finacialyear'],

				'pannumber'=>$postArr['pannumber'],

				'gstnumber'=>$postArr['gstnumber'],

				'adharnumber'=> $postArr['adharnumber'],

				'address'=>$postArr['address'],

				'city'=>$postArr['city'],

				'pincode1'=>$postArr['pincode1'],

				'phoneno'=>$postArr['phoneno'],

				'fax'=>$postArr['fax'],

				'branchemail'=>$postArr['branchemail'],

				'website'=>$postArr['website'],

				'bankname'=>$postArr['bankname'],

				'bacnkbranchname'=>$postArr['bacnkbranchname'],

				'bankaddress'=> $postArr['bankaddress'],

				'bankifscode'=>$postArr['bankifscode'],

				'accounumber'=>$postArr['accounumber'],

				'ibanno'=>$postArr['ibanno'],

				'sqiftcode'=>$postArr['sqiftcode'],

				'upicode'=>$postArr['upicode'],

				'status' => $postArr['status']

			];

         }

		



			$this->dbhelper->updateBranchData($data, $id);

			$this->session->set_flashdata('success','Branch data successfully..!');	

			redirect(BASE_URL."sub_admin");

	}



	public function modellist()

	{

		$data['title'] 				= "Manage  Model";

		$data['getsize_master']         =  $this->dbhelper->model_master();

 		$this->load->template($this->tablename.'/modellist',$data);

	}



	



	public function submit_model_entry($value='')

	{

		$postArr = $this->input->post();

		$data = [

			'model_name' => $postArr['model_name'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->saveModel($data);

		$this->session->set_flashdata('success','Model data successfully..!');	

			redirect(BASE_URL."site_admin/modellist");

	}



	public function editmodel($id)

	{

		$data['sizeData'] = $this->dbhelper->getModelData($id);

		$data['title'] 				= "Manage Model";

		$data['getsize_master']         =  $this->dbhelper->model_master();



 		$this->load->template($this->tablename.'/editmodellist',$data);



	}



	public function edit_model_entry($id)

	{

		$postArr = $this->input->post();

		$data = [

			'model_name' => $postArr['model_name'],

			'status' => $postArr['sizestatus']

		];

		$this->dbhelper->updateModel($data, $id);

		$this->session->set_flashdata('success','Model data successfully..!');	

			redirect(BASE_URL."site_admin/modellist");

	}



		public function deletemodel($id)

	{

		$postArr = $this->input->post();

		$data = [

			'isdelete' => 0

		];

		$this->dbhelper->deleteModel($data, $id);

		$this->session->set_flashdata('success','Model data successfully..!');	

			redirect(BASE_URL."site_admin/modellist");

	}



	public function productView()

	{

		$data['title'] 				= "Product View";

		$data['productData'] 		=$this->dbhelper->getProductDetails();

 		$data['results'] 			= $this->dbhelper->selectRows($this->tablename, "*", "1=1","created_at","DESC");

		$this->load->template("site_admin/productView",$data);

	}



		public function stockinfo()

	{

		$data['title'] 				= "Stock View";

		$data['productData'] 		=$this->dbhelper->getProductDetails();

		$this->load->template("site_admin/stockinfo",$data);

	}



		public function accountgroupview()

	{

		$data['title'] 				= "Product View";

		$data['productData'] 		=$this->dbhelper->getAccountGriup();

 		$data['results'] 			= $this->dbhelper->selectRows($this->tablename, "*", "1=1","created_at","DESC");

		$this->load->template("site_admin/accountgroupview",$data);

	}



	public function submit_account_group()

	{

		$postArr = $this->input->post();

		$data = [

			'group_name' => $postArr['group_name'],

			'effect_on' => $postArr['effect_on'],

			'party_details' => isset($postArr['party_details']) ? $postArr['party_details'] : 'off',

			'bank_details' => isset($postArr['bank_details']) ? $postArr['bank_details'] : 'off',

			'gst_type' => isset($postArr['gst_type']) ? $postArr['gst_type'] : 'off',

			'credit_limit' => isset($postArr['credit_limit']) ? $postArr['credit_limit'] : 'off',

			'type' => isset($postArr['type']) ? $postArr['type'] : 'off',

			'input_output' => isset($postArr['input_output']) ? $postArr['input_output'] : 'off',

			'registration_type' => isset($postArr['registration_type']) ? $postArr['registration_type'] : 'off',

			'capital_entry' => isset($postArr['capital_entry']) ? $postArr['capital_entry'] : 'off',

			'interest' => isset($postArr['interest']) ? $postArr['interest'] : 'off',

			'status' => $postArr['status']

		];

			$this->dbhelper->saveGroupMaster($data);

		$this->session->set_flashdata('success','Account Group data successfully..!');	

			redirect(BASE_URL."site_admin/accountgroupview");

	}



	

		public function editAccountGroup($id)

	{

		$data['groupData'] = $this->dbhelper->getaccount_group_master($id);

		$data['title'] 				= "Account Group";

	$data['productData'] 		=$this->dbhelper->getAccountGriup();



 		$this->load->template("site_admin/editAccountGroup",$data);



	}



	

		public function edit_account_group($id)

	{

		$postArr = $this->input->post();

		$data = [

			'group_name' => $postArr['group_name'],

			'effect_on' => $postArr['effect_on'],

			'party_details' => isset($postArr['party_details']) ? $postArr['party_details'] : 'off',

			'bank_details' => isset($postArr['bank_details']) ? $postArr['bank_details'] : 'off',

			'gst_type' => isset($postArr['gst_type']) ? $postArr['gst_type'] : 'off',

			'credit_limit' => isset($postArr['credit_limit']) ? $postArr['credit_limit'] : 'off',

			'type' => isset($postArr['type']) ? $postArr['type'] : 'off',

			'input_output' => isset($postArr['input_output']) ? $postArr['input_output'] : 'off',

			'registration_type' => isset($postArr['registration_type']) ? $postArr['registration_type'] : 'off',

			'capital_entry' => isset($postArr['capital_entry']) ? $postArr['capital_entry'] : 'off',

			'interest' => isset($postArr['interest']) ? $postArr['interest'] : 'off',

			'status' => $postArr['status']

		];

			$this->dbhelper->updateaccountgroup($data, $id);

		$this->session->set_flashdata('success','Account Group data successfully..!');	

			redirect(BASE_URL."site_admin/accountgroupview");

	}



	public function deleteAccountGroup($id)

	{

		$this->dbhelper->delAccountGrup($id);

		$this->session->set_flashdata('success','Account Group data successfully..!');	

			redirect(BASE_URL."site_admin/accountgroupview");

	}





	public function deleteAccountInfo($id)

	{

		$this->dbhelper->delaccountInfo($id);

		$this->session->set_flashdata('success','Account  data successfully..!');	

			redirect(BASE_URL."site_admin/account");

	}



	        public function ajaxAccountData($postData=null)

    {

        // code...

        $response = array();

         $draw = $postData['draw'];

     $start = $postData['start'];

     $rowperpage = $postData['length']; // Rows display per page

     $columnIndex = $postData['order'][0]['column']; // Column index

     $columnName = $postData['columns'][$columnIndex]['data']; // Column name

     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc

     $searchValue = $postData['search']['value']; // Search value





     $this->db->select('count(*) as allcount');

     $records = $this->db->get('account')->result();

     $totalRecords = $records[0]->allcount;







     $this->db->select('count(*) as allcount');

     $records = $this->db->get('account')->result();

     $totalRecordwithFilter = 10;





      ## Fetch records

     $this->db->select('*');

     $this->db->order_by($columnName, $columnSortOrder);

     $this->db->limit($rowperpage, $start);

     $records = $this->db->get('account')->result();



     

      $data = array();



     foreach($records as $record ){

   

   $datass = getGroupAcc($record->groupname);

       $data[] = array( 

         "id"=>$record->id,

         "name"=>$record->accountname,

         "mobile"=>$record->mobile,

         "group"=>$datass->group_name,

         "address"=>$address,

         "city" => $city,

       ); 

     }



       ## Response

     $response = array(

       "draw" => intval($draw),

       "iTotalRecords" => $totalRecords,

       "iTotalDisplayRecords" => $totalRecords,

       "aaData" => $data

     );

  //   echo '<pre>';print_r($response);exit;

    // return $response; 

 echo json_encode($response);

        exit;





    }





	public function account()

	{

		$data['title'] 				= "Account";

		$data['account'] 		=$this->dbhelper->getaccountIn();

		$this->load->template("site_admin/accountView",$data);

	}



		public function addAccountInfo()

	{

		$data['title'] 				= "Account";

		$data['account'] 		=$this->dbhelper->getAccountGriup();

		$this->load->template("site_admin/addacoountinfo",$data);

	}



	public function getAccountGroupData()

	{

		$postArr = $this->input->post();

		$data = $this->dbhelper->getaccount_group_master($postArr['group']);

		echo json_encode(array('status'=>1,'party_details'=>$data->party_details,'bank_details'=>$data->bank_details,'gst_type'=>$data->gst_type,'credit_limit'=>$data->credit_limit,'type'=>$data->type,'input_output'=>$data->input_output,'registration_type'=>$data->registration_type,'capital_entry'=>$data->capital_entry,'interest'=>$data->interest));

		exit;

	}



	public function saveParkingType()

	{

		$postArr = $this->input->post();

		$data = [

			'parking_type_name' => isset($postArr['parking_type_name']) ? $postArr['parking_type_name'] : '',

		
		];

		$this->dbhelper->saevParkingType($data);

		$this->session->set_flashdata('success','Parking Type data successfully..!');	

			redirect(BASE_URL."site_admin/parkingtypelist");

	}


	public function saveParking()

	{
		$admin_id =$this->session->userdata('admin_id');
		$postArr = $this->input->post();
		$name = $postArr['name'];
		$parking_type = $postArr['parking_type'];
		$parking_start_time = $postArr['parking_start_time'];
		$parking_end_time = $postArr['parking_end_time'];
		$price = $postArr['price'];
		$sunday = isset($postArr['sunday']) ? $postArr['sunday'] : 'off';
		$monday = isset($postArr['monday']) ? $postArr['monday'] : 'off';
		$tuesday = isset($postArr['tuesday']) ? $postArr['tuesday'] : 'off';
		$wednesday = isset($postArr['wednesday']) ? $postArr['wednesday'] : 'off';
		$thursday = isset($postArr['thursday']) ? $postArr['thursday'] : 'off';
		$friday = isset($postArr['friday']) ? $postArr['friday'] : 'off';
		$saturday = isset($postArr['saturday']) ? $postArr['saturday'] : 'off';
		$parking_location = $postArr['parking_location'];
		$pincode = $postArr['pincode'];
		$parking_slot = $postArr['parking_slot'];
		$vat = $postArr['vat'];

		$config['upload_path']          = './uploads/';

            $config['allowed_types']        = '*';

            $config['encrypt_name']         = true;

            $config['max_width']            = 6024;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            if (!$this->upload->do_upload('parking_image')) {

              

                $error = array('error' => $this->upload->display_errors());

            } else {

                if ($_FILES['parking_image']['name'] != '') {

                    $fileData = $this->upload->data();

                    $parking_image = $fileData['file_name'];

                    

                }

            }


		$data = [

			'name' => $name,
			'parking_type' => $parking_type,
			'parking_start_time' => $parking_start_time,
			'parking_end_time' => $parking_end_time,
			'price' => $price,
			'sunday' => $sunday,
			'monday' => $monday,
			'tuesday' => $tuesday,
			'wednesday' => $wednesday,
			'thursday' => $thursday,
			'friday' => $friday,
			'saturday' => $saturday,
			'parking_image' => $parking_image,
			'parking_location' => $parking_location,
			'pincode' => $pincode,
			'parking_slot' => $parking_slot,
			'user_type' => $admin_id,
			'vat' => $vat
		
		];

		$this->dbhelper->saevParkings($data);

		$this->session->set_flashdata('success','Parking data successfully..!');	

			redirect("site_admin/parkinglist");

	}


	public function edit_ParkingInfos($id)

	{
		$admin_id =$this->session->userdata('admin_id');
		$postArr = $this->input->post();
		$name = $postArr['name'];
		$parking_type = $postArr['parking_type'];
		$parking_start_time = $postArr['parking_start_time'];
		$parking_end_time = $postArr['parking_end_time'];
		$price = $postArr['price'];
		$sunday = isset($postArr['sunday']) ? $postArr['sunday'] : 'off';
		$monday = isset($postArr['monday']) ? $postArr['monday'] : 'off';
		$tuesday = isset($postArr['tuesday']) ? $postArr['tuesday'] : 'off';
		$wednesday = isset($postArr['wednesday']) ? $postArr['wednesday'] : 'off';
		$thursday = isset($postArr['thursday']) ? $postArr['thursday'] : 'off';
		$friday = isset($postArr['friday']) ? $postArr['friday'] : 'off';
		$saturday = isset($postArr['saturday']) ? $postArr['saturday'] : 'off';
		$parking_location = $postArr['parking_location'];
		$pincode = $postArr['pincode'];
		$parking_slot = $postArr['parking_slot'];
		$vat = $postArr['vat'];

		$config['upload_path']          = './uploads/';

            $config['allowed_types']        = '*';

            $config['encrypt_name']         = true;

            $config['max_width']            = 6024;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            if (!$this->upload->do_upload('parking_image')) {

              

                $error = array('error' => $this->upload->display_errors());
				$get_image = $this->dbhelper->getParkingArrInfo($id);

				$parking_image = $get_image->parking_image;
            } else {

                if ($_FILES['parking_image']['name'] != '') {

                    $fileData = $this->upload->data();

                    $parking_image = $fileData['file_name'];

                    

                }

            }


		$data = [

			'name' => $name,
			'parking_type' => $parking_type,
			'parking_start_time' => $parking_start_time,
			'parking_end_time' => $parking_end_time,
			'price' => $price,
			'sunday' => $sunday,
			'monday' => $monday,
			'tuesday' => $tuesday,
			'wednesday' => $wednesday,
			'thursday' => $thursday,
			'friday' => $friday,
			'saturday' => $saturday,
			'parking_image' => $parking_image,
			'parking_location' => $parking_location,
			'pincode' => $pincode,
			'parking_slot' => $parking_slot,
			'user_type' => $admin_id,
			'vat' => $vat
		
		];

		$this->dbhelper->updateParkingInfos($data, $id);

		$this->session->set_flashdata('success','Parking data successfully..!');	

			redirect("site_admin/parkinglist");

	}





	public function productSalesReport()

    {

       

           $data['salesData'] = $this->dbhelper->getAdminCashhh($this->admin_id);

       // echo '<pre>';print_r($data);exit;

       $data['getBranchs']      = $this->dbhelper->getBranchs();

       

       $this->load->template('site_admin/productSalesReport', $data);

       

     

    }



    	public function productPurchasereportsdata()

    {

       

           $data['salesData'] = $this->dbhelper->getAdminPurchse();

       // echo '<pre>';print_r($data);exit;

       $data['getBranchs']      = $this->dbhelper->getBranchs();

       

       $this->load->template('site_admin/productPurchasereportsdata', $data);

       

     

    }





            public function getAdminSalesDetails()

    {

        $postarr = $this->input->post();

        $selectdate = $postarr['selectdate'];

         $getbranchname = $postarr['getbranchname'];

          $data['salesData'] = $this->dbhelper->getAdminDatewisData($getbranchname, $selectdate);

             $this->load->view('site_admin/ajaxproductSalesReport', $data);	

     }





              public function getAdminPurchaseDetails()

    {

        $postarr = $this->input->post();

        $selectdate = $postarr['selectdate'];

         $getbranchname = $postarr['getbranchname'];

          $data['salesData'] = $this->dbhelper->getAdminPurchaseDatewisData($getbranchname, $selectdate);

             $this->load->view('site_admin/ajaxproductPurchaseReport', $data);	

     }



                                 public function todaycommision()

    {

       

           $data['salesData'] = $this->dbhelper->getAdminTotalCommisionss();

       //echo '<pre>';print_r($data);exit;

       $data['getBranchs']      = $this->dbhelper->getBranchs();

     

        $this->load->template('site_admin/todaycommision', $data);

       

     

    }



}

