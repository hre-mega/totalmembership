<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Registration extends CI_Controller {
 
	public function __construct(){
		parent::__construct();
		
		$this->load->library('session'); 
		$this->load->model('registration_model');
		$this->load->helper(array('cookie', 'url')); 
	}

	// ================================================================================
	// ================================================================================
	// ================================================================================
	// ================================================================================
	// ================================================================================
	// ================================================================================
	// ================================================================================


	public function index() {
		redirect('/register');
	}

	public function mechanics(){
		$this->load->view('registration/mechanics');
	}

	public function policy(){
		$this->load->view('registration/policy');
	}

	public function stations(){
		$this->load->view('registration/stations');
	}

	public function register() {
		$data = array(
			// Query for purchase type options
			'purchase_type' => $this->registration_model->purchase_type(),
			// Query for Where did you hear about the promo? otpions
			'referral_type' => $this->registration_model->referral_type(),
		);
		// Inserts log for the times that registration page is opened
		$this->registration_model->visit_logs();
		$this->load->view('registration/registration', $data);
	}

	public function success() {
		// Prevent access to success page if no flashdata from submit entry
		if($this->session->flashdata('proceed_success') == "true") {
			// $this->registration_model->registration_number(), $this->registration_model->voucher_code(), $this->registration_model->voucher_code_expiration()
			$data = array(
				// Query for registration number after submit
				'registration_number' => $this->registration_model->registration_number(),
				'voucher_win' => $this->registration_model->voucher_win(),
				'voucher_code' => $this->registration_model->voucher_code(),
				'voucher_code_expiration' => $this->registration_model->voucher_code_expiration(),
				'mobile' => $this->registration_model->mobile_sms_success(),
			);
			$this->load->view('registration/success', $data);
		}
		// Redirect to registration page if no flashdata
		else {
			redirect('/register');
		}
	}


	public function submit_entry() {

		

		if($this->registration_model->check_entry_mobile() < 1) {

			if($this->registration_model->check_station_code() > 0 || $_POST['where'] != "3") {
				// =============================

				// $percentage = rand(6,10);

				// Add data to ip address table
				$this->registration_model->ip_address();
				// Add data to agents table
				$this->registration_model->agents();
				// Add data to detailes table
				$this->registration_model->details();
				
				// Add data to claimed code table
				// PHP10 - 50%
				// PHP15 - 20%
				// PHP20 - 20%
				// PHP25 - 10%

				$this->registration_model->claimed_code();
				$this->registration_model->entries();
				
				// if($percentage == 1 || $percentage == 2 || $percentage == 3 || $percentage == 4 || $percentage == 5) {
				// 	$this->registration_model->claimed_code(54, "P10");
				// 	// Add data to entries table
				// 	$this->registration_model->entries();
				// 	// $this->sms($this->registration_model->registration_number(), $this->registration_model->voucher_code(), $this->registration_model->voucher_code_expiration(), "P10");
				// }
				// elseif($percentage == 6 || $percentage == 7) {
				// 	$this->registration_model->claimed_code(55, "P15");
				// 	// Add data to entries table
				// 	$this->registration_model->entries();
				// 	// $this->sms($this->registration_model->registration_number(), $this->registration_model->voucher_code(), $this->registration_model->voucher_code_expiration(), "P15");
				// }
				// elseif($percentage == 8 || $percentage == 9) {
				// 	$this->registration_model->claimed_code(56, "P20");
				// 	// Add data to entries table
				// 	$this->registration_model->entries();
				// 	// $this->sms($this->registration_model->registration_number(), $this->registration_model->voucher_code(), $this->registration_model->voucher_code_expiration(), "P20");
				// }
				// elseif($percentage == 10) {
				// 	$this->registration_model->claimed_code(57, "P25");
				// 	// Add data to entries table
				// 	$this->registration_model->entries();
				// 	// $this->sms($this->registration_model->registration_number(), $this->registration_model->voucher_code(), $this->registration_model->voucher_code_expiration(), "P25");
				// }
				$this->session->set_flashdata('proceed_success','true');
				redirect('/success');
				// =============================

			}
			else {
				$this->session->set_flashdata('error','station_code');
				redirect('/register');
			}
			
			
				
		}
		// Checks if mobile number or email address have already been registered
		else {
			$this->session->set_flashdata('error','already_exists');
			redirect('/register');
		}
		
	}

	public function sms() {
		// $registration_number, $voucher_code, $valid_date, $voucher
		// Message after succesful submission of entry
		$registration_number = $_POST['registration_number'];
		$voucher_code = $_POST['voucher_code'];
		$valid_date = $_POST['valid_date'];
		$voucher = $_POST['voucher'];
		$orginal_message = "Thank you for your Registration!". "%0A" .
		"Here is your registration number: {$registration_number}" .
		"%0A%0A" . 
		"{$voucher} Fuel Voucher Code: {$voucher_code}" .
		"%0A" .
		"Valid Until: {$valid_date}" .
		"%0A%0A" . 
		"You can redeem this at any participating Total Stations. See the mechanics page in the registration site for more details." . 
		"Promo runs until 12-31-23. Per DTI Fair Trade Permit No. FTEB-165723 Series of 2023.";
		$Message = str_replace(" ","+", $orginal_message);
		$MobileNumber = substr("{$_POST['mobile']}", 1);
		$curl = curl_init("https://api.mymegamobile.com/cast/totalph?cel={$MobileNumber}&msg={$Message}");
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json')
		);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		curl_close($curl);		
		$this->registration_model->sms_out($_POST['mobile'], $orginal_message);

		// echo 'true';
	} 

	public function sms_fail($registration_number) {
		// Message after succesful submission of entry
		$orginal_message = "Thank you for your Registration!". "%0A" .
		"Here is your registration number:  {$registration_number}" .
		"%0A%0A" . 
		"You will be informed of our latest promos and special offers soon. See you again at your favorite Total Station.";
		$Message = str_replace(" ","+", $orginal_message);
		$MobileNumber = substr("{$_POST['mobile']}", 1);
		$curl = curl_init("https://api.mymegamobile.com/cast/totalph?cel={$MobileNumber}&msg={$Message}");
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json')
		);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		curl_close($curl);		
		$this->registration_model->sms_out($_POST['mobile'], $orginal_message);
	} 
}
