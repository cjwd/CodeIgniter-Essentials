<?php include 'header.php'; ?>
	
	<div class="container">
		<h1>Upload Post Image</h1>
		
		<div class="row">
			<div class="span8">
				<?php if ($error): ?>
					<div class="alert">
					<a class="close" data-dismiss="alert">&times;</a>
					<strong>Warning!</strong> <?php echo $error; ?>
				</div>
				<?php endif ?>
				
				<?php echo form_open_multipart('upload/do_upload');?>
					<?php 
					$data_form = array(
						'name' => 'userfile'
					 ); 

					echo form_upload($data_form);
					echo form_submit('', 'Upload');
					?>
				<?php echo form_close(); ?>
			</div>
			
		</div>
	</div>

<?php include 'footer.php'; ?>