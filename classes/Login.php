<?php
require_once '../config.php';
class Login extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;

		parent::__construct();
		ini_set('display_error', 1);
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function index(){
		echo "<h1>Access Denied</h1> <a href='".base_url."'>Go Back.</a>";
	}
	public function login(){
		extract($_POST);
		$password = md5($password);
		$stmt = $this->conn->prepare("SELECT * from users where username = ? and `password` = ? ");
		$stmt->bind_param("ss",$username,$password);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows > 0){
			foreach($result->fetch_array() as $k => $v){
				if(!is_numeric($k) && $k != 'password'){
					$this->settings->set_userdata($k,$v);
				}

			}
			$this->settings->set_userdata('login_type',1);
		return json_encode(array('status'=>'success'));
		}else{
		return json_encode(array('status'=>'incorrect','last_qry'=>"SELECT * from users where username = '$username' and `password` = md5('$password') "));
		}
	}
	public function logout(){
		if($this->settings->sess_des()){
			redirect('admin/login.php');
		}
	}
	public function login_client(){
		// Start with a clean session
		if (session_status() === PHP_SESSION_ACTIVE) {
			session_regenerate_id(true);
		}

		extract($_POST);
		$password = md5($password);
		$stmt = $this->conn->prepare("SELECT * from client_list where email = ? and `password` =? and delete_flag = ?  ");
		$delete_flag = 0;
		$stmt->bind_param("ssi",$email,$password,$delete_flag);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows > 0){
			$data = $result->fetch_assoc(); // Use fetch_assoc instead of fetch_array for cleaner data
			
			if($data['status'] == 1){
				// Initialize userdata array if not exists
				if(!isset($_SESSION['userdata'])) {
					$_SESSION['userdata'] = [];
				}
				
				// Set user data directly in session for critical fields
				$_SESSION['userdata']['id'] = $data['id'];
				$_SESSION['userdata']['firstname'] = $data['firstname'];
				$_SESSION['userdata']['lastname'] = $data['lastname'];
				$_SESSION['userdata']['email'] = $data['email'];
				$_SESSION['userdata']['contact'] = $data['contact'];
				$_SESSION['userdata']['address'] = $data['address'];
				$_SESSION['userdata']['image_path'] = $data['image_path'];
				$_SESSION['userdata']['status'] = $data['status'];
				$_SESSION['userdata']['login_type'] = 2;
				
				// Success response
				$resp['status'] = 'success';
				$resp['msg'] = 'Login successful';
				$resp['user_id'] = $data['id'];
				$resp['name'] = $data['firstname'] . ' ' . $data['lastname'];
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = 'Votre compte a été bloqué par l\'administration.';
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = 'Email ou mot de passe incorrect.';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	public function logout_client(){
		if($this->settings->sess_des()){
			redirect('?');
		}
	}
	public function login_driver(){
		extract($_POST);
		$password = md5($password);
		$stmt = $this->conn->prepare("SELECT * from facility_list where reg_code = ? and `password` =? and delete_flag = ?  ");
		$delete_flag = 0;
		$stmt->bind_param("ssi",$reg_code,$password,$delete_flag);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows > 0){
			$data = $result->fetch_array();
			if($data['status'] == 1){
				foreach($data as $k => $v){
					if(!is_numeric($k) && $k != 'password'){
						$this->settings->set_userdata($k,$v);
					}

				}
				$this->settings->set_userdata('login_type',3);
				$resp['status'] = 'success';
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = ' Your Account has been blocked by the management.';
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = ' Incorrect Code or Password.';
			$resp['error'] = $this->conn->error;
			$resp['res'] = $result;
		}
		return json_encode($resp);
	}
	public function logout_driver(){
		if($this->settings->sess_des()){
			redirect('driver');
		}
	}
}
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action) {
	case 'login':
		echo $auth->login();
		break;
	case 'logout':
		echo $auth->logout();
		break;
	case 'login_client':
		echo $auth->login_client();
		break;
	case 'logout_client':
		echo $auth->logout_client();
		break;
	case 'login_driver':
		echo $auth->login_driver();
		break;
	case 'logout_driver':
		echo $auth->logout_driver();
		break;
	default:
		echo $auth->index();
		break;
}

