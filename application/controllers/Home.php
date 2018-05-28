<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	function index(){
		
		//Hiển thị slide
		$this->load->model('slide_model');
		$slide_list = $this->slide_model->get_list();
		$this->data['slide_list'] = $slide_list;
		$this->data['intro'] = 'site/intro';
		
		//Hiển thị menu màu hoa
		$this->load->model('color_model');
		$list['order'] = array('id','ASC');
		$color_list = $this->color_model->get_list($list);
		$this->data['color_list'] = $color_list;
		$this->data['color'] = 'site/themes';
		
		//Hiển thị sản phẩm mới
		$this->load->model('products_model');
		$input = array();
		$input['limit'] = array('4','0');
		$new_product = $this->products_model->get_list($input);
		$this->data['new_product'] = $new_product;
		
		//Hiển thị sản phẩm bán nhiều
		$input = array();
		$input['limit'] = array('4','0');
		$input['order'] = array('buy_counter','DESC');
		$best_product = $this->products_model->get_list($input);
		$this->data['best_product'] = $best_product;

		
		//Hiển thị sản phẩm nổi bật
		$input = array();
		$input['limit'] = array('4','0');
		$input['order'] = array('view','DESC');
		$hot = $this->products_model->get_list($input);
		$this->data['hot'] = $hot;
		
		//Hiển thị sản phẩm khuyến mãi
		$input = array();
 		$input['limit'] = array('4','0');
		$input['where'] = array('discount >' => 0);
		$input['order'] = array('id','RANDOM');
		$sale = $this->products_model->get_list($input);
		$this->data['sale'] = $sale;
		
		// Lấy nội dung biến message
		$message = $this->session->flashdata('message');					//$message = dòng thông báo
		$this->data['message'] = $message;
		
		$fmessage = $this->session->flashdata('fmessage');					//$fmessage = dòng thông báo lỗi
		$this->data['fmessage'] = $fmessage;
		//Truyền biến sang view
		$this->data['temp']= 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}
