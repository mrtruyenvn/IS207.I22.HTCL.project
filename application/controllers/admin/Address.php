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
		//Lấy danh sách liên hệ
		$input = array();
		$list = $this->address_model->get_list($input);
		$this->data['list'] = $list;
	
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('title','Tiêu đề', 'required');
			$this->form_validation->set_rules('address','Địa chỉ', 'required');
			$this->form_validation->set_rules('phone','SĐT', 'required');
			$this->form_validation->set_rules('describe','Mô tả', 'required');
			
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$title = $this->input->post('title');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$describe = $this->input->post('describe');
			
	
			
				$data = array(
						'title'     => $title,
						'address' => $address,
						'phone' => $phone,
						'describe' => $describe,
				);
				if($this->address_model->create($data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('address'));
			}
		}
		$this->data['temp']='admin/address/add';
		$this->load->view('admin/ad_layout',$this->data);
	}
	
	function edit()
	{
		$id = intval($this->uri->rsegment(3));
		//Lấy danh sách liên hệ
		$addr = $this->address_model->get_info($id);
		$this->data['addr'] = $addr;
	
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('title','Tiêu đề', 'required');
			$this->form_validation->set_rules('address','Địa chỉ', 'required');
			$this->form_validation->set_rules('phone','SĐT', 'required');
			$this->form_validation->set_rules('describe','Mô tả', 'required');
				
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$title = $this->input->post('title');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$describe = $this->input->post('describe');
					
	
					
				$data = array(
						'title'     => $title,
						'address' => $address,
						'phone' => $phone,
						'describe' => $describe,
				);
				if($this->address_model->update($id,$data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('address'));
			}
		}
		$this->data['temp']='admin/address/edit';
		$this->load->view('admin/ad_layout',$this->data);
	}
}