<?php 

class Welcome extends CI_Controller 
{

	public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}


	public function index()
		{
			$this->load->view('exercise');
		}


	public function register()
		{
			 //$data = json_decode(file_get_contents("php://input"));
			 //$email = $data->email;
			 //$fname = $data->email;
			 //$pass = $data->pass;
			 $email = $this->input->post('email');
			 $pass = $this->input->post('pass');
			 $fname = $this->input->post('fname');
			 $this->load->model('mod_home');
			 $d = ['email'=>$email,'password'=>$pass, 'fname'=>$fname];
			 $exist=$this->mod_home->signup($d);

	   		 if($exist)
		   		 {
		        	echo $result = '{"status" : "1"}';
				 }
				 else
				 {
		 			echo $result = '{"status" : "0"}';
				 } 
		}


    



	public function signin()
		{
			 //$data = json_decode(file_get_contents("php://input"));
			 // $email = $data->email;
			 //$pass = $data->pass;
			 $email = $this->input->post('email');
			 $pass = $this->input->post('pass');
			 $this->load->model('mod_home');
			 $d = ['email'=>$email,'password'=>$pass];
	 		 $exist=$this->mod_home->signin($d);
		
	   		 if($exist)
		   		 {
		   		 	//$this->lfetch();
		   		 	echo $result = '{"status" : "1"}';
          		 }
          		 else
          		 {
		 			echo $result = '{"status" : "0"}';
				 } 

		 }

	public function lfetch()
	    {
	    	
	        $this->load->model('mod_home');
	        $data=$this->mod_home->lfetch(); 
	        //$this->load->view('dashboard', $dataaa);
	        $uuid=$this->session->userdata('uid');
			$json=array("uuid"=>$uuid, "list"=>$data);
	        echo json_encode($json);

	    }

    public function view1()
	    {
	    	$this->checklogin();
	        $this->load->view('exercise');
	    }


    public function view2()
	    {
	    	$this->checklogin();
	        $this->load->view('dashboard');
	    }

    public function view3()
	    {
	    	$this->checklogin();
	        $this->load->view('list');
	    }

	public function checklogin()
		{

			if($this->session->userdata('uemail') == FALSE)
		       {
			       redirect("welcome/errorcheck?error=Please login to continue");
		       }
		}

	public function checklogind()
		{

			if($this->session->userdata('uemail') == FALSE)
		       {
			      echo $result = '{"status" : "100"}';
			      exit();
		       }
		}


	public function logout()
		{
			$this->session->unset_userdata("uemail");
		    $this->session->sess_destroy();
		    $this->session->set_userdata('uemail', FALSE);
		   // $this->load->helper('cookie');
		   //  delete_cookie('ci_session');
		    redirect("welcome/errorcheck?error=Logout Succesfull");
	    }

	public function addlist()
	    {
	    	$this->checklogind();
		    $dataaaa['subject'] =$this->input->post('subject');
		 	$dataaaa['descn']=$this->input->post('desc');
			$dataaaa['uid']=$this->session->userdata('uid');
		 	$dataaaa['date']=date("d/m/Y");
	     	$this->load->model('mod_home');
			$queryyyy= $this->mod_home->addlist($dataaaa);
        
   		  if($queryyyy)
	   		 {
	        	echo $result = '{"status" : "1"}';
			 }
			 else
			 {
	 			echo $result = '{"status" : "0"}';
			 } 
		}

	
	public function listview()
		{
			$this->checklogind();
		    $dataaaaa['lid']=$this->input->post('lid');
			$toid=$dataaaaa['lid'];
			$this->session->set_userdata('lid',$dataaaaa['lid']);
			$this->load->model('mod_home');
			$lid=$dataaaaa['lid'];
			$queryyyyy['list']=$this->mod_home->listview($lid);
			$queryyyyy['comment']=$this->mod_home->comntview($lid);

			//$this->load->view('list', $queryyyyy); 
	         echo json_encode($queryyyyy);
		}


	public function commentadd()
		{
			$this->checklogind();
			$data['fromid'] =$this->session->userdata('uid');
		 	$data['toid']=$this->input->post('lid');
		  	$llid=$data['toid'];
		    $data['comnt']=$this->input->post('comment');
		    $this->load->model('mod_home');
			$query= $this->mod_home->addcomment($data);
			  
		    if($query)
	   		 {
	        	echo $result = '{"status" : "1"}';
			 }
			 else
			 {
 			echo $result = '{"status" : "0"}';
			 } 
		}

	public function errorcheck()
		{
			$error['msg'] =$this->input->get('error');
			$this->load->view('exercise',$error);
		}



	public function listupdate()
		{
			 
			 $lid = $this->input->post('lid');
			 $subject = $this->input->post('subject');
			 $descn = $this->input->post('descn');
			 $this->load->model('mod_home');
			 $d = ['subject'=>$subject, 'descn'=>$descn];
			 $uid =$this->session->userdata('uid');
			 $exist=$this->mod_home->listupdate($d,$lid,$uid);

	   		 if($exist)
		   		 {
		        	echo $result = '{"status" : "1"}';
				 }
				 else
				 {
		 			echo $result = '{"status" : "0"}';
				 } 
		}

}

