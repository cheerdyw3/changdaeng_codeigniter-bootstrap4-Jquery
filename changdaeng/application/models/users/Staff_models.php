<?php 
class Staff_models extends CI_Model {

    public function chk_login($email,$password){
        //แปลงข้างบนมาขยายเป็นด้านล่าง 
        $this->db->select('*');//ใน''คือคอลัม
        $this->db->from('staff_massager');//''ชื่อตาราง
        $this->db->where('email', $email);//''ชื่อคอลัม $username คือค่าที่เราดึงมา
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }

    public function addLeave($data){
        $checkInsert = $this->db->insert('leave', $data);
        return $id = $this->db->insert_id();
    }
    
    public function getAllLeaveOfStaff($id){
        $this->db->select('l.*');
        $this->db->from('leave as l');
        $this->db->where('l.staff_massager_id',$id);
        $this->db->order_by('l.createDate', 'DESC');
        $query = $this->db->get();
        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit;
        return $query->result();
    }

    public function history_massager($id){
        $this->db->select('hm.*,mc.course_name');
        $this->db->from('history_massager as hm');
        $this->db->where('staff_massager_id',$id);
        $this->db->join('massage_course as mc' ,'hm.course_id=mc.course_id');
        $this->db->order_by('hm.history_id', 'DESC');
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // exit;
        return $query->result();
    }

    public function get_his_where($id,$date){
        $this->db->select('hm.*,mc.course_name');
        $this->db->from('history_massager as hm');
        $this->db->where('staff_massager_id',$id);
        $this->db->join('massage_course as mc' ,'hm.course_id=mc.course_id');
        $this->db->like('hm.date', $date);
		$this->db->order_by('hm.history_id', 'DESC');
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // exit;
        return $query->result();
    }

    public function get_his_all($id,$date){
        $this->db->select('hm.*,mc.course_name');
        $this->db->from('history_massager as hm');
        $this->db->where('staff_massager_id',$id);
        $this->db->join('massage_course as mc' ,'hm.course_id=mc.course_id');
		$this->db->order_by('hm.history_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function history_massager_order($id,$date){
        // echo '<pre>';
        // print_r($date);
        // echo '</pre>';
        // exit;
        $this->db->select('hm.*,mc.course_name');
        $this->db->from('history_massager as hm');
        $this->db->where('staff_massager_id',$id);
        $this->db->join('massage_course as mc' ,'hm.course_id=mc.course_id');
        $this->db->like('date', $date);
        $this->db->order_by('hm.history_id', 'DESC');
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // exit;
        return $query->result();
    }

    public function getAllMSCourse(){
        $query = $this->db->get('massage_course');
        return $query->result();
    }









}