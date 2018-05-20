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
					//xu li du lieu o trang ngoai
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