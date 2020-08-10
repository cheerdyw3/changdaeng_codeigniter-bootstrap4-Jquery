<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->chk_session();
		$this->load->model('users/admin_models');
		$this->num_staff = $this->count_staff();
	}
	
	public function chk_session(){
		//ถ้าไม่มีค่า session
		if(!$this->session->userdata('login')){
           redirect('login_admin/');
		}else{
			$id = $this->session->userdata('login');
		// echo '<pre>';
        // print_r($id);
        // echo '</pre>';
        // exit;
		//สามารถเรียกใช้ function ได้โดยไม่ต้องเขียนอีก
		}
	}

	public function index(){

		$data['menu'] = '';
		$data['submenu'] = '';
		$data['view'] = 'users/admin/firstPage';
		$this->load->view('users/admin/main_templete',$data);
	}

	public function add_officer(){
		// echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit;
		$data['query'] = $this->admin_models->getAll_officer();
		$data['menu'] = 'manage';
		$data['submenu'] = 'officer';
		
		if($this->input->post()){

			if($_FILES['img']['tmp_name'] == ""){
				$image = "default.jpg";
				$officer = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'tell' => $this->input->post('tell'),
					'address' => $this->input->post('address'),
					'img' => $image,
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'startDate' => date('Y-m-d H:i:s')
				);

				$this->admin_models->add_officer($officer);
				redirect('');
			}else{
				// upload img
				$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/officer'); //upload logo
				// end upload
				$officer = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'tell' => $this->input->post('tell'),
					'address' => $this->input->post('address'),
					'img' => $image,
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'startDate' => date('Y-m-d H:i:s')
				);
				$this->admin_models->add_officer($officer);
				redirect('/admin/add_officer');
			}
		}
		$data['view'] = 'users/admin/officer';
		$this->load->view('users/admin/main_templete',$data);
	}

    public function del_officer($officerId){
        $this->admin_models->del_officer($officerId);
        redirect('/admin/add_officer');
	}
	
	public function edit_officer(){
		$data['menu'] = 'student';
		$data['submenu'] = '';

		if($this->input->post()){
			// echo '<pre>'; 
			// print_r($_FILES['img']);
			// echo'</pre>';
			// exit();

			$id = $this->input->post('officerId');
			if($_FILES['img']['tmp_name']==null){
				$student = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'tell' => $this->input->post('tell'),
					'address' => $this->input->post('address')
				);
			}else{
				// upload img
				$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/officer'); //upload logo
				// end upload
				$student = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'tell' => $this->input->post('tell'),
					'address' => $this->input->post('address'),
					'img' => $image
				);	
			}
				// echo '<pre>';
				// print_r($student);
				// echo '</pre>';
				// exit();
				$this->admin_models->edit_officer($student, $id);
				redirect('/admin/add_officer');
		}
		$data['view'] = 'users/admin/officer';
		$this->load->view('users/admin/main_templete',$data);
    }


	public function staff_massager(){
		$data['query'] = $this->admin_models->getAll_staff();
		$data['course'] = $this->admin_models->getAll_course();
		$data['menu'] = 'manage';
		$data['submenu'] = 'staff_massager';
		
		$data['view'] = 'users/admin/staff_massager';
		$this->load->view('users/admin/main_templete',$data);
	}


	public function add_staff_massager(){
		// echo '<pre>';
		// print_r($_POST);
		
		// print_r($_FILES['img']['tmp_name']);
		// print_r($_FILES['IDCard']['tmp_name']);
		// print_r($_FILES['document']['tmp_name']);

		// echo '</pre>';
		// exit();
		if($this->input->post()){	
			//upload file
			if($_POST['email']!=""&&$_POST['password']!=""&&$_POST['firstName']!=""&&$_POST['lastName']!=""&&$_POST['tell']!=""){
				if($_FILES['img2']['tmp_name'] == ""){
					$image = "default.jpg";
					$IDCard = $this->upload_img('IDCard2',$_FILES['IDCard2'],'_IDCard.','upload/staffMassager/IDCard');
					$document = $this->upload_img('document2',$_FILES['document2'],'_officer.','upload/staffMassager/document');
				}else{
					$image = $this->upload_img('img2',$_FILES['img2'],'_officer.','upload/staffMassager/profile');
					$IDCard = $this->upload_img('IDCard2',$_FILES['IDCard2'],'_IDCard.','upload/staffMassager/IDCard');
					$document = $this->upload_img('document2',$_FILES['document2'],'_officer.','upload/staffMassager/document');
				}
				//checkbox
				$ability = implode(',',$_POST['ability']);
				//set data
				$arrStaff = array(
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'tell' => $this->input->post('tell'),
					'sex' => $this->input->post('sex'),
					'address' => $this->input->post('address'),
					'img' => $image,
					'IDCard' => $IDCard,
					'document' => $document,
					'status' => 1,
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

	public function count_staff(){
		$num = $this->admin_models->count_staff();
		return $num;
	}

	public function edit_staff_massager(){
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		if($this->input->post()){	

			$id = $this->input->post('staffId');
			$ability = implode(',',$_POST['ability']);

			if($_POST['firstName']!=""&&$_POST['lastName']!=""&&$_POST['tell']!=""){

				if($_FILES['img']['tmp_name'] != ""){
					$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/staffMassager/profile');

					if($_FILES['IDCard']['tmp_name'] != "" && $_FILES['document']['tmp_name'] != ""){
						$IDCard = $this->upload_img('IDCard',$_FILES['IDCard'],'_IDCard.','upload/staffMassager/IDCard');
						$document = $this->upload_img('document',$_FILES['document'],'_officer.','upload/staffMassager/document');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'img' => $image,
							'IDCard' => $IDCard,
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else if($_FILES['IDCard']['tmp_name'] != ""){
						$IDCard = $this->upload_img('IDCard',$_FILES['IDCard'],'_IDCard.','upload/staffMassager/IDCard');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'img' => $image,
							'IDCard' => $IDCard,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else if($_FILES['document']['tmp_name'] != ""){
						$document = $this->upload_img('document',$_FILES['document'],'_officer.','upload/staffMassager/document');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'img' => $image,
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else{
						//set data
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'address' => $this->input->post('address'),
							'img' => $image,
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}

				}else if($_FILES['IDCard']['tmp_name'] != ""){
					$IDCard = $this->upload_img('IDCard',$_FILES['IDCard'],'_IDCard.','upload/staffMassager/IDCard');

					if($_FILES['img']['tmp_name'] != "" && $_FILES['document']['tmp_name'] != ""){
						$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/staffMassager/profile');
						$document = $this->upload_img('document',$_FILES['document'],'_officer.','upload/staffMassager/document');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'img' => $image,
							'IDCard' => $IDCard,
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else if($_FILES['img']['tmp_name'] != ""){
						$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/staffMassager/profile');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'img' => $image,
							'IDCard' => $IDCard,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else if($_FILES['document']['tmp_name'] != ""){
						$document = $this->upload_img('document',$_FILES['document'],'_officer.','upload/staffMassager/document');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'IDCard' => $IDCard,
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else{
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'IDCard' => $IDCard,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}

				}else if($_FILES['document']['tmp_name'] != ""){
					$document = $this->upload_img('document',$_FILES['document'],'_officer.','upload/staffMassager/document');

					if($_FILES['img']['tmp_name'] != "" && $_FILES['IDCard']['tmp_name'] != ""){
						$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/staffMassager/profile');
						$IDCard = $this->upload_img('IDCard',$_FILES['IDCard'],'_IDCard.','upload/staffMassager/IDCard');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'img' => $image,
							'IDCard' => $IDCard,
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else if($_FILES['img']['tmp_name'] != ""){
						$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/staffMassager/profile');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'img' => $image,
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else if($_FILES['IDCard']['tmp_name'] != ""){
						$IDCard = $this->upload_img('IDCard',$_FILES['IDCard'],'_IDCard.','upload/staffMassager/IDCard');
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'IDCard' => $IDCard,
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}else{
						$arrStaff = array(
							'firstName' => $this->input->post('firstName'),
							'lastName' => $this->input->post('lastName'),
							'tell' => $this->input->post('tell'),
							'sex' => $this->input->post('sex'),
							'document' => $document,
							'address' => $this->input->post('address'),
							'status' => $this->input->post('status'),
							'ability' => $ability
						);
						$check = $this->admin_models->edit_staff($arrStaff,$id);
					}
				}else{
					$arrStaff = array(
						'firstName' => $this->input->post('firstName'),
						'lastName' => $this->input->post('lastName'),
						'tell' => $this->input->post('tell'),
						'sex' => $this->input->post('sex'),
						'address' => $this->input->post('address'),
						'status' => $this->input->post('status'),
						'ability' => $ability
					);
					$check = $this->admin_models->edit_staff($arrStaff,$id);
				}
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

	public function edit_staff_massager2(){
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit();

		if($this->input->post()){	

			$id = $this->input->post('staffId');
			$ability = implode(',',$_POST['ability']);

			if($_POST['firstName']!=""&&$_POST['lastName']!=""&&$_POST['tell']!=""){

				if($_FILES['img']['tmp_name'] != ""){
					$image = $this->upload_img('img',$_FILES['img'],'_officer.','upload/staffMassager/profile');

					$arrStaff = array(
						'firstName' => $this->input->post('firstName'),
						'lastName' => $this->input->post('lastName'),
						'tell' => $this->input->post('tell'),
						'sex' => $this->input->post('sex'),
						'address' => $this->input->post('address'),
						'img' => $image,
						'status' => $this->input->post('status'),
						'ability' => $ability
					);
				}else{
					$arrStaff = array(
						'firstName' => $this->input->post('firstName'),
						'lastName' => $this->input->post('lastName'),
						'tell' => $this->input->post('tell'),
						'sex' => $this->input->post('sex'),
						'address' => $this->input->post('address'),
						'status' => $this->input->post('status'),
						'ability' => $ability
					);
					
				}
					$check = $this->admin_models->edit_staff($arrStaff,$id);
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

	public function delete_staff_massager(){
		$id = $this->input->get('id');
		$this->admin_models->delete_staff('staff_massager',$id);
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
	
	function chk_email(){
        if($this->input->post('email')!=null)
		{
            $rs=$this->admin_models->chk_email($this->input->post('email'));
			
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

	function chk_edit_email(){
		if($this->input->post('email')!=null){
			$rs=$this->admin_models->chk_email($this->input->post('email'));
			
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





//owner
	public function owner(){
		$data['query'] = $this->admin_models->getOwner();
		$data['menu'] = 'manage';
		$data['submenu'] = 'owner';
		$data['view'] = 'users/admin/owner';
		$this->load->view('users/admin/main_templete',$data);
	}
	public function add_owner(){

		if($this->input->post()){
			$arr = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'createDate' => date('Y-m-d H:i:s')
			);

			$check = $this->admin_models->add_owner($arr);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}
	function chk_mail_owner(){
		if($this->input->post('email')!=null){
			$rs=$this->admin_models->chk_mail_owner($this->input->post('email'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}

//adviser
	public function adviser(){
		$data['query'] = $this->admin_models->getAdviser();
		$data['menu'] = 'manage';
		$data['submenu'] = 'adviser';
		$data['view'] = 'users/admin/adviser';
		$this->load->view('users/admin/main_templete',$data);
	}
	public function add_adviser(){
		if($this->input->post()){
			$arr = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'commission' => $this->input->post('com'),
				'tel' => $this->input->post('tel'),
				'status' => 1,
				'img' => "default.jpg",
				'createDate' => date('Y-m-d H:i:s')
			);

			$check = $this->admin_models->add_adviser($arr);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}
	function chk_mail_adviser(){
		if($this->input->post('email')!=null){
			$rs=$this->admin_models->chk_mail_adviser($this->input->post('email'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
	function chk_tel_adviser(){
		if($this->input->post('tel')!=null){
			$rs=$this->admin_models->chk_tel_adviser($this->input->post('tel'));
			if($rs!=null){
				echo 'false';
			}else{
				echo 'true';
			}
		}
	}
	public function getAdviserById(){
		$data['userById'] = $this->admin_models->getAdviserById($this->input->post('id'));
		if($data){
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>false));
		}
	}
	public function edit_adviser(){
		if($this->input->post()){
			$id = $this->input->post("adviserId");
			// echo '<pre>'; 
			// // print_r($_FILES);
			// print_r($this->input->post("com"));
			// echo'</pre>'; 
			// exit;

			if($_FILES['img']['tmp_name'] != ""){
				$image = $this->upload_img('img',$_FILES['img'],'_adviser.','upload/adviser');
				if($_FILES['idcard']['tmp_name'] != ""){
					$idcard = $this->upload_img('idcard',$_FILES['idcard'],'_adviser.','upload/adviser/IDCard');
					$setData = array(
						'firstName' => $this->input->post('firstName1'),
						'lastName' => $this->input->post('lastName1'),
						'address' => $this->input->post('address1'),
						'commission' => $this->input->post('com1'),
						'sex' => $this->input->post('sex1'),
						'status' => $this->input->post('status1'),
						'img' => $image,
						'IDCard' => $idcard
					);
				}else{
					$setData = array(
						'firstName' => $this->input->post('firstName1'),
						'lastName' => $this->input->post('lastName1'),
						'address' => $this->input->post('address1'),
						'commission' => $this->input->post('com1'),
						'sex' => $this->input->post('sex1'),
						'status' => $this->input->post('status1'),
						'img' => $image
					);
				}
			}else if($_FILES['idcard']['tmp_name'] != ""){
				$idcard = $this->upload_img('idcard',$_FILES['idcard'],'_adviser.','upload/adviser/IDCard');
				if($_FILES['img']['tmp_name'] != ""){
					$image = $this->upload_img('img',$_FILES['img'],'_adviser.','upload/adviser');
					$setData = array(
						'firstName' => $this->input->post('firstName1'),
						'lastName' => $this->input->post('lastName1'),
						'address' => $this->input->post('address1'),
						'commission' => $this->input->post('com1'),
						'sex' => $this->input->post('sex1'),
						'status' => $this->input->post('status1'),
						'img' => $image,
						'IDCard' => $idcard
					);
				}else{
					$setData = array(
						'firstName' => $this->input->post('firstName1'),
						'lastName' => $this->input->post('lastName1'),
						'address' => $this->input->post('address1'),
						'commission' => $this->input->post('com1'),
						'sex' => $this->input->post('sex1'),
						'status' => $this->input->post('status1'),
						'IDCard' => $idcard
					);
				}
			}else{
				$setData = array(
					'firstName' => $this->input->post('firstName1'),
					'lastName' => $this->input->post('lastName1'),
					'address' => $this->input->post('address1'),
					'commission' => $this->input->post('com1'),
					'sex' => $this->input->post('sex1'),
					'status' => $this->input->post('status1'),
				);
			}
			$check = $this->admin_models->edit_adviser($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
    }
//member
	public function member(){
		$data['query'] = $this->admin_models->getMember();
		$data['menu'] = 'manage';
		$data['submenu'] = 'member';
		$data['view'] = 'users/admin/member';
		$this->load->view('users/admin/main_templete',$data);
	}
	public function add_member(){
		if($this->input->post()){
			$arr = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'tel' => $this->input->post('tel'),
				'status' => 1,
				'img' => "default.jpg",
				'createDate' => date('Y-m-d H:i:s')
			);

			$check = $this->admin_models->add_member($arr);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
	}
	function chk_mail_member(){
		if($this->input->post('email')!=null){
			$rs=$this->admin_models->chk_mail_member($this->input->post('email'));
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
	public function getMemberById(){
		$data['userById'] = $this->admin_models->getMemberById($this->input->post('id'));
		if($data){
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>false));
		}
	}
	public function edit_member(){
		if($this->input->post()){
			$id = $this->input->post("memberId");
			// echo '<pre>'; 
			// print_r($_FILES);
			// // print_r($this->input->post());
			// echo'</pre>'; 
			// exit;

			if($_FILES['img']['tmp_name'] != ""){
				$image = $this->upload_img('img',$_FILES['img'],'_adviser.','upload/member');
				$setData = array(
					'firstName' => $this->input->post('firstName1'),
					'lastName' => $this->input->post('lastName1'),
					'address' => $this->input->post('address1'),
					'sex' => $this->input->post('sex1'),
					'status' => $this->input->post('status1'),
					'img' => $image
				);
			}else{
				$setData = array(
					'firstName' => $this->input->post('firstName1'),
					'lastName' => $this->input->post('lastName1'),
					'address' => $this->input->post('address1'),
					'sex' => $this->input->post('sex1'),
					'status' => $this->input->post('status1'),
				);
			}
			$check = $this->admin_models->edit_member($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}
    }
//admin
	public function getOwnerById(){
		$data['userById'] = $this->admin_models->getOwnerById($this->input->post('id'));
		if($data){
			echo json_encode($data);
		}else{
			echo json_encode(array('status'=>false));
		}
	}
	public function edit_owner(){
		if($this->input->post()){
			if($this->input->post("email1")!=""){
				$id = $this->input->post("ownerId1");
				$setData = array(
					'email' => $this->input->post('email1'),
				);
			}else if($this->input->post("password2")!=""){
				$id = $this->input->post("ownerId2");
				$setData = array(
					'password' => md5($this->input->post('password2')),
				);
			}
			$check = $this->admin_models->edit_owner($setData, $id);
			if($check){
				echo json_encode(array('status'=>true));
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
				$id = $this->input->post("staffId");
				$setData = array(
					'email' => $this->input->post('email'),
				);
			}else if($this->input->post("pass")!=""){
				$id = $this->input->post("staffId");
				$setData = array(
					'password' => md5($this->input->post('pass')),
				);
			}
			$check = $this->admin_models->edit_staff($setData, $id);
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

	public function deleteOfficer(){
		$id = $this->input->post('id');
		$checkCount = $this->admin_models->getAllOfficer();
		// $check = $this->owner_models->getOwnerById($id);
			// echo '<pre>';	
			// print_r($checkCount);
			// echo '</pre>';
			// exit;
		if(count($checkCount)==1){
			echo json_encode(array('status'=>false));
		}else{
			$this->admin_models->deleteOfficer('officer',$id);
			echo json_encode(array('status'=>true));
		}
		// if($check){
		// 	echo json_encode(array('status'=>false));
		// }else{
		// 	$this->owner_models->deleteOwner('massage_course',$id);
		// 	echo json_encode(array('status'=>true));
		// }
	}


	public function deleteAdviser(){
		$id = $this->input->post('id');
		$check = $this->admin_models->getListDetail($id);
		$num = 0;
		$countList = count($check);
		for($i=0;$i<$countList;$i++){
			if($check[$i]->statusPayToAdviser==1){
				$num++;
			}
		}
		if($num==$countList){
			echo json_encode(array('status'=>true));
			$this->admin_models->deleteAdviser('adviser',$id);
		}else{
			echo json_encode(array('status'=>false));
		}
	}

	public function deleteMember(){
		$id = $this->input->post('id');
		$this->admin_models->deleteMember('member',$id);
		echo json_encode(array('status'=>true));
	}


	public function deleteStaff(){
		$id = $this->input->post('id');
		$check = $this->admin_models->checkStaffInListDetail($id);
		if($check){
			echo json_encode(array('status'=>false));
		}else{
			$this->admin_models->deleteStaff('staff_massager',$id);
			echo json_encode(array('status'=>true));
		}
	}

}
