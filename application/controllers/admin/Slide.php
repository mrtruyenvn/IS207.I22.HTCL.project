<?php
Class Slide extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
	}

	function index()
	{
		$input = array();
		$list = $this->slide_model->get_list($input);
		$this->data['list'] = $list;									
		                                    									
		
		$message = $this->session->flashdata('message');					//$message = dòng thông báo 
		$this->data['message'] = $message;
		
		$fmessage = $this->session->flashdata('fmessage');					//$fmessage = dòng thông báo lỗi
		$this->data['fmessage'] = $fmessage;
		
		$this->data['temp']='admin/slide/index';							
		$this->load->view('admin/ad_layout',$this->data);
				
	}
	function add()
	{
		
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('title','Tiêu đề', 'required');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$title = $this->input->post('title');
				$link_to = $this->input->post('link_to');
				$sort = $this->input->post('sort');
				//Lấy tên file ảnh và upload
				$this->load->library('upload_library');
				$upload_path = './upload/slide';
				$upload_data=$this->upload_library->upload($upload_path,'image');
				$image='';
				if(isset($upload_data['file_name']))
				{
					$image = $upload_data['file_name'];
				}
	
	
				$data = array(
						'title'     => $title,
						'link_to'     => $link_to,
						'image'     => $image,
						'sort'      =>$sort
						);

				if($this->slide_model->create($data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('slide'));
			}
		}
		$this->data['temp']='admin/slide/add';
		$this->load->view('admin/ad_layout',$this->data);
	}
	// Sửa slide
	
	function edit()
	{
		//Lấy thông tin slide
		$id = $this->uri->rsegment('3');
		$slide = $this->slide_model->get_info($id);
		if(!$slide)
		{
			redirect(admin_url('slide'));
			$this->session->set_flashdata('fmessage', 'Không tồn tại slide này.');
		
		}
		$this->data['slide'] = $slide;
		$oimage = './upload/slide/'.$slide->image;
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('title','Tiêu đề', 'required');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$title = $this->input->post('title');
				$link_to = $this->input->post('link_to');
				$sort = $this->input->post('sort');
				//Lấy tên file ảnh và upload
				$this->load->library('upload_library');
				$upload_path = './upload/slide';
				$upload_data=$this->upload_library->upload($upload_path,'image');
				$image='';
				if(isset($upload_data['file_name']))
				{
					unlink($oimage);
					$image = $upload_data['file_name'];
				}
		
		
				$data = array(
						'title'     => $title,
						'link_to'     => $link_to,
						'sort'      =>$sort
				);
				
				if($image != '')
				{
					$data['image'] = $image;
				}
				if($this->slide_model->update($id,$data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('slide'));
			}
		}
		$this->data['temp']='admin/slide/edit';
		$this->load->view('admin/ad_layout',$this->data);
	}
	//Xóa 
	function delete()
	{
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->slide_model->get_info($id);
	
	
		if(!$info)
		{
			$this->session->set_flashdata('fmessage', 'Slide không tồn tại.');
			redirect(admin_url('slide'));
		}
		else
		{
			// Nếu tồn tại file ảnh thì remove khỏi thư mục chứa
			$image = './upload/slide/'.$info->image;
			if($image)
			{
				unlink($image);
			}
			$this->slide_model->delete($id);
				
		}
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('slide'));
	}
}