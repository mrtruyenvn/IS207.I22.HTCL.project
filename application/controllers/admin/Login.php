<?php
Class Login extends MY_Controller
{
	function index()
	{	
		if($this->input->post())
		{
			// Lấy thông tin admin
			$this->load->model('admin_model');
			$username = $this->input->post('username');
			$input = array();
			$input['where'] = array('username'=> $username);
			$info= $this->admin_model->get_list($input);
			$data = array();
			$data = json_decode(json_encode($info[0]), True);

			//Xử lí khi bấm nút đăng nhập
			$this->form_validation->set_rules('login','login','callback_check_login');
			if($this->form_validation->run())
			{
 				$this->session->set_userdata('login',true); //1 session 'login' để kiểm tra đăng nhập
 				$this->session->set_userdata($data);    // tạo 1 session chứa thông tin admin đăng nhập
 				redirect(admin_url('home'));
			}
		}

		$this->load->view('admin/login/index');
	}
	
	function check_login(){
	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		
		$this->load->model('admin_model');
		$where = array('username' => $username, 'password' => $password);
		if($this->admin_model->check_exists($where))
		{
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__,"TÀI KHOẢN hoặc MẬT KHẨU không chính xác!");
		return false;
	}	
}