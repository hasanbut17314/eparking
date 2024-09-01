<?php

defined('BASEPATH') OR exit('No direct script access allowed');





function getGroupAcc($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('account_group_master')->row();

}



function getParkignIfno($id){
	$ci = &get_instance();
	$ci->db->where('id', $id);
	return $ci->db->get('parking_type')->row();
}


function getUserInfs($id){
	$ci = &get_instance();
	$ci->db->where('id', $id);
	return $ci->db->get('user_login')->row();
}

function totalUser(){
	$ci = &get_instance();
	return $ci->db->get('user_login')->result();
}

function getBooking(){
	$ci = &get_instance();
	return $ci->db->get('booking_info')->result();
}

function getFeedbakc(){
	$ci = &get_instance();
	return $ci->db->get('feedback')->result();
}


function getTotalEarn(){
	$ci = &get_instance();
	$query = $ci->db->select_sum('amount')
                ->get('booking_info');

$result = $query->row();
$totalAmount = $result->amount;

return $totalAmount;
}


function getParking($admin_id){
	$ci = &get_instance();
	$ci->db->where('user_type', $admin_id);
	return $ci->db->get('parking')->result();
}

function getParkingCounts(){
	$ci = &get_instance();
	return $ci->db->get('parking')->result();
}

function getUsrsCounts(){
	$ci = &get_instance();
	return $ci->db->get('user_login')->result();
}

function getParkingInfos($id){
	$ci = &get_instance();
	$ci->db->where('id', $id);
	return $ci->db->get('parking')->row();
}

function getOrdersInfo($id){
	$ci = &get_instance();
	$ci->db->where('id', $id);
	return $ci->db->get('booking_info')->row();
}


function getLandline($id){
	$ci = &get_instance();
	$ci->db->where('account_number', $id);
	return $ci->db->get('account_landline_master')->row();
}

function getDataCitcult($id){
	$ci = &get_instance();
	$ci->db->where('account_number', $id);
	return $ci->db->get('account_data_circuit_master')->row();
}




function account_landline_master($id){
	$ci = &get_instance();
	$ci->db->where('user_name', $id);
	return $ci->db->get('account_landline_master')->row();
}

function account_data_circuit_master($id){
	$ci = &get_instance();
	$ci->db->where('user_name', $id);
	return $ci->db->get('account_data_circuit_master')->row();
}

function getUserInfo($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('user_master')->row();

}

function getuser_master($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('department_master')->row();

}


function location_master($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('location_master')->row();

}




function getuser_master_info($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('user_master')->row();

}



function getoperator_master_master_info($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('operator_master')->row();

}







function getpackage_master_info($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('package_master')->row();

}



function partyInfo($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('account')->row();

}



function getsales_stock($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('sales_stock')->row();

}



function getProductData($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('product')->row();

}



function getbranchdetailsData($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('branchdetails')->row();

}



function getSalsInfoss($id){

	$ci = &get_instance();



	$ci->db->where('id', $id);

	return $ci->db->get('salesInfo')->row();

}



function getReference($id){

	$ci = &get_instance();



	$ci->db->where('reffer', $id);

	return $ci->db->get('salesInfo')->result_array();

}

function getsalesInfo($id){

	$ci = &get_instance();



	$ci->db->where('sales_id', $id);

	return $ci->db->get('salesInfo')->result_array();

}

?>