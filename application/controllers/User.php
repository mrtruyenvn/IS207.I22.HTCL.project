<?php

Class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	function check_email(){
		$email = $this->input->post('email');
		$where = array('email' => $email);
		if($this->user_model->check_exists($where))
		{
			$this->form_validation->set_message(__FUNCTION__,"Tài khoản đã tồn tại");
			return FALSE;
		}
		return TRUE;
	}
	function register()
	{	
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('first_name','Họ và tên đệm', 'required|xss_clean');
			$this->form_validation->set_rules('last_name','Tên', 'required|xss_clean');
			$this->form_validation->set_rules('email','Địa chỉ Email', 'required|valid_email|xss_clean|callback_check_email');
			$this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]|xss_clean');
			$this->form_validation->set_rules('repassword','Xác nhận mật khẩu', 'required|matches[password]|xss_clean');
			$this->form_validation->set_rules('phone','SĐT', 'required|min_length[10]|numeric|xss_clean');
			$this->form_validation->set_rules('address','Địa chỉ liên hệ', 'required|xss_clean');
			$this->form_validation->set_rules('birthday','Ngày sinh', 'required|xss_clean');
			$this->form_validation->set_rules('agree','Đồng ý với điều khoản', 'required|xss_clean');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$email = $this->input->post('email');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$birthday = $this->input->post('birthday');
				$password = $this->input->post('password');
					
				$data = array(
						'first_name'     => $first_name,
						'last_name' => $last_name,
						'email' => $email,
						'phone' => $phone,
						'address' => $address,
						'password' => md5($password),
						'birthday' => $birthday,
						'created_at' => now()
				);
				if($this->user_model->create($data))
				{
					$this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gửi hàng cho bạn');
				}
				else
				{
					echo "<script>alert('Đăng ký tài khoản thất bại!');</script>";
				}
				redirect(site_url());
			}
		}
		
		$this->data['temp'] = 'site/user/register';
		$this->load->view('site/layout',$this->data);
	}
	
	function Login()
	{
	if($this->input->post())
		{
			//Xử lí khi bấm nút đăng nhập
			$this->form_validation->set_rules('email','Địa chỉ Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('password','Mật khẩu', 'required|xss_clean');
			$this->form_validation->set_rules('login','login','callback_check_login');
			if($this->form_validation->run())
			{
				$user = $this->_get_user_info();
 				$this->session->set_userdata('user_id_login', $user->id); //1 session 'login' để kiểm tra đăng nhập
 				echo "<script>alert('Đăng nhập thành công!');</script>";
				redirect();
			}
		}
		
		$this->data['temp'] = 'site/user/login';
		$this->load->view('site/layout',$this->data);
	}
	//Kiểm tra email và mật khẩu
	function check_login(){
	
		$user =$this->_get_user_info();
		if($user)
		{
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__,"TÀI KHOẢN hoặc MẬT KHẨU không chính xác!");
		return false;
	}
	
	private function _get_user_info()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		$where = array('email'=>$email,'password'=>$password);
		$user = $this->user_model->get_info_rule($where);
		return $user;
	}
	
	function log_out()
	{
		// 		print_data($account);
		if($this->session->userdata('user_id_login'))
		{
			$this->session->unset_userdata('user_id_login');
		}
		$this->session->set_flashdata('message', 'Đăng xuất thành công');
		redirect();
	}
	
	function info()
	{
		//Lấy id của tài khoản hiện tại
		$user_id = $this->session->userdata('user_id_login');
		$user = $this->user_model->get_info($user_id);
		$this->data['user'] = $user; 
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('first_name','Họ và tên đệm', 'required|xss_clean');
			$this->form_validation->set_rules('last_name','Tên', 'required|xss_clean');
			$this->form_validation->set_rules('password','Mật khẩu', 'min_length[6]|xss_clean');
			$this->form_validation->set_rules('repassword','Xác nhận mật khẩu', 'matches[password]|xss_clean');
			$this->form_validation->set_rules('phone','SĐT', 'required|min_length[10]|numeric|xss_clean');
			$this->form_validation->set_rules('address','Địa chỉ liên hệ', 'required|xss_clean');
			$this->form_validation->set_rules('birthday','Ngày sinh', 'required|xss_clean');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$birthday = $this->input->post('birthday');
				$password = $this->input->post('password');
					
				$data = array(
						'first_name'     => $first_name,
						'last_name' => $last_name,
						'phone' => $phone,
						'address' => $address,
						'birthday' => $birthday,
						'created_at' => now(),
				);
				if($password !='')
				{
					$data['password'] = md5($password);
				}
				
				if($this->user_model->update($user_id, $data))
				{
					echo "<script>alert('Cập nhật tài khoản thành công');</script>";
				}
				else
				{
					echo "<script>alert('Cập nhật thất bại');</script>";
				}
			}
		}
		$this->data['temp'] = 'site/user/info';
		$this->load->view('site/layout',$this->data);
	}
}