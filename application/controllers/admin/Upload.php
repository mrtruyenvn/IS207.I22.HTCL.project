<?php
Class Upload extends MY_Controller
{
	function index()
	{
		if($this->input->post('submit'))
		{
			$this->load->library('upload_library');
			$upload_path='./upload/products';
			$data = $this->upload_library->upload($upload_path,'image');
		}
		$this->data['temp'] = 'admin/upload/index';
		$this->load->view('admin/ad_layout', $this->data);
	}
}