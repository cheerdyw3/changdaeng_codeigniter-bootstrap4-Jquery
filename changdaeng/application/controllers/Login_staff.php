<?php
class Login_staff extends CI_Controller {
	public function __construct(){ //เข้า function ก่อนเสมอ
        parent::__construct();
		$this->load->model('users/staff_models');
	}
    public function index(){
        $this->load->view('users/staff/login_staff');
    }
	public function chk_login(){
		if($this->input->post()){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$rs = $this->staff_models->chk_login($username, $password);// การรีเทินค่า sql 
			if($rs){//$rs ค่าที่รีเทินออกมาจาก chk_login เมื่อเราเข้าสู่ระบบสำเร็จ
				$this->session->set_userdata('login',$rs);//เป็นคำสั่งตั้ง session // login ชื่อของ sessionมีหลายอันได้ /$rsคือค่าที่เราเก็บ
                redirect('staff/income_staff');
            }else{
                $this->load->view('users/staff/login_staff');
			}
        } 
            $this->load->view('users/staff/login_staff');
	}
	public function logout(){
        $this->session->sess_destroy();
        redirect('login_staff/');
        // header("Location: {$_SERVER['HTTP_REFERER']}"); //รีเฟส ให้กลับมาหน้าเดิม
    }

}