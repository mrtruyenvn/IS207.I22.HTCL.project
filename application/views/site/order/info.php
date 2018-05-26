         <div class="cart">
            <form action="<?php echo base_url('cart/update')?>" method="post">
              <div class="panel panel-default">
                <div class="panel-heading"><strong><a href="" title="Giỏ hàng"><h4><i class="glyphicon glyphicon-shopping-cart"></i> THÔNG TIN ĐƠN HÀNG</h4></a></strong></div>
                <?php if ($total_items>0):?>
                <?php $total_amount = 0?>
                <?php foreach ($carts as $row):?>
                <?php $total_amount += $row['subtotal']?>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-sm-2">
                      <a href="<?php echo base_url('products/view/'.$row['id'])?>" title="<?php echo $row['name']?>"><img src="<?php echo base_url('upload/products/'.$row['image_id'])?>" alt="" width="120px" height="144px"></a>
                    </div>
                    <div class="col-sm-3">
                      <h4><?php echo $row['name']?></h4>
                      <h5 style="color:green">Mã sp: <?php echo $row['id'] ?></h5>
                      <h5 id="price">Đơn giá: <?php echo number_format($row['price'])?> đ</h5>
                    </div>
                    <div class="col-sm-3"><h5>Số lượng:</h5><input class="form-control" type="number" value="<?php echo $row['qty']?>" name="<?php echo $row['id']?>" min="1"></div>
                    <div class="col-sm-3"><h5>Thành tiền</h5><input class="form-control" type="text" value="<?php echo number_format($row['subtotal'])?> đ" disabled=""></div>
                    <div class="col-sm-1">
                      <h5><br></h5>
                      <h5><a onclick="return confirmDelete()"href="<?php echo base_url('cart/delete/'.$row['id'])?>" title="Xóa"><i class="glyphicon glyphicon-trash" style="color:red; transform: scale(1.4); padding-top: 8px;"></i></a></h5>
                    </div>
                  </div>
                </div>
				<?php endforeach;?>

                <div class="panel-body">
                <div class="row">
                  <div class="col-sm-8">
                    <h4>Chi phí tạm tính:</h4>
                  </div>
                  <div class="col-sm-4">
                    <h4><?php echo number_format($total_amount)?> VND</h4>
                  </div>
                  <div class="col-sm-8">
                    <h4>Giảm giá:</h4>
                  </div>
                  <div class="col-sm-4">
                    <h4><?php if($total_amount>1000000) $discount = $total_amount*0.05; else $discount =0; echo number_format($discount);?> VND</h4>
                  </div>
                 
                  <div class="col-sm-12">
                  <p style="color: red">(*Giảm 5% đối với đơn hàng có trị giá lớn hơn 1,000,000 VND)</p>
                  </div>
                </div>   
                </div>
                
                <div class="panel-body" >
                  <div class="row" >
                     <div class="col-sm-8" style="color: #0000b3">
                    <h3>Tổng cộng:</h3>
                  </div>
                  <div class="col-sm-4" style="color: #0000b3">
                    <h3><?php if($discount>0) $final_amount = $total_amount-$discount; else $final_amount=$total_amount; echo number_format($final_amount);?> VND</h3>
                  </div>
                  </div>
                </div>

                <div class="panel-body">
                <button type="Submit" class="btn btn-primary">Cập nhật</button>
              </form>
                <a style="color:white" class="btn btn-success" href="<?php echo base_url('order/checkout')?>">Thanh toán</a>
                </div>
				<?php else:?>
				
				<div class="panel-body">
                <h4>KHÔNG CÓ SẢN PHẨM NÀO TRONG GIỎ</h4>
                </div>
                <?php endif;?>
              </div>
      
          </div>