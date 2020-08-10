<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->chk_session();
		$this->load->model('users/officer_models');
		$this->load->model('homePage/home_models');
		$this->load->model('users/owner_models');
		$this->check = $this->checkStatusWork();
		//$this->check2 = $this->changeStatusStaffEndDay();
		$this->num_course = $this->count_course();
		$this->load->library('pdf');
	}
	
	public function chk_session(){
		//ถ้าไม่มีค่า session
		if(!$this->session->userdata('login')){
           redirect('login_officer/');
		}else{
			$id = $this->session->userdata('login');
		// echo '<pre>';
        // print_r($id);
        // echo '</pre>';
        // exit;
		// $this->officerId = $id[0]->officerId;
		// $this->admin_username = $id[0]->email;	
		//สามารถเรียกใช้ function ได้โดยไม่ต้องเขียนอีก
		}
	}

	public function index(){

		$data['menu'] = '';
		$data['submenu'] = '';
		$data['view'] = 'users/officer/firstPage';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function checkStatusWork(){
		$this->officer_models->checkStatusWork();
	}

	public function changeStatusStaffEndDay(){

		$getStatusUsers=$this->officer_models->getStatusUsers();

		for($i=0; $i<count($getStatusUsers); $i++){
			echo "<pre>";
			print_r($getStatusUsers[$i]->staff_massager_id);
			echo "</pre>";
			$this->officer_models->changeStatusStaffEndDay($getStatusUsers[$i]->staff_massager_id,array('status'=>1));
		}
		// exit;



		//$this->officer_models->changeStatusStaffEndDay();

		// echo "<pre>";
		// if(date('Y-m-d H:i:s')>=date('Y-m-d ').'23:55:00'){
		// 	print_r("000000000");
		// 	print_r(date('Y-m-d H:i:s'));
		// }else{
		// 	print_r(date('Y-m-d ').'23:55:00');
		// }
		// echo "</pre>";
		// exit;


		//$this->officer_models->changeStatusStaffEndDay();
	}
	
	public function room(){
		$data['query'] = $this->officer_models->getAll_room();
		$data['menu'] = 'room';
		$data['submenu'] = '';
		$data['view'] = 'users/officer/room';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function createRoom(){

		//print_r($this->input->post());
		if($this->input->post()){
			$room = array(
				'number' => $this->input->post('number'),
				'bed' => $this->input->post('bed'),
				'description' => $this->input->post('description'),
				'status' => 0,
				'use_bed' => 0,
				'createDate' => date('Y-m-d H:i:s')
			);
			$check = $this->officer_models->add_room($room);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	public function chkNumberRoom(){
        if($this->input->post('number')!=null){
            $rs=$this->officer_models->chkNumberRoom($this->input->post('number'));
			if($rs!=null){
                echo 'false';
            }else{
                echo 'true';
            }
		}
	}

	public function deleteRoom(){
		$id = $this->input->post('id');
		$checkRoom = $this->officer_models->getRoomById($id);
		if($checkRoom[0]->use_bed != 0){
			echo json_encode(array('status'=>false));
		}else{
			$this->officer_models->deleteRoom('room',$id);
			echo json_encode(array('status'=>true));
		}
	}

	public function MSCourse(){
		$data['query'] = $this->officer_models->getAllMSCourse();
		$data['menu'] = 'MSCourse';
		$data['submenu'] = '';
		$data['view'] = 'users/officer/MSCourse';
		$this->load->view('users/officer/main_templete',$data);
	}
	
	public function createMSCourse(){
		if($this->input->post()){
			if($_FILES['img']['tmp_name'] == ""){
				$image = "defaultCourse.jpg";
			}else{
				$image = $this->upload_img('img',$_FILES['img'],'img.','upload/courseMS');
			}
			$course = array(
				'course_name' => $this->input->post('courseName'),
				'course_price' => $this->input->post('price'),
				'course_detail' => $this->input->post('detail'),
				'course_get' => $this->input->post('course_get'),
				'createDate' => date('Y-m-d H:i:s'),
				'img' => $image
			);
			$check = $this->officer_models->addMSCourse($course);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	public function deleteMSCourse(){
		$id = $this->input->get('id');
		$this->officer_models->deleteMSCourse('massage_course',$id);
	}

	public function staff(){

		$staff = $this->officer_models->getAll_staff();
		$ws = $this->officer_models->getWS();


		$data1=[];
		for($i=0; $i<count($staff); $i++){
			$status = 0;
			for($u=0; $u<count($ws); $u++){
				if($staff[$i]->staff_massager_id == $ws[$u]->staff_massager_id){
					$status = 1;
				}
			}
			$data2 = array(
				'staff_massager_id' => $staff[$i]->staff_massager_id,
				'email' => $staff[$i]->email,
				'firstName' => $staff[$i]->firstName,
				'lastName' => $staff[$i]->lastName,
				'tell' => $staff[$i]->tell,
				'sex' => $staff[$i]->sex,
				'status' => $staff[$i]->status,
				'address' => $staff[$i]->address,
				'img' => $staff[$i]->img,
				'IDCard' => $staff[$i]->IDCard,
				'document' => $staff[$i]->document,
				'startDate' => $staff[$i]->startDate,
				'statusDay' => $status
			);
			array_push($data1,$data2);
		}

		// echo '<pre>';
        // print_r($data1);
        // echo '</pre>';
		// exit;

		$data['query'] = $data1;
		$data['menu'] = 'staff';
		$data['submenu'] = 'manage';
		$data['view'] = 'users/officer/staff';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function deleteCourse(){
		$courseId = $this->input->post('id');
		$checkCourse = $this->officer_models->checkCourseInListDetail($courseId);
		if($checkCourse){
			echo json_encode(array('status'=>false));
		}else{
			$this->officer_models->deleteCourse('massage_course',$courseId);
			echo json_encode(array('status'=>true));
		}
	}

	public function deleteNews(){
		$id = $this->input->post('id');

		$this->officer_models->deleteNews('news',$id);
		echo json_encode(array('status'=>true));
	
	}


	public function createLeave(){
		if($this->input->post()){
			if($this->input->post('endDate')===null){
				$data = array(
					'status' => $this->input->post('options'),
					'startDate' => date("Y-m-d",strtotime($this->input->post('startDate'))),
					'tel' => $this->input->post('tel'),
					'leave_detail' => $this->input->post('detail'),
					'staff_massager_id' => $this->input->post('idStaff'),
					'title' => $this->input->post('title')
				);
			}else{
				$data = array(
					'status' => $this->input->post('options'),
					'startDate' => date("Y-m-d",strtotime($this->input->post('startDate'))),
					'endDate' => date("Y-m-d",strtotime($this->input->post('endDate'))),
					'tel' => $this->input->post('tel'),
					'leave_detail' => $this->input->post('detail'),
					'staff_massager_id' => $this->input->post('idStaff'),
					'title' => $this->input->post('title')
				);
			}
			$check = $this->officer_models->addLeave($data);
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

	public function signStaff(){
		$idStaff = $this->input->get('id');
		$data = array(
			'staff_massager_id' => $idStaff,
			'status' => 0,
			'createDate' => date('Y-m-d H:i:s')
		);
		$check = $this->officer_models->signStaff($idStaff,$data);
		if($check){
			$check2 = $this->officer_models->updateStatusStaff($idStaff,array('status' => 2));
			
			echo json_encode(array('status'=>true));

		}else{
			echo json_encode(array('status'=>false));
		}
	}

	public function work_schedule(){
		$dataWs = $this->officer_models->getAllWorkSchedule();
		$data2=[];
			for($i=0; $i<count($dataWs); $i++){

				$arrCourse = explode(",",$dataWs[$i]->ability);
				$course=[];
				for($ii=0; $ii<count($arrCourse); $ii++){
					$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
					$course[]=$nameC[0]->course_name;
					$rs = implode(',',$course);
				}
				$data1 = array(
					'schedule_id' => $dataWs[$i]->schedule_id,
					'staff_massager_id' => $dataWs[$i]->staff_massager_id,
					'startDate' => $dataWs[$i]->startDate,
					'endDate' => $dataWs[$i]->endDate,
					'updateDate' => $dataWs[$i]->updateDate,
					'createDate' => $dataWs[$i]->createDate,
					'status' => $dataWs[$i]->status,
					'firstName' => $dataWs[$i]->firstName,
					'lastName' => $dataWs[$i]->lastName,
					'ability' => $dataWs[$i]->ability,
					'course' => $rs
				);
				array_push($data2,$data1);
			}

			// echo "<pre>";
			// print_r($data2);
			// echo "</pre>";
			// exit;
		$data['query'] = $data2;
		$data['menu'] = 'work_schedule';
		$data['submenu'] = 'หนึ่งรายการ';
		$data['view'] = 'users/officer/work_schedule';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function work_schedule_multi(){
		$dataWs = $this->officer_models->getAllWorkSchedule();
		$data2=[];
			for($i=0; $i<count($dataWs); $i++){

				$arrCourse = explode(",",$dataWs[$i]->ability);
				$course=[];
				for($ii=0; $ii<count($arrCourse); $ii++){
					$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
					$course[]=$nameC[0]->course_name;
					$rs = implode(',',$course);
				}
				$data1 = array(
					'schedule_id' => $dataWs[$i]->schedule_id,
					'staff_massager_id' => $dataWs[$i]->staff_massager_id,
					'startDate' => $dataWs[$i]->startDate,
					'endDate' => $dataWs[$i]->endDate,
					'updateDate' => $dataWs[$i]->updateDate,
					'createDate' => $dataWs[$i]->createDate,
					'status' => $dataWs[$i]->status,
					'firstName' => $dataWs[$i]->firstName,
					'lastName' => $dataWs[$i]->lastName,
					'ability' => $dataWs[$i]->ability,
					'course' => $rs
				);
				array_push($data2,$data1);
			}

			// echo "<pre>";
			// print_r($data2);
			// echo "</pre>";
			// exit;

		$data['query'] = $data2;
		$data['room'] = $this->officer_models->getAll_room();
		$data['course'] = $this->officer_models->getAllMSCourse();
		$data['menu'] = 'work_schedule';
		$data['submenu'] = 'หลายรายการ';
		$data['view'] = 'users/officer/work_schedule_multi';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function multi_work(){
		print_r($this->input->post());
		exit;
	}

	public function list_room(){
		$id = $this->uri->segment(3);
		$data['room'] = $this->officer_models->getAll_room();
		$dataWs = $this->officer_models->getWorkScheduleById($id);
		// echo "<pre>";
		// print_r($dataWs);
		// echo "</pre>";
		// exit;
		$data2=[];
			for($i=0; $i<count($dataWs); $i++){

				$arrCourse = explode(",",$dataWs[$i]->ability);
				$course=[];
				for($ii=0; $ii<count($arrCourse); $ii++){
					$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
					$course[]=$nameC[0]->course_name;
					$rs = implode(',',$course);
				}
				$data1 = array(
					'schedule_id' => $dataWs[$i]->schedule_id,
					'staff_massager_id' => $dataWs[$i]->staff_massager_id,
					'startDate' => $dataWs[$i]->startDate,
					'endDate' => $dataWs[$i]->endDate,
					'updateDate' => $dataWs[$i]->updateDate,
					'createDate' => $dataWs[$i]->createDate,
					'status' => $dataWs[$i]->status,
					'firstName' => $dataWs[$i]->firstName,
					'lastName' => $dataWs[$i]->lastName,
					'ability' => $dataWs[$i]->ability,
					'course' => $rs,
					'img' => $dataWs[$i]->img
				);
				array_push($data2,$data1);
			}

			// echo "<pre>";
			// print_r($data2);
			// echo "</pre>";
			// exit;

		$data['query'] = $data2;
		$data['menu'] = 'work_schedule';
		$data['submenu'] = '';
		$data['view'] = 'users/officer/list_room';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function list_room2(){
		echo "<pre>";
		print_r($this->input->post());
		echo "</pre>";
		exit;
		$id = $this->uri->segment(3);
		$data['room'] = $this->officer_models->getAll_room();
		// $data['query'] = $this->officer_models->getWorkScheduleById($id);
		$data['menu'] = 'work_schedule';
		$data['submenu'] = '';
		$data['view'] = 'users/officer/list_room2';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function changeStatusWs(){

		$id = $this->input->post('id');



		$data = array(
			'startDate' => "00:00:00",
			'endDate' => "00:00:00",
			'status' => 0
		);
		$edit = $this->officer_models->changeStatusWs($id,$data);
		$getWs = $this->officer_models->getListDetailByIdWs($id);
		// echo "<pre>";
		// print_r($getWs);
		// echo "</pre>";
		// exit;
		
		if($getWs){
			$getRoom = $this->officer_models->getRoomById($getWs[0]->room_id);
			if($getRoom){
				// echo "<pre>";
				// print_r($getRoom[0]->bed);
				// echo "</pre>";
				// print_r($getRoom[0]->use_bed);
				// exit;
				if($getRoom[0]->bed <= $getRoom[0]->use_bed){
					$updateBed = $this->officer_models->editRoom($getWs[0]->room_id,array('use_bed' => $getRoom[0]->use_bed - 1,'status' => 0));
				}else{
					$updateBed = $this->officer_models->editRoom($getWs[0]->room_id,array('use_bed' => $getRoom[0]->use_bed - 1));
				}
				echo json_encode(array('status'=>true));
			}
		}
	}


	public function list_all(){
		$roomId = $this->uri->segment(3);
		$wsId = $this->uri->segment(4);
		$data['room'] = $this->officer_models->getRoomById($roomId);
		$dataWs = $this->officer_models->getWorkScheduleById($wsId);
		// echo "<pre>";
		// print_r($dataWs);
		// echo "</pre>";
		// exit;
		$data2=[];
			for($i=0; $i<count($dataWs); $i++){

				$arrCourse = explode(",",$dataWs[$i]->ability);
				$course=[];
				for($ii=0; $ii<count($arrCourse); $ii++){
					$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
					$course[]=$nameC[0]->course_name;
					$rs = implode(',',$course);
				}
				$data1 = array(
					'schedule_id' => $dataWs[$i]->schedule_id,
					'staff_massager_id' => $dataWs[$i]->staff_massager_id,
					'startDate' => $dataWs[$i]->startDate,
					'endDate' => $dataWs[$i]->endDate,
					'updateDate' => $dataWs[$i]->updateDate,
					'createDate' => $dataWs[$i]->createDate,
					'status' => $dataWs[$i]->status,
					'firstName' => $dataWs[$i]->firstName,
					'lastName' => $dataWs[$i]->lastName,
					'ability' => $dataWs[$i]->ability,
					'course1' => $rs,
					'img' => $dataWs[$i]->img
				);
				array_push($data2,$data1);
			}

			// echo "<pre>";
			// print_r($data2);
			// echo "</pre>";
			// exit;

		$data['query'] = $data2;

		$data['course'] = $this->officer_models->getAllMSCourse();
		$data['menu'] = 'work_schedule';
		$data['submenu'] = '';
		$data['view'] = 'users/officer/list';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function count_course(){
		$num = $this->officer_models->count_course();
		return $num;
	}

	public function detailList(){
		
		$id = implode(',',$_POST['ability']);
		$price = implode(',',$_POST['price']);
		$hour = implode(',',$_POST['hour']);

		$totalHour = $this->input->post('totalHour');
		$comm = $this->input->post('comm');
		$totalPrice = $this->input->post('totalPrice');


		if($this->input->post('comm')!=""){
			// $totalComm = ($totalPrice-($totalHour*$comm));
			$totalComm = $totalHour*$comm;
			$income = $totalPrice-$totalComm;
		}else{
			$totalComm = 0;
			$income = $totalPrice;
		}

		// // echo "</pre>";
		// echo "<pre>";
		// print_r($totalComm);
		// echo "</pre>";
		// // echo "</pre>";
		// exit;
		// detail list -----------------------------------------------
		$data = array(
			'room_id' => $this->input->post('roomId'),
			'schedule_id' => $this->input->post('wsId'),
			'course_id' => $id,
			'hours' => $hour,
			'prices' => $price,
			'totalPrice' => $this->input->post('totalPrice'),
			'totalHours' => $this->input->post('totalHour'),
			'payment' => $this->input->post('payment'),
			'discount' => $this->input->post('dis'),
			'vat' => $this->input->post('vat'),
			'adviser_id' => $this->input->post('adId'),
			'com_of_adviser' => $totalComm,
			'amount' => 1,
			'startDate' => date('Y-m-d H:i:s')
		);
		$check = $this->officer_models->detailList($data);
		$count = count($this->input->post("ability"));

		// add history staff
		for($i=0 ; $i<$count ; $i++){
			$course_get = $this->officer_models->getCourse($this->input->post("ability")[$i]);
			$historyData = array(
				'staff_massager_id'=>$this->input->post("staffId"),
				'course_id'=>$this->input->post("ability")[$i],
				'detail_list_id'=> $check,
				'history_hour'=> $this->input->post("hour")[$i],
				'history_money'=> $this->input->post("hour")[$i]*$course_get[0]->course_get,
				'date' => date('Y-m-d')
			);
			$checkHistoryData = $this->officer_models->addHistotry($historyData);
		}

		$startDate = date("H:i:s", mktime(date("H"), date("i")+5));//บวก 5 นาที
		$endDate = date("H:i:s", mktime(date("H")+$this->input->post('totalHour'), date("i")+5 ));//บวก ชั่วโมงทั้งหมดตาม รายการนวด
		
		$dataWS = array(
			'startDate' => $startDate,
			'endDate' => $endDate,
			'status' => 1
		);

		// echo "<pre>";
		// print_r($dataWS);
		// echo "</pre>";
		// exit;
		$editWS = $this->officer_models->editWorkSchedule($this->input->post('wsId'),$dataWS);

		//update room -----------------------------------------------
		$getUseBed = $this->officer_models->checkBed($this->input->post('roomId'));
		if($getUseBed[0]->bed==$getUseBed[0]->use_bed+1){
			$dataRoom = array(
				'status' => 1,
				'use_bed' => $getUseBed[0]->use_bed+1
			);
		}else{
			$dataRoom = array(
				'use_bed' => $getUseBed[0]->use_bed+1
			);
		}
		$editRoom = $this->officer_models->editRoom($this->input->post('roomId'),$dataRoom);

		//income -----------------------------------------------
		$dataIncome = array(
			'detail_list_id' => $check,
			'money' => $income,
			'date' => date('Y-m-d H:i:s')
		);
		$checkIncome= $this->officer_models->addIncome($dataIncome);

		if($check){
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false));
		}

	}

	public function detailList_multi(){
		// echo "<pre>";
		// print_r($this->input->post());
		// echo "</pre>";

		// // $getUseBed = $this->officer_models->checkBed($this->input->post('room_id'));
		// // $amount = $this->input->post('checkMultilist');

		// // 	print_r($getUseBed[0]->use_bed+$amount);

		// exit;

		$id = implode(',',$_POST['ability']);
		$price = implode(',',$_POST['price']);
		$hour = implode(',',$_POST['hour']);
		$wsId = implode(',',$_POST['wsId']);

		$totalHour = $this->input->post('totalHour');
		$totalPrice = $this->input->post('totalPrice');
		$amount = $this->input->post('checkMultilist');

		if($this->input->post('comm')!=""){
			$comm = $this->input->post('comm')*$this->input->post('checkMultilist');
			$totalComm = $totalHour*$comm;
			$income = $totalPrice-$totalComm;
		}else{
			$totalComm = 0;
			$income = $totalPrice;
		}

		// detail list -----------------------------------------------
		$data = array(
			'room_id' => $this->input->post('room_id'),
			'schedule_id' => $wsId,
			'course_id' => $id,
			'hours' => $hour,
			'prices' => $price,
			'totalPrice' => $this->input->post('totalPrice'),
			'totalHours' => $this->input->post('totalHour'),
			'payment' => $this->input->post('payment'),
			'discount' => $this->input->post('dis'),
			'vat' => $this->input->post('vat'),
			'adviser_id' => $this->input->post('adId'),
			'com_of_adviser' => $totalComm,
			'amount' => $this->input->post('checkMultilist'),
			'startDate' => date('Y-m-d H:i:s')
		);
		$check = $this->officer_models->detailList($data);
		$count = count($this->input->post("ability"));
		$countWs = count($this->input->post("wsId"));
		// add history staff
		for($i=0 ; $i<$count ; $i++){
			$course_get = $this->officer_models->getCourse($this->input->post("ability")[$i]);
				for($ii=0 ; $ii<$countWs ; $ii++){
					$staff_get = $this->officer_models->getStaff($this->input->post("wsId")[$ii]);
					$historyData = array(
						'staff_massager_id'=>$staff_get[0]->staff_massager_id,
						'course_id'=>$this->input->post("ability")[$i],
						'detail_list_id'=> $check,
						'history_hour'=> $this->input->post("hour")[$i],
						'history_money'=> $this->input->post("hour")[$i]*$course_get[0]->course_get,
						'date' => date('Y-m-d')
					);
					$checkHistoryData = $this->officer_models->addHistotry($historyData);
				}
		}
		//$endDate = date("Y-m-d H:i:s", mktime(date("H")+$this->input->post('totalHour')));
		$startDate = date("H:i:s", mktime(date("H"), date("i")+5));//บวก 5 นาที
		$endDate = date("H:i:s", mktime(date("H")+$this->input->post('totalHour'), date("i")+5 ));//บวก ชั่วโมงทั้งหมดตาม รายการนวด

		$dataWS = array(
			'startDate' => $startDate,
			'endDate' => $endDate,
			'status' => 1
		);

		for($l=0 ; $l<$countWs ; $l++){
			$editWS = $this->officer_models->editWorkSchedule($this->input->post('wsId')[$l],$dataWS);
		}
	
		//update room -----------------------------------------------
		$getUseBed = $this->officer_models->checkBed($this->input->post('room_id'));

		if($getUseBed[0]->bed==$getUseBed[0]->use_bed+$amount){
			$dataRoom = array(
				// 'startDate' => $startDate,
				// 'endDate' => $endDate,
				'status' => 1,
				'use_bed' => $getUseBed[0]->use_bed+$amount
			);
		}else{
			$dataRoom = array(
				// 'startDate' => $startDate,
				// 'endDate' => $endDate,
				'use_bed' => $getUseBed[0]->use_bed+$amount
			);
		}
		$editRoom = $this->officer_models->editRoom($this->input->post('room_id'),$dataRoom);

		//income -----------------------------------------------
		$dataIncome = array(
			'detail_list_id' => $check,
			'money' => $income,
			'date' => date('Y-m-d H:i:s')
		);
		$checkIncome= $this->officer_models->addIncome($dataIncome);

		if($check){
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false));
		}

	}



	public function chkAdviserList(){
		$find = $this->input->get('adviser');
			$rs=$this->officer_models->chkAdviserList($find);
			if($rs!=null){
				echo json_encode(array('status'=>true,'data'=>$rs));
            }else{
				echo json_encode(array('status'=>false));
            }
	}



	public function history_booking(){
		$data['menu'] = 'book';
		$data['submenu'] = 'ทั้งหมด';
		$allBooking = $this->home_models->getAllBooking();

		$data2=[];
			for($i=0; $i<count($allBooking); $i++){

				$arrCourse = explode(",",$allBooking[$i]->course_id);
				$course=[];
				for($ii=0; $ii<count($arrCourse); $ii++){
					$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
					$course[]=$nameC[0]->course_name;
					$rs = implode(',',$course);
				}
				$data1 = array(
					'booking_id' => $allBooking[$i]->booking_id,
					'course' => $rs,
					'time' => $allBooking[$i]->time,
					'member_id' => $allBooking[$i]->member_id,
					'adviser_id' => $allBooking[$i]->adviser_id,
					'amount' => $allBooking[$i]->amount,
					'bkDate' => $allBooking[$i]->bkDate,
					'bkTime' => $allBooking[$i]->bkTime,
					'bkPrice' => $allBooking[$i]->bkPrice,
					'status' => $allBooking[$i]->status,
					'reject' => $allBooking[$i]->reject,
					'createDate' => $allBooking[$i]->createDate,
					'updateDate' => $allBooking[$i]->updateDate,

				);
				array_push($data2,$data1);
			}
		$data['getAllBooking'] =$data2 ;
		$data['view'] = 'users/officer/history_booking';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function history_booking0(){
		$data['menu'] = 'book';
		$data['submenu'] = 'รอการโอน';
		$allBooking = $this->home_models->getAllBooking();

		$data2=[];
			for($i=0; $i<count($allBooking); $i++){

				$arrCourse = explode(",",$allBooking[$i]->course_id);
				$course=[];
				for($ii=0; $ii<count($arrCourse); $ii++){
					$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
					$course[]=$nameC[0]->course_name;
					$rs = implode(',',$course);
				}
				$data1 = array(
					'booking_id' => $allBooking[$i]->booking_id,
					'course' => $rs,
					'time' => $allBooking[$i]->time,
					'member_id' => $allBooking[$i]->member_id,
					'adviser_id' => $allBooking[$i]->adviser_id,
					'amount' => $allBooking[$i]->amount,
					'bkDate' => $allBooking[$i]->bkDate,
					'bkTime' => $allBooking[$i]->bkTime,
					'bkPrice' => $allBooking[$i]->bkPrice,
					'status' => $allBooking[$i]->status,
					'reject' => $allBooking[$i]->reject,
					'createDate' => $allBooking[$i]->createDate,
					'updateDate' => $allBooking[$i]->updateDate,

				);
				array_push($data2,$data1);
			}
		$data['getAllBooking'] =$data2 ;
		$data['view'] = 'users/officer/history_booking0';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function history_booking1(){
		$data['menu'] = 'book';
		$data['submenu'] = 'ตรวจสอบการโอน';
		$allBooking = $this->home_models->getAllBooking();

		$data2=[];
			for($i=0; $i<count($allBooking); $i++){

				$arrCourse = explode(",",$allBooking[$i]->course_id);
				$course=[];
				for($ii=0; $ii<count($arrCourse); $ii++){
					$nameC = $this->home_models->getCourseById($arrCourse[$ii]);
					$course[]=$nameC[0]->course_name;
					$rs = implode(',',$course);
				}
				$data1 = array(
					'booking_id' => $allBooking[$i]->booking_id,
					'course' => $rs,
					'time' => $allBooking[$i]->time,
					'member_id' => $allBooking[$i]->member_id,
					'adviser_id' => $allBooking[$i]->adviser_id,
					'amount' => $allBooking[$i]->amount,
					'bkDate' => $allBooking[$i]->bkDate,
					'bkTime' => $allBooking[$i]->bkTime,
					'bkPrice' => $allBooking[$i]->bkPrice,
					'status' => $allBooking[$i]->status,
					'createDate' => $allBooking[$i]->createDate,
					'updateDate' => $allBooking[$i]->updateDate,

				);
				array_push($data2,$data1);
			}
		$data['getAllBooking'] =$data2 ;
		$data['view'] = 'users/officer/history_booking1';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function get_payment(){
		$id = $this->uri->segment(3);
		if($id){
			$data['menu'] = 'book';
			$data['submenu'] = 'ตรวจสอบการโอน';
			$data['bookingStatus'] = $this->officer_models->getStatusBook($id);
			$data['query'] = $this->officer_models->get_payment($id);
			$data['view'] = 'users/officer/get_payment';
			$this->load->view('users/officer/main_templete',$data);
		}

	}

	public function changeStatusAccrued(){
		// 		echo "<pre>";
		// print_r($this->input->post('id'));
		// echo "</pre>";
		// exit;
		if($this->input->post()){
			$data = array(
				'statusPayToAdviser' => 1
			);

			$this->officer_models->changeStatusAccrued($this->input->post('id'),$data);

			echo json_encode(array('status'=>true));

		}
	}


	public function reject_pay(){
		if($this->input->post()){
			$data = array(
				'reject' => $this->input->post('reject'),
				'status' => 4
			);

			$this->officer_models->edit_status_booking($this->input->post('booking_id'),$data);

			echo json_encode(array('status'=>true));

		}
	}


	public function approve_pay(){
		$id = $this->input->get('id');
		if($this->input->get('id')){
				$data = array(
					'reject' => "",
					'status' => 2
				);
				$this->officer_models->edit_status_booking($id,$data);
				echo json_encode(array('status'=>true));
		}
	}

	public function expense(){
		$data['query'] = $this->officer_models->getExpense();
		$data['menu'] = 'incomeAndExpense';
		$data['submenu'] = 'รายจ่ายเบ็ดเตล็ด';
		$data['view'] = 'users/officer/expense';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function accrued(){
		$data['menu'] = 'incomeAndExpense';
		$data['submenu'] = 'ยอดค้างจ่ายไกด์';
		$list = $this->officer_models->getListDetail();
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
		$data['view'] = 'users/officer/accrued';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function create_expense(){

		// echo "<pre>";
		// print_r($this->input->post());
		// echo "</pre>";
		// exit;
		if($this->input->post()){

			$data = array(
				'type' => $this->input->post('type'),
				'description' => $this->input->post('description'),
				'money' => $this->input->post('money'),
				'createDate' => date('Y-m-d H:i:s')
			);
			$check = $this->officer_models->create_expense($data);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}
//------------------------------------------------------------------------------------------------
	public function showIncome(){

		// $id = $this->session->userdata('login');

		$data['income'] = $this->owner_models->income();
		$data['menu'] = 'report';
		$data['submenu'] = 'income';
		$data['view'] = 'users/officer/getIncome';
		$this->load->view('users/officer/main_templete',$data);

	}
//income
	public function export_incomeAll(){
		// $admin_id = $this->admin_id;
		// $data['admin'] = $this->tutor_models->select_admin($admin_id);
		$data['income'] = $this->owner_models->income();
		$this->load->view('users/officer/pdf/print_income', $data);

	}
	public function export_income_orderBy(){
		// $admin_id = $this->admin_id;
		// $data['admin'] = $this->tutor_models->select_admin($admin_id);
		$month=$this->input->post('month2');
		$year=$this->input->post('year2');
		if($month<10){
			$date = (($year-543).'-'.("0".$month));
		}else{
			$date = (($year-543).'-'.$month);
		}
		// echo "<pre>";
		// print_r($date);
		// echo "</pre>";
		// exit;
		$data['income'] = $this->owner_models->income_where($date);
		$this->load->view('users/officer/pdf/print_income', $data);

	}
//expense
	public function export_expenseAll(){
		// $admin_id = $this->admin_id;
		// $data['admin'] = $this->tutor_models->select_admin($admin_id);
		$data['income'] = $this->owner_models->expense();
		$this->load->view('users/officer/pdf/print_expense', $data);

	}
	public function export_expense_orderBy(){
		// $admin_id = $this->admin_id;
		// $data['admin'] = $this->tutor_models->select_admin($admin_id);
		$month=$this->input->post('month2');
		$year=$this->input->post('year2');
		if($month<10){
			$date = (($year-543).'-'.("0".$month));
		}else{
			$date = (($year-543).'-'.$month);
		}
		$data['income'] = $this->owner_models->expense_where($date);
		$this->load->view('users/officer/pdf/print_expense', $data);
	}

	public function export_receipt(){
		// $admin_id = $this->admin_id;
		// $data['admin'] = $this->tutor_models->select_admin($admin_id);
		$id = $this->uri->segment(3);
		$list = $this->officer_models->getListDetailById($id);
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
			);
			array_push($data2,$data1);
		}
		$data['receipt'] = $data2;
		$data['id'] = $data2[0]['detail_list_id'];
		
		$arrCourse = explode(",",$data2[0]['course']);
		$arrHours = explode(",",$data2[0]['hours']);
		$arrPrices = explode(",",$data2[0]['prices']);
		$result = array();
		foreach ($arrCourse as $id => $key) {
			$result[$id] = array(
				'course'  => $arrCourse[$id],
				'hours' => $arrHours[$id],
				'prices'    => $arrPrices[$id],
			);
		}
		$data['course'] = $result;
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit;
		$this->load->view('users/officer/pdf/print_receipt', $data);
	}

	public function showExpense(){
		$data['menu'] = 'report';
		$data['submenu'] = 'expense';
		$data['getData'] = $this->owner_models->getExpense();
		$data['view'] = 'users/officer/getExpense';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function getReceipt(){
		$data['menu'] = 'report';
		$data['submenu'] = 'receipt';
		$list = $this->officer_models->getListDetail2();
		// echo "<pre>";
		// print_r($list);
		// echo "</pre>";
		// exit;

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
			);
			array_push($data2,$data1);
		}
		$data['receipt'] = $data2;
		$data['view'] = 'users/officer/getReceipt';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function deleteWs(){
		$id = $this->input->get('id');
		$getStaff = $this->officer_models->getWorkScheduleById($id);
		if($getStaff){
			// echo "<pre>";
			// print_r($getStaff[0]->staff_massager_id);
			// echo "</pre>";
			//$updateStaff = $this->officer_models->changeStatusStaffEndDay($getStaff[0]->staff_massager_id,array('status'=>1));
			$deleteWs = $this->officer_models->deleteWs('work_schedule',$id);
		}		
	}

	public function manager_news(){
		$data['query'] = $this->officer_models->getAllNews();
		$data['menu'] = 'manager';
		$data['submenu'] = 'manager_news';
		$data['view'] = 'users/officer/manager_news';
		$this->load->view('users/officer/main_templete',$data);
	}

	public function createNew(){
			// echo "<pre>";
			// print_r($this->input->post());
			// // print_r($_FILES['img']);
			// echo "</pre>";
			// exit;
		if($this->input->post()){
			if($_FILES['img']['tmp_name'] == ""){
				$image = "defaultNew.jpg";
			}else{
				$image = $this->upload_img('img',$_FILES['img'],'img.','upload/news');
			}
			$new = array(
				'name' => $this->input->post('newName'),
				'description' => $this->input->post('detail'),
				'status' => $this->input->post('status'),
				'createDate' => date('Y-m-d H:i:s'),
				'img' => $image
			);
			$check = $this->officer_models->addNew($new);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	public function getCourseById(){
		$data['courseById'] = $this->officer_models->getCourseById($this->input->post('id'));
		if($data){
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>false));
		}
	}

	public function getNewsById2(){
		$data['newsById'] = $this->officer_models->getNewsById2($this->input->post('id'));
		if($data){
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>false));
		}
	}


	public function edit_News(){
			// 		echo "<pre>";
			// // print_r($this->input->post());
			// print_r($_FILES);
			// echo "</pre>";
			// exit;
		if($this->input->post()){
			$id = $this->input->post("news_id");
			if($_FILES['img2']['tmp_name'] != ""){
				$image = $this->upload_img('img2',$_FILES['img2'],'img2.','upload/news');
				$setData = array(
					'name' => $this->input->post('newName2'),
					'description' => $this->input->post('detail2'),
					'status' => $this->input->post('status'),
					'img' => $image
				);
			}else{
				$setData = array(
					'name' => $this->input->post('newName2'),
					'description' => $this->input->post('detail2'),
					'status' => $this->input->post('status')
				);
			}
			$check = $this->officer_models->edit_News($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	public function edit_Course(){
		if($this->input->post()){
			$id = $this->input->post("courseId");
			if($_FILES['img1']['tmp_name'] != ""){
				$image = $this->upload_img('img1',$_FILES['img1'],'img1.','upload/courseMS');
				$setData = array(
					'course_name' => $this->input->post('courseName1'),
					'course_price' => $this->input->post('price1'),
					'course_get' => $this->input->post('course_get1'),
					'course_detail' => $this->input->post('detail1'),
					'img' => $image
				);
			}else{
				$setData = array(
					'course_name' => $this->input->post('courseName1'),
					'course_price' => $this->input->post('price1'),
					'course_get' => $this->input->post('course_get1'),
					'course_detail' => $this->input->post('detail1')
				);
			}
			$check = $this->officer_models->edit_Course($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}
	public function getRoomById(){
		$data['roomById'] = $this->officer_models->getRoomById($this->input->post('id'));
		if($data){
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>false));
		}
	}
	public function edit_Room(){
		if($this->input->post()){
			// echo "<pre>";
			// print_r($this->input->post());
			// // print_r($_FILES['img']);
			// echo "</pre>";
			// exit;
			$id = $this->input->post("roomId");
			$setData = array(
				'number' => $this->input->post('number1'),
				'bed' => $this->input->post('bedNum1'),
				'description' => $this->input->post('detail1'),
				'status' => $this->input->post('status'),
			);
			$check = $this->officer_models->edit_room($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	public function profile(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');

			$data['userById'] = $this->officer_models->getOfficerById($id[0]->officerId);

			// echo '<pre>';
			// print_r($data['userById']);
			// echo '</pre>';
			// exit;

			$data['menu'] = '';
			$data['submenu'] = '';
			$data['view'] = 'users/officer/profile';
			$this->load->view('users/officer/main_templete',$data);
		}
	}

	public function changeEamilAndPass(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$data['userById'] = $this->officer_models->getOfficerById($id[0]->officerId);
			// echo '<pre>';
			// print_r($data['course']);
			// echo '</pre>';
			// exit;

			$data['menu'] = '';
			$data['submenu'] = '';
			$data['view'] = 'users/officer/editEmailAndPass';
			$this->load->view('users/officer/main_templete',$data);
		}
	}

	public function edit_profile(){
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		if($this->input->post()){	

			$id = $this->input->post('officerId');

			if($_POST['firstName']!=""&&$_POST['lastName']!=""&&$_POST['tell']!=""){

				if($_FILES['img']['tmp_name'] != ""){
					$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/officer');

					$arr = array(
						'firstName' => $this->input->post('firstName'),
						'lastName' => $this->input->post('lastName'),
						'tell' => $this->input->post('tell'),
						'sex' => $this->input->post('sex'),
						'address' => $this->input->post('address'),
						'img' => $image,
					);
				}else{
					$arr = array(
						'firstName' => $this->input->post('firstName'),
						'lastName' => $this->input->post('lastName'),
						'tell' => $this->input->post('tell'),
						'sex' => $this->input->post('sex'),
						'address' => $this->input->post('address')
					);
					
				}
					$check = $this->officer_models->edit_officer($arr,$id);
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

	public function changeEmailAndPass(){
		// echo '<pre>'; 
		// print_r($this->input->post());
		// echo'</pre>'; 
		// exit;
	if($this->input->post()){
		if($this->input->post("email")!=""){
			$id = $this->input->post("officerId");
			$setData = array(
				'email' => $this->input->post('email'),
			);
		}else if($this->input->post("pass")!=""){
			$id = $this->input->post("officerId");
			$setData = array(
				'password' => md5($this->input->post('pass')),
			);
		}
		$check = $this->officer_models->edit_officer($setData, $id);
		if($check){
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false));
		}
	}
}

function chk_email_officer(){
	if($this->input->post('email')!=null){
		$rs=$this->officer_models->chk_email_officer($this->input->post('email'));
		if($rs!=null){
			echo 'false';//มีค่า return แสดงว่า มีชื่อซ้ำ
		}else{
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
