<?php 
class Adviser_models extends CI_Model {

    public function chk_login($email,$password){
        //แปลงข้างบนมาขยายเป็นด้านล่าง 
        $this->db->select('*');//ใน''คือคอลัม
        $this->db->from('adviser');//''ชื่อตาราง
        $this->db->where('email', $email);//''ชื่อคอลัม $username คือค่าที่เราดึงมา
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();// รีเทินค่าออกมา ->result()เป็นการจัดรูปแบบเฉยๆ
    }


    public function add_adviser($data){
        $checkInsert = $this->db->insert('adviser', $data);
        return $id = $this->db->insert_id();
    }

	public function chk_email($email){
        $query = $this->db->get_where('adviser', array('email' => $email));

		return $query->result();
	}

	public function chk_tel($tel){
        $query = $this->db->get_where('adviser', array('tel' => $tel));

		return $query->result();
	}

}