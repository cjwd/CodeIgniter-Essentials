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
			<h1>Blog Login</h1>
			<hr>
			<?php if ($error == 1): ?>
				<div class="alert alert-error">
					<a class="close" data-dismiss="alert">&times;</a>
					<strong>Error!</strong> You are not yet a user of this Blog. Please Register first.
				</div>
			<?php endif ?>
			
		    <form action="<?php echo base_url() ?>users/login" method="post" class="form-horizontal">
			    <div class="control-group">
				    <label class="control-label" for="inputUser">Username</label>
				    <div class="controls">
				    	<input type="text" name="username" id="inputUser" placeholder="Username">
				    </div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputPassword">Password</label>
				    <div class="controls">
				    	<input type="password" name="password" id="inputPassword" placeholder="Password">
				    </div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputUserType">User Type</label>
				    <div class="controls">
				    	<select id='inputUserType' name='usertype'>
				    		<option value="admin">admin</option>
				    		<option value="author">author</option>
				    		<option value="user">user</option>
							
							
						</select>
				    	<!-- <select id='inputUserType' name='usertype'>
				    		<?php //foreach ($usertype as $type): ?>
				    			<option><?php //echo $type['user_type'] ?></option>
				    		<?php //endforeach ?>
							
							
						</select> -->
				    </div>
			    </div>
			    <div class="control-group">
				    <div class="controls">
					    <label class="checkbox">
					    <input type="checkbox"> Remember me
					    </label>
					    <button type="submit" class="btn">Login</button>
					    <a href=" <?php echo base_url() ?>users/register ">Register</a>
				    </div>
			    </div>
		    </form>
		</div>


		

<?php include 'footer.php'; ?>