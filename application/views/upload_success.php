<?php include 'header.php'; ?>
	<div class="container">
		<h2>You file was successfully uploaded!</h2>
		<ul>
			<?php foreach ($upload_data as $key => $value): ?>
				<li> <?php echo $key ?>: <?php echo $value ?> </li>
			<?php endforeach ?>
		</ul>

		<p>
			<a href="<?php echo base_url(); ?>upload" class="btn">Upload Another</a>
		</p>
	</div>
<?php include 'footer.php'; ?>