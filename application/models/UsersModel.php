<?php
class UsersModel extends CI_Model
{

	public function saveUsers()
{
    $data=array(
    'group_id'=>$this->input->post('group_id'),
    'user_type'=>$this->input->post('user_type'),
    'full_name'=>$this->input->post('f_name'),

    'l_name'=>$this->input->post('l_name'),
    'user_name'=>$this->input->post('contect'),
    'email'=>$this->input->post('email'),
    'mobile_no'=>$this->input->post('contect'),
    'password'=>$this->input->post('password'),


    'created_on'=>round(microtime(true) * 1000),
    'updated_on'=>'',
    'deleted_on'=>'',
     'is_deleted'=> 0   
    );
    
     $this->db->insert('aims_user',$data);
    if($this->db->affected_rows()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
	}
public function usersList()
		{
		    $gId = $_SESSION['group_id'];
		    $type = $_SESSION['type'];
		    
		    if($type == 'Admin'){
		         $qry=$this->db->query("select u.status as status,u.id as id,u.full_name as f_name,u.l_name as l_name,
		    u.user_name as user_name,u.email as email,u.mobile_no as  contect,u.password as password,gs.name as title,u.password as pass,u.created_on as signup_on
		    FROM aims_user u, aims_group_branch gs
            WHERE u.group_id=gs.id and u.is_deleted=0 and gs.id='$gId'");
		    }
		   else if($type == 'Super Admin'){
		        $qry=$this->db->query("select u.status as status,u.id as id,u.full_name as f_name,u.l_name as l_name,
		    u.user_name as user_name,u.email as email,u.mobile_no as  contect,u.password as password,gs.name as title,u.password as pass,u.created_on as signup_on
		    FROM aims_user u, aims_group_branch gs
            WHERE u.group_id=gs.id and u.is_deleted=0 order by u.id ASC");
		   }
		  
		    return $qry->result();
		}


	public function editAccounts($id)
    {
    	$qry=$this->db->query("select ac.id AS id, at.type AS ac_name, ar.name AS area_name, ac.code AS ac_code, ac.grade AS ac_grade, ac.name AS acount_name, ac.father_name AS ac_fname, ac.cnic AS ac_cnic, ac.address AS ac_address, ac.cell_no AS ac_cellno, ac.balance AS ac_balance, ac.salary AS ac_salary, ac.cradit_limit AS ac_ceaditLimit, ac.email AS ac_email
			from aims_account ac JOIN aims_account_type at JOIN aims_area ar 
			ON
			ac.account_type_id=at.id AND ac.area_id=ar.id WHERE ac.id='$id'");
    return $qry->result();
    }

    public function updateAccounts()
    {
        $id = $this->input->post('id');
		$field = array(


		 //    'account_type_id'=>$this->input->post('account_type'),
		 //    'area_id'=>$this->input->post('area_id'),
		 //    'user_id'=>$this->input->post('user_id'),
		    'code'=>$this->input->post('grade'),
		    'grade'=>$this->input->post('code'),
		    'name'=>$this->input->post('name'),
		    'father_name'=>$this->input->post('father_name'),
		    'cnic'=>$this->input->post('cnic'),
		    'address'=>$this->input->post('address'),
		    'cell_no'=>$this->input->post('cell_no'),
		    'balance'=>$this->input->post('balance'),
		    'salary'=>$this->input->post('salary'),
		    'cradit_limit'=>$this->input->post('credit_limit'),
		    'email'=>$this->input->post('email'),


			'updated_on'=>round(microtime(true) * 1000)
		);
		$this->db->where('id', $id);
		$this->db->update('aims_account', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

	function deleteUser(){


		$id = $this->input->get('id');
 		$deleted_on = round(microtime(true) * 1000);
        $is_deleted = 1;

        $data = array(
            'deleted_on' => $deleted_on,
            'is_deleted' => $is_deleted
        );
		$this->db->set($data);
        $this->db->where("id",$id);
        $this->db->update("aims_user",$data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
    
    	public function editUsers(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('aims_user');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
    
    public function updateUsers()
    {
        $id = $this->input->post('txtId');
		$field = array(
			'full_name'=>$this->input->post('full_name'),
			'user_type'=>$this->input->post('user_type'),
			'email'=>$this->input->post('email'),
			'mobile_no'=>$this->input->post('cell'),
            'status'=>$this->input->post('status'),
			
			'updated_on'=>round(microtime(true) * 1000)
		);
		$this->db->where('id', $id);
		$this->db->update('aims_user', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

}
?>