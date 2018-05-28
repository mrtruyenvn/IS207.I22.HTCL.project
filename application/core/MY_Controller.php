<?php
Class MY_Controller extends CI_Controller
{
	public $data = array();                      //gui du lieu sang view
	function __construct()
	{
		
		parent::__construct();
		$controller = $this->uri->segment('1');                   // tra ve phan doan 1 trong url   
		//echo $controller;
		switch($controller)
		{
			case 'admin':
				{
					//xu li khi truy cap vao trang admin
					$this->load->helper('admin');
					$this->Check_Login();
					break;
				}
			default:
				{
					//xu li du lieu o trang nguoi dung
					//Lấy danh mục sản phẩm trên thanh menu
					$this->load->model('catalog_model');
					$input = array();
					$input['where'] = array('parent_id' => 0);
					$input['order'] = array('sort','ASC');
					$catalog_list = $this->catalog_model->get_list($input);
					foreach($catalog_list as $row)
					{
						$input['where'] = array('parent_id' => $row->id);
						$sub = $this->catalog_model->get_list($input);
						$row->sub = $sub;
					}
					$this->data['catalog_list'] = $catalog_list;
					
					
					// Lấy số lượng giỏ hàng trên thanh menu
					$this->load->library('cart');
					$this->data['total_items'] = $this->cart->total_items();
					
					
					//Hiển thị footer
					$this->load->model('address_model');
					$address = $this->address_model->get_list();
					$this->data['address'] = $address;
					
					//Kiểm tra thành viên đăng nhập
					$user_log = $this->session->userdata('user_id_login');
					$this->data['user_log'] = $user_log;
					if($user_log)
					{
						$this->load->model('user_model');
						$user_info = $this->user_model->get_info($user_log);
						$this->data['user_info'] = $user_info;
					}
				}
		}
	}
	
	function Check_Login()
	{
		//Kiem tra xem da dang nhap vao admin chua
		$controller = $this->uri->rsegment('1');
		$controller= strtolower($controller);
		$login=$this->session->userdata('login');
		if(!$login && $controller != 'login')
		{
			redirect(admin_url('login'));
		}
		if($login && $controller == 'login')
		{
			redirect(admin_url('home'));
		}
	}
	
}