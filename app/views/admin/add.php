
<!--Error/success Message-->
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
<form role="form" action="<?php echo HOME.'admin/saveStudents/'; ?>" method="post">

<div>
	<label for="username">Username</label>
	<input  id="username" name="username" placeholder="UserName" required="" type="text">
</div>

<div>
	<label for="email">Email</label>
	<input  id="email" name="email" placeholder="Email" required="" type="email">
</div>

<div>
	<label for="name">Name</label>
	<input  id="name" name="name" placeholder="Name" required="" type="text">
</div>

<div>
	<label for="email">Gender</label>
	<div>
		<select name="gender">
			<option> Male </option>
			<option> Female </option>
		</select>
	</div
</div>

<div>
	<label for="additional_information">Additional Information</label>
	<textarea id="additional_information" name="additional_information" rows ="10" col="10">
	</textarea>
	
</div>

<div>
	<label for="email">Hobbies</label>
	<div>
		
		<label >Learn New Things</label>
		<input id="" name="hobbies[]" type="checkbox" value="Learn New things">
		
		<label >Reading</label>
		<input id="" name="hobbies[]" type="checkbox" value="Reading">
		
	</div>
</div>

<div>
	<label for="email">Test Score</label>
	<input  id="test_score" name="test_score" placeholder="Test Score" required="" type="text">
</div>



<div>
	<button type="submit" name="submit">Add</button>
</div>

</form>