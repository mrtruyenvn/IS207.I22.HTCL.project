<?php
Class Upload_library
{
	var $CI ='';
	function __construct()
	{
		$this->CI = & get_instance();
	}
	
	function upload($upload_path='',$file_name='')
	{
		$config = $this->config($upload_path);
		$this->CI->load->library('upload', $config);
		if($this->CI->upload->do_upload($file_name))
		{
			$data = $this->CI->upload->data();
		}
		else
		{
			$data=$this->CI->upload->display_errors();		
		}
		return $data;
	}
	
	function config($upload_path = '')
	{
		//Khai bao bien cau hinh
		$config = array();
		//thuc mục chứa file
		$config['upload_path']   = $upload_path;
		//Định dạng file được phép tải
		$config['allowed_types'] = 'jpg|png|gif';
		//Dung lượng tối đa
		$config['max_size']      = '5000';
		//Chiều rộng tối đa
		$config['max_width']     = '1028';
		//Chiều cao tối đa
		$config['max_height']    = '1028';
		//load thư viện upload
		
		return $config;
	}
}