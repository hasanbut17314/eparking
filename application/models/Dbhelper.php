<?php



date_default_timezone_set('Asia/Kolkata');



class Dbhelper extends CI_Model {



    //.................check valid admin ..............//

    function validate_user($email, $password) {

        $this->db->where('email', $email);

        $this->db->where('password', $password);

        $query = $this->db->get('site_admin');

        if ($query->num_rows() == 1) {

            return true;

        } else {

            return false;

        }

    }


    function validate_front_user($email, $password ,$usertype) {

        $this->db->where('email', $email);

        $this->db->where('password', $password);
        $this->db->where('user_type', $usertype);
        

        $query = $this->db->get('user_login');

        if ($query->num_rows() == 1) {

            return true;

        } else {

            return false;

        }

    }

    
    function getSingleValue($tab, $field, $where, $disp = false) {

        if ($where <> "") {

            $wheret = " where $where";

        }



        $qry = "select $field from $tab $wheret";



        if ($disp)

            echo ($qry);



        $query = $this->db->query($qry);

        if ($query) {



            foreach ($query->result() as $row) {

                return $val = stripslashes($row->$field);

            }

        } else {

            return false;

        }

    }



    public function user_details() {

        $result = $this->db->get('user_login');

        return $result->result();

    }
    public function updateOtp($data, $id){

        $this->db->where('id',$id);

        $this->db->update('user_login',$data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function getUserInfo($id) {

        $this->db->where('id', $id);

        return $this->db->get('user_login')->row();
    }

    public function createNotification($data) {

        $this->db->insert('notifications', $data);
        return $this->db->insert_id();
    }

    public function getNotifications($id) {

        $this->db->where('user_id', $id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('notifications')->result();
    }

    public function gethidden_cus($id, $code){
        $this->db->where('id', $id);
        $this->db->where('otp', $code);
        return $this->db->get('user_login')->row();
    }


    public function getBooking($bookdate, $time, $endTime) {

        $this->db->where('parking_date', $bookdate);
        $this->db->where('parking_start_time', $time);
        $this->db->where('parking_end_time', $endTime);
        $result = $this->db->get('booking_info');

        return $result->result_array();

    }

    public function getParticularBookingData($time) {
        $this->db->where('booking_id', $time);
        $result = $this->db->get('booking_info');

        return $result->row();

    }

    public function getCustomerInfo($time) {
        $this->db->where('id', $time);
        $result = $this->db->get('user_login');

        return $result->row();

    }

    

    

    public function getAllparking() {

        $result = $this->db->get('parking');

        return $result->result();

    }

    public function getParkingArrInfo($admin) {

        $this->db->where('id', $admin);
        $result = $this->db->get('parking');

        return $result->row();

    }

    
    public function parking_master($admin) {

        $this->db->where('isdelete', '1');
        $this->db->where('user_type', $admin);
        $result = $this->db->get('parking');

        return $result->result();

    }

    public function parking_master_admin() {

        $this->db->where('isdelete', '1');
        $result = $this->db->get('parking');

        return $result->result();

    }
    
    public function feedbacklist() {

        
        $result = $this->db->get('feedback');

        return $result->result();

    }

    public function getBokingInfo() {

        
        $result = $this->db->get('booking_info');

        return $result->result();

    }

    public function getBokingInfoByUserId($user_id)
	{
		// Join bookings and parking tables to fetch bookings for the current parking owner
		$this->db->select('booking_info.*, parking.*'); // Select relevant fields
		$this->db->from('booking_info');
		$this->db->join('parking', 'parking.id = booking_info.parking_id');
		$this->db->where('parking.user_type', $user_id); // Filter by user_id of parking owner

		// Execute query and return results
		$query = $this->db->get();
		return $query->result();
	}

    public function parking_type_master() {

        $result = $this->db->get('parking_type');

        return $result->result();

    }

    function selectRowsCount($tab, $where = "1=1") {

        if ($tab <> "") {

            $query = $this->db->where($where);

            $query = $this->db->get($tab);

            return $query->num_rows();

        }

    }
    


        function validate_guest_user($email, $password) {

        $this->db->where('name', $email);

        $this->db->where('password', $password);

        $query = $this->db->get('user_master');

        if ($query->num_rows() == 1) {

            return true;

        } else {

            return false;

        }

    }


    public function saevParkingType($data) {

        $this->db->insert('parking_type', $data);

        return $this->db->insert_id();

    }

    public function saveFeedback($data) {

        $this->db->insert('feedback', $data);

        return $this->db->insert_id();

    }

    public function saveBookingData($data) {
        $this->db->insert('booking_info', $data);
        return $this->db->insert_id();
    }

    public function saveRegisterData($data) {

        $this->db->insert('user_login', $data);

        return $this->db->insert_id();

    }

    

    public function saevParkings($data) {

        $this->db->insert('parking', $data);

        return $this->db->insert_id();

    }

    function stripArraySlashes($arr) {

        $ReturnArray = new stdClass;

        foreach ($arr as $k => $v) {

            $ReturnArray->$k = (is_array($v)) ? StripArraySlashes($v) : stripslashes($v);

        }

        return $ReturnArray;

    }

    function singleRow($tab, $fields = "*", $where = "1=1", $disp = false) {

        $data = null;

        $qry = "select $fields from $tab where $where";

        $query = $this->db->query($qry);

        foreach ($query->result() as $row) {

            $row = $this->stripArraySlashes($row);

            $data = $row;

        }

        return $data;

    }

   


    //...............Add data database...............//
    function deleteParkingType($id) {

        $this->db->where('id', $id);

        $this->db->delete("parking_type");

    }

    function addRow($tab, $array, $disp = false) {

        $array['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert($tab, $array);

        return $this->db->insert_id();

    }

    public function updateParkingInfo($data, $id) {

        $this->db->where('id', $id);

        $this->db->update('parking_type', $data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function updateParkingInfos($data, $id) {

        $this->db->where('id', $id);

        $this->db->update('parking', $data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function updateAddress($data, $id) {

        $this->db->where('id', $id);

        $this->db->update('user_login', $data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function updateBooking($data, $id) {

        $this->db->where('booking_id', $id);

        $this->db->update('booking_info', $data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function deleteBooking($id) {

        $this->db->where('booking_id', $id);

        $this->db->update('booking_info', array('payment_status' => 2));

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getReports() {

        $result = $this->db->get('reports');

        return $result->result();
    }

    public function createReports($data) {

        $this->db->insert('reports', $data);

        return $this->db->insert_id();
    }

    public function getParkingTypeInfo($id) {

        $this->db->where('id', $id);

        $result = $this->db->get('parking_type');

        return $result->row();

    }


    public function getOrderDatas($id) {

        $this->db->where('user_id', $id);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get('booking_info');

        return $result->result();

    }

    

    //................update record from database........//

    function updateRow($tab, $array, $where_field, $where_id) {

      //  $array['last_updated'] = date("Y-m-d H:i:s");

        $this->db->where($where_field, $where_id);

        $this->db->update($tab, $array);

    }



    //................delete record from database..............//

    function delRow($tab, $where_field = "", $where_id = "") {

        $this->db->where($where_field, $where_id);

        $this->db->delete($tab);

    }


}

