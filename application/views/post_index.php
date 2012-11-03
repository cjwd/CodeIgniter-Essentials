<?php include('header.php') ?>

	

	<div class="container">
		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1>My First Blog</h1>
			<p>This is my journey through the CodeIgniter Essentials Tutsplus premium course.</p>
			<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
		</div>
		<!-- Example row of columns -->
		<div class="row">
			<div class="span8">
				<h1>Blog Posts</h1>
				<?php if (!isset($posts)): ?>
					<p>There are currently no active posts on my blog.</p>
				<?php else: ?>
					<?php foreach ($posts as $row): ?>
						<h2><a href="<?php echo base_url(); ?>posts/post/<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></h2>--<a href="<?php echo base_url() ?>posts/edit_post/<?php echo $row['post_id']?>">Edit Post</a> | <a href="<?php echo base_url()?>posts/delete_post/<?php echo $row['post_id']?>">Delete Post</a>
						<p><?php echo substr(strip_tags($row['post']),0,200) ."..." ?></p> 
						<p><a href="<?php echo base_url() ?>posts/post/<?php echo $row['post_id'] ?>">Read More</a></p>
					<?php endforeach ?>
				<?php endif ?>
				
			</div>

			<div class="span4">
				<?php include 'sidebar.php'; ?>
			</div>
			
		</div>


<?php include 'pagination.php'; ?>

<?php include('footer.php') ?>