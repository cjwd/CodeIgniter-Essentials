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
			$type = $this->input->post('usertype', true);
			$user = $this->user->login($username, $password, $type);
			if(!$user){
				$data['error'] = 1;

			} else {
				$this->session->set_userdata('user_id', $user['user_id']);
				$this->session->set_userdata('user_type', ucfirst($user['user_type']));
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

	function register()
	{
		if($_POST) {
			$data = array(
				'username'	=>	$_POST('username'),
				'password'	=>	$_POST('password'),
				'user_type'	=>	$_POST('usertype')
			);

			$this->load->model('user');
			$user_id = $this->user->create_user($data);
			$this->session->set_userdata('user_id', $user_id);
			$this->session->set_userdata('user_type', $_POST['user_type']);
			redirect(base_url().'posts');
		}

		// else
		
		$this->load->helper('form');
		$this->load->view('register_user');

	}
}
 ?>