<?php
class Login_owner extends CI_Controller {
	public function __construct(){ //เข้า function ก่อนเสมอ
        parent::__construct();
		$this->load->model('users/owner_models');
	}
    public function index(){
        $this->load->view('users/owner/login_owner');
    }
	public function chk_login(){
		if($this->input->post()){  
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
            $rs = $this->owner_models->chk_login($username, $password);// การรีเทินค่า sql 
        // echo '<pre>';
        // print_r($rs);
        // echo '</pre>';
        // exit;
			if($rs){//$rs ค่าที่รีเทินออกมาจาก chk_login เมื่อเราเข้าสู่ระบบสำเร็จ
				$this->session->set_userdata('login',$rs);//เป็นคำสั่งตั้ง session // login ชื่อของ sessionมีหลายอันได้ /$rsคือค่าที่เราเก็บ
                redirect('owner');
            }else{
                $this->load->view('users/owner/login_owner');
			}
        } 
            $this->load->view('users/owner/login_owner');
	}
	public function logout(){
        $this->session->sess_destroy();
        redirect('login_owner/');
        // header("Location: {$_SERVER['HTTP_REFERER']}"); //รีเฟส ให้กลับมาหน้าเดิม
    }

}