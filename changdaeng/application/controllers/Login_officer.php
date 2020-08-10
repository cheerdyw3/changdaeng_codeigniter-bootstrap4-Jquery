<?php
class Login_officer extends CI_Controller {
	public function __construct(){ //เข้า function ก่อนเสมอ
        parent::__construct();
		$this->load->model('users/officer_models');
	}
    public function index(){
        $this->load->view('users/officer/login_officer');
    }
	public function chk_login(){
		if($this->input->post()){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
            $rs = $this->officer_models->chk_login($username, $password);// การรีเทินค่า sql 
        // echo '<pre>';
        // print_r($rs);
        // echo '</pre>';
        // exit;
			if($rs){//$rs ค่าที่รีเทินออกมาจาก chk_login เมื่อเราเข้าสู่ระบบสำเร็จ
				$this->session->set_userdata('login',$rs);//เป็นคำสั่งตั้ง session // login ชื่อของ sessionมีหลายอันได้ /$rsคือค่าที่เราเก็บ
                redirect('officer');
            }else{
                $this->load->view('users/officer/login_officer');
			}
        } 
            $this->load->view('users/officer/login_officer');
	}
	public function logout(){
        $this->session->sess_destroy();
        redirect('login_officer/');
        // header("Location: {$_SERVER['HTTP_REFERER']}"); //รีเฟส ให้กลับมาหน้าเดิม
    }

}