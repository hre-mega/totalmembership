<?php

    class Registration_model extends CI_Model {

        function __construct(){
            parent::__construct();
            $this->extremedeals= $this->load->database('default', TRUE);
            $this->load->helper(array('cookie', 'url')); 
            $this->load->library('user_agent');
        }

        public function purchase_type(){
            $list_query = $this->extremedeals->where('status', 1)->order_by('id',"DESC")->get('membership_purchase');
            return $list_query->result_array();
        }

        public function referral_type(){
            $list_query = $this->extremedeals->where('status', 1)->order_by('id',"ASC")->get('membership_referral_type');
            return $list_query->result_array();
        }

        public function visit_logs(){
            $data = array( 
                'ip' => $this->input->ip_address(),
                'browser' =>  $this->agent->browser(),
                'platform' =>  $this->agent->platform(),
                
            );
            $this->extremedeals->insert('membership_visit_logs', $data);
        }

        public function details(){

            $md5 = md5("{$_POST['bday']}"."{$_POST['lname']}"."{$_POST['fname']}");
            
            $data = array( 
                'md5' => $md5,
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'bday' => $_POST['bday'],                
            );
            $this->extremedeals->insert('membership_details', $data);
        }

        public function detail_last(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_details');
            // foreach($last->result_array() as $data) {
            //     return $data['id'];
            // }
            return $last->row_array()['id'];
        }

        public function ip_address(){
            $data = array( 
                'ip' => $this->input->ip_address(),           
            );
            $this->extremedeals->insert('membership_ipaddress', $data);
        }

        public function ip_address_last(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_ipaddress');
            // foreach($last->result_array() as $data) {
            //     return $data['id'];
            // }
            return $last->row_array()['id'];
        }

        public function agents(){
            $md5 = md5("{$_POST['bday']}"."{$_POST['lname']}"."{$_POST['fname']}");

            if ($this->agent->is_browser()) {
                $type = "desktop";
            }
            elseif ($this->agent->is_robot()){
                $type = "robot";
            }
            elseif ($this->agent->is_mobile()){
                $type = "mobile";
            }
            else{
                $type = 'Unidentified User Agent';
            }

            $data = array( 
                'md5' => $md5,
                'agent' => $this->agent->agent_string(),      
                'type' => $this->agent->platform(),     
                'platform' => $type,     
            );
            $this->extremedeals->insert('membership_agents', $data);
        }

        public function agent_last(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_agents');
            // foreach($last->result_array() as $data) {
            //     return $data['id'];
            // }
            return $last->row_array()['id'];
        }

        public function valid_code($batch) {
            $ch = curl_init();
            // https://dev.megabots.app/tvouch332/api/release
            // https://evoucher.totalretailrewards.com/api/release
            curl_setopt($ch, CURLOPT_URL, "https://dev.megabots.app/tvouch332/api/release");
            curl_setopt($ch, CURLOPT_POST, 1);
            $time = time();
            // $batch = 67;
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
                array(
                    'time' => $time,
                    'batch' => $batch, 
                    'md5' => substr(hash('sha512', "VOucheRS{$batch}{$time}"), 0, 32),
                )
                )
            );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return $server_output = curl_exec($ch);
        }

        public function claimed_code(){

            $Date = date('Y-m-d');

            do {
                // Define probabilities
                $probability_p10 = 0.5; 
                $probability_p15 = 0.2; 
                $probability_p20 = 0.15;
                $probability_p25 = 0.10;
                $probability_p50 = 0.05;


                // Generate a random number between 0 and 1
                $randomNumber = mt_rand() / mt_getrandmax();

                // Check which probability range the random number falls into
                if ($randomNumber < $probability_p10) {
                    // Event for $probability_p10
                    $batch = 86;
                    $voucher = "P10";
                } elseif ($randomNumber < $probability_p10 + $probability_p15) {
                    // Event for $probability_p15
                    $batch = 87;
                    $voucher = "P15";
                } elseif ($randomNumber < $probability_p10 + $probability_p15 + $probability_p20) {
                    // Event for $probability_p20
                    $batch = 88;
                    $voucher = "P20";
                } elseif ($randomNumber < $probability_p10 + $probability_p15 + $probability_p20 + $probability_p25) {
                    // Event for $probability_p25
                    $batch = 89;
                    $voucher = "P25";
                } else {
                    // Event for $probability_p50
                    $batch = 90;
                    $voucher = "P50";
                }
                $valid_code = $this->valid_code($batch);

            } while ($valid_code == "no code available");

            $data = array( 
                'voucher' => $voucher, 
                'valid_code' => $valid_code,    
                'expire_date' => date('Y-m-d', strtotime($Date. ' + 60 days')),          
            );
            $this->extremedeals->insert('membership_claimed_code', $data);
        }

        public function claimed_code_last(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_claimed_code');
            // foreach($last->result_array() as $data) {
            //     return $data['id'];
            // }
            return $last->row_array()['id'];
        }
        
        public function entries(){

            $registration_number = rand(100000000,999999999);
            do {
                if($this->check_registration_number($registration_number) == 0) {


                    $data = array( 
                        'mobile' => $_POST['mobile'],
                        'detail_id' => $this->detail_last(),
                        'claimed_code_id' => $this->claimed_code_last(),
                        'werdid_id' => $_POST['where'],
                        'agent_id' => $this->agent_last(),
                        'ip_id' => $this->ip_address_last(),
                        'registration_number' =>  $registration_number,
                        'station_code' => $_POST['station'],
                    );
                    $this->extremedeals->insert('membership_entries', $data);
                    
                    break;
                }
                $registration_number = rand(100000000,999999999);
                
            } while ($this->check_registration_number($registration_number) < 1);
        }

        public function registration_number(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_entries');
            // foreach($last->result_array() as $data) {
            //     return $data['registration_number'];
            // }
            return $last->row_array()['registration_number'];
        }

        public function voucher_win(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_claimed_code');
            // foreach($last->result_array() as $data) {
            //     return $data['voucher'];
            // }
            return $last->row_array()['voucher'];
        }

        public function voucher_code(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_claimed_code');
            // foreach($last->result_array() as $data) {
            //     return $data['valid_code'];
            // }
            return $last->row_array()['valid_code'];
        }

        public function voucher_code_expiration(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_claimed_code');
            // foreach($last->result_array() as $data) {
            //     return $data['expire_date'];
            // }
            return $last->row_array()['expire_date'];
        }

        public function sms_out($mobile, $message){
            $data = array( 
                'mobile' => $mobile,           
                'message' => $message,  
            );
            $this->extremedeals->insert('membership_sms_out', $data);
        }

        public function check_entry_email(){
            $list_query = $this->extremedeals->where('email', $_POST['email'])->get('membership_details');
            return $list_query->num_rows();
        }

        public function check_entry_mobile(){
            $list_query = $this->extremedeals->where('mobile', $_POST['mobile'])->get('membership_entries');
            return $list_query->num_rows();
        }

        public function check_station_code(){
            $st = "station_code = '{$_POST['station']}' AND status = '1' ";
            $list_query = $this->extremedeals->where($st)->get('stations');
            return $list_query->num_rows();
        }

        public function check_station_receipt_no(){
            $st = "receipt = '{$_POST['receipt_no']}' AND station_id = '{$_POST['station']}'";
            $list_query = $this->extremedeals->where('receipt', $_POST['receipt_no'])->get('membership_entries');
            return $list_query->num_rows();
        }

        public function stations(){
            $list_query = $this->extremedeals->order_by('id',"DESC")->get('stations');
            return $list_query->result_array();
        }    
        
        public function cycle_exists() {
            $st = "CURDATE() BETWEEN start_date AND end_date AND status = 1";
            $list_query = $this->extremedeals->where($st)->get('membership_cycles');
            return $list_query->num_rows();
        }

        public function cycle_id() {
            $st = "CURDATE() BETWEEN start_date AND end_date AND status = 1";
            $list_query = $this->extremedeals->where($st)->get('membership_cycles');
            foreach($list_query->result_array() as $data) {
                return $data['id'];
            }
        }

        public function check_registration_number($registration_number){
            $list_query = $this->extremedeals->where('registration_number', $registration_number)->get('membership_entries');
            return $list_query->num_rows();
        }

        public function check_registration_number_last(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_entries');
            // foreach($last->result_array() as $data) {
            //     return $data['registration_number'];
            // }
            return $last->row_array()['registration_number'];
        }

        public function mobile_sms_success(){
            $last = $this->extremedeals->limit(1)->order_by('id',"DESC")->get('membership_entries');
            // foreach($last->result_array() as $data) {
            //     return $data['mobile'];
            // }
            return $last->row_array()['mobile'];
        }

    }
?>