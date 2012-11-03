<?php include('header.php') ?>

		<div class="container">
		<h1>Chinara&rsquo;s Blog</h1>
		<!-- Output the blog posts -->
		<div class="row">
			<div class="span8">
				<?php if (!isset($post)): ?>
					<p>This page was access incorrectly.</p>
				<?php else: ?>
					<h2><?php echo $post['title']; ?></h2>
					<p> <?php echo $post['post']; ?></p>
				<?php endif ?>
				
			</div>
			
		</div>

<?php include('footer.php') ?>