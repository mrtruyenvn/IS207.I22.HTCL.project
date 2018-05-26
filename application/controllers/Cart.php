<?php
Class Cart extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('products_model');
	}
	
	// Thêm sp vào giỏ
	function add()
	{
		$id = $this->uri->rsegment(3);
		$product = $this->products_model->get_info($id);
		if(!$product)
		{
			redirect();
		}
		$qty = 1;
		$price = $product->price;
		if($product->discount > 0)
		{
			$price = $product->price - $product->discount;
		}
		$data= array();
		$data['id'] = $product->id;
		$data['qty'] = $qty;
		$data['name'] = url_title($product->name);
		$data['image_id'] = $product->image_id;
		$data['price'] = $price;
		$this->cart->insert($data);	
		
		redirect(base_url('cart'));
	}
	
	//Hiển thị ra danh sách sp giỏ hàng
	function index()
	{	
		// Lấy thông tin giỏ hàng
		$carts = $this->cart->contents();
		$total_items = $this->cart->total_items();

		$this->data['carts'] = $carts;
		$this->data['total_items'] = $total_items;
		

		$this->data['temp'] = 'site/cart/index';
		$this->load->view('site/layout',$this->data);
	}
	// Cập nhật số lượng sản phẩm giỏ hàng
	function update()
	{
		// Lấy thông tin giỏ hàng
		$carts = $this->cart->contents();
		foreach($carts as $key => $row)
		{
			$new_qty = $this->input->post($row[id]);
			$data = array();
			$data['rowid'] = $key;
			$data['qty'] = $new_qty;
			$this->cart->update($data);
		}
		redirect(base_url('cart'));
	}
	
	//Xóa sp
	function delete()
	{
		$id = intval($this->uri->rsegment(3));
		if($id>0)
		{
			$carts = $this->cart->contents();
			foreach($carts as $key => $row)
			{
				if($row['id']==$id)
				{
					$data = array();
					$data['rowid'] = $key;
					$data['qty'] = 0;
					$this->cart->update($data);
				}
			}
		}
		redirect('cart');
	}
}