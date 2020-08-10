<?php 
class Home_models extends CI_Model {

    public function chk_login($email,$password){
        //แปลงข้างบนมาขยายเป็นด้านล่าง 
        $this->db->select('*');//ใน''คือคอลัม
        $this->db->from('member');//''ชื่อตาราง
        $this->db->where('email', $email);//''ชื่อคอลัม $username คือค่าที่เราดึงมา
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        // print_r($query->result());
        // exit;
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }

    public function getAllMSCourse(){
        $this->db->select('*');
        $this->db->from('massage_course');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCourseById($id){
        $this->db->select('course_id,course_name,course_price,course_detail');
        $this->db->from('massage_course');
        $this->db->where('course_id',$id);
        $query = $this->db->get();
        return $query->result();
    }


	public function chk_mail_member($email){
        $query = $this->db->get_where('member', array('email' => $email));

		return $query->result();
    }

    public function addMember($data){

        $checkInsert = $this->db->insert('member', $data);
        return $id = $this->db->insert_id();
    }

    public function addBooking($data){

        $checkInsert = $this->db->insert('booking', $data);
        return $id = $this->db->insert_id();
    }

   public function addPay($data){
        $checkInsert = $this->db->insert('payments', $data);
        return $id = $this->db->insert_id();
    }

    public function getAllBooking(){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('createDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getBookingById($id){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('booking_id',$id);
        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }



    public function updateBooking($id,$data){
        $query = $this->db->update('booking', $data, array('booking_id' => $id));
    }

    public function getAllPaytments($id){
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('booking_id',$id);
        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllBookingById($id){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('member_id',$id);
        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllBookingByIdAdviser($id){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('adviser_id',$id);
        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllBookingByIdStatus0and4($id){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('member_id',$id);
        $this->db->where("(status=0 OR status=4)");
        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllListByAdviser($id){
        $this->db->select('*');
        $this->db->from('detail_list');
        $this->db->where('adviser_id',$id);
        $query = $this->db->get();

        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit;

        return $query->result();

    }

    public function getProfile($id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function edit_member($data, $id){
        // print_r($id);
        // print_r("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
        // print_r($data);
        // exit;
        $query = $this->db->update('member', $data, array('member_id' => $id));
        $res = $this->db->affected_rows($query);
        return $res;
    }

    public function getProfile_Adviser($id){
        $this->db->select('*');
        $this->db->from('adviser');
        $this->db->where('adviser_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function edit_adviser($data, $id){

        $query = $this->db->update('adviser', $data, array('adviser_id' => $id));
        $res = $this->db->affected_rows($query);
        return $res;
    }

    public function edit_member_passANDmail($data, $id){
        $query = $this->db->update('member', $data, array('member_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

    public function edit_adviser_passANDmail($data, $id){
        $query = $this->db->update('adviser', $data, array('adviser_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }


    
}