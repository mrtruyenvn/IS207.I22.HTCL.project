
          <div class="row">

            <div class="col-md-12 noibat">
              <div class="panel panel-default">
                <div class="panel-heading"><strong><a href="<?php echo base_url('products/newest')?>" title="Sản phẩm nổi bật">MỚI NHẤT</a></strong> <img src="http://www.animatedgif.net/new/rotnew_e0.gif" width="40px" height="30px"></div>
                <div class="panel-body">
                  <div class="row">
                  <?php foreach($new_product as $row):?>
                    <div class="col-md-3 col-sm-6"> 
                      <div class="thumbnail">
                      <a href="<?php echo base_url('products/view/'.$row->id)?>" title="Xem chi tiết">
                      <img src="<?php echo base_url('upload/products/'.$row->image_id)?>" alt="<?php echo $row->image_id?>">
                        <div class="caption text-center">
                         <h5><?php echo $row->name?></h5>
                          <?php if($row->discount > 0):?>
                          <h5><b><?php echo number_format($row->price - $row->discount)?> đ  </b><strike style="color: #0000b3"><b  style="color:#0000b3"><?php echo $row->price?> đ</b></strike> </h5></div>
                          <?php else:?>
                          <h5><b><?php echo number_format($row->price)?> đ</b></h5></div>
                          <?php endif;?>
                          </a> 
                        </div>
                      </div>
                       <?php endforeach;?>						
                    </div>
                  </div>
                </div>
            </div> <!-- /.noibat -->

            <div class="col-md-12 khuyenmai">
              <div class="panel panel-default">
                <div class="panel-heading"><strong><a href="<?php echo base_url('products/top_buy')?>" title="Sản phẩm được mua nhiều nhất">MUA NHIỀU NHẤT</a></strong></div>
                <div class="panel-body">
                  <div class="row">
                  <?php foreach($best_product as $row):?>
                    <div class="col-md-3 col-sm-6"> 
                      <div class="thumbnail">
                      <a href="<?php echo base_url('products/view/'.$row->id)?>" title="Xem chi tiết">
                      <img src="<?php echo base_url('upload/products/'.$row->image_id)?>" alt="<?php echo $row->image_id?>">
                        <div class="caption text-center">
                          <h5><?php echo $row->name?></h5>
                          <?php if($row->discount > 0):?>
                          <h5><b><?php echo number_format($row->price - $row->discount)?> đ  </b><strike style="color: #0000b3"><b  style="color:#0000b3"><?php echo $row->price?> đ</b></strike> </h5></div>
                          <?php else:?>
                          <h5><b><?php echo number_format($row->price)?> đ</b></h5></div>
                          <?php endif;?>
                          </a> 
                        </div>
                      </div>
                       <?php endforeach;?>	

                  </div>
                </div>
              </div>
            </div> <!-- /.khuyenmai -->

            <div class="col-md-12 giohoatuoi">
              <div class="panel panel-default">
                <div class="panel-heading"><strong><a href="<?php echo base_url('products/top_view')?>" title="Nổi bật">NỔI BẬT</a></strong></div>
                <div class="panel-body">
                  <div class="row">
                   
                   <?php foreach($hot as $row):?>
                    <div class="col-md-3 col-sm-6"> 
                      <div class="thumbnail">
                      <a href="<?php echo base_url('products/view/'.$row->id)?>" title="Xem chi tiết">
                      <img src="<?php echo base_url('upload/products/'.$row->image_id)?>" alt="<?php echo $row->image_id?>">
                        <div class="caption text-center">
                          <h5><?php echo $row->name?></h5>
                          <?php if($row->discount > 0):?>
                          <h5><b><?php echo number_format($row->price - $row->discount)?> đ  </b><strike style="color: #0000b3"><b  style="color:#0000b3"><?php echo $row->price?> đ</b></strike> </h5></div>
                          <?php else:?>
                          <h5><b><?php echo number_format($row->price)?> đ</b></h5></div>
                          <?php endif;?>
                          </a> 
                        </div>
                      </div>
                       <?php endforeach;?>

                  </div>
                </div>
              </div>
            </div> <!-- /.qua tang kem -->
            
            <div class="col-md-12 giohoatuoi">
              <div class="panel panel-default">
                <div class="panel-heading"><strong><a href="<?php echo base_url('products/sale')?>" title="Sản phẩm đang khuyến mãi">ĐANG KHUYẾN MÃI</a></strong></div>
                <div class="panel-body">
                  <div class="row">
       				<?php foreach($sale as $row):?>
                    <div class="col-md-3 col-sm-6"> 
                      <div class="thumbnail">
                      <a href="<?php echo base_url('products/view/'.$row->id)?>" title="Xem chi tiết">
                      <img src="<?php echo base_url('upload/products/'.$row->image_id)?>" alt="<?php echo $row->image_id?>">
                        <div class="caption text-center">
                          <h5><?php echo $row->name?></h5>
                          <?php if($row->discount > 0):?>
                          <h5><b><?php echo number_format($row->price - $row->discount)?> đ  </b><strike style="color: #0000b3"><b  style="color:#0000b3"><?php echo $row->price?> đ</b></strike> </h5></div>
                          <?php else:?>
                          <h5><b><?php echo number_format($row->price)?> đ</b></h5></div>
                          <?php endif;?>
                          </a> 
                        </div>
                      </div>
                       <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div> <!-- /.giohoatuoi -->
            
		</div> <!-- /.row -->