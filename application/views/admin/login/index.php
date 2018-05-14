<html>
<head>
	<?php $this->load->view('admin/head');?>
</head>
<body class="nobg loginPage" style="min-height:100%;">

	<!-- Main content wrapper -->
	<div class="loginWrapper" style="top:45%;">
	
	    <div class="widget" id="admin_login" style="height:auto; margin:auto;">
	        <div class="title"><img src="<?php echo public_url('admin/')?>images/icons/dark/laptop.png" alt="" class="titleIcon">
	        	<h6>Đăng nhập</h6>
	        </div>
	        
	        <form class="form" id="form" action="" method="post">
	           <fieldset>
	                <div class="formRow">
	                    <label for="param_username">Tên đăng nhập:</label>
	                    <div class="loginInput"><input type="text" name="username" id="param_username"></div>
	                    <div class="clear"></div>
	                </div>
	                
	                <div class="formRow">
	                    <label for="param_password">Mật khẩu:</label>
	                    <div class="loginInput"><input type="password" name="password" id="param_password"></div>
	                    <div class="clear"></div>
	                </div>
	                
	                <div class="loginControl">
	                    <input type="hidden" name="submit" value="1">
	                    <input type="submit" value="Đăng nhập" class="dredB logMeIn">
	                    <div class="clear"></div>
	                </div>
	            </fieldset>
	        </form>
	    </div>
	    
	</div>    
	
	<!-- Footer line -->
<?php $this->load->view('admin/footer');?>


<div id="limiterBox" class="limiterBox" style="position: absolute; display: none;"></div><div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" style="display: none; padding-bottom: 42px; padding-right: 42px;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden; float: left;"></div><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><div id="cboxNext" style="float: left;"></div><div id="cboxPrevious" style="float: left;"></div><div id="cboxSlideshow" style="float: left;"></div><div id="cboxClose" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body>
</html>