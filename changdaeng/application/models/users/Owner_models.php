<?php 
class Owner_models extends CI_Model {

    public function chk_login($email,$password){
        //แปลงข้างบนมาขยายเป็นด้านล่าง 
        $this->db->select('*');//ใน''คือคอลัม
        $this->db->from('owner');//''ชื่อตาราง
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
    


    
    public function getAllStaff(){
        $this->db->select('sm.*');
        $this->db->from('staff_massager as sm');
        $this->db->order_by('staff_massager_id','DESC');
        $this->db->where('status',0);
        $query = $this->db->get();

        return $query->result();
    }

    public function getAllGuide(){
        $this->db->select('av.*');
        $this->db->from('adviser as av');
        $this->db->order_by('adviser_id','DESC');
        $this->db->where('status',0);
        $query = $this->db->get();
        //         echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // exit;
        return $query->result();
    }

    public function getCourseById($id){
        $this->db->select('course_id,course_name,course_price,course_detail');
        $this->db->from('massage_course');
        $this->db->where('course_id',$id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function editStatusStaff($id,$data){
        $query = $this->db->update('staff_massager', $data, array('staff_massager_id' => $id));
    }

    public function editStatusGuide($id,$data){
        $query = $this->db->update('adviser', $data, array('adviser_id' => $id));
    }
    
    public function history_massager($id){
        $this->db->select('hm.*,mc.course_name');
        $this->db->from('history_massager as hm');
        $this->db->where('staff_massager_id',$id);
        $this->db->join('massage_course as mc' ,'hm.course_id=mc.course_id');
        $query = $this->db->get();
        
        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // exit;
        return $query->result();
    }

	public function chk_email($email){

        $query = $this->db->get_where('staff_massager', array('email' => $email));

		return $query->result();
	}
    //income
    public function income(){
        $this->db->select('*');
        $this->db->from('income');
        $this->db->order_by('income_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function income_where($date){
        $this->db->select('*');
        $this->db->from('income');
        $this->db->like('date', $date);
		$this->db->order_by('income_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function income_all(){
        $this->db->select('*');
        $this->db->from('income');
		$this->db->order_by('income_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    //Expense
    public function expense(){
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->order_by('expense_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function expense_where($date){
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->like('createDate', $date);
		$this->db->order_by('expense_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function expense_all(){
        $this->db->select('*');
        $this->db->from('expense');
		$this->db->order_by('expense_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }



    public function getListDetail(){//ถ้าจะแสดงทั้งหมด ลบ 0 ออก แล้ว order_by status ด้วย
        $this->db->select('dl.*,av.firstName,av.lastName,av.tel');
        $this->db->from('detail_list as dl');
        $this->db->where('dl.statusPayToAdviser',0);
        $this->db->join('adviser as av' ,'dl.adviser_id=av.adviser_id');

        $this->db->order_by('updateDate','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getExpense(){
        $this->db->select('*');
        $this->db->from('expense');
		$this->db->order_by('expense_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }


    public function getAllHistoryMassager($startDate,$endDate){
        $this->db->select('hm.staff_massager_id,hm.history_money,hm.statusPay,sm.firstName,sm.lastName, SUM(history_money) AS history_money', FALSE);
        $this->db->from('history_massager as hm');
        $this->db->where('date >=', $startDate);
        $this->db->where('date <=', $endDate);
        $this->db->join('staff_massager as sm' ,'hm.staff_massager_id = sm.staff_massager_id');
        $this->db->group_by("hm.staff_massager_id");
        $query = $this->db->get();
        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // exit;
        return $query->result();
    }

    public function getHistoryMassagerById($id,$startDate,$endDate){
        $this->db->select('history_id');
        $this->db->from('history_massager');
        $this->db->where('staff_massager_id', $id);
        $this->db->where('date >=', $startDate);
        $this->db->where('date <=', $endDate);
        $query = $this->db->get();
        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // exit;
        return $query->result();
    }

    public function getAllStaff2(){
        $query = $this->db->get('staff_massager');
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

    public function editStatusPayStaff($id,$data){
        $query = $this->db->update('history_massager', $data, array('history_id' => $id));
    }

    public function create_expense($data){
        $checkInsert = $this->db->insert('expense', $data);
        return $id = $this->db->insert_id();
    }

    public function deleteOwner($table, $id){
		$this->db->delete($table, array('owner_id' => $id));
    }
    
    public function getAllOwner(){
        $this->db->select('*');
        $this->db->from('owner');
        $query = $this->db->get();
        return $query->result();
    }

    public function getOwnerById($id){
        $this->db->select('owner_id');
        $this->db->from('owner');
        $this->db->where('owner_id',$id);
        $query = $this->db->get();
        return $query->result();
    }
}