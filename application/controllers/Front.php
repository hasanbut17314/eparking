<?php

date_default_timezone_set('Asia/Kolkata');

defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->tablename 		= "admin";

        $this->templatename 	= "login";

	}


	public function login()

	{

		$data['parking_type_master'] = $this->dbhelper->parking_type_master();
		$this->load->view('front/header');
		$this->load->view('front/login', $data);
		$this->load->view('front/footer');

	}

    public function register()

	{

		$data['parking_type_master'] = $this->dbhelper->parking_type_master();
		$this->load->view('front/header');
		$this->load->view('front/register', $data);
		$this->load->view('front/footer');

	}

    public function parking()

	{
        $admin_id =$this->session->userdata('admin_id');
		$data['parking_type_master'] = $this->dbhelper->parking_type_master();
		$this->load->view('front/header');
		$this->load->view('front/parking', $data);
		$this->load->view('front/footer');

	}
    

    
    public function saveRegisterData()

	{

        $postArr = $this->input->post();
      //  if($postArr['options'] == 1){
            $email = $postArr['nemail'];
            $password = $postArr['password'];
            $usertype = $this->input->post('options');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $mobile_otp = rand(0000,9999);

            $config['upload_path']          = './uploads/';

            $config['allowed_types']        = '*';

            $config['encrypt_name']         = true;

            $config['max_width']            = 6024;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);



            if (!$this->upload->do_upload('carimage')) {

              

                $error = array('error' => $this->upload->display_errors());
                $carimage = '';
            } else {

                if ($_FILES['carimage']['name'] != '') {

                    $fileData = $this->upload->data();

                    $carimage = $fileData['file_name'];

                    

                }else{
                    $carimage = '';
                }

            }

            if($postArr['options'] == 2){
                $vatnum = $postArr['vatnum'];
            }else{
                $vatnum = '';
            }

            $name = $fname.' '.$lname;
            $data = [
                'email' => $postArr['nemail'],
                'password' => md5($postArr['password']),
                'user_type' => $postArr['options'],
                'phonenumber' => $postArr['phonenumber'],
                'datebirth' => $postArr['datebirth'],
                'address' => $postArr['address'],
                'city' => $postArr['city'],
                'post_code' => $postArr['post_code'],
                'vatnum' => $vatnum,
                'name' => $fname.' '.$lname,
                'otp_varify' => 0,
                'image' => $carimage,
                'otp' => $mobile_otp,
            ];
           
            $insert_id = $this->dbhelper->saveRegisterData($data);
        // }else{
        //     $email = $postArr['email'];
        //     $password = $postArr['password'];
        //     $usertype = $this->input->post('options');
        //     $name = $this->input->post('name');
        //     $mobile_otp = rand(0000,9999);
        //     $data = [
        //         'email' => $postArr['email'],
        //         'password' => md5($postArr['password']),
        //         'user_type' => $postArr['options'],
        //         'name' => $postArr['name'],
        //         'otp_varify' => 0,
        //         'otp' => $mobile_otp,
        //     ];
            
        //     $insert_id = $this->dbhelper->saveRegisterData($data);
        // }
       
        $this->sendMail($mobile_otp,$email,$insert_id, $name);
        redirect(BASE_URL . "front/otpverify");
    }

    function sendMail($otp,$email,$customerId,$name) {
        $data = array(
			"sender" => array(
				"email" => 'no-replys@epaking.in',
				"name" => 'New Registration - Do no reply to this email.'         
			),
			"to" => array(
				array(
					"email" => $email,
					"name" => $name 
				)
		
			),
			"subject" => 'Epaking Account Security Code',
			"htmlContent" => '<!DOCTYPE html>

        <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
        <head>
        <title></title>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <style>
                * {
                    box-sizing: border-box;
                }

                body {
                    margin: 0;
                    padding: 0;
                }

                th.column {
                    padding: 0
                }

                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: inherit !important;
                }

                #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                }

                p {
                    line-height: inherit
                }

                @media (max-width:720px) {
                    .icons-inner {
                        text-align: center;
                    }

                    .icons-inner td {
                        margin: 0 auto;
                    }

                    .row-content {
                        width: 100% !important;
                    }

                    .image_block img.big {
                        width: auto !important;
                    }

                    .stack .column {
                        width: 100%;
                        display: block;
                    }
                }
                .code
                {
                    border: 1px solid #B9B9B9;
                    padding: 10px;
                    border-radius: 10px;
                    font-style: normal;
                    font-weight: bold;
                    font-size: 26px;
                    text-align: center;
                    color: #000000;
                    width: 80%;
                    margin: 0 auto 20px;
                }
                .email-right-prt .bottom-data{
                    padding:30px 20px;
                    text-align:center;
                }

                .bottom-data h3{
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    text-align: center;
                    color: #5F5F5F;
                }

                .bottom-data p{
                    font-style: normal;
                    font-weight: normal;
                    font-size: 14px;
                    text-align: center;
                    color: #5F5F5F;
                    display:block;
                    margin-bottom:6px;
                }

                .bottom-data a{
                    font-style: normal;
                    font-weight: bold;
                    font-size: 18px;
                    text-align: center;
                    color: #5F5F5F;
                    margin-bottom:10px;
                    display:block;
                }

                 .bottom-data h6 a{
                    font-style: normal;
                    font-weight: normal;
                    font-size: 14px;
                    text-align: center;
                    text-decoration-line: underline;
                    color: #5F5F5F;

                }
                .bottom-data h3 img
                {
                    vertical-align: middle;
                }
            </style>
        </head>
        <body style="background-color: #ffffff; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
        <tbody>
        <tr>
        <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tbody>
        <tr>
        <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="700">
        <tbody>
        <tr>
        <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;" width="100%">
        <div class="spacer_block" style="height:10px;line-height:10px;"> </div>
        </th>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tbody>
        <tr>
        <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="700">
        <tbody>
        <tr>
        <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;" width="100%">
        <table border="0" cellpadding="0" cellspacing="0" class="empty_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tr>
        <td>
        <div></div>
        </td>
        </tr>
        </table>
        </th>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tbody>
        <tr>
        <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="700">
        <tbody>
        <tr>
        <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px;" width="100%">
     
        </th>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
        <tbody>
        <tr>
        <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="700">
        <tbody>
        <tr>
        <th class="column" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 5px;" width="100%">
        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
        <tr>
        <td style="padding-bottom:0px;padding-left:20px;padding-right:20px;padding-top:0px;">
        <div style="font-family:  Times New Roman, Times, serif">
        <div style="font-size: 12px; color: #191919; line-height: 2; font-family:  Times New Roman, Times, serif;">
        <p style="margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 56px; letter-spacing: normal;"><span style="font-size:28px;"><strong><span style="font-weight: bold;font-size: 30px;color: #000000;;">Verify Your account! Your otp is '.$otp.'</span></strong></span></p>
        </div>
        </div>
        </td>
        </tr>
        </table>
    
        </th>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
      
       
        </tbody>
        </table>
      
        </td>
        </tr>
        </tbody>
        </table>
        </body>
        </html>'
    );


        $ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		
		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Api-Key: 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';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			redirect('front/login');
		}
		curl_close($ch);
		redirect('front/otpverify?cus='.$customerId);
    }

    public function otpverify()
	{
		$data['cus'] = $_GET['cus'];
		$this->load->view('front/header');

		$this->load->view('front/otpverify', $data);

		$this->load->view('front/footer');
	}

    public function about()
	{
		
		$this->load->view('front/header');

		$this->load->view('front/about');

		$this->load->view('front/footer');
	}


    public function terms_condition()
	{
		
		$this->load->view('front/header');

		$this->load->view('front/terms_condition');

		$this->load->view('front/footer');
	}


    public function privacy_policy()
	{
		
		$this->load->view('front/header');

		$this->load->view('front/privacy_policy');

		$this->load->view('front/footer');
	}

    public function contact_us()
	{
		
		$this->load->view('front/header');

		$this->load->view('front/contact_us');

		$this->load->view('front/footer');
	}


    public function verifySecurityCode()
	{
		$postArr = $this->input->post();
		$hidden_cus = $postArr['hidden_cus'];
		$code = $postArr['code'];
		
		$dashboardData = $this->dbhelper->gethidden_cus($hidden_cus, $code);
	
		if(!empty($dashboardData)){
			$updaetData = ['otp_varify' => 1];
			$this->dbhelper->updateOtp($updaetData, $hidden_cus);
			redirect('front/login');
		}else{
			
			$this->session->set_flashdata('message', 'Otp Incorrect');
			redirect('front/otpverify?cus='.$hidden_cus);
		}
	}

        
    public function dashboard()

	{
        redirect("front/dashboard");
    }

    public function admindashboard()

	{
        $data['title'] 					= "Manage Dashboard";
		$data['title'] 					= "Manage Dashboard";
		$data['total_sub_admin'] 		= [];
		$this->load->template("dashboard",$data);
    }

    function checkout() {
        $orderId = $_GET['orderId'];
        $orderArr = $this->dbhelper->getParticularBookingData($orderId);
        $getParkingArrInfo = $this->dbhelper->getParkingArrInfo($orderArr->parking_id);
        $data['orderData'] = $orderArr;
        $data['getParkingArrInfo'] = $getParkingArrInfo;
        $this->load->view('front/header');
		$this->load->view('front/checkout', $data);
		$this->load->view('front/footer');
    }

    
    function thankyou() {
      
        $this->load->view('front/header');
		$this->load->view('front/thankyou');
		$this->load->view('front/footer');
    }

    function updateAddress($id) {
		$postArr = $this->input->post();
		$data = [
			'name' => $postArr['cus_name'],
			'email' => $postArr['email'],
            'phonenumber' => $postArr['phonenumber'],
            'address' => $postArr['address'],
		];
		$this->dbhelper->updateAddress($data, $id);
		redirect('front/profile');
	}


    function profile() {
      
        $admin_id =$this->session->userdata('admin_id');
        $getCustomerInfo = $this->dbhelper->getCustomerInfo($admin_id);
        $data['customer'] = $getCustomerInfo;
        $this->load->view('front/header');
		$this->load->view('front/profile', $data);
		$this->load->view('front/footer');
    }

    function checkLocation() {
            $postArr = $this->input->post();
            echo '<pre>';print_r($postArr);exit;
    }

    function getLocation() {
        // Your Mapbox access token
$accessToken = 'sk.eyJ1Ijoic2hydXRoaWVsdXJpIiwiYSI6ImNsenJqdmFkNTF4bXMyanF1YjgzMGo0YjMifQ.S_hYTfeYscErPJURGX-Jwg';

$address = 'Pennsylvania'; // Example address
$encodedAddress = urlencode($address); // URL-encode the address

$url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' . $encodedAddress . '.json?access_token=' . $accessToken . '&country=gb&types=address,postcode,place,poi';
// URL for the Mapbox Geocoding API
//$url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/london.json?access_token=' . $accessToken . '&country=gb&types=address,postcode,place,poi';

// Initialize a cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Skip SSL verification for simplicity (not recommended for production)

// Execute the cURL session and store the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Decode the JSON response
    $data = json_decode($response, true);

    // Process the data (print the entire response for demonstration)
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// Close the cURL session
curl_close($ch);
    }

    function profiles() {
      
        $admin_id =$this->session->userdata('admin_id');
        $getCustomerInfo = $this->dbhelper->getCustomerInfo($admin_id);
        $data['customer'] = $getCustomerInfo;
        $this->load->view('front/header');
		$this->load->view('front/profiles', $data);
		$this->load->view('front/footer');
    }

    
    
    
    function updateOrderData() {
        $postArr = $this->input->post();
        $orderid = $postArr['orderid'];
        $data = [
            'payment_status' => 1,
        ];
        $this->dbhelper->updateBooking($data, $orderid);
        $this->session->unset_userdata('bookingId');
        echo $orderid;exit;
    }

    function ajaxsaveData() {
        $postArr = $this->input->post();
        $userId=  $this->session->userdata('admin_id');
        $bookingId=  $this->session->userdata('bookingId');
        if(empty($bookingId)){
            //$bookingId = "EP".round(0000,9999);
            $number = rand(0, 9999);
            $formattedNumber = sprintf('%04d', $number);
            $bookingId = "EP" . $formattedNumber;
            $data = [
                'parking_id' => $postArr['data_id'],
                'parking_date' => $postArr['parkingdate'],
                'parking_start_time' => $postArr['parkingtime'],
                'booking_id' => $bookingId,
                'user_id' => $userId,
                'amount' => $postArr['parkingprice'],
            ];
            $this->session->set_userdata('bookingId',$bookingId);
            $this->dbhelper->saveBookingData($data);
            echo $bookingId;exit;
        }else{
            $data = [
                'parking_id' => $postArr['data_id'],
                'parking_date' => $postArr['parkingdate'],
                'parking_start_time' => $postArr['parkingtime'],
                'booking_id' => $bookingId,
                'user_id' => $userId,
                'amount' => $postArr['parkingprice'],
            ];
            $this->dbhelper->updateBooking($data, $bookingId);
            echo $bookingId;exit;
        }

        
    }

    
    public function checkBookDetails()

	{
       $postArr = $this->input->post();
       $data['parking_date'] = $postArr['parking_date'];
       $data['parking_time'] = $postArr['parking_time'];
       $getBooking = $this->dbhelper->getBooking($data['parking_date'],$data['parking_time']);
       $getAllparking = $this->dbhelper->getAllparking();


        foreach ($getAllparking as $key => $value) {
            if(!empty($getBooking)){
                foreach ($getBooking as $firstItem) {
                    if ($firstItem['parking_id'] == $value->id) {
                        $getAllparking[$key]->slot = 1;
                        break; // No need to continue checking other items in the first array
                    }else{
                        $getAllparking[$key]->slot = 0;
                    }
                }
            }else{
                $getAllparking[$key]->slot = 0;
            }
            
        }
        
       $data['getAllparking'] = $getAllparking;
       $admin_id =$this->session->userdata('admin_id');
       $data['parking_type_master'] = $this->dbhelper->parking_type_master();
       $this->load->view('front/header');
       $this->load->view('front/parking', $data);
       $this->load->view('front/footer');
    }

    function updateFeedback() {
        $id = $this->session->userdata('admin_id');
        $postArr = $this->input->post();
        $data = [
            'user_id' => $id,
            'order_id' => $postArr['main_id'],
            'name' => $postArr['cus_name'],
            'rating' => $postArr['rating'],
            'comments' => $postArr['comments']
        ];
        $this->dbhelper->saveFeedback($data);
        redirect("front/profile");
    }

    public function getOrderDetails() {

		$id = $this->session->userdata('admin_id');

		$data['orderData'] = $this->dbhelper->getOrderDatas($id);



	    $this->load->view('front/order_template', $data);

    }

    public function logout(){

		$this->session->unset_userdata('email');

		$this->session->unset_userdata('name');

		$this->session->unset_userdata('user_id');

        redirect("login");

	}

    
    public function checkLogin()

	{

        $postArr = $this->input->post();

		$email = $postArr['email'];
        $password = $postArr['password'];
        $usertype = $this->input->post('options');
        if($this->input->post('email') <> "" && $this->input->post('password') <> "")

		{

        $is_valid 			= $this->dbhelper->validate_front_user($email,md5($password), $usertype);

        if($this->dbhelper->getSingleValue("user_login","count(*)","email='".$email."'"))

        {
            $user_data = $this->dbhelper->singleRow("user_login","*","email='$email'");
            if($is_valid == 1)

            {
                $sess_data = array(

                    'admin_id' 		=> $user_data->id,

                    'name' 			=> $user_data->name,

                    'email' 		=> $user_data->email,

                    'user_type' 		=> $user_data->user_type,

                    'is_login' 		=> true,

                );

                $this->session->set_userdata($sess_data);

                $this->session->set_flashdata('success', 'Login successfully.!!');	

                if($user_data->user_type == 1){
                    redirect("front/profile");
                }else{
                    redirect("front/admindashboard");
                }
             
            }else{
                $this->session->set_flashdata('message', 'Incorrect email & password.!');	

				redirect("front/login");
            }
        }else{
                $this->session->set_flashdata('message', 'Incorrect email & password.!');	

				redirect("front/login");
        }



        }else{
	        $this->session->set_flashdata('message', 'Plase enter email address & password.!');

			redirect("front/login");
        }
	}
}