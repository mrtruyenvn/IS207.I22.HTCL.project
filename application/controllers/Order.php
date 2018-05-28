<?php
Class Order extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function checkout()
	{

		
		$carts = $this->cart->contents();
		// Tính số tiền thanh toán
		$total_items = $this->cart->total_items();
		if($total_items <= 0)
		{
			redirect();
		}
		$total_amount = 0;
		foreach($carts as $row)
		{
			$total_amount += $row['subtotal'];
		}

		if($total_amount>1000000)
		{
			$total_amount -= $total_amount * 0.05;
		}
		$this->data['total_amount'] = $total_amount;
		//Nếu đã đăng nhập thì lấy thông tin của thành viên
		$user ='';
		if($this->session->userdata('user_id_login'))
		{
			$user_id = $this->session->userdata('user_id_login');
			$user = $this->user_model->get_info($user_id);
		}
			
		$this->data['user'] = $user;
		if($this->input->post())
		{
			//Tạo các tập luật
			$this->form_validation->set_rules('email','Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('first_name','Họ và tên đệm', 'required|xss_clean');
			$this->form_validation->set_rules('last_name','Tên', 'required|xss_clean');
			$this->form_validation->set_rules('phone','SĐT', 'required|min_length[10]|numeric|xss_clean');
			$this->form_validation->set_rules('address','Địa chỉ nhận hàng', 'required|xss_clean');
			$this->form_validation->set_rules('timerec','Thời gian nhận hàng', 'required|xss_clean');
			$this->form_validation->set_rules('payment','Cổng thanh toán', 'required|xss_clean');
			// Kiểm tra thỏa mãn điều kiện tập luật
			if($this->form_validation->run())
			{
				$email = $this->input->post('email');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$address = $this->input->post('address');
				$phone = $this->input->post('phone');
				$timerec = $this->input->post('timerec');
				$payment = $this->input->post('payment');	
				$data = array(
						'user_email' => $email,
						'user_name' => $first_name .' '.$last_name,
						'user_id' =>$user_id,
						'user_email' => $user->email,
						'user_phone' => $phone,
						'user_address' => $address,
						'created_at' => now(),
						'amount' => $total_amount,
						'payment' => $payment,
						'user_timerec' => $timerec,
						'status' => 0,
				);
				//Thêm CSDL vào bảng trấnction
				$this->load->model('transaction_model');
				$this->transaction_model->create($data);
				$transaction_id = $this->db->insert_id();
				//Thêm vào bảng order
				$this->load->model('order_model');
				foreach($carts as $row)
				{
					$data = array(
							'transaction_id' => $transaction_id,
							'product_id' =>$row['id'],
							'quantity' =>$row['qty'],
							'amount' => $row['subtotal'],
							'status' => '0',
					);
					$this->order_model->create($data);
				}
				//Xóa toàn bộ giỏ hàng
				$this->cart->destroy();
				$this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gửi hàng cho bạn');
				//print_data($message);
				redirect();
			}
		}

		
		$this->data['temp'] = 'site/order/checkout';
		$this->load->view('site/layout',$this->data);
	}
}