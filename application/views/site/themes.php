<div class="special-title">
      <div class="container">
        <h2>MUÔN MÀU HOA SẮC 2018</h2>
      </div>
    </div>
    <div class="special">
      <div class="container">
        <div class="row">
        <?php foreach ($color_list as $row):?>
          <div class=" thumbnail col-md-2 col-sm-4 col-xs-6">
            <a href="<?php echo base_url('products/color/'.$row->id)?>" title="<?php echo $row->name?>">
              <img src="<?php echo base_url('upload/color/'.$row->img) ?>" alt="" class="img-circle img-thumbnail">
              <div class="caption text-center"><strong><?php echo $row->name?></strong></div>
            </a>
            
          </div>
		<?php endforeach;?>
        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </div> <!-- /.special -->