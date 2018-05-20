<?php
Class Upload extends MY_Controller
{
	function index()
	{
		if($this->input->post('submit'))
		{
			//Khai bao bien cau hinh
			$config = array();
			//thuc mục chứa file
			$config['upload_path']   = './upload/products';
			//Định dạng file được phép tải
			$config['allowed_types'] = 'jpg|png|gif';
			//Dung lượng tối đa
			$config['max_size']      = '2048';
			//Chiều rộng tối đa
			$config['max_width']     = '1028';
			//Chiều cao tối đa
			$config['max_height']    = '1028';
			//load thư viện upload
			$this->load->library('upload', $config);
			//thuc hien upload
			if($this->upload->do_upload('image'))
			{
				//chua mang thong tin upload thanh con
				$data = $this->upload->data();
				//in cau truc du lieu cua file da upload
				print_r($data);
			}
			else
			{
				//hien thi lỗi nếu có
				$error = $this->upload->display_errors();
				echo $error;
			}
		
		}
		$this->data['temp'] = 'admin/upload/index';
		$this->load->view('admin/ad_layout', $this->data);
	}
}