<?php
Class Products extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('catalog_model');
		$this->load->model('color_model');
	}
	
	//Hiển thị sản phẩm theo danh mục
	function catalog()
	{
		//Lấy thông tin danh mục
		$id = intval($this->uri->rsegment('3'));
		$catalog = $this->catalog_model->get_info($id);
		if(!$catalog)
		{
			redirect();
		}
		$this->data['catalog'] = $catalog;
		$input['where'] = array('catalog_id' =>$id);
	
		// Phân trang sản phẩm
		
		$total_rows = $this->products_model->get_total($input);
		$this->data['total_rows'] = $total_rows;

		// Cấu hình thư viện phân trang pagination
		$config =array();
		$config['total_rows']=$total_rows; //Tổng tất cả sản phẩm
		$config['base_url'] = base_url('products/catalog/'.$id);
		$config['per_page'] = 16;
		$config['uri_segment'] = 4;
		$config['next_link']='>>';
		$config['prev_link']='<<';
		$config['last_link']='Trang cuối';
		$config['first_link']='Trang đầu';
		$this->pagination->initialize($config);
		
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		$input['limit'] = array($config['per_page'], $segment);
		
		//Lấy danh sách sản phẩm theo danhmuc
		
		$list = $this->products_model->get_list($input);
		$this->data['list'] = $list;
		
		//Truyền biến sang view và hiển thị
		$this->data['temp'] ='site/products/catalog';
		$this->load->view('site/layout',$this->data);
	}
	//Hiển thị sản phẩm theo màu sắc
	function color()
	{
		//Lấy thông tin sản phẩm theo màu sắc
		$id = intval($this->uri->rsegment('3'));
		$color_list = $this->color_model->get_info($id);
		if(!$color_list)
		{
			redirect();
		}
		$this->data['color_list'] = $color_list;
		$input['where'] = array('color_id' =>$id);
		
		//Lấy danh sách sản phẩm theo màu sắc
		
		$list = $this->products_model->get_list($input);
		$this->data['list'] = $list;
		
		//Truyền biến sang view và hiển thị
		$this->data['temp'] ='site/products/color';
		$this->load->view('site/layout', $this->data);
	}
	//Hiển thị chi tiết sản phẩm
	function view()
	{
		//Lấy id sản phẩm 
		$id = $this->uri->rsegment('3');
		$product = $this->products_model->get_info($id);
		if(!$id)
		{
			redirect();
		}
		$this->data['product'] = $product;
		
		// Lấy danh mục sản phẩm
		$catalog = $this->catalog_model->get_info($product->catalog_id);
		$this->data['catalog'] = $catalog;
		
		// Lấy sản phẩm cùng danh mục
		$id_catalog = $catalog->id;
		$input['where'] = array('catalog_id' =>$id_catalog);
		$input['limit'] = array(8,0);		
		$same_catalog = $this->products_model->get_list($input);
		$this->data['same_catalog'] = $same_catalog;

		
		$this->data['temp'] = 'site/products/view';
		$this->load->view('site/layout',$this->data);
	}
	
	//TÌm kiếm sản phẩm
	function search()
	{
		$key = $this->input->get('key_search');
		$this->data['key'] = trim($key);
		$input = array();
		$input['like'] = array('name or keyword', $key);
		$list = $this->products_model->get_list($input);
		$this->data['list'] = $list;
		
		$this->data['temp'] = 'site/products/search';
		$this->load->view('site/layout',$this->data);
	}
	//Tìm kiếm sản phẩm theo giá
	function price_search()
	{
		$price_from = intval($this->input->get('price_from'));
		$price_to = intval($this->input->get('price_to'));
		$this->data['price_from'] = $price_from;
		$this->data['price_to'] = $price_to;
		
		$input = array();
		$input['where'] = array('price >= ' => $price_from, 'price <=' => $price_to);
		
		$list = $this->products_model->get_list($input);
		$this->data['list'] = $list;
		
		$this->data['temp'] = 'site/products/price_search';
		$this->load->view('site/layout',$this->data);
	}
	//Hiển thị sản phẩm mới nhất/ nổi bật nhất / bán chạy nhất / đang khuyến mãi
	function newest()
	{
		$input['limit'] = array('20','0');
		$new = $this->products_model->get_list($input);
		$this->data['new'] = $new;
	
		//Truyền biến sang view và hiển thị
		$this->data['temp'] ='site/products/new';
		$this->load->view('site/layout', $this->data);
	}
	function top_view()
	{
		$input['limit'] = array('20','0');
		$input['order'] = array('view','DESC');
		$hot = $this->products_model->get_list($input);
		$this->data['hot'] = $hot;
	
		//Truyền biến sang view và hiển thị
		$this->data['temp'] ='site/products/hot';
		$this->load->view('site/layout', $this->data);
	}
	function top_buy()
	{
		$input['limit'] = array('20','0');
		$input['order'] = array('buy_counter','DESC');
		$topbuy = $this->products_model->get_list($input);
		$this->data['topbuy'] = $topbuy;
	
		//Truyền biến sang view và hiển thị
		$this->data['temp'] ='site/products/top_buy';
		$this->load->view('site/layout', $this->data);
	}
	function sale()
	{
		$input['limit'] = array('20','0');
		$input['where'] = array('discount >' => 0);
		$sale = $this->products_model->get_list($input);
		$this->data['sale'] = $sale;
	
		//Truyền biến sang view và hiển thị
		$this->data['temp'] ='site/products/sale';
		$this->load->view('site/layout', $this->data);
	}
}