
<?php include 'header.php'; ?>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Project name</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">
		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1>Register User</h1>
			<hr>
				
				<?php 
				$frm_attr = array('class' => 'form-horizontal');
				echo form_open(base_url().'users/register', $frm_attr); ?>
			    
				    <div class="control-group">
					    <?php 
				    	$attributes = array(
				    		'class'	=>	'control-label'	
				    	);
				    	echo form_label('Username', 'username', $attributes); ?>
					    
					    <div class="controls">
					    	<?php 
					    	$in_user = array(
					    		'type'			=>	'text',
					    		'name'			=>	'username',
					    		'id'			=>	'username',
					    		'placeholder'	=>	'Username'
					    	 );	
					    	echo form_input($in_user);
					    	 ?>
					    	
					    </div>
				    </div>
				    <div class="control-group">
				    	<?php 
				    	$attributes = array(
				    		'class'	=>	'control-label'	
				    	);
				    	echo form_label('Password', 'password', $attributes); ?>

					    <div class="controls">
					    	<?php 
					    	$in_user = array(
					    		
					    		'name'			=>	'password',
					    		'id'			=>	'password',
					    		'placeholder'	=>	'Password'
					    	 );	
					    	echo form_password($in_user);
					    	 ?>
					    	
					    </div>
				    </div>
				    <div class="control-group">
				    	
				    	<?php 
				    	$attributes = array(
				    		'class'	=>	'control-label'	
				    	);
				    	echo form_label('User Type', 'usertype', $attributes); ?>
					    <div class="controls">
					    	<?php 
					    	$option = array(
					    		''			=>	'--',
					    		'admin'		=>	'Admin',
					    		'author'	=>	'Author',
					    		'user'		=>	'User'	
					    	);
					    	echo form_dropdown('usertype', $option , 'admin'); ?>					    	
					    </div>
				    </div>
				    <div class="control-group">
					    <div class="controls">
						    
						    <?php 
						    $btn_data = array(
						    	'type'		=>	'submit',
						    	'content'	=>	'Register',
						    	'class'		=>	'btn'
						    );
						    echo form_button($btn_data); ?>
						    <p>Already a user? <a href=" <?php echo base_url() ?>users/login ">Login</a>
					    </div>
				    </div>
			    <?php echo form_close() ?>
		</div>
		
		

<?php include 'footer.php'; ?>