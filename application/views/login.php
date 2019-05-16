<!DOCTYPE html>
<html>
<head>
	<title>Webslesson | <?php echo $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
	<div class="container">
		<br /><br /><br />
		<form method="post" action="<?php echo base_url(); ?>main/login_validation">
			<div class="form-group">
				<label>Enter Username</label>
				<input type="text" name="username" class="form-control" />
				<span class="text-danger"><?php echo form_error('username'); ?></span>			
			</div>
			<div class="form-group">
				<label>Enter Password</label>
				<input type="password" name="password" class="form-control" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
				
			</div>
			<div class="form-group">
				<input type="submit" name="insert" value="Login" class="btn btn-info" />
				<?php
					echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';
				?>
			</div>
		</form>
	</div>
</body>
</html>





































<!--<!DOCTYPE html>
<html>
<head>
	<title>Webslesson | <?php echo $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
	<div class="container">
		<br /><br /><br />
		<h3 align="center"><?php echo $title; ?></h3>
		<form method="post" action="<?php echo base_url(); ?>main/login_validation">
			
			<div class="form-group">
				<label>Enter Username</label>
				<input type="text" name="username" class="form-control" />
				<span class="text-danger"><?php echo form_error("username"); ?></span>
			</div>
			<div class="form-group">
				<label>Enter Password</label>
				<input type="password" name="password" class="form-control" />
				<span class="text-danger"><?php echo form_error("password"); ?></span>
			</div>
			<div class="form-group">
				<input type="submit" name="insert" value="Login" class="btn btn-info" />
				<?php
					echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';
				?>
			</div>
		</form>
	</div>
</body>
</html>!-->