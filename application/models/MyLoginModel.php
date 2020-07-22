<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyLoginModel extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_user($user_name,$email)
	{
        $query=$this->db->query("select u.id as id, u.user_name as user_name,u.full_name as full_name,u.email as email,
        gs.id AS group_id,gs.name as title,gs.phone as phone,gs.name as owner_name ,gs.cell_no as cell_no
        from aims_user u,aims_group_branch gs 
          where u.group_id=gs.id  and u.user_name='admin' and  u.password='admin'");
		/*$this->db->where('user_name', $user_name);
		$this->db->where('email',$email);
        $query = $this->db->get('aims_user');*/
		return $query->result();
	}


    
function checkEmail()
	{
	    $email=$this->input->post('email');
        $query=$this->db->query("Select * from aims_user where email='$email'");
		return $query->num_rows();
	}

	public function signupSave()

{
    $group_id=1;
      
    $full_name = $this->input->post('u_name');
    $cell = $this->input->post('mobile');
    $cnic = $this->input->post('cnic');
    $address = $this->input->post('address');
    $email=$this->input->post('email');
    $user_id=md5(mt_rand(0,42215));
    // $uname = $this->input->post('u_name');
    $status = 'Pending';
    $city = $this->input->post('city');
    $pass = $this->input->post('pass');
  

    $data=array(

    'group_id'=>$group_id,
    'cell_no'=>$cell,
    'address'=>$address,
    'status'=>$status,
    'city'=>$city,
    'name'=>$this->input->post('b_name'),
    'type'=>$this->input->post('b_type'),
  
     'is_deleted'=> 0   

    );
    
     $this->db->insert('aims_group_branch',$data);
  
        

    $data=array(
    
    'user_id'=>$user_id,
    'group_id'=>$group_id,
    'user_type'=>'User',
    'full_name'=>$full_name,
    'user_name'=>$cell,
    'mobile_no'=>$cell,
    'password'=>$pass,
    'email'=>$email,
    'status'=>$status,
  
     'is_deleted'=> 0   

    );
   $this->db->insert('aims_user',$data);

    if($this->db->affected_rows()>0)
    {
        $qry=$this->db->query("select * from aims_user WHERE user_id='$user_id'");
        return $qry->result();
    }

    else

    {

        return false;

    }

	}
	 public function verifyAccount($id)
    {
        $id=($id);
        $checkqry=$this->db->query("select * from aims_user where user_id='$id'")->row();
        $sts = $checkqry->status;
        if($sts == "Active")
        {
            return "Active";
        }
        else
        {
        $this->db->query("UPDATE `aims_user` SET `status`= ('Active') where user_id='$id'");
        
        $qry=$this->db->query("select * from aims_user where user_id='$id'");
        return $qry->result();
        }
        
    }
    function getMaxId()
    {
        // $getId = $this->db->query("SELECT MAX(id) as m_id from aims_group_branch");
        // return $getId->m_id;
        // $row = $this->db->query('SELECT MAX(id) as m_id from aims_group_branch')->row();
        // if ($row) {
        //    return $maxid = $row->m_id; 
        // }

    }
    function login($user_name,$pass)
	{
  
		$query=$this->db->query("SELECT * FROM login WHERE username='$user_name' AND password='$pass' AND is_deleted=0");
		return $query->result();
	}
	function user_verification($userId,$ipAddress){
	    $query=$this->db->query("SELECT * FROM `aims_user_security` WHERE user_id='$userId'");
		return $query->result();
	}
	// get user
	function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('user');
		return $query->result();
	}
	
	// insert
	function insert_user()
    {
         $data=array(
        'full_name'=>$this->input->post('fname'),
         'lname'=>$this->input->post('lname'),
          'user_name'=>$this->input->post('user_name'),
         'email'=>$this->input->post('email'),
         'password'=>$this->input->post('password'),
            );
		return $this->db->insert('aims_user', $data);
	}
    
    function sendPassword()
    {
        $email=$this->input->post('user_name');
        $qry=$this->db->query("select * from aims_user where email='$email'");
        return $qry->result();
        
    }

}?>