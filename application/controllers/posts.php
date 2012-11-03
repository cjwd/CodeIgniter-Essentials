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

	function edit_post($post_id)
	{
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
		$this->post->delete_post($post_id);
		redirect(base_url().'posts');
	}
}