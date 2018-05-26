<?php
Class Address extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('address_model');
	}

	function index()
	{
		$input = array();
		$list = $this->address_model->get_list($input);
		$this->data['list'] = $list;									
		                                    									
		
		$message = $this->session->flashdata('message');					//$message = dòng thông báo 
		$this->data['message'] = $message;
		
		$fmessage = $this->session->flashdata('fmessage');					//$fmessage = dòng thông báo lỗi
		$this->data['fmessage'] = $fmessage;
		
		$this->data['temp']='admin/address/index';							
		$this->load->view('admin/ad_layout',$this->data);
				
	}
	function add()
	{
		//Lấy danh sách slide
		$this->load->model('slide_model');
		$input = array();
		$list = $this->slide_model->get_list($input);
		$this->data['list'] = $list;
	
		//Lấy danh sách màu sản phẩm
		$this->load->model('color_model');
		$input1 = array();
		$color = $this->color_model->get_list($input1);
		$this->data['color'] = $color;
	
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('name','Tên sản phẩm', 'required');
			$this->form_validation->set_rules('price','Giá', 'required');
			$this->form_validation->set_rules('new_price','Giá mới', 'required');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$keyword = $this->input->post('keyword');
				$catalog_id = $this->input->post('catalog_id');
				$color = $this->input->post('color');
				$price = $this->input->post('price');
				$new_price = $this->input->post('new_price');
				$describe = $this->input->post('describe');
	
				//Lấy tên file ảnh và upload
				$this->load->library('upload_library');
				$upload_path = './upload/products';
				$upload_data=$this->upload_library->upload($upload_path,'image_id');
				$image_id='';
				if(isset($upload_data['file_name']))
				{
					$image_id = $upload_data['file_name'];
				}
	
	
				$data = array(
						'name'     => $name,
						'keyword' => $keyword,
						'catalog_id' => $catalog_id,
						'price' => intval($price),
						'new_price' => intval($new_price),
						'image_id' => $image_id,
						'describe' => $describe,
						'color_id' => $color
				);
				if($this->products_model->create($data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('products'));
			}
		}
		$this->data['temp']='admin/products/add';
		$this->load->view('admin/ad_layout',$this->data);
	}
}