<?php 
class User extends CI_Model
{
	function create_user($data)
	{
		$this->db->insert('ci_users', $data);
		
	}

	function login($username, $password, $type)
	{
		$where = array(
			'username'	=>	$username,
			'password'	=>	sha1($password), //$password,
			'user_type' => 	$type
		);

		$this->db->select()->from('ci_users')->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
	}
}
 ?>