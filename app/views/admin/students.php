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


<table>

<tr>
<th> Name </th>
<th> UserName </th>
<th> Email </th>
<th> Actions </th>

</tr>

<?php 
foreach ($data as $students){
?>
<tr>
	<td> <?php echo $students['name']; ?> </td>
	<td> <?php echo $students['username']; ?> </td>
	<td> <?php echo $students['email']; ?> </td>
	<td> <a href="<?php echo HOME.'admin/editStudents/'.$students['id']; ?>"> Edit </a> 
	 <a href="<?php echo HOME.'admin/deleteStudents/'.$students['id']; ?>"> Delete </a> </td>
</tr>
<?php } ?>

</table>