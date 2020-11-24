<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters("<p style='color:red'>","</p>");
		$this->load->dbforge();
		$base_assets_path = dirname(dirname(dirname(__FILE__)))."/assets/";
	}
	
	public function set_session($data)
	{
		$this->session->set_userdata($data);
	}

	public function security()
	{
		if(!$this->session->userdata('user') && $this->session->userdata('user',array('type'=>'UsEr')))
		{
			redirect('paragon');
		}
		else if(!$this->session->userdata('admin') && $this->session->userdata('admin')['type'] === "AdMiN")
		{
			redirect('admin');	
		}
	}

	public function after_login()
	{
		if( $this->session->userdata('admin') && $this->session->userdata('admin')['type'] === "AdMiN")
		{
			redirect('dashboard');
		}
	}

	public function after_login_user()
	{
		if( $this->session->userdata('user') && $this->session->userdata('user')['type'] === "UsEr" )
		{
			redirect('paragon');
		}
	}

	public function before_login()
	{
		$sess = $this->session->userdata('admin');
		$data = $sess['name'];
		if( $data != "admin" )
		{
			redirect('admin');
		}
	}

	public function before_login_user()
	{
		if( !$this->session->userdata('user') && $this->session->userdata('user')['type'] != "UsEr" )
		{
			$this->session->set_flashdata('chk_msg', 'checkout');
			redirect('login');
		}
		return TRUE;
	}

	public function input_var()
	{	
		foreach( $this->input->post() as $key=>$value)
			{
			return $$key = trim($value);
			}
	}

	public function last_record($table)
	{ 
	    $query = $this->db->query("SELECT * FROM $table ORDER BY id DESC LIMIT 1");
		$result = $query->result_array();
		return $result;
	}

	public function clean_url($text)
	{

		$text=strtolower($text);

		$code_entities_match = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=','�');

		$code_entities_replace = array('-','-','','','','','','','','','','','','','','','','','','','','','','','','','-');

		$text = str_replace($code_entities_match, $code_entities_replace, $text);

		return $text;
	} 

	public function Get_one_value($table,$coumn,$wh_val)
	{
		$wh['id'] = $wh_val;
		return	$this->db->select($coumn)
						->FROM($table)
						->where($wh)
						->get()->result()[0];
	}

	public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) 
	{
		$output = NULL;
	    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
	        $ip = $_SERVER["REMOTE_ADDR"];
	        if ($deep_detect) {
	            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_CLIENT_IP'];
	        }
	    }
	    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
	    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
	    $continents = array(
	        "AF" => "Africa",
	        "AN" => "Antarctica",
	        "AS" => "Asia",
	        "EU" => "Europe",
	        "OC" => "Australia (Oceania)",
	        "NA" => "North America",
	        "SA" => "South America"
	    );
	    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
	    	$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
	    	if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
	        	switch ($purpose) {
	                case "location":
	                    $output = array(
	                        "city"           => @$ipdat->geoplugin_city,
	                        "state"          => @$ipdat->geoplugin_regionName,
	                        "country"        => @$ipdat->geoplugin_countryName,
	                        "country_code"   => @$ipdat->geoplugin_countryCode,
	                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
	                        "continent_code" => @$ipdat->geoplugin_continentCode
	                    );
	                    break;
	                case "address":
	                    $address = array($ipdat->geoplugin_countryName);
	                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
	                        $address[] = $ipdat->geoplugin_regionName;
	                    if (@strlen($ipdat->geoplugin_city) >= 1)
	                        $address[] = $ipdat->geoplugin_city;
	                    $output = implode(", ", array_reverse($address));
	                    break;
	                case "city":
	                    $output = @$ipdat->geoplugin_city;
	                    break;
	                case "state":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "region":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "country":
	                    $output = @$ipdat->geoplugin_countryName;
	                    break;
	                case "countrycode":
	                    $output = @$ipdat->geoplugin_countryCode;
	                    break;
	            }
	        }
	    }
	    return $output;
	}

	function generate_ord_num()
	{
		//return substr(number_format(time() * rand(),0,'',''),0,10);
		return rand(10,99).time().rand(10,99);
	}



}