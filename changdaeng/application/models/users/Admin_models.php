<?php 
class Admin_models extends CI_Model {

    public function chk_login($email,$password){
        //แปลงข้างบนมาขยายเป็นด้านล่าง 
        $this->db->select('*');//ใน''คือคอลัม
        $this->db->from('admin');//''ชื่อตาราง
        $this->db->where('email', $email);//''ชื่อคอลัม $username คือค่าที่เราดึงมา
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }

    public function add_officer($data){

        $checkInsert = $this->db->insert('officer', $data);
    }
    public function getAll_officer(){
        $this->db->select('*');
        $this->db->from('officer');
        $this->db->order_by('officerId','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function del_officer($officerId){
        $this->db->delete('officer',array('officerId'=>$officerId));
    }

    public function edit_officer($data, $id){
        // print_r($id);
        // print_r("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
        // print_r($data);
        // exit;
        $query = $this->db->update('officer', $data, array('officerId' => $id));
    }

    public function getAll_room(){
        $query = $this->db->get('room');
        return $query->result();
    }

    public function add_room($data){
        $checkInsert = $this->db->insert('room', $data);
        return $id = $this->db->insert_id();
    }

    public function add_staff($data){
        $checkInsert = $this->db->insert('staff_massager', $data);
        return $id = $this->db->insert_id();
    }

    public function getAll_staff(){
        $this->db->select('*');
        $this->db->from('staff_massager');
        $this->db->order_by('status','ASC');
        $this->db->order_by('staff_massager_id','DESC');

        $query = $this->db->get();

        // echo "<pre>";
        // print_r($query->result());
        // echo "</pre>";
        // exit;
        return $query->result();
    }


    public function count_staff(){
        $this->db->select('*');
        $this->db->from('staff_massager');
        return $this->db->count_all_results();
    }

    public function getStaffById($id){
        $this->db->select('*');
        $this->db->from('staff_massager');
        $this->db->where('staff_massager_id', $id);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }

    public function delete_staff($table, $id){
		$this->db->delete($table, array('staff_massager_id' => $id));
	}

    public function edit_staff($data, $id){
        $query = $this->db->update('staff_massager',$data,array('staff_massager_id'=>$id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

	public function chk_email($email){
        $query = $this->db->get_where('staff_massager', array('email' => $email));

		return $query->result();
	}

    public function getAll_course(){
        $this->db->select('*');
        $this->db->from('massage_course');
        
        $query = $this->db->get();
        return $query->result();
    }



//owner
    public function getOwner(){
        $this->db->select('*');
        $this->db->from('owner');
        $this->db->order_by('owner_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function add_owner($data){
        $checkInsert = $this->db->insert('owner', $data);
        return $id = $this->db->insert_id();
    }
	public function chk_mail_owner($email){
        $query = $this->db->get_where('owner', array('email' => $email));
		return $query->result();
	}

//owner
    public function getAdviser(){
        $this->db->select('*');
        $this->db->from('adviser');
        $this->db->order_by('adviser_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function add_adviser($data){
        $checkInsert = $this->db->insert('adviser', $data);
        return $id = $this->db->insert_id();
    }
    public function chk_mail_adviser($email){
        $query = $this->db->get_where('adviser', array('email' => $email));
        return $query->result();
    }
    public function chk_tel_adviser($tel){
        $query = $this->db->get_where('adviser', array('tel' => $tel));
        return $query->result();
    }
    public function getAdviserById($id){
        $this->db->select('*');
        $this->db->from('adviser');
        $this->db->where('adviser_id', $id);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }
    public function edit_adviser($data, $id){
        $query = $this->db->update('adviser', $data, array('adviser_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

//member
    public function getMember(){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->order_by('member_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function add_member($data){
        $checkInsert = $this->db->insert('member', $data);
        return $id = $this->db->insert_id();
    }
    public function chk_mail_member($email){
        $query = $this->db->get_where('member', array('email' => $email));
        return $query->result();
    }
    public function chk_tel_member($tel){
        $query = $this->db->get_where('member', array('tel' => $tel));
        return $query->result();
    }
    public function getMemberById($id){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member_id', $id);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }
    public function edit_member($data, $id){
        $query = $this->db->update('member', $data, array('member_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }
    public function getOwnerById($id){
        $this->db->select('*');
        $this->db->from('owner');
        $this->db->where('owner_id', $id);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }
    public function edit_owner($data, $id){
        $query = $this->db->update('owner', $data, array('owner_id' => $id));
        // $res = $this->db->affected_rows($query);
        return $query;
    }

    public function deleteOfficer($table, $id){
		$this->db->delete($table, array('officerId' => $id));
    }

    public function getAllOfficer(){
        $this->db->select('*');
        $this->db->from('officer');
        $query = $this->db->get();
        return $query->result();
    }

    // public function getOwnerById($id){
    //     $this->db->select('owner_id');
    //     $this->db->from('owner');
    //     $this->db->where('owner_id',$id);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function getListDetail($id){
        $this->db->select('detail_list_id,statusPayToAdviser');
        $this->db->from('detail_list');
        // $this->db->where('statusPayToAdviser',"1");
        $this->db->where('adviser_id',$id);
        
        $query = $this->db->get();
        return $query->result();
    }


   public function deleteAdviser($table, $id){
		$this->db->delete($table, array('adviser_id' => $id));
    }

   public function deleteMember($table, $id){
		$this->db->delete($table, array('member_id' => $id));
    }

   public function deleteStaff($table, $id){
		$this->db->delete($table, array('staff_massager_id' => $id));
    }

    public function checkStaffInListDetail($id){
        $this->db->select('schedule_id');
        $this->db->from('work_schedule');
        $this->db->like('staff_massager_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

}