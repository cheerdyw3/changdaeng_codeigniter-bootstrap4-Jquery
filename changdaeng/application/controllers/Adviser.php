<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adviser extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->chk_session();
		$this->load->model('users/adviser_models');
	}
	
	public function chk_session(){
		//ถ้าไม่มีค่า session
		if(!$this->session->userdata('login')){
           redirect('adviser/login');
		}else{
			$id = $this->session->userdata('login');

			$this->adviser_id = $id[0]->adviser_id;
			$this->email = $id[0]->email;

			// echo '<pre>';
			// print_r($this->staff_id);
			// echo '</pre>';
			// exit;
		
		}
	}

	public function login(){
        $this->load->view('users/adviser/login_adviser');
	}
	
	public function chk_login(){
		if($this->input->post()){
			$email = $this->input->post('email');
			// $password = $this->input->post('password');
			$password = md5($this->input->post('password'));
			$rs = $this->adviser_models->chk_login($email, $password);// การรีเทินค่า sql 
			if($rs){//$rs ค่าที่รีเทินออกมาจาก chk_login เมื่อเราเข้าสู่ระบบสำเร็จ
				$this->session->set_userdata('login',$rs);//เป็นคำสั่งตั้ง session // login ชื่อของ sessionมีหลายอันได้ /$rsคือค่าที่เราเก็บ
				$this->session->set_userdata('type',array("type"=>"adviser"));
                redirect('main');
            }else{
                $this->load->view('users/adviser/login_adviser');
			}
        } 
            $this->load->view('users/adviser/login_adviser');
	}

	public function logout(){
        $this->session->sess_destroy();
        redirect('login_advicer/');
        // header("Location: {$_SERVER['HTTP_REFERER']}"); //รีเฟส ให้กลับมาหน้าเดิม
    }

	public function index(){
		if($this->session->userdata('login')){

		}else{
			$this->load->view('users/adviser/login_adviser');
		}
	}

	public function addAdiser(){
		if($this->input->post()){	
			//upload file
			if($_FILES['IDCard3']['tmp_name'] != ""){
				if($_POST['com']!=""&&$_POST['email2']!=""&&$_POST['password']!=""&&$_POST['firstName']!=""&&$_POST['lastName']!=""&&$_POST['tel']!=""){
					$IDCard = $this->upload_img('IDCard3',$_FILES['IDCard3'],'_IDCard.','upload/adviser/IDCard');
					if($_FILES['imageUpload3']['tmp_name'] == ""){
						$image = "default.jpg";
					}else{
						$image = $this->upload_img('imageUpload3',$_FILES['imageUpload3'],'_adviser.','upload/adviser');
					}
					//set data
					$arrAdviser = array(
						'email' => $this->input->post('email2'),
						'password' => md5($this->input->post('password')),
						'firstName' => $this->input->post('firstName'),
						'lastName' => $this->input->post('lastName'),
						'tel' => $this->input->post('tel'),
						'sex' => $this->input->post('sex'),
						'address' => $this->input->post('address'),
						'img' => $image,
						'IDCard' => $IDCard,
						'status' => 0,
						'commission' => $this->input->post('com'),
						'createDate' => date('Y-m-d H:i:s')
					);
					$check = $this->adviser_models->add_adviser($arrAdviser);
					if($check){
						echo json_encode(array('status'=>true));
					}else{
						echo json_encode(array('status'=>false));
					}
				}else{
					echo json_encode(array('status'=>false));
				}
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	function chk_email_adviser(){
        if($this->input->post('email2')!=null)
		{
            $rs=$this->adviser_models->chk_email($this->input->post('email2'));
			
			if($rs!=null)
            {
                echo 'false';//มีค่า return แสดงว่า มีชื่อซ้ำ
            }
            else
            {
                echo 'true';//ไม่มีค่า return แสดงว่า ไม่มีชื่อซ้ำ
            }
		}
	}

	function chk_tel_adviser(){
        if($this->input->post('tel')!=null)
		{
            $rs=$this->adviser_models->chk_tel($this->input->post('tel'));
			
			if($rs!=null)
            {
                echo 'false';//มีค่า return แสดงว่า มีชื่อซ้ำ
            }
            else
            {
                echo 'true';//ไม่มีค่า return แสดงว่า ไม่มีชื่อซ้ำ
            }
		}
	}






















	
	function upload_img($input_name, $data, $last_rename, $folder){
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']       	= 100000000;
		$config['remove_spaces']	= true;
		// $Str_file = explode(".",$data['name']);
		// $new_name= date('YmdHis').$last_rename.$Str_file[1];
		$new_name = date('YmdHis').md5(rand(100, 200));
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload($input_name)) {
			$data = array('upload_data' => $this->upload->data());
			$logo = $data['upload_data']['file_name']; 
			return $logo;
		}
	}
}
