
              <div class="panel panel-default product_list">
                <div class="panel-heading"><strong><a href="" title="<?php echo $catalog->name?>"><h4><?php echo $catalog->name?></h4></a></strong></div>
                <div class="panel-body">
                  <div class="row">
                  
                     <?php foreach($list as $row):?>
                    <div class="col-md-3 col-sm-6"> 
                      <div class="thumbnail">
                      <a href="<?php echo base_url('products/view/'.$row->id)?>" title="Xem chi tiết">
                      <img src="<?php echo base_url('upload/products/'.$row->image_id)?>" alt="<?php echo $row->image_id?>">
                        <div class="caption text-center">
                          <h5><?php echo $row->name?></h5>
                          <?php if($row->discount > 0):?>
                          <h5><b style="color: #bd2026"><?php echo number_format($row->price - $row->discount)?> đ  </b><strike style="color: #0000b3"><b  style="color:#0000b3"><?php echo $row->price?> đ</b></strike> </h5></div>
                          <?php else:?>
                          <h5><b style="color: #bd2026"><?php echo number_format($row->price)?> đ</b></h5></div>
                          <?php endif;?>
                          </a> 
                        </div>
                      </div>
                       <?php endforeach;?>	
            </div>
            <div class="pagination">
								<?php echo $this->pagination->create_links()?>
								</div>

                    
                  </div>
                </div>
