 <?php ?>
<h2> /application/views/users/insert_duties.php</h2>
<form method="post" enctype="multipart/form-data">
	
	<LABEL>introduce el nombre para la nueva tarea</LABEL>
	<ul>
		<li>
			Id: <input type="hidden" name="idduty" value="<?=$_GET['id']?>"/>
		</li>
	
		<li>
			<input type="text" name="duty" value=""/>
		</li>

		
		<li>
			Submit: <input type="submit" name="submit"/>
		</li>
		<li>
			Reset: <input type="reset" name="reset"/>
		</li>
	</ul>
</form>