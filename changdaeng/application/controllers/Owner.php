<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->chk_session();
		$this->load->model('users/admin_models');
		$this->load->model('users/staff_models');
		$this->load->model('users/owner_models');
		$this->load->model('homePage/home_models');
	}
	
	public function chk_session(){
		//ถ้าไม่มีค่า session
		if(!$this->session->userdata('login')){
           redirect('login_owner/');
		}else{
			$id = $this->session->userdata('login');
			// echo '<pre>';
			// print_r($this->staff_id);
			// echo '</pre>';
			// exit;
	
		}
	}

	public function index(){
		$data['menu'] = '';
		$data['submenu'] = '';
		// $data['id'] = $this->staff_id;

		$data['view'] = 'users/owner/firstPage';
		$this->load->view('users/owner/main_templete',$data);
	}

	function chk_email_staff(){
		if($this->input->post('email3')!=null){
			$rs=$this->owner_models->chk_email($this->input->post('email3'));

			if($rs!=null){
				echo 'false';//มีค่า return แสดงว่า มีชื่อซ้ำ
			}else{
				echo 'true';//ไม่มีค่า return แสดงว่า ไม่มีชื่อซ้ำ
			}
		}
	}

	public function add_staff_massager(){
		if($this->input->post()){	
			//upload file
			if($_POST['email3']!=""&&$_POST['password2']!=""&&$_POST['firstName2']!=""&&$_POST['lastName2']!=""&&$_POST['tell2']!=""){
				if($_FILES['imageUpload2']['tmp_name'] == ""){
					$image = "default.jpg";
					$IDCard = $this->upload_img('IDCard2',$_FILES['IDCard2'],'_IDCard.','upload/staffMassager/IDCard');
					$document = $this->upload_img('document2',$_FILES['document2'],'_officer.','upload/staffMassager/document');
				}else{
					$image = $this->upload_img('imageUpload2',$_FILES['imageUpload2'],'_officer.','upload/staffMassager/profile');
					$IDCard = $this->upload_img('IDCard2',$_FILES['IDCard2'],'_IDCard.','upload/staffMassager/IDCard');
					$document = $this->upload_img('document2',$_FILES['document2'],'_officer.','upload/staffMassager/document');
				}
				//checkbox
				$ability = implode(',',$_POST['ability2']);
				//set data
				$arrStaff = array(
					'email' => $this->input->post('email3'),
					'password' => md5($this->input->post('password2')),
					'firstName' => $this->input->post('firstName2'),
					'lastName' => $this->input->post('lastName2'),
					'tell' => $this->input->post('tell2'),
					'sex' => $this->input->post('sex2'),
					'address' => $this->input->post('address2'),
					'img' => $image,
					'IDCard' => $IDCard,
					'document' => $document,
					'status' => 0,
					'startDate' => date('Y-m-d H:i:s'),
					'ability' => $ability
				);
				$check = $this->admin_models->add_staff($arrStaff);
				if($check){
					echo json_encode(array('status'=>true));
				}else{
					echo json_encode(array('status'=>false));
				}
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}


	public function approve_staff(){
		$staff = $this->owner_models->getAllStaff();
		$data2=[];
		for($i=0; $i<count($staff); $i++){

			$arrCourse = explode(",",$staff[$i]->ability);
			$course=[];
			for($ii=0; $ii<count($arrCourse); $ii++){
				$nameC = $this->owner_models->getCourseById($arrCourse[$ii]);
				$course[]=$nameC[0]->course_name;
				$rs = implode(',',$course);
			}
			$data1 = array(
				'staff_massager_id' => $staff[$i]->staff_massager_id,
				'email' => $staff[$i]->email,
				'firstName' => $staff[$i]->firstName,
				'lastName' => $staff[$i]->lastName,
				'tell' => $staff[$i]->tell,
				'sex' => $staff[$i]->sex,
				'address' => $staff[$i]->address,
				'img' => $staff[$i]->img,
				'IDCard' => $staff[$i]->IDCard,
				'document' => $staff[$i]->document,
				'status' => $staff[$i]->status,
				'ability' => $staff[$i]->ability,
				'startDate' => $staff[$i]->startDate,
				'course_name' => $rs


			);
			array_push($data2,$data1);
		}
		$data['data'] = $data2;
		$data['menu'] = 'join';
		$data['submenu'] = 'staff';

		$data['view'] = 'users/owner/approve_staff';
		$this->load->view('users/owner/main_templete',$data);
	}

	public function approve_st(){
		$id = $this->input->get('id');
		$editRoom = $this->owner_models->editStatusStaff($id,array('status' => 1));

		echo json_encode(array('status'=>true));
	}

	public function reject_st(){
		$id = $this->input->get('id');
		$editRoom = $this->owner_models->editStatusStaff($id,array('status' => 2));

		echo json_encode(array('status'=>true));
	}

	public function approve_guide(){
		$data['data'] = $this->owner_models->getAllGuide();
		$data['menu'] = 'join';
		$data['submenu'] = 'guide';

		$data['view'] = 'users/owner/approve_guide';
		$this->load->view('users/owner/main_templete',$data);
	}

	public function approve_g(){
		$id = $this->input->get('id');
		$editRoom = $this->owner_models->editStatusGuide($id,array('status' => 1));

		echo json_encode(array('status'=>true));
	}

	public function reject_g(){
		$id = $this->input->get('id');
		$editRoom = $this->owner_models->editStatusGuide($id,array('status' => 2));

		echo json_encode(array('status'=>true));
	}

	public function income(){
		// $id = $this->session->userdata('login');
		$data['income'] = $this->owner_models->income();
		$data['menu'] = 'report';
		$data['submenu'] = 'income';
		$data['view'] = 'users/owner/income';
		$this->load->view('users/owner/main_templete',$data);

	}

	public function income_where(){
		$date = $this->input->post('date');
			// echo '<pre>';
			// print_r($date);
			// echo '</pre>';
			// exit;
		$data['income'] = $this->owner_models->income_where($date);
		$this->load->view('users/owner/res_income',$data);
	}
	public function income_all(){
		$data['income'] = $this->owner_models->income_all();
		$this->load->view('users/owner/res_income',$data);
	}

//expense
	public function expense_where(){
		$date = $this->input->post('date');
		$data['getData'] = $this->owner_models->expense_where($date);
		$this->load->view('users/owner/res_expense',$data);
	}
	public function expense_all(){
		$data['getData'] = $this->owner_models->expense_all();
		$this->load->view('users/owner/res_expense',$data);
	}
//
	public function accrued(){
		$data['menu'] = 'incomeAndExpense';
		$data['submenu'] = '';
		$list = $this->owner_models->getListDetail();
		$data2=[];
		for($i=0; $i<count($list); $i++){
			$arrCourse = explode(",",$list[$i]->course_id);
			$course=[];
			for($ii=0; $ii<count($arrCourse); $ii++){
				$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
				$course[]=$nameC[0]->course_name;
				$rs = implode(',',$course);
			}
			$data1 = array(
				'detail_list_id' => $list[$i]->detail_list_id,
				'room_id' => $list[$i]->room_id,
				'schedule_id' => $list[$i]->schedule_id,
				'course_id' => $list[$i]->course_id,
				'adviser_id' => $list[$i]->adviser_id,
				'totalPrice' => $list[$i]->totalPrice,
				'totalHours' => $list[$i]->totalHours,
				'discount' => $list[$i]->discount,
				'vat' => $list[$i]->vat,
				'payment' => $list[$i]->payment,
				'startDate' => $list[$i]->startDate,
				'hours' => $list[$i]->hours,
				'prices' => $list[$i]->prices,
				'com_of_adviser' => $list[$i]->com_of_adviser,
				'statusPayToAdviser' => $list[$i]->statusPayToAdviser,
				'amount' => $list[$i]->amount,
				'updateDate' => $list[$i]->updateDate,
				'course' => $rs,
				'firstName' => $list[$i]->firstName,
				'lastName' => $list[$i]->lastName,
				'tel' => $list[$i]->tel,
			);
			array_push($data2,$data1);
		}

		$data['getData'] = $data2;
		$data['view'] = 'users/owner/accrued';
		$this->load->view('users/owner/main_templete',$data);
	}

	public function expense(){
		$data['menu'] = 'report';
		$data['submenu'] = 'expense';
		$data['getData'] = $this->owner_models->getExpense();
		$data['view'] = 'users/owner/expense';
		$this->load->view('users/owner/main_templete',$data);
	}

	public function salary_staff(){
		if($this->session->userdata('login')){
			$data['menu'] = 'salary_staff';
			$data['submenu'] = '';
		

			$data['view'] = 'users/owner/salary_staff';
			$this->load->view('users/owner/main_templete',$data);
		}
	}

	public function get_salary_orderby(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');

			if(!$this->input->post("action")){
				$inputDate = $this->input->post('date');
				$inputType = $this->input->post('type');

				if($inputType == 1){
					$statDate = $inputDate.'-'.'01';
					$endDate = $inputDate.'-'.'16';
				}else{
					$statDate = $inputDate.'-'.'16';
					$endDate = $inputDate.'-'.'31';
				}
				


				
				// echo '<pre>';
				// print_r($statDate);
				// echo '</pre>';

				$data["statDate"] = $statDate;
				$data["endDate"] = $endDate;
				$data["getSalary"] = $this->owner_models->getAllHistoryMassager($statDate,$endDate);
				// echo '<pre>';
				// print_r($getSalary);
				// echo '</pre>';
				// exit;

			$this->load->view('users/owner/salary_staff_orderBy',$data);
			}	
		}	
	}




	public function update_salary(){
		if($this->session->userdata('login')){
			
			$id = $this->input->post('staffId');
			$startDate = $this->input->post('startDate');
			$endDate = $this->input->post('endDate');
			$wage = $this->input->post('wage');
			$getHis = $this->owner_models->getHistoryMassagerById($id,$startDate,$endDate);
			
			// echo '<pre>';	
			// print_r($getHis);
			// echo '</pre>';
			// exit;
			if($getHis){
				for($i=0; $i<count($getHis); $i++){
					$editRoom = $this->owner_models->editStatusPayStaff($getHis[$i]->history_id,array('statusPay' => 1));
				}

				$data = array(
					'type' => 3,
					'description' => "รหัสพนักงานนวด ".$id." ระหว่างวันที่ ".$startDate." - ".$endDate,
					'money' => $wage,
					'createDate' => date('Y-m-d H:i:s')
				);
				$check = $this->owner_models->create_expense($data);
				if($check){
					echo json_encode(array('status'=>true));
				}else{
					echo json_encode(array('status'=>false));
				}
			}
		}
	}
	
	public function deleteOwner(){
		$id = $this->input->post('id');
		$checkCount = $this->owner_models->getAllOwner();
		// $check = $this->owner_models->getOwnerById($id);
			// echo '<pre>';	
			// print_r();
			// echo '</pre>';
			// exit;
		if(count($checkCount)==1){
			echo json_encode(array('status'=>false));
		}else{
			$this->owner_models->deleteOwner('owner',$id);
			echo json_encode(array('status'=>true));
		}
		// if($check){
		// 	echo json_encode(array('status'=>false));
		// }else{
		// 	$this->owner_models->deleteOwner('massage_course',$id);
		// 	echo json_encode(array('status'=>true));
		// }
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
