<?php
Class Catalog extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('catalog_model');
	}
	
	function index()
	{
		$list = array();
		$list['order'] = array('parent_id','DESC');
		$list = $this->catalog_model->get_list($list);
		$this->data['list'] = $list;
		
		$message = $this->session->flashdata('message');					//$message = dòng thông báo
		$this->data['message'] = $message;
		
		$fmessage = $this->session->flashdata('fmessage');					//$fmessage = dòng thông báo lỗi
		$this->data['fmessage'] = $fmessage;
		
		$this->data['temp'] = 'admin/catalog/index';
		$this->load->view('admin/ad_layout',$this->data);
	}
	// Thêm danh mục sản phẩm mới
	function add()
	{
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('name','Tên danh mục', 'required');
				
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$parent_id = $this->input->post('parent_id');
				$sort = $this->input->post('sort');
		
				$data = array(
						'name'     => $name,
						'parent_id' => $parent_id,
						'sort' => intval($sort)
				);
				if($this->catalog_model->create($data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('catalog'));
			}
		}
		
		$input = array();
		$input['where'] = array('parent_id' =>0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;
		
		$this->data['temp']='admin/catalog/add';
		$this->load->view('admin/ad_layout',$this->data);
	}
	
	//Sửa 1 danh mục sản phẩm
	function edit()
	{
		$id = $this->uri->rsegment(3);
		$info = $this->catalog_model->get_info($id);
		
		if(!$info)
		{
			$this->session->set_flashdata('fmessage','Danh mục không tồn tại.');
			redirect(admin_url('catalog'));
		}
		
		$this->data['info'] = $info;
		
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('name','Tên danh mục', 'required');
	
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$parent_id = $this->input->post('parent_id');
				$sort = $this->input->post('sort');
	
				$data = array(
						'name'     => $name,
						'parent_id' => $parent_id,
						'sort' => intval($sort)
				);
				if($this->catalog_model->update($id,$data))
				{
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Cập nhật dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('catalog'));
			}
		}
	
		$input = array();
		$input['where'] = array('parent_id' =>0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;
	
		$this->data['temp']='admin/catalog/edit';
		$this->load->view('admin/ad_layout',$this->data);
	}
	
	
	// Xóa 1 danh mục sản phẩm
	function delete()
	{
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->catalog_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('fmessage', 'Danh mục không tồn tại.');
			redirect(admin_url('catalog'));
		}
		else 
		{
			$this->catalog_model->delete($id);
		}
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('catalog'));
	}
}