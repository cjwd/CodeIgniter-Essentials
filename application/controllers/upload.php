<?php 

class Upload extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}

	function index()
	{
		
		$this->load->view('upload_form', array('error'=>''));
	}

	function do_upload()
	{
		
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '10000';
		$config['max_width']  = '2000';
		$config['max_height']  = '800';

		$this->load->library('upload', $config);
		// if doesn't upload
		if ( ! $this->upload->do_upload())
		{
			// display errors
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			//Upload and Resize the image
			$data = array('upload_data' => $this->upload->data());
			$this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
			$this->load->view('upload_success', $data);
		}
	}

	function resize($path, $file)
	{
		$config['image_library']	= 	'gd2'; //or imagemagick
		$config['source_image'] 	= 	$path;
		$config['create_thumb']  	= 	TRUE;
		$config['maintain_ratio']	=	TRUE;
		$config['width']			=	150;
		$config['height']			=	75;
		$config['new_image']		=	'./uploads/'.$file;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
}
 ?>