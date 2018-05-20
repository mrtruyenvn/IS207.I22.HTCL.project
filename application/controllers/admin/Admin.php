<?php
Class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}
	// Get list of admin
	function index()
	{
		$input = array();
		$list = $this->admin_model->get_list($input);
		$this->data['list'] = $list;										// $list = danh sách admin
		
		$total = $this->admin_model->get_total();							// $total = tinh tổng số admin
		$this->data['total'] = $total;	                                    									
		
		$message = $this->session->flashdata('message');					//$message = dòng thông báo 
		$this->data['message'] = $message;
		
		$fmessage = $this->session->flashdata('fmessage');					//$fmessage = dòng thông báo lỗi
		$this->data['fmessage'] = $fmessage;
		
		$this->data['temp']='admin/admin/index';							
		$this->load->view('admin/ad_layout',$this->data);
		
		
	}
	//Kiểm tra user name đã tồn tại
	function check_username(){
		$username = $this->input->post('username');
		$where = array('username' => $username);
		if($this->admin_model->check_exists($where))
		{
		 	$this->form_validation->set_message(__FUNCTION__,"Tài khoản đã tồn tại");
		 	return FALSE;
		}
		return TRUE;
	}
	//Thêm mới tài khoản admin
	function add()
	{	
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('name','Họ và tên', 'required|min_length[6]|xss_clean');         
			$this->form_validation->set_rules('username','Tên đăng nhập', 'required|min_length[6]|xss_clean|callback_check_username');
			$this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]|xss_clean');
			$this->form_validation->set_rules('repassword','Nhập lại mật khẩu', 'required|matches[password]|xss_clean');
			
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())													
			{
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				$data = array(
					'name'     => $name,
					'username' => $username,
					'password' => md5($password)
						);
				if($this->admin_model->create($data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else 
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url(admin));
			}
		}
		
		$this->data['temp']='admin/admin/add';
		$this->load->view('admin/ad_layout',$this->data);
	}
	// Chỉnh sửa tài khoản admin
	function edit()
	{
		$this->load->library('form_validation');                             // Load thư viện form validation
		$this->load->helper('form');
		
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->admin_model->get_info($id);
		
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Quản trị viên không tồn tại.');
			redirect(admin_url('admin'));
		}
		$this->data['info'] = $info;
		
		if($this->input->post())
		{
			//Tạo các tập luật kiểm tra điều kiện nhập
			$this->form_validation->set_rules('name','Họ và tên', 'required|min_length[6]|xss_clean');
			$this->form_validation->set_rules('username','Tên đăng nhập', 'required|min_length[6]|xss_clean');
			
			//Nếu nhập password thì mới cập nhật lại pass
			$password = $this->input->post('password');
			if($password)
			{
				$this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
				$this->form_validation->set_rules('repassword','Nhập lại mật khẩu','required|matches[password]');
				
			}
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				$data = array(
						'name'     => $name,
						'username' => $username,	
				);
				if($password)
				{
					$data['password'] = md5($password);
				}
				if($this->admin_model->update($id,$data))
				{
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Cập nhật dữ liệu KHÔNG thành công');
				}
				redirect(admin_url(admin));
			}
		}
		$this->data['temp']='admin/admin/edit';
		$this->load->view('admin/ad_layout',$this->data);
	}
	//Xóa 1 tài khoản admin
	function delete()
	{
		$this->load->library('form_validation');                             // Load thư viện form validation
		$this->load->helper('form');
	
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->admin_model->get_info($id);
		$permission = $info->permission;
		if(!$info)
		{
			$this->session->set_flashdata('fmessage', 'Quản trị viên không tồn tại.');
			redirect(admin_url('admin'));
		}
		if($permission==0)
		{
			$this->admin_model->delete($id);
		}
		else 
		{
			$this->session->set_flashdata('fmessage', 'Đây là boss, bạn không thể xóa được.');
			redirect(admin_url('admin'));
		}
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url(admin));
	}
	
	// Đăng xuất tài khoản admin
	function log_out()
	{
		if($this->session->userdata('login'))
		{
			$this->session->unset_userdata('login');
		}
		redirect(admin_url('login'));
	}
}