<?php
Class Transaction extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model');
	}
	
	// Hiển thị danh sách giao dịch
	function index()
	{
		// Phân trang
		$total_rows = $this->transaction_model->get_total();
		$this->data['total_rows'] = $total_rows;
		
		// Cấu hình thư viện phân trang pagination
		$config =array();
// 		$config['use_page_numbers'] = TRUE;
		$config['total_rows']=$total_rows; //Tổng tất cả giao dịch
		$config['base_url'] = admin_url('transaction/index');
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$config['next_link']='>>'; 
		$config['prev_link']='<<';
		$config['last_link']='Trang cuối';
		$config['first_link']='Trang đầu';
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);

        //Kiểm tra điều kiện lọc
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0)
        {
        	$input['where']['id'] = $id;
        }
        $mail = $this->input->get('mail');
        if($mail)
        {
        	$input['like'] = array('user_email',$mail);
        }
		//Lấy danh sách giao dịch & truyền biến sang view
		$list = $this->transaction_model->get_list($input);
		$this->data['list'] = $list;
		// Lấy nội dung biến message
		$message = $this->session->flashdata('message');					//$message = dòng thông báo
		$this->data['message'] = $message;
		
		$fmessage = $this->session->flashdata('fmessage');					//$fmessage = dòng thông báo lỗi
		$this->data['fmessage'] = $fmessage;
		
		$this->data['temp'] = 'admin/transaction/index';
		$this->load->view('admin/ad_layout',$this->data);
	}
	
	//Xóa một giao dịch
	function delete()
	{
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->transaction_model->get_info($id);
	
	
		if(!$info)
		{
			$this->session->set_flashdata('fmessage', 'Giao dịch này không tồn tại.');
			redirect(admin_url('transaction'));
		}
		else
		{
			$this->transaction_model->delete($id);
				
		}
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('transaction'));
	}
}