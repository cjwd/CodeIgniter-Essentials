<?php include('header.php') ?>

	

	<div class="container">
		<?php if ($success==1): ?>
			<div class="alert alert-success">
				<a class="close" data-dismiss="alert">&times;</a>
				<strong>Success!</strong> This post has been updated!
			</div>
		<?php endif ?>
		
		<!-- Example row of columns -->
		<div class="row">
			<div class="span8">
				<h2>Edit Post</h2>
				<form action="<?php echo base_url() ?>posts/edit_post/<?php echo $post['post_id']?>" method="post">
					<p>Title:<br><input type="text" name="title" value="<?php echo $post['title'] ?>"></p>
					<p>Description:<br> <textarea name="post"><?php echo $post['post'] ?></textarea></p>
					<p><input type="submit" value="Edit Post" class="btn btn-primary btn-large"></p>
				</form>
			</div>
			
		</div>

<?php include('footer.php') ?>