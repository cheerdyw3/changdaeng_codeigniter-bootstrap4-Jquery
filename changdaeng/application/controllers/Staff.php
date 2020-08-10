<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->chk_session();
		$this->load->model('users/staff_models');
		$this->load->model('users/admin_models');
	}
	
	public function chk_session(){
		//ถ้าไม่มีค่า session
		if(!$this->session->userdata('login')){
           redirect('login_staff/');
		}else{
			$id = $this->session->userdata('login');
			$this->staff_id = $id[0]->staff_massager_id;
			// echo '<pre>';
			// print_r($this->staff_id);
			// echo '</pre>';
			// exit;
		}
	}

	public function index(){
		$data['menu'] = '';
		$data['submenu'] = '';
		$data['id'] = $this->staff_id;

		$data['view'] = 'users/staff/firstPage';
		$this->load->view('users/staff/main_templete',$data);
	}

	public function leave(){
		$data['query'] = $this->staff_models->getAllLeaveOfStaff($this->staff_id);
		$data['menu'] = 'leave';
		$data['submenu'] = '';
		$data['id'] = $this->staff_id;
		$data['view'] = 'users/staff/leave';
		$this->load->view('users/staff/main_templete',$data);
	}

	public function createLeave(){

			// echo '<pre>';
			// print_r($this->input->post());
			// // 'bkDate' => date("Y-m-d",strtotime($this->input->post('bkDate'))),
			// echo '</pre>';
			// exit;
		if($this->input->post()){
			if($this->input->post('endDate')===null){
				$data = array(
					'status' => $this->input->post('options'),
					'startDate' => date("Y-m-d",strtotime($this->input->post('startDate'))),
					'tel' => $this->input->post('tel'),
					'leave_detail' => $this->input->post('detail'),
					'staff_massager_id' => $this->input->post('id'),
					'title' => $this->input->post('title')
				);
			}else{
				$data = array(
					'status' => $this->input->post('options'),
					'startDate' => date("Y-m-d",strtotime($this->input->post('startDate'))),
					'endDate' => date("Y-m-d",strtotime($this->input->post('endDate'))),
					'tel' => $this->input->post('tel'),
					'leave_detail' => $this->input->post('detail'),
					'staff_massager_id' => $this->input->post('id'),
					'title' => $this->input->post('title')
				);
			}
			$check = $this->staff_models->addLeave($data);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	public function leaveHistory(){
		$data['query'] = $this->officer_models->getLeaveHistory();
		$data['menu'] = 'leave';
		$data['submenu'] = 'history';
		$data['view'] = 'users/officer/leaveHistory';
		$this->load->view('users/officer/main_templete',$data);
	}

	
	public function history_massager(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');

			$data['query'] = $this->staff_models->history_massager($id[0]->staff_massager_id);
			$data['menu'] = 'history';
			$data['submenu'] = '';
			$data['view'] = 'users/staff/history_massager';
			$this->load->view('users/staff/main_templete',$data);
		}
	}

	public function his_Where(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$date = $this->input->post('date');

			$data['query'] = $this->staff_models->get_his_where($id[0]->staff_massager_id,$date);

			$this->load->view('users/staff/res_his',$data);
		}
	}

	public function his_All(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$date = $this->input->post('date');

			// echo '<pre>';
			// print_r($date);
			// echo '</pre>';
			// exit;
			$data['query'] = $this->staff_models->get_his_all($id[0]->staff_massager_id,$date);

			$this->load->view('users/staff/res_his',$data);
		}
	}

	public function income_staff(){
		if($this->session->userdata('login')){
			$data['menu'] = 'income_staff';
			$data['submenu'] = '';
			$id = $this->session->userdata('login');

			// echo '<pre>';
			// print_r($this->input->post());
			// echo '</pre>';
			// exit;

			if(date('m')==1){
				$data['monthTH'] = 'มกราคม';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-31';
			}else if(date('m')==2){
				$data['monthTH'] = 'กุมภาพันธ์';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-28';
			}else if(date('m')==3){
				$data['monthTH'] = 'มีนาคม';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-31';
			}else if(date('m')==4){
				$data['monthTH'] = 'เมษายน';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-30';
			}else if(date('m')==5){
				$data['monthTH'] = 'พฤษภาคม';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-31';
			}else if(date('m')==6){
				$data['monthTH'] = 'มิถุนายน';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-30';
			}else if(date('m')==7){
				$data['monthTH'] = 'กรกฎาคม';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-31';
			}else if(date('m')==8){
				$data['monthTH'] = 'สิงหาคม';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-31';
			}else if(date('m')==9){
				$data['monthTH'] = 'กันยายน';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-30';
			}else if(date('m')==10){
				$data['monthTH'] = 'ตุลาคม';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-31';
			}else if(date('m')==11){
				$data['monthTH'] = 'พฤศจิกายน';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-30';
			}else if(date('m')==12){
				$data['monthTH'] = 'ธันวาคม';
				date('d')>=1 && date('d')<=15 ? $data['day'] = '1-15' : $data['day'] = '16-31';
			}

			$getIncome = $this->staff_models->history_massager_order($id[0]->staff_massager_id,date('Y-m'));

			$income = [];
			for($i=0;$i<count($getIncome);$i++){
				$day = date("d",strtotime($getIncome[$i]->date));
				$data1 = array(
					'history_id' => $getIncome[$i]->history_id,
					'staff_massager_id' => $getIncome[$i]->staff_massager_id,
					'history_hour' => $getIncome[$i]->history_hour,
					'course_id' => $getIncome[$i]->course_id,
					'history_money' => $getIncome[$i]->history_money,
					'detail_list_id' => $getIncome[$i]->detail_list_id,
					'date' => $getIncome[$i]->date,
					'course_name' => $getIncome[$i]->course_name,
				);

				if($data['day']=="1-15"){
					if($day >= 1 && $day <= 15){
						array_push($income,$data1);
					}
				}else if($data['day']=="16-28" || $data['day']=="16-30" || $data['day']=="16-31"){
					if($day >= 16 && $day <= 31){
						array_push($income,$data1);
					}
				}

				
			}

			$getCourse = $this->staff_models->getAllMSCourse();

			$totalCourse = [];
			for($l=0;$l<count($getCourse);$l++){
				$num = 0;
				$getMoneys = 0;
				$totalHours = 0;
				for($ll=0;$ll<count($income);$ll++){		
					if($getCourse[$l]->course_id == $income[$ll]["course_id"]){
						$getMoneys += $income[$ll]["history_money"];
						$totalHours += $income[$ll]["history_hour"];
						$num++;

					}
				}
				$arr=array(
					"course_id"=>$getCourse[$l]->course_id,
					"course_name"=>$getCourse[$l]->course_name,
					"num"=>$num,
					"totalHours"=>$totalHours,
					"getMoneys"=>$getMoneys,

				);
				array_push($totalCourse,$arr);
			}

			$data['totalCourse'] = $totalCourse;
			$data['income'] = $income;
			$data['view'] = 'users/staff/income_staff';
			$this->load->view('users/staff/main_templete',$data);
		}
	}

	public function income_staff_orderby(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');


			if(!$this->input->post("action")){
				$inputDate = $this->input->post('date');
				$inputType = $this->input->post('type');
				$inputMonth = date("m",strtotime($this->input->post('date')));
				if($inputMonth==1){
					$data['monthTH'] = 'มกราคม';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-31';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==2){
					$data['monthTH'] = 'กุมภาพันธ์';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-28';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==3){
					$data['monthTH'] = 'มีนาคม';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-31';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==4){
					$data['monthTH'] = 'เมษายน';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-30';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==5){
					$data['monthTH'] = 'พฤษภาคม';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-31';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==6){
					$data['monthTH'] = 'มิถุนายน';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-30';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==7){
					$data['monthTH'] = 'กรกฎาคม';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-31';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==8){
					$data['monthTH'] = 'สิงหาคม';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-31';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==9){
					$data['monthTH'] = 'กันยายน';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-30';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==10){
					$data['monthTH'] = 'ตุลาคม';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-31';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==11){
					$data['monthTH'] = 'พฤศจิกายน';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-30';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}else if($inputMonth==12){
					$data['monthTH'] = 'ธันวาคม';
					if($inputType==1){
						$data['day'] = '1-15';
					}else if($inputType==2){
						$data['day'] = '16-31';
					}else{
						$data['day'] = 'ทั้งหมด';
					}
				}
				$getIncome = $this->staff_models->history_massager_order($id[0]->staff_massager_id,$inputDate);
			}else{
				// '<pre>';
				// print_r($this->input->post("action"));
				// echo '</pre>';
				// exit;
				$data['monthTH'] = '';
				$data['day'] = 'ทั้งหมด';
				$getIncome = $this->staff_models->history_massager($id[0]->staff_massager_id);
			}

			// echo '<pre>';
			// print_r($getIncome);
			// echo '</pre>';
			// exit;
			if($getIncome){
				$income = [];
				for($i=0;$i<count($getIncome);$i++){
					$day = date("d",strtotime($getIncome[$i]->date));
					$data1 = array(
						'history_id' => $getIncome[$i]->history_id,
						'staff_massager_id' => $getIncome[$i]->staff_massager_id,
						'history_hour' => $getIncome[$i]->history_hour,
						'course_id' => $getIncome[$i]->course_id,
						'history_money' => $getIncome[$i]->history_money,
						'detail_list_id' => $getIncome[$i]->detail_list_id,
						'date' => $getIncome[$i]->date,
						'course_name' => $getIncome[$i]->course_name,
					);
					if($data['day']=="ทั้งหมด"){
						array_push($income,$data1);
					}else if($data['day']=="1-15"){
						if($day >= 1 && $day <= 15){
							array_push($income,$data1);
						}
					}else if($data['day']=="16-28" || $data['day']=="16-30" || $data['day']=="16-31"){
						if($day >= 16 && $day <= 31){
							array_push($income,$data1);
						}
					}
				}
				$getCourse = $this->staff_models->getAllMSCourse();
				$totalCourse = [];
				for($l=0;$l<count($getCourse);$l++){
					$num = 0;
					$getMoneys = 0;
					$totalHours = 0;
					for($ll=0;$ll<count($income);$ll++){		
						if($getCourse[$l]->course_id == $income[$ll]["course_id"]){
							$getMoneys += $income[$ll]["history_money"];
							$totalHours += $income[$ll]["history_hour"];
							$num++;
						}
					}
					$arr=array(
						"course_id"=>$getCourse[$l]->course_id,
						"course_name"=>$getCourse[$l]->course_name,
						"num"=>$num,
						"totalHours"=>$totalHours,
						"getMoneys"=>$getMoneys,

					);
					array_push($totalCourse,$arr);
				}
				$data['totalCourse'] = $totalCourse;
				$data['income'] = $income;
			}else{
				$data['totalCourse'] = "";
				$data['income'] = "";
			}
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// exit;
			$this->load->view('users/staff/income_staff_orderby',$data);
		}
	}


	public function getStaffById(){
		$data['userById'] = $this->admin_models->getStaffById($this->input->post('id'));
		$data['course'] = $this->admin_models->getAll_course();
		if($data){
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>false));
		}
	}

	public function profile(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$data['userById'] = $this->admin_models->getStaffById($id[0]->staff_massager_id);
			$data['course'] = $this->admin_models->getAll_course();
			// echo '<pre>';
			// print_r($data['course']);
			// echo '</pre>';
			// exit;

			$data['menu'] = '';
			$data['submenu'] = '';
			$data['view'] = 'users/staff/profile';
			$this->load->view('users/staff/main_templete',$data);
		}
	}

	public function changeEamilAndPass(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$data['userById'] = $this->admin_models->getStaffById($id[0]->staff_massager_id);
			// echo '<pre>';
			// print_r($data['course']);
			// echo '</pre>';
			// exit;

			$data['menu'] = '';
			$data['submenu'] = '';
			$data['view'] = 'users/staff/editEmailAndPass';
			$this->load->view('users/staff/main_templete',$data);
		}
	}


}
