<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model

{

	public function login($username, $password)

	{

		//echo $password;exit;

		$this->db->select('username', 'password');

		$this->db->from('admin');

		$this->db->where('username', $username);

		$this->db->where('password', md5($password));		

		$query = $this->db->get();	

		//echo $this->db->last_query();exit;

		if ($query !== FALSE)

		{	

			if($query->num_rows() == 1){

				return true;

			}else{

				return false;

			}

		}

		else

		{

			return false;

		}

	}

	

	public function getUsersCount()

	{

		$query = $this->db->where('type','student');

		$query = $this->db->get('users');

		

		if ($query !== FALSE)

		{				

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	}



	public function getExpertsCount()

	{

		$query = $this->db->where('type','lawyer');

		$query = $this->db->get('users');

		if ($query !== FALSE)

		{				

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	}







	public function getSuggestionCount()

	{

		$query = $this->db->select('id');

		$query = $this->db->get('chat_relation');				

		if ($query !== FALSE)

		{				

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	}



	public function LeadsCount()

	{

		$query = $this->db->get('leads');				

		if ($query !== FALSE)

		{				

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	}



	public function ShareCount()

	{

		$query = $this->db->get('social_sharing');				

		if ($query !== FALSE)

		{				

			return $query->num_rows();

		}

		else

		{

			return 0;

		}

	}	

	public function getmemberCount()
	{
		$query = $this->db->where('type','member');
		$query = $this->db->get('users');
		if ($query !== FALSE)
		{				
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}	

}

?>