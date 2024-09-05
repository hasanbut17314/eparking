<?php

date_default_timezone_set('Asia/Kolkata');

defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    function __construct()

    {

        parent::__construct();

        $this->tablename         = "admin";

        $this->templatename     = "login";
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
        $admin_id = $this->session->userdata('admin_id');
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
        $mobile_otp = rand(0000, 9999);

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
            } else {
                $carimage = '';
            }
        }

        if ($postArr['options'] == 2) {
            $vatnum = $postArr['vatnum'];
        } else {
            $vatnum = '';
        }

        $name = $fname . ' ' . $lname;
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
            'name' => $fname . ' ' . $lname,
            'otp_varify' => 0,
            'image' => $carimage,
            'otp' => $mobile_otp,
        ];

        $insert_id = $this->dbhelper->saveRegisterData($data);

        $this->sendMail($mobile_otp, $email, $insert_id, $name);
        redirect(BASE_URL . "front/otpverify");
    }

    public function sendMail($otp, $email, $customerId, $name)
    {
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.elasticemail.com',
            'smtp_port' => 2525,
            'smtp_user' => 'hasanbut17314@gmail.com', // Your Elastic Email username
            'smtp_pass' => 'EAA2C064EA03DAA110323AF2E9901B5AA191', // Your Elastic Email password
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'wordwrap'  => TRUE
        );

        // Load and initialize email library with the config
        $this->load->library('email', $config);
        $this->email->initialize($config);

        // Set email parameters
        $this->email->from('hasanbut17314@gmail.com', 'E-Parking');
        $this->email->to($email);
        $this->email->subject('Your OTP Code');
        $this->email->message("<p>Dear {$name},</p><p>Your OTP code is <strong>{$otp}</strong>.</p><p>Use this code to complete your registration.</p>");

        // Send the email
        if ($this->email->send()) {
            redirect('front/otpverify?cus=' . $customerId);
        } else {
            // Handle the error, e.g., show the error message
            show_error($this->email->print_debugger());
        }
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

        if (!empty($dashboardData)) {
            $updaetData = ['otp_varify' => 1];
            $this->dbhelper->updateOtp($updaetData, $hidden_cus);
            redirect('front/login');
        } else {

            $this->session->set_flashdata('message', 'Otp Incorrect');
            redirect('front/otpverify?cus=' . $hidden_cus);
        }
    }


    public function dashboard()

    {
        redirect("front/dashboard");
    }

    public function admindashboard()

    {
        $data['title']                     = "Manage Dashboard";
        $data['title']                     = "Manage Dashboard";
        $data['total_sub_admin']         = [];
        $this->load->template("dashboard", $data);
    }

    function checkout()
    {
        $orderId = $_GET['orderId'];
        $orderArr = $this->dbhelper->getParticularBookingData($orderId);
        $getParkingArrInfo = $this->dbhelper->getParkingArrInfo($orderArr->parking_id);
        $data['orderData'] = $orderArr;
        $data['getParkingArrInfo'] = $getParkingArrInfo;
        $this->load->view('front/header');
        $this->load->view('front/checkout', $data);
        $this->load->view('front/footer');
    }


    function thankyou()
    {

        $this->load->view('front/header');
        $this->load->view('front/thankyou');
        $this->load->view('front/footer');
    }

    function updateAddress($id)
    {
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


    function profile()
    {

        $admin_id = $this->session->userdata('admin_id');
        $getCustomerInfo = $this->dbhelper->getCustomerInfo($admin_id);
        $data['customer'] = $getCustomerInfo;
        $this->load->view('front/header');
        $this->load->view('front/profile', $data);
        $this->load->view('front/footer');
    }

    function checkLocation()
    {
        $postArr = $this->input->post();
        echo '<pre>';
        print_r($postArr);
        exit;
    }

    function getLocation()
    {
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

    function profiles()
    {

        $admin_id = $this->session->userdata('admin_id');
        $getCustomerInfo = $this->dbhelper->getCustomerInfo($admin_id);
        $data['customer'] = $getCustomerInfo;
        $this->load->view('front/header');
        $this->load->view('front/profiles', $data);
        $this->load->view('front/footer');
    }




    function updateOrderData()
    {
        $postArr = $this->input->post();
        $orderid = $postArr['orderid'];
        $data = [
            'payment_status' => 1,
        ];
        $this->dbhelper->updateBooking($data, $orderid);
        $this->session->unset_userdata('bookingId');
        echo $orderid;
        exit;
    }

    function ajaxsaveData()
    {
        $postArr = $this->input->post();
        $userId =  $this->session->userdata('admin_id');
        $number = rand(0, 9999);
        $formattedNumber = sprintf('%04d', $number);
        $bookingId = "EP" . $formattedNumber;

        $data = [
            'parking_id' => $postArr['data_id'],
            'parking_date' => $postArr['parkingdate'],
            'parking_start_time' => $postArr['parkingtime'],
            'parking_end_time' => $postArr['parking_end_time'],
            'booking_id' => $bookingId,
            'user_id' => $userId,
            'amount' => $postArr['parkingprice'],
            'vehicle_num' => $postArr['vehicleNumber']
        ];

        $this->dbhelper->saveBookingData($data);

        $parkingSlotInfo = $this->dbhelper->getParkingArrInfo($postArr['data_id']);
        $parkingSlotName = $parkingSlotInfo->name;

        $driverNotification = [
            'user_id' => $userId,
            'message' => 'Your booking for parking slot at ' . $parkingSlotName . ' is confirmed.'
        ];
        $this->dbhelper->createNotification($driverNotification);

        $owner = $this->dbhelper->getUserInfo($postArr['pkOwnerId']);
        $driverName = $owner->name;

        $ownerNotification = [
            'user_id' => $postArr['pkOwnerId'],
            'message' => 'A new booking for parking slot ' . $parkingSlotName . ' has been made by ' . $driverName . '.'
        ];
        $this->dbhelper->createNotification($ownerNotification);

        echo $bookingId;
        exit;
    }



    public function checkBookDetails()

    {
        $postArr = $this->input->post();
        $data['parking_date'] = $postArr['parking_date'];
        $data['parking_time'] = $postArr['parking_time'];
        $data['parking_end_time'] = $postArr['parking_end_time'];
        $getBooking = $this->dbhelper->getBooking($data['parking_date'], $data['parking_time'], $data['parking_end_time']);
        $getAllparking = $this->dbhelper->getAllparking();


        foreach ($getAllparking as $key => $value) {
            if (!empty($getBooking)) {
                foreach ($getBooking as $firstItem) {
                    if ($firstItem['parking_id'] == $value->id) {
                        $getAllparking[$key]->slot = 1;
                        break; // No need to continue checking other items in the first array
                    } else {
                        $getAllparking[$key]->slot = 0;
                    }
                }
            } else {
                $getAllparking[$key]->slot = 0;
            }
        }

        $data['getAllparking'] = $getAllparking;
        $admin_id = $this->session->userdata('admin_id');
        $data['parking_type_master'] = $this->dbhelper->parking_type_master();
        $this->load->view('front/header');
        $this->load->view('front/parking', $data);
        $this->load->view('front/footer');
    }

    public function cancelBooking()
    {

        $postArr = $this->input->post();
        $id = $postArr['orderId'];
        $orderDetail = $this->dbhelper->getParticularBookingData($id);
        $parkingId = $orderDetail->parking_id;
        $parkingDetail = $this->dbhelper->getParkingArrInfo($parkingId);
        $OwnerId = $parkingDetail->user_type;
        $driverId = $this->session->userdata('admin_id');
        $ownerNotification = [
            'user_id' => $OwnerId,
            'message' => 'Your order of booking for parking slot at ' . $parkingDetail->name . ' is cancelled.'
        ];
        $this->dbhelper->createNotification($ownerNotification);
        $driverNotification = [
            'user_id' => $driverId,
            'message' => 'Your booking at ' . $parkingDetail->name . ' is cancelled with 20% penalty.'
        ];
        $this->dbhelper->createNotification($driverNotification);
        $this->dbhelper->deleteBooking($id);
        echo 200;
        exit;
    }

    public function getNotifications()
    {
        $user_id = $this->session->userdata('admin_id');
        $notifications = $this->dbhelper->getNotifications($user_id);
        return $notifications;
    }

    public function sendReport()
    {
        $postArr = $this->input->post();
        $data = [
            'user_id' => $this->session->userdata('admin_id'),
            'message' => $postArr['message']
        ];
        $this->dbhelper->createReports($data);
        echo 200;
        exit;
    }

    function updateFeedback()
    {
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

    public function getOrderDetails()
    {

        $id = $this->session->userdata('admin_id');

        $data['orderData'] = $this->dbhelper->getOrderDatas($id);



        $this->load->view('front/order_template', $data);
    }

    public function logout()
    {

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
        if ($this->input->post('email') <> "" && $this->input->post('password') <> "") {

            $is_valid             = $this->dbhelper->validate_front_user($email, md5($password), $usertype);

            if ($this->dbhelper->getSingleValue("user_login", "count(*)", "email='" . $email . "'")) {
                $user_data = $this->dbhelper->singleRow("user_login", "*", "email='$email'");
                if ($is_valid == 1) {
                    $sess_data = array(

                        'admin_id'         => $user_data->id,

                        'name'             => $user_data->name,

                        'email'         => $user_data->email,

                        'user_type'         => $user_data->user_type,

                        'is_login'         => true,

                    );

                    $this->session->set_userdata($sess_data);

                    $this->session->set_flashdata('success', 'Login successfully.!!');

                    if ($user_data->user_type == 1) {
                        redirect("front/profile");
                    } else {
                        redirect("front/admindashboard");
                    }
                } else {
                    $this->session->set_flashdata('message', 'Incorrect email & password.!');

                    redirect("front/login");
                }
            } else {
                $this->session->set_flashdata('message', 'Incorrect email & password.!');

                redirect("front/login");
            }
        } else {
            $this->session->set_flashdata('message', 'Plase enter email address & password.!');

            redirect("front/login");
        }
    }
}
