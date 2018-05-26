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
		$check_per = $this->session->userdata('permission'); // Biến kiểm tra quyền admin
		if($check_per == 1)
		{
			if($this->input->post())
			{
				//Tạo các tập luật
				$this->form_validation->set_rules('name','Họ và tên', 'required|min_length[6]|xss_clean');
				$this->form_validation->set_rules('username','Tên đăng nhập', 'required|min_length[6]|xss_clean|callback_check_username');
				$this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]|xss_clean');
				$this->form_validation->set_rules('repassword','Xác nhận mật khẩu', 'required|matches[password]|xss_clean');
					
				// Kiểm tra thỏa mãn điều kiện tập luật
				if($this->form_validation->run())
				{
					$name = $this->input->post('name');
					$username = $this->input->post('username');
					$permission = $this->input->post('permission');
					$password = $this->input->post('password');
			
					$data = array(
							'name'     => $name,
							'username' => $username,
							'password' => md5($password),
							'permission' => $permission
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
		else 
		{
			$this->session->set_flashdata('fmessage', 'Bạn không thể thực hiện chức năng này!');
			redirect(admin_url(admin));
		}
		

	}
	// Chỉnh sửa tài khoản admin
	function edit()
	{
		//Lấy biến kiểm tra quyền hiện tại
		$check_per = $this->session->userdata('permission'); 
		$check_id = $this->session->userdata('id');          
		
		//Lấy thông tin admin theo id
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->admin_model->get_info($id);
		
		//Chỉ cho phép sửa tài khoản của mình nếu không phải boss
		if($check_per == 1 or $check_id==$id )
		{
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
					$this->form_validation->set_rules('repassword','Xác nhận mật khẩu','required|matches[password]');
			
				}
				if($this->form_validation->run())
				{
					$name = $this->input->post('name');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$permission = $this->input->post('permission');
					
					$data = array(
							'name'     => $name,
							'username' => $username,
							'permission' => $permission
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
		else
		{
			$this->session->set_flashdata('fmessage', 'Bạn không thể thực hiện chức năng này!');
			redirect(admin_url(admin));
		}
		

	}
	//Xóa 1 tài khoản admin
	function delete()
	{	
		//Lấy biến kiểm tra quyền hiện tại
		$check_per = $this->session->userdata('permission'); 
		$check_id = $this->session->userdata('id');         
		
		//Lấy thông tin admin theo id
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->admin_model->get_info($id);
		$permission = $info->permission;
		
		//Chỉ cho phép xóa tài khoản nếu bạn là boss
		if($check_per == 1 and $check_id != $id)       
		{
			if(!$info)
			{
				$this->session->set_flashdata('fmessage', 'Quản trị viên không tồn tại.');
				redirect(admin_url('admin'));
			}
			else
			{
				$this->admin_model->delete($id);
				redirect(admin_url('admin'));
			}
			$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
			redirect(admin_url(admin));
		}
		else
		{
			$this->session->set_flashdata('fmessage', 'Bạn không thể thực hiện chức năng này.');
			redirect(admin_url('admin'));
		}
		
	}
	
	// Đăng xuất tài khoản admin
	function log_out()
	{
// 		print_data($account);
		if($this->session->userdata('login'))
		{
			$this->session->sess_destroy();
		}
		redirect(admin_url('login'));
	}
}