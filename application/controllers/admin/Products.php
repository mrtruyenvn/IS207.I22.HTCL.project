<?php
Class Products extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
	}
	
	// Hiển thị danh sách sản phẩm
	function index()
	{
		// Phân trang sp
		$total_rows = $this->products_model->get_total();
		$this->data['total_rows'] = $total_rows;
		
		// Cấu hình thư viện phân trang pagination
		$config =array();
		$config['total_rows']=$total_rows; //Tổng tất cả sản phẩm
		$config['base_url'] = admin_url('products/index');
		$config['per_page'] = 2;
		$config['uri_segment'] = 4;
		$config['next_link']='Trang sau'; 
		$config['prev_link']='Trang trước';
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
        
        $name = $this->input->get('name');
        if($name)
        {
        	$input['like'] = array('name',$name);
        }
        $catalog_id = $this->input->get('catalog');
        $catalog_id = intval($catalog_id);
        if($catalog_id>0)
        {
        	$input['where']['catalog_id'] = $catalog_id;
        }
		//Lấy danh sách sản phẩm & truyền biến sang view
		$list = $this->products_model->get_list($input);
		$this->data['list'] = $list;
		
		//Lấy danh sách danh mục sản phẩm
		$this->load->model('catalog_model');
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalog = $this->catalog_model->get_list($input);
		foreach ($catalog as $row)
		{
			$input['where'] = array('parent_id' =>$row->id);
			$sub = $this->catalog_model->get_list($input);
			$row->sub = $sub;
		}
//		print_data($catalog);
		$this->data['catalog'] = $catalog;

		
		// Lấy nội dung biến message
		$message = $this->session->flashdata('message');					//$message = dòng thông báo
		$this->data['message'] = $message;
		
		$fmessage = $this->session->flashdata('fmessage');					//$fmessage = dòng thông báo lỗi
		$this->data['fmessage'] = $fmessage;
		
		$this->data['temp'] = 'admin/products/index';
		$this->load->view('admin/ad_layout',$this->data);
	}
}