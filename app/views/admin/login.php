
<!--Error Message-->
<?php
	if (isset($data['message']))
	{?>
	<ul>
		<?php
		foreach($data['message'] as $message)
		{?>
			<li> <?php echo $message; ?> </li>
		<?php } ?>
	</ul>

	<?php } ?>

<form role="form" action="" method="post" autocomplete="off">

<div>
	<label for="username">Email</label>
	<input class="form-control" id="username" name="username" placeholder="Email" required="" type="email">
</div>

<div>
	<label for="password" >Password</label>
	<input class="form-control" id="password" name="password" placeholder="Password" required="" type="password">
</div>

<div>
	<button type="submit" name="submit">Login</button>
</div>

</form>
