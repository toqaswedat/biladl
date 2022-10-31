<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ws_model extends CI_Model
{	

	function SetUsers($RecordData = NULL)
	{
		if($RecordData)
		{
			$this->db->insert('users', $RecordData);
			//echo $this->db->last_query();exit;	
			$insert_id = $this->db->insert_id();
			return $insert_id;			
		}
		return array();
	}

	function Login($Mobile, $Password)
	{		
		$this->db->where('Mobile', $Mobile);
		$this->db->where('Password', md5($Password));
		$Users = $this->db->get('Users');	
		//echo $this->db->last_query();exit;
		if($Users->num_rows() > 0)
		{
			return $Users->result();
		}
		return array();
	}

	function UpdateUser($RecordData = NULL, $UserID = NULL)
	{		
		if($RecordData)
		{				
			$this->db->update('users', $RecordData, array('UserID' => $UserID));
			return true;	
		}
		return false;
	}

	function Cities()
	{		
		$this->db->order_by('Title', 'ASC');
		$Cities = $this->db->get('cities');	
		//echo $this->db->last_query();exit;
		if($Cities->num_rows() > 0)
		{
			return $Cities->result();
		}
		return array();
	}

	function Areas($CityID)
	{		
		$this->db->order_by('Title', 'ASC');
		$this->db->where('CityID', $CityID);
		$Areas = $this->db->get('areas');	
		//echo $this->db->last_query();exit;
		if($Areas->num_rows() > 0)
		{
			return $Areas->result();
		}
		return array();
	}
}