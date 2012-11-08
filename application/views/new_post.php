<?php include('header.php') ?>

	

	<div class="container">
		<h1>Add a New Post</h1>
		<!-- Example row of columns -->
		<div class="row">
			<div class="span8">
				<!-- Add New Post Form -->
				<form action="<?php echo base_url() ?>posts/new_post" method="post">
					<p>Title:<br><input type="text" name="title"></p>
					<p>Description:<br> <textarea name="post"></textarea></p>
					<p><input type="submit" value="Add Post" class="btn btn-primary btn-large"></p>
				</form>
			</div>
			
		</div>
	</div>

	  	
<?php include('footer.php') ?>