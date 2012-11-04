<?php

class Posts extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('post');
	}

	function index($start=0)
	{
		
		// create a data array
		$data['posts'] = $this->post->get_posts(5, $start);
		$this->load->library('pagination');
		$config = array(
			'base_url' => base_url().'posts/index',
			'total_rows' => $this->post->get_post_count(),
			'per_page' => 5,
			'full_tag_open' =>'<div class="pagination pagination-large"><ul>',
			'full_tag_close' =>'</ul></div>',
			'cur_tag_open'  =>'<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',
			'num_tag_open'  => '<li>',
			'num_tag_close' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',


			);
		
		$this->pagination->initialize($config);
		//add pagination to the data array so config array can be accessible
		$data['pages'] = $this->pagination->create_links();

		$this->load->view('post_index', $data);
	}
	/**
	 * Gets a single post
	 * @param  int $post_id 
	 * @return array          
	 */
	function post($post_id)
	{
		$data['post'] = $this->post->get_post($post_id)	;
		$this->load->view('post', $data);
	}

	function new_post()
	{
		/*Old/ Alternative way (also in edit_post and delete_post)
		$user_type = $this->session->userdata('user_type');
		// Capitalized Admin and Author because of ucfirst() function
		// in users controllers on the set_userdata variables
		if ($user_type !== 'Admin' && $user_type !=='Author') {		
			redirect(base_url().'users/login');
		}*/

		if (!$this->correct_permissions('Author')) {		
			redirect(base_url().'users/login');
		}

		if ($_POST) {
			$data = array(
				'title'  => $_POST['title'],
				'post'   => $_POST['post'],
				'active' =>1 
			);

			$this->post->insert_post($data);
			redirect(base_url().'posts/');
		} else {
			$this->load->view('new_post');
		}	
	}

	// New way of checking access level and assigning permissions
	// Delete this function if using Alternative way see comments
	// for new_post, edit_post, delete_post
	function correct_permissions($required)
	{
		$user_type = $this->session->userdata('user_type');
		if ($required == 'User') {
			if ($user_type) {
				return true;
			}
		} else if ($required == 'Author') {
			if($user_type == 'Admin' || $user_type == "Author"){
				return true;
			}
		} else if ($required == 'Admin'){
			if($user_type == 'Admin') {
				return true;
			}
		}
	}

	function edit_post($post_id)
	{
		/*Old/ Alternative way (also in new_post and delete_post)
		$user_type = $this->session->userdata('user_type');
		if ($user_type !== 'Admin' && $user_type !=='Author') {		
			redirect(base_url().'users/login');
		}*/


		if (!$this->correct_permissions('Author')) {		
			redirect(base_url().'users/login');
		}

		$data['success'] = 0;
		if ($_POST) {
			$data = array(
				'title'  => $_POST['title'],
				'post'   => $_POST['post'],
				'active' =>1 
			);

			$this->post->update_post($post_id, $data);
			$data['success'] = 1;

		}

		$data['post'] = $this->post->get_post($post_id);
		$this->load->view('edit_post', $data);
	}

	function delete_post($post_id)
	{
		/*Old/ Alternative way (also in new_post and edit_post)
		$user_type = $this->session->userdata('user_type');
		if ($user_type !== 'Admin' && $user_type !=='Author') {		
			redirect(base_url().'users/login');
		}*/

		if (!$this->correct_permissions('Author')) {		
			redirect(base_url().'users/login');
		}

		$this->post->delete_post($post_id);
		redirect(base_url().'posts');
	}
}