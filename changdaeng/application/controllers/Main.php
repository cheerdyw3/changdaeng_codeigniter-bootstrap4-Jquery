<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->chk_session();	
		$this->load->model('users/officer_models');
		$this->load->model('users/admin_models');
		$this->load->model('homePage/home_models');
		$this->load->model('users/owner_models');
	}
	
	public function chk_session(){
		//ถ้าไม่มีค่า session
		if(!$this->session->userdata('login')){
           redirect('main');
		}else{
			$data = $this->session->userdata('login');

			$this->member_id = $data[0]->member_id;
			$this->member_email = $data[0]->email;

			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';
			// exit;
		
		}
	}


	public function chk_login(){
		if($this->input->post()){
			$email = $this->input->post('email1');
			$password = md5($this->input->post('password1'));
			$rs = $this->home_models->chk_login($email, $password);// การรีเทินค่า sql 
			if($rs){//$rs ค่าที่รีเทินออกมาจาก chk_login เมื่อเราเข้าสู่ระบบสำเร็จ
				$this->session->set_userdata('login',$rs);//เป็นคำสั่งตั้ง session // login ชื่อของ sessionมีหลายอันได้ /$rsคือค่าที่เราเก็บ
				$this->session->set_userdata('type',array("type"=>"member"));
                redirect('main');
            }else{
                $this->load->view('homePage/main');
			}
        } 
		$this->load->view('homePage/main');
	}

	public function logout(){
        $this->session->sess_destroy();
		redirect('main');
        // header("Location: {$_SERVER['HTTP_REFERER']}"); //รีเฟส ให้กลับมาหน้าเดิม
    }

	public function index(){
		$data['menu'] = '';
		$data['submenu'] = '';

		
		$this->load->view('homePage/main',$data);
	}


	public function addMember(){
		// echo '<pre>';
		// print_r($this->input->post());
		// // print_r($_FILES);
		// echo '</pre>';
		// exit;

		if($this->input->post()){
				$member = array(
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'tel' => $this->input->post('tel5'),
					'createDate' => date('Y-m-d H:i:s'),
					'img' => "default.jpg",
					'sex' => 0,
					'status' => 1,
				);
				$check = $this->home_models->addMember($member);
				if($check){
					echo json_encode(array('status'=>true));
				}else{
					echo json_encode(array('status'=>false));
				}
		}
	}
	

	public function course_massager(){
		$data['query'] = $this->home_models->getAllMSCourse();
		$data['menu'] = 'รูปแบบและบริการ';
		$data['submenu'] = '';

		$data['view'] = 'homePage/course_massager';
		$this->load->view('homePage/main_templete',$data);
	}

	

	public function news(){
		$data['menu'] = 'ข่าวและกิจกรรม';
		$data['submenu'] = '';
		$data['query'] = $this->officer_models->getAllNewsByOpen();

		$data['view'] = 'homePage/news';
		$this->load->view('homePage/main_templete',$data);
	}

	public function new_detail(){
		$id = $this->uri->segment(3);

		$data['menu'] = 'ข่าวสารประชาสัมพันธ์ / โปรโมชั่น';
		$data['submenu'] = '';
		$data['query'] = $this->officer_models->getNewsById($id);
		
		// echo '<pre>';
		// print_r($data['query']);
		// echo '</pre>';
		// exit;

		$data['view'] = 'homePage/new_detail';
		$this->load->view('homePage/main_templete',$data);
	}

	public function about_us(){
		$data['menu'] = 'เกี่ยวกับเรา';
		$data['submenu'] = '';

		$data['view'] = 'homePage/about_us';
		$this->load->view('homePage/main_templete',$data);
	}

	public function contact_us(){
		$data['menu'] = 'ติดต่อเรา';
		$data['submenu'] = '';

		$data['view'] = 'homePage/contact_us';
		$this->load->view('homePage/main_templete',$data);
	}

	public function join_us(){
		$data['menu'] = 'ร่วมงานกับเรา';
		$data['submenu'] = '';
		$data['query'] = $this->officer_models->getAllMSCourse();

		$data['view'] = 'homePage/join_us';
		$this->load->view('homePage/main_templete',$data);
	}

	public function booking(){
		$data['query'] = $this->home_models->getAllMSCourse();
		$data['menu'] = 'จอง';
		$data['submenu'] = '';
		$data['view'] = 'homePage/booking';
		$this->load->view('homePage/main_templete',$data);
	}

	public function booking_detail(){
		$id = $this->uri->segment(3);
		$data['menu'] = 'จอง';
		$data['submenu'] = 'รายละเอียดการจอง';
		$data['allCourse'] = $this->home_models->getAllMSCourse();
		$data['query'] = $this->home_models->getCourseById($id);

		$data['view'] = 'homePage/booking_detail';
		$this->load->view('homePage/main_templete',$data);
	}

	public function booking_detail_adviser(){
		$id = $this->uri->segment(3);
		$data['menu'] = 'จอง';
		$data['submenu'] = 'รายละเอียดการจอง';
		$data['allCourse'] = $this->home_models->getAllMSCourse();
		$data['query'] = $this->home_models->getCourseById($id);

		$data['view'] = 'homePage/booking_detail_adviser';
		$this->load->view('homePage/main_templete',$data);
	}

	public function booking_all(){
		$id = $this->uri->segment(3);
		$data['menu'] = 'จอง';
		$data['submenu'] = 'รายละเอียดการจอง';
		$data['allCourse'] = $this->home_models->getAllMSCourse();

		$data['view'] = 'homePage/booking_all';
		$this->load->view('homePage/main_templete',$data);
	}

	public function profile(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$data['query'] = $this->home_models->getProfile($id[0]->member_id);
			// echo '<pre>';
			// print_r($data['query']);
			// echo '</pre>';
			// exit;
			$data['menu'] = 'โปรไฟล์';
			$data['submenu'] = '';
			

			$data['view'] = 'homePage/profile';
			$this->load->view('homePage/main_templete',$data);
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

	public function payment1(){
		if($this->input->post()){
			$data['menu'] = 'ประวัติการจอง';
			$data['submenu'] = 'ยืนยันการชำระเงิน';
			$id = $this->input->post("booking_id");
			$data['query'] = $this->home_models->getBookingById($id);
			$data['view'] = 'homePage/payment1';
			$this->load->view('homePage/main_templete',$data);
		}
	}

	public function payment2(){
		if($this->input->post()){
			$data['menu'] = 'ประวัติการจอง';
			$data['submenu'] = 'ยืนยันการชำระเงิน';
			$id = $this->input->post("booking_id");
			$data['query'] = $this->home_models->getBookingById($id);
			$data['view'] = 'homePage/payment2';
			$this->load->view('homePage/main_templete',$data);
		}
	}

	public function addBooking(){

			$ipCourse = $this->input->post("course");
			$ipTime = $this->input->post("time");
			$checkWrong = 0;
			for($i=0;$i<count($ipCourse);$i++){
				if($ipCourse[$i]=="เลือกคอร์สนวด"){
					echo json_encode(array('status'=>false,'msg'=>"กรุณาเลือกคอร์สนวด"));
					$checkWrong ++;
				}else if($ipTime[$i]==""){
					echo json_encode(array('status'=>false,'msg'=>"กรุณาใส่จำนวนชั่วโมง"));
					$checkWrong ++;
				}
			}
		if($checkWrong==0){
			if($this->input->post('bkDate') !="" && $this->input->post('bkTime') !=""){
				$course = implode(',',$_POST['course']);
				$time = implode(',',$_POST['time']);
				if($_FILES['upload']['tmp_name'] == ""){
					$bk = array(
						'course_id' => $course,
						'time' => $time,
						'member_id' => $this->input->post('member_id'),
						'bkDate' => date("Y-m-d",strtotime($this->input->post('bkDate'))),
						'bkTime' => date("H:i:s",strtotime($this->input->post('bkTime'))),
						'bkPrice' => $this->input->post('bkPrice'),
						'status' => 0,
						'amount' => 1,
						'createDate' => date('Y-m-d H:i:s')
					);
					$check = $this->home_models->addBooking($bk);
					if($check){
						echo json_encode(array('status'=>true));
					}else{
						echo json_encode(array('status'=>false));
					}
				}else{
					$bk = array(
						'course_id' => $course,
						'time' => $time,
						'member_id' => $this->input->post('member_id'),
						'bkDate' => date("Y-m-d",strtotime($this->input->post('bkDate'))),
						'bkTime' => date("H:i:s",strtotime($this->input->post('bkTime'))),
						'bkPrice' => $this->input->post('bkPrice'),
						'status' => 1,
						'amount' => 1,
						'createDate' => date('Y-m-d H:i:s')
					);
					$check = $this->home_models->addBooking($bk);
					if($check){
						$upload = $this->upload_img('upload',$_FILES['upload'],'_slip.','upload/slip');
						$pay = array(
							'booking_id' =>  $check,
							'slip' => $upload,
							'createDate' => date('Y-m-d H:i:s')
						);
						$check2 = $this->home_models->addPay($pay);
						if($check2){
							echo json_encode(array('status'=>true));
						}else{
							echo json_encode(array('status'=>false));
						}
					}

				}
			}else{
				echo json_encode(array('status'=>false,'msg'=>"กรุณาเลือกวันที่และเวลาที่ต้องการนวด"));
			}
		}


	}

	public function addBooking_adviser(){
		// echo "<pre>";
		// 	print_r($this->input->post());
		// 	echo "</pre>";
		// 	exit;
		$ipCourse = $this->input->post("course");
		$ipTime = $this->input->post("time");
		$checkWrong = 0;
		for($i=0;$i<count($ipCourse);$i++){
			if($ipCourse[$i]=="เลือกคอร์สนวด"){
				echo json_encode(array('status'=>false,'msg'=>"กรุณาเลือกคอร์สนวด"));
				$checkWrong ++;
			}else if($ipTime[$i]==""){
				echo json_encode(array('status'=>false,'msg'=>"กรุณาใส่จำนวนชั่วโมง"));
				$checkWrong ++;
			}
		}
		if($checkWrong==0){
			if($this->input->post('bkDate') !="" && $this->input->post('bkTime') !=""){
				// print_r($this->input->post());
				// exit;
					$course = implode(',',$_POST['course']);
					$time = implode(',',$_POST['time']);
					if($_FILES['upload']['tmp_name'] == ""){
						$bk = array(
							'course_id' => $course,
							'time' => $time,
							'adviser_id' => $this->input->post('adviser_id'),
							'bkDate' => date("Y-m-d",strtotime($this->input->post('bkDate'))),
							'bkTime' => date("H:i:s",strtotime($this->input->post('bkTime'))),
							'bkPrice' => $this->input->post('bkPrice'),
							'status' => 0,
							'amount' => $this->input->post('amount'),
							'createDate' => date('Y-m-d H:i:s')
						);
						$check = $this->home_models->addBooking($bk);
						if($check){
							echo json_encode(array('status'=>true));
						}else{
							echo json_encode(array('status'=>false));
						}
					}else{
						$bk = array(
							'course_id' => $course,
							'time' => $time,
							'adviser_id' => $this->input->post('adviser_id'),
							'bkDate' => date("Y-m-d",strtotime($this->input->post('bkDate'))),
							'bkTime' => date("H:i:s",strtotime($this->input->post('bkTime'))),
							'bkPrice' => $this->input->post('bkPrice'),
							'status' => 1,
							'amount' => $this->input->post('amount'),
							'createDate' => date('Y-m-d H:i:s')
						);
						$check = $this->home_models->addBooking($bk);
						if($check){
							$upload = $this->upload_img('upload',$_FILES['upload'],'_slip.','upload/slip');
							$pay = array(
								'booking_id' =>  $check,
								'slip' => $upload,
								'createDate' => date('Y-m-d H:i:s')
							);
							$check2 = $this->home_models->addPay($pay);
							if($check2){
								echo json_encode(array('status'=>true));
							}else{
								echo json_encode(array('status'=>false));
							}
						}

					}
			}else{
				echo json_encode(array('status'=>false,'msg'=>"กรุณาเลือกวันที่และเวลาที่ต้องการนวด"));
			}
		}

	}

	public function getCourseById2(){
		$id = $this->uri->segment(3);
		// print_r($id);
		// // print_r($_POST);
		// exit;
		$data = $this->home_models->getCourseById($id);
		if($data){
			echo json_encode(array('status'=>true,'data'=>$data));
		}else{
			echo json_encode(array('status'=>false));
		}
	}

	public function history_booking_byId(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$data['menu'] = 'ประวัติการจอง';
			$data['submenu'] = '';
			$allBooking = $this->home_models->getAllBookingById($id[0]->member_id);
			$num = 0;
			$data2=[];
				for($i=0; $i<count($allBooking); $i++){
					if($allBooking[$i]->status==0 || $allBooking[$i]->status==4){
						$num++;
					}
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
						'bkDate' => $allBooking[$i]->bkDate,
						'bkTime' => $allBooking[$i]->bkTime,
						'bkPrice' => $allBooking[$i]->bkPrice,
						'status' => $allBooking[$i]->status,
						'amount' => $allBooking[$i]->amount,
						'reject' => $allBooking[$i]->reject,
						'createDate' => $allBooking[$i]->createDate,
						'updateDate' => $allBooking[$i]->updateDate,

					);
					array_push($data2,$data1);
				}

			$data['countStatus0And4'] = $num ;

			$data['getAllBooking'] =$data2 ;
			$data['view'] = 'homePage/history_booking';
			$this->load->view('homePage/main_templete',$data);
		}else if(empty($this->session->userdata('login'))){
			redirect('main/');
		}
	}

	public function history_booking_adviser(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');

			$data['menu'] = 'ประวัติการจอง';
			$data['submenu'] = '';
			$allBooking = $this->home_models->getAllBookingByIdAdviser($id[0]->adviser_id);
			$num = 0;
			$data2=[];
				for($i=0; $i<count($allBooking); $i++){
					if($allBooking[$i]->status==0 || $allBooking[$i]->status==4){
						$num++;
					}
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
						'adviser_id' => $allBooking[$i]->adviser_id,
						'bkDate' => $allBooking[$i]->bkDate,
						'bkTime' => $allBooking[$i]->bkTime,
						'bkPrice' => $allBooking[$i]->bkPrice,
						'status' => $allBooking[$i]->status,
						'reject' => $allBooking[$i]->reject,
						'amount' => $allBooking[$i]->amount,
						'createDate' => $allBooking[$i]->createDate,
						'updateDate' => $allBooking[$i]->updateDate,

					);
					array_push($data2,$data1);
				}
			$data['countStatus0And4'] = $num ;
			$data['getAllBooking'] =$data2 ;
			$data['view'] = 'homePage/history_booking_adviser';
			// echo "<pre>";
			// print_r($data['getAllBooking']);
			// echo "</pre>";
			// exit;
			$this->load->view('homePage/main_templete',$data);
		}else if(empty($this->session->userdata('login'))){
			redirect('main/');
		}
	}


	public function history_booking(){
		$data['menu'] = 'ประวัติการจอง';
		$data['submenu'] = '';
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
		$data['view'] = 'homePage/history_booking';
		$this->load->view('homePage/main_templete',$data);
	}


	public function chk_mail_member(){
        if($this->input->post('email')!=null){
            $rs=$this->home_models->chk_mail_member($this->input->post('email'));
			if($rs!=null){
                echo 'false';
            }else{
                echo 'true';
            }
		}
	}

	public function confirm_payment(){
		if($this->input->post()){

			if($_FILES['upload']['tmp_name'] != ""){
				$slip = $this->upload_img('upload',$_FILES['upload'],'_slip.','upload/slip');
				$dataPay = array(
					'booking_id' => $this->input->post('booking_id'),
					'slip' => $slip,
					'createDate' => date('Y-m-d H:i:s'),
				);
				$add = $this->home_models->addPay($dataPay);
				if($add){
					$updateStatusBook = $this->home_models->updateBooking($this->input->post('booking_id'),array('status' => 1));
					echo json_encode(array('status'=>true));
				}else{
					echo json_encode(array('status'=>false));
				}
			}else{
				echo json_encode(array('status'=>false));
			}
		}

	}

	public function cancel_booking(){
		$id = $this->uri->segment(3);
		if($id){
			$updateStatusBook = $this->home_models->updateBooking($id,array('status' => 3));
			echo json_encode(array('status'=>true));
		}
	}

	public function getAllPaytments(){

		$id = $this->uri->segment(3);
		if($id){
			$data['menu'] = 'ประวัติการโอน';
			$data['submenu'] = '';

			$data['query'] = $this->home_models->getAllPaytments($id);
			$data['view'] = 'homePage/history_payments';
			$this->load->view('homePage/main_templete',$data);
		}

	}


	public function commission(){
		if($this->session->userdata('login')){
			$data['menu'] = 'ค่าคอมมิชชั่น';
			$data['submenu'] = '';

			$id = $this->session->userdata('login');
			$list = $this->home_models->getAllListByAdviser($id[0]->adviser_id);
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
					'course' => $rs
				);
				array_push($data2,$data1);
			}


			$data['getData'] =$data2 ;
			// echo "<pre>";
			// print_r($data['getData']);
			// echo "</pre>";
			// exit;
			$data['view'] = 'homePage/showCom';
			$this->load->view('homePage/main_templete',$data);


		}else if(empty($this->session->userdata('login'))){
			redirect('main/');
		}
	}

	public function edit_member(){


		if($this->input->post()){
			// echo '<pre>'; 
			// print_r($this->input->post());
			// // print_r($_FILES['img']['tmp_name']);
			// echo'</pre>';
			// exit();

			$id = $this->input->post('member_id');
			if($_FILES['img']['tmp_name']==null){
				$student = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'sex' => $this->input->post('sex'),
					'address' => $this->input->post('address')
				);
			}else{
				// upload img
				$image = $this->upload_img('img',$_FILES['img'],'member.','upload/member'); //upload logo
				// end upload
				$student = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'sex' => $this->input->post('sex'),
					'address' => $this->input->post('address'),
					'img' => $image
				);	
			}
				$check = $this->home_models->edit_member($student, $id);
				// echo '<pre>';
				// print_r($check);
				// echo '</pre>';
				// exit();
				if($check){
					echo json_encode(array('status'=>true));
				}else{
					echo json_encode(array('status'=>false));
				}
		}

	}
	
	function chk_mail_member2(){
		if($this->input->post('email2')!=null){
			$rs=$this->admin_models->chk_mail_member($this->input->post('email2'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
	function chk_tel_member2(){
		if($this->input->post('tel1')!=null){
			$rs=$this->admin_models->chk_tel_member($this->input->post('tel1'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}

	function chk_tel_member(){
		if($this->input->post('tel')!=null){
			$rs=$this->admin_models->chk_tel_member($this->input->post('tel'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
//หหหหหหหหหหหหหหหหหหหหหหหหหหห
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


	function chk_mail_adviser2(){
		if($this->input->post('email2')!=null){
			$rs=$this->admin_models->chk_mail_adviser($this->input->post('email2'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
	function chk_tel_adviser2(){
		if($this->input->post('tel1')!=null){
			$rs=$this->admin_models->chk_tel_adviser($this->input->post('tel1'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
	public function edit_member_passANDmail(){
		// echo '<pre>'; 
		// print_r($this->input->post());
		// echo'</pre>';
		// exit();
		if($this->input->post()){
			if($this->input->post("email2")!=""){
				$id = $this->input->post("member_id2");
				$setData = array(
					'email' => $this->input->post('email2')
				);
			}else if($this->input->post("pass")!=""){
				$id = $this->input->post("member_id3");
				$setData = array(
					'password' => md5($this->input->post('pass'))
				);
			}else if($this->input->post("tel1")!=""){
				$id = $this->input->post("member_id4");
				$setData = array(
					'tel' => $this->input->post('tel1')
				);
			}
			$check = $this->home_models->edit_member_passANDmail($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}

	public function edit_adviser_passANDmail(){
		// echo '<pre>'; 
		// print_r($this->input->post());
		// echo'</pre>';
		// exit();
		if($this->input->post()){
			if($this->input->post("email2")!=""){
				$id = $this->input->post("adviser_id2");
				$setData = array(
					'email' => $this->input->post('email2')
				);
			}else if($this->input->post("pass")!=""){
				$id = $this->input->post("adviser_id3");
				$setData = array(
					'password' => md5($this->input->post('pass'))
				);
			}else if($this->input->post("tel1")!=""){
				$id = $this->input->post("adviser_id4");
				$setData = array(
					'tel' => $this->input->post('tel1')
				);
			}
			$check = $this->home_models->edit_adviser_passANDmail($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}


	public function profile_adviser(){
		if($this->session->userdata('login')){
			$id = $this->session->userdata('login');
			$data['query'] = $this->home_models->getProfile_Adviser($id[0]->adviser_id);
			// echo '<pre>';
			// print_r($data['query']);
			// echo '</pre>';
			// exit;
			$data['menu'] = 'โปรไฟล์';
			$data['submenu'] = '';
			

			$data['view'] = 'homePage/profile_adviser';
			$this->load->view('homePage/main_templete',$data);
		}
	}

	public function edit_adviser(){


		if($this->input->post()){
			// echo '<pre>'; 
			// print_r($this->input->post());
			// print_r($_FILES['img']['tmp_name']);
			// echo'</pre>';
			// exit();

			$id = $this->input->post('adviser_id');
			if($_FILES['img']['tmp_name']==null){
				$student = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'sex' => $this->input->post('sex'),
					'commission' => $this->input->post('com'),
					'address' => $this->input->post('address')
				);
			}else{
				// upload img
				$image = $this->upload_img('img',$_FILES['img'],'adviser.','upload/adviser'); //upload logo
				// end upload
				$student = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'sex' => $this->input->post('sex'),
					'commission' => $this->input->post('com'),
					'address' => $this->input->post('address'),
					'img' => $image
				);	
			}
				// echo '<pre>';
				// print_r($student);
				// echo '</pre>';
				// exit();
				$check = $this->home_models->edit_adviser($student, $id);
				// echo '<pre>';
				// print_r($check);
				// echo '</pre>';
				// exit();
				if($check){
					echo json_encode(array('status'=>true));
				}else{
					echo json_encode(array('status'=>false));
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
