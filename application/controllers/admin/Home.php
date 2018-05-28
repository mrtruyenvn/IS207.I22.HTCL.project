<?php
Class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('user_model');
		$this->load->model('catalog_model');
		$this->load->model('admin_model');
		$this->load->model('transaction_model');
	}
	function index()
	{
		$product_total = $this->products_model->get_total();
		$this->data['product_total'] = $product_total;
		
		$admin_total = $this->admin_model->get_total();
		$this->data['admin_total'] = $admin_total;
		
		$user_total = $this->user_model->get_total();
		$this->data['user_total'] = $user_total;
		
		$trans_total = $this->transaction_model->get_total();
		$this->data['trans_total'] = $trans_total;
		
		$this->data['temp']='admin/home/index';
		$this->load->view('admin/ad_layout',$this->data);
	}
}