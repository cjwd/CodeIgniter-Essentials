    <ul class="nav nav-pills nav-stacked">
    	
    	<?php if ($this->session->userdata('user_id')): ?>
    		<li>Welcome, <?php echo $this->session->userdata('username') ?> </li>
    		<li>Access Level: <?php echo $this->session->userdata('user_type') ?></li>
    		<li><a href=" <?php echo base_url() ?>users/logout ">Logout</a></li>
    	<?php else: ?>
    		<li><a href=" <?php echo base_url() ?>users/login ">Login</a></li>
    	<?php endif ?>
    	<li><a href="<?php echo base_url()?>posts/new_post">Add New Post</a></li>
    </ul>