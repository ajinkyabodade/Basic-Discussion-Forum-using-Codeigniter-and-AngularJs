<?php

class Mod_home extends CI_Model{

public function signup($data)
{	  
		$user= $this->db->insert('user',$data);
		  
		$user = $this->db->get_where('user', $data)->row_array();
		if(!empty($user))
		{ 
		     	
	        $user_session= array(
	    		'uemail'=>$user['email'],
	    		'uid'=>$user['id'],
	    		'ufname'=>$user['fname'],
	    	);
			$this->session->set_userdata($user_session);
	    	return true;
		}
		else
		{
			return false;
		}
}


public function signupcheck($datac)
{
		$check=array('email'=>$datac);
		return $this->db->get_where('user',$check);
}


public function signin($d)
{

		$user = $this->db->get_where('user',$d)->row_array();
		if(!empty($user))
		{ 
			     	
	        $user_session= array(
	    		'uemail'=>$user['email'],
	    		'uid'=>$user['id'],
	    		'ufname'=>$user['fname'],
	    	);
			$this->session->set_userdata($user_session);
	    	
				return true;

		}
		else
		{
			return false;
		}
}


public function lfetch()
{
		//return $this->db->get('list');
		$this->db->select('*');
		$this->db->from('list');
		$this->db->join('user', 'id = uid');
	    return $query = $this->db->get()->result_array();
}


public function addlist($dataaaa)
{
		return $user= $this->db->insert('list',$dataaaa);
}

public function listview($lid)
{
//return $this->db->get_where('list',$lid)->result_array();
		$this->db->select('*');
		$this->db->from('list');
		$this->db->where('lid',$lid);
		$this->db->join('user', 'id = uid');
		return $query = $this->db->get()->row_array();

}


public function comntview($lid)
{
//return $this->db->get_where('comment',$lid)->result_array();
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('toid',$lid);
		$this->db->join('user', 'id = fromid');
		return $query = $this->db->get()->result_array();
}


public function addcomment($data)
{
		return $this->db->insert('comment',$data);
}




public function listupdate($data,$lid,$uid)
{	  
		$this->db->set($data);
		$this->db->where('lid', $lid);  
		$this->db->where('uid', $uid);  
		return $this->db->update('list'); 

		 
}



}

?>