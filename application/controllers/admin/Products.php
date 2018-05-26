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
// 		$config['use_page_numbers'] = TRUE;
		$config['total_rows']=$total_rows; //Tổng tất cả sản phẩm
		$config['base_url'] = admin_url('products/index');
		$config['per_page'] = 10;
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
	
	//Thêm sản phẩm mới
	function add()
	{
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
		$this->data['list'] = $catalog;
		
		//Lấy danh sách màu sản phẩm
		$this->load->model('color_model');
		$input1 = array();
		$color = $this->color_model->get_list($input1);
		$this->data['color'] = $color;
		
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('name','Tên sản phẩm', 'required');
			$this->form_validation->set_rules('price','Giá', 'required');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$keyword = $this->input->post('keyword');
				$catalog_id = $this->input->post('catalog_id');
				$color = $this->input->post('color');
				$price = $this->input->post('price');
				$discount = $this->input->post('discount');
				$describe = $this->input->post('describe');
				if($discount >= $price)
				{
					$this->session->set_flashdata('fmessage', 'Số tiền được giảm giá phải nhỏ hơn giá sản phẩm!');
					redirect($_SERVER['HTTP_REFERER']);
				}
				
				//Lấy tên file ảnh và upload
				$this->load->library('upload_library');
				$upload_path = './upload/products';
				$upload_data=$this->upload_library->upload($upload_path,'image_id');
				$image_id='';
				if(isset($upload_data['file_name']))
				{
					$image_id = $upload_data['file_name'];		
				}
				
				
				$data = array(
						'name'     => $name,
						'keyword' => $keyword,
						'catalog_id' => $catalog_id,
						'price' => intval($price),
						'discount' => intval($discount),
						'image_id' => $image_id,
						'describe' => $describe,
						'color_id' => $color
				);
				if($this->products_model->create($data))
				{
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Thêm mới dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('products'));
			}
		}
		$this->data['temp']='admin/products/add';
		$this->load->view('admin/ad_layout',$this->data);
	}
	
	//Xóa sản phẩm 
	function delete()
	{
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->products_model->get_info($id);
		
		
		if(!$info)
		{
			$this->session->set_flashdata('fmessage', 'Sản phẩm không tồn tại.');
			redirect(admin_url('products'));
		}
		else
		{
			// Nếu tồn tại file ảnh thì remove khỏi thư mục chứa
			$image_id = './upload/products/'.$info->image_id;
			if($image_id)
			{
				unlink($image_id);
			}
			$this->products_model->delete($id);
			
		}
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('products'));
	}
	
	//Chỉnh sửa thông tin sản phẩm
	function edit()
	{
		// Lấy id và thông tin sản phẩm
		$id = $this->uri->rsegment('3');
		$product = $this->products_model->get_info($id);
		if(!$product)
		{
			redirect(admin_url('products'));
			$this->session->set_flashdata('fmessage', 'Không tồn tại sản phẩm này.');
		
		}
		$this->data['product'] = $product;
		
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
		$this->data['list'] = $catalog;
		
		//Lấy danh sách màu sản phẩm
		$this->load->model('color_model');
		$input1 = array();
		$color = $this->color_model->get_list($input1);
		$this->data['color'] = $color;
		
		if($this->input->post())
		{
			
			//Tạo các tập luật
			$this->form_validation->set_rules('name','Tên sản phẩm', 'required');
			$this->form_validation->set_rules('price','Giá', 'required|greater_than[0]');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$keyword = $this->input->post('keyword');
				$catalog_id = $this->input->post('catalog_id');
				$price = $this->input->post('price');
				$discount = $this->input->post('discount');
				$describe = $this->input->post('describe');
				$color = $this->input->post('color');
				if($discount >= $price)
				{
					$this->session->set_flashdata('message', 'Số tiền được giảm giá phải nhỏ hơn giá sản phẩm!');
					redirect($_SERVER['HTTP_REFERER']);
				}
				//Lấy tên file ảnh
				$this->load->library('upload_library');
				$upload_path = './upload/products';
				$upload_data=$this->upload_library->upload($upload_path,'image_id');
				$image_id='';
				if(isset($upload_data['file_name']))
				{
					$image_id = $upload_data['file_name'];
					
				}
		
				$data = array(
						'name'     => $name,
						'keyword' => $keyword,
						'catalog_id' => $catalog_id,
						'price' => intval($price),
						'discount' => intval($discount),
						'describe' => $describe,
						'color_id' => $color
				);
				
				//Nếu thay đổi ảnh thì mới cập nhật
				if($image_id != '')
				{
					$data['image_id'] = $image_id;
				}
				//Cập nhật CSDL
				if($this->products_model->update($product->id,$data))
				{
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}
				else
				{
					$this->session->set_flashdata('fmessage', 'Cập nhật dữ liệu KHÔNG thành công');
				}
				redirect(admin_url('products'));
			}
		}
		$this->data['temp']='admin/products/edit';
		$this->load->view('admin/ad_layout',$this->data);
	}
}