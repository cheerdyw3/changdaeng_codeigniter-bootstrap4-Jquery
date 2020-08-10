<?php 
class Officer_models extends CI_Model {

    public function chk_login($email,$password){

        //         echo '<pre>';
        //  print_r($email);       
        // print_r($password);
        // echo '</pre>';
        // exit;
        //แปลงข้างบนมาขยายเป็นด้านล่าง 
        $this->db->select('*');//ใน''คือคอลัม
        $this->db->from('officer');//''ชื่อตาราง
        $this->db->where('email', $email);//''ชื่อคอลัม $username คือค่าที่เราดึงมา
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }

    public function add_room($data){
        $checkInsert = $this->db->insert('room', $data);
        return $id = $this->db->insert_id();
    }

    public function getAll_room(){
        $this->db->select('*');
        $this->db->from('room');
        $this->db->order_by('room_id','DESC');
        $query = $this->db->get();
        return $query->result();
}

	public function chkNumberRoom($number){
        $query = $this->db->get_where('room', array('number' => $number));

		return $query->result();
    }
    
    public function deleteRoom($table, $id){
		$this->db->delete($table, array('room_id' => $id));
	}

    public function deleteCourse($table, $id){
		$this->db->delete($table, array('course_id' => $id));
    }
    
    public function deleteNews($table, $id){
		$this->db->delete($table, array('news_id' => $id));
	}

    public function addMSCourse($data){
        $checkInsert = $this->db->insert('massage_course', $data);
        return $id = $this->db->insert_id();
    }

    public function getAllMSCourse(){
        $this->db->select('*');
        $this->db->from('massage_course');
        $this->db->order_by('course_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteMSCourse($table, $id){
		$this->db->delete($table, array('course_id' => $id));
    }
    
    public function getAll_staff(){
        $this->db->select('*');
        $this->db->from('staff_massager');
        // $this->db->where('status', 1);
        $this->db->order_by('status','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function addLeave($data){
        $checkInsert = $this->db->insert('leave', $data);
        return $id = $this->db->insert_id();
    }

    public function getLeaveHistory(){
        $this->db->select('l.*,sm.firstName,sm.lastName');
        $this->db->from('leave as l');
        $this->db->order_by('leave_id','DESC');
        $this->db->join('staff_massager as sm' ,'l.staff_massager_id=sm.staff_massager_id');
        $query = $this->db->get();
        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit;
        return $query->result();
    }

    public function signStaff($idStaff,$data){

        $checkDay = $this->db->select('schedule_id')->from('work_schedule')->where('staff_massager_id', $idStaff)->like('updateDate',date('Y-m-d'));
        if($checkDay->get()->result() == null){
            $checkInsert = $this->db->insert('work_schedule', $data);
            return $id = $this->db->insert_id();
        }else{
            return null;
        }
    }

    public function getAllWorkSchedule(){
        $this->db->select('ws.*,sm.firstName,sm.lastName,sm.ability'); 
        $this->db->from('work_schedule as ws');
        $this->db->like('ws.updateDate',date('Y-m-d'));
        $this->db->join('staff_massager as sm' ,'ws.staff_massager_id=sm.staff_massager_id');
        $this->db->order_by('ws.status','ASC');
        $this->db->order_by('ws.updateDate','ASC');
 
        $query = $this->db->get();

        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit;
        return $query->result();
    }

    public function checkStatusWork(){
        // echo "<pre>";
        // print_r(date('Y-m-d H:i:s'));
        // exit;
        $this->db->select('*'); 
        $this->db->from('work_schedule');
        $this->db->where('status', 1);
        $this->db->like('updateDate',date('Y-m-d'));
        $query = $this->db->get()->result();
        // echo "<pre>";
        // print_r($query);
        // echo "</pre>";
        // exit;
        foreach($query as $var){
            if($var->startDate && $var->endDate){
                        // echo "<pre>";
                        // print_r($var);
                        // echo "</pre>";
                        // exit;
            // if(date('Y-m-d H:i:s') >= $var->endDate){
                // echo "<pre>";
                // print_r(date('H:i:s'));
                // echo "</pre>";
                // echo "<pre>";
                // print_r($var->endDate);
                // echo "</pre>";
                // exit;
                // if(date('H:i:s') >= date("h:i:s",strtotime($var->endDate))){
                if(date('H:i:s') >= $var->endDate){
                // echo "<pre>";
                // print_r(date('H:i:s'));
                // echo "</pre>";
                // echo "<pre>";
                // print_r($var->endDate);
                // echo "</pre>";
                // exit;
                    $data = array(
                        'startDate' => "",
                        'endDate' => "",
                        'status' => 0
                    );
                    $this->db->where('schedule_id', $var->schedule_id);
                    $this->db->update('work_schedule', $data);
                    $update = $this->db->affected_rows();

                    if($update==1){
                        $this->db->select('room_id,amount'); 
                        $this->db->from('detail_list');
                        $this->db->like('schedule_id',$var->schedule_id);
                        // $this->db->where('schedule_id', $var->schedule_id);
                        $this->db->order_by('updateDate','DESC');
                        $this->db->limit(1);
                        $query2 = $this->db->get()->result();

                        $result = $this->checkBed($query2[0]->room_id);
                        // echo "<pre>";
                        // print_r($result);
                        // echo "</pre>";
                        // exit;
                        if($result[0]->bed <= $result[0]->use_bed){
                            $updateBed = $this->editRoom($query2[0]->room_id,array('use_bed' => $result[0]->use_bed - 1,'status' => 0));
                        }else{
                            $updateBed = $this->editRoom($query2[0]->room_id,array('use_bed' => $result[0]->use_bed - 1));
                        }
                        // if($result[0]->bed <= $result[0]->use_bed){
                        //     $updateBed = $this->editRoom($query2[0]->room_id,array('use_bed' => $result[0]->use_bed - $query2[0]->amount,'status' => 0));
                        // }else{
                        //     $updateBed = $this->editRoom($query2[0]->room_id,array('use_bed' => $result[0]->use_bed - $query2[0]->amount));
                        // }
                        
                    }else{
                    }
                }else{

                }
            }else{

            }
        }
        return $query;
    }

    public function changeStatusStaffEndDay($id,$data){
        $query = $this->db->update('staff_massager', $data, array('staff_massager_id' => $id));
    }

    public function getWorkScheduleById($id){
        $this->db->select('ws.*,sm.firstName,sm.lastName,sm.ability,sm.img'); 
        $this->db->from('work_schedule as ws');
        $this->db->where('schedule_id',$id);
        $this->db->join('staff_massager as sm' ,'ws.staff_massager_id=sm.staff_massager_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getRoomById($id){
        $this->db->select('*');
        $this->db->from('room');
        $this->db->where('room_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function checkCourseInListDetail($courseId){
        $this->db->select('course_id');
        $this->db->from('detail_list');
        $this->db->like('course_id',$courseId);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_course(){
        $this->db->select('*');
        $this->db->from('massage_course');
        return $this->db->count_all_results();
    }


	public function chkAdviserList($data){

        $query = $this->db->get_where('adviser', array('tel' => $data));
        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit;
        return $query->result();

    }

    public function detailList($data){
        $checkInsert = $this->db->insert('detail_list', $data);
        return $id = $this->db->insert_id();
    }

    public function editWorkSchedule($id,$data){
        $query = $this->db->update('work_schedule', $data, array('schedule_id' => $id));
    }

    public function editRoom($id,$data){
        // print_r($id);
		// exit;
        $query = $this->db->update('room', $data, array('room_id' => $id));
    }

    public function changeStatusWs($id,$data){
        $query = $this->db->update('work_schedule', $data, array('schedule_id' => $id));
    }

    public function checkBed($id){
        $this->db->select('bed,use_bed');
        $this->db->from('room');
        $this->db->where('room_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function addIncome($data){
        $checkInsert = $this->db->insert('income', $data);
        // return $id = $this->db->insert_id();
    }

    public function getCourse($id){
        $this->db->select('course_get');
        $this->db->from('massage_course');
        $this->db->where('course_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getStaff($id){
        $this->db->select('staff_massager_id');
        $this->db->from('work_schedule');
        $this->db->where('schedule_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getStatusUsers(){
        $this->db->select('staff_massager_id,status');
        $this->db->from('staff_massager');
        $this->db->where('status',2);
        $query = $this->db->get();
        return $query->result();
    }

    public function addHistotry($data){
        $checkInsert = $this->db->insert('history_massager', $data);
        return $id = $this->db->insert_id();
    }

    public function get_payment($id){
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('booking_id',$id);
        $this->db->order_by('createDate','ASC');

        $query = $this->db->get();
        return $query->result();
    }

    public function edit_status_booking($id,$data){

        $query = $this->db->update('booking', $data, array('booking_id' => $id));
        // print_r($query);
		// exit;
    }

    public function changeStatusAccrued($id,$data){

        $query = $this->db->update('detail_list', $data, array('detail_list_id' => $id));
        // print_r($query);
		// exit;
    }

    public function getStatusBook($id){
        $this->db->select('status');
        $this->db->from('booking');
        $this->db->where('booking_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getListDetail(){//ถ้าจะแสดงทั้งหมด ลบ 0 ออก แล้ว order_by status ด้วย
        $this->db->select('dl.*,av.firstName,av.lastName,av.tel');
        $this->db->from('detail_list as dl');
        // $this->db->where('dl.statusPayToAdviser',0);
        $this->db->join('adviser as av' ,'dl.adviser_id=av.adviser_id');
        $this->db->order_by('statusPayToAdviser','ASC');
        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function create_expense($data){
        $checkInsert = $this->db->insert('expense', $data);
        return $id = $this->db->insert_id();
    }

    public function getExpense(){
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getWS(){
        $this->db->select('*');
        $this->db->from('work_schedule');
        $this->db->like('createDate',date('Y-m-d'));
        $query = $this->db->get();
        return $query->result();
    }
   public function getListDetail2(){
        $this->db->select('dl.*');
        $this->db->from('detail_list as dl');
        $this->db->order_by('detail_list_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getListDetailById($id){
        $this->db->select('dl.*');
        $this->db->from('detail_list as dl');
        $this->db->where('detail_list_id',$id);
        $this->db->order_by('detail_list_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getListDetailByIdWs($id){
        $this->db->select('room_id,amount,startDate');
        $this->db->from('detail_list');
        $this->db->like('schedule_id',$id);
        $this->db->order_by('startDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function updateStatusStaff($id,$data){

        $query = $this->db->update('staff_massager', $data, array('staff_massager_id' => $id));
        // print_r($query);
		// exit;
    }

    public function deleteWs($table, $id){
		$this->db->delete($table, array('schedule_id' => $id));
	}

    public function addNew($data){
        $checkInsert = $this->db->insert('news', $data);
        return $id = $this->db->insert_id();
    }

    public function getAllNews(){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('news_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllNewsByOpen(){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('status',1);
        $this->db->order_by('news_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getNewsById($id){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('status',1);
        $this->db->where('news_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getNewsById2($id){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('news_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCourseById($id){
        $this->db->select('*');
        $this->db->from('massage_course');
        $this->db->where('course_id', $id);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }
    public function edit_Course($data, $id){
        $query = $this->db->update('massage_course', $data, array('course_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

    public function edit_News($data, $id){
        $query = $this->db->update('news', $data, array('news_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

    public function edit_Room($data, $id){
        $query = $this->db->update('room', $data, array('room_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

    public function getOfficerById($id){
        $this->db->select('*');
        $this->db->from('officer');
        $this->db->where('officerId', $id);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }


    public function edit_officer($data, $id){
        $query = $this->db->update('officer',$data,array('officerId'=>$id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

	public function chk_email_officer($email){
        $query = $this->db->get_where('officer', array('email' => $email));

		return $query->result();
	}


}