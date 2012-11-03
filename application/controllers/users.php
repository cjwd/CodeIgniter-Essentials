<?php 

class Users extends CI_Controller
{
	function login()
	{
		$data['error'] = 0;
		if($_POST){
			$this->load->model('user');
			$username = $this->input->post('username', true); // similar to just writing $username = $_POST['username']
			$password = $this->input->post('password', true);
			$user = $this->user->login($username, $password);
			if(!$user){
				$data['error'] = 1;

			} else {
				$this->session->set_userdata('user_id', $user['user_id']);
				$this->session->set_userdata('user_type', $user['user_type']);
				$this->session->set_userdata('username', ucfirst($user['username']));
				
				redirect(base_url().'posts');
			}
		}

		$this->load->view('login', $data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'posts');
	}
}
 ?>