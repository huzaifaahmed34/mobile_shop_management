<?php
class SignUp extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		//$this->load->model('SignUpModel','m');
	}
    public function index()
    {
    
		$this->load->view('user/signUpView');

    }
    public function SignUpView()
    {
        $this->load->view('user/signUpView');
    }
    
    public function insert_user()
    {	
        $this->form_validation->set_rules('fname', 'First Name',                 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name',                 'trim|required');
         $this->form_validation->set_rules('user_name', 'User Name',                 'trim|required');
          $this->form_validation->set_rules('email', 'Email',                 'trim|required');
          $this->form_validation->set_rules('password', 'Password',                 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->load->view('user/SignUpView');
        }
        else
        {
             $pass1=$this->input->post('password');
             $pass2=$this->input->post('conf_pass');
             $user_name=$this->input->post('user_name');
             $email=$this->input->post('email');
            
            
            $res=$this->m->get_user($user_name,$email);
            if($res)
                
            {     
                  $msg="This User name or email already exist!";
                  $this->load->view('user/SignUpView',['msg'=>$msg]);
                //redirect('MyLogin/mySignup',['msg'=>"hy boss"]);
               /* echo '<div class="alert alert-danger text-center">This User Name or email already exist!</div>';
               	redirect('MyLogin/mySignup');*/
                
            }
            else
            {
            if($pass1 == $pass2)
            {
                    $res=$this->m->insert_user();
                    $msg="Your Account created successfully!";
		            $this->load->view('user/MyLoginView',['msg'=>$msg]);
                    }
                    else
                    {        
                  $msg="Must match the previous entry!";
                  $this->load->view('user/SignUpView',['msg'=>$msg]);
                    }
        }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
		redirect('MyLogin/index');
    }
    public function myTest()
    {
        $this->load->view('myTest');
    }
    public function forgottPassword()
    {
        $this->load->view('forgottPassword');
    }
    
    public function sendPassword()
    {
       
       $res=$this->m->sendPassword();
      if($res)
      {
          foreach($res AS $row)
          {
              $full_name=$row->full_name;
              $user_name=$row->user_name;
              $password=$row->password;
              $user_email=$row->email;
              print_r($user_name);
          }
          /*
             $from='mobilebase.com';
             $subject='Forgott Username Or Password';
            $message="
                    <p>
                    Hello Dear<h3 style:color:blue><b>full_name</b></h3>  your user name <b>
                    $user_name</b> and your password is <h4>$password</h4> </p>
                        <h2><a href='www.alliedtajar.com/admin'> Click here to log in to access your accont</a></h2>
				
				<h3> Thank You for order www.alliedtajar.com</h3>
                 ";
                mail($user_email,$subject,$message,$from);*/
$this->email->from('email@example.com', 'Identification');
$this->email->to('salmanrazabwn@gmail.com');
$this->email->subject('Send Email Codeigniter');
$this->email->message('The email send using codeigniter library');
          
      }
        else
        {
            echo "OK Boss";
        }
        
    }
}
