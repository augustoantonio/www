<h2 class="sub-header">/application/views/duties/delete.phtml</h2>
<form method="post" enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="id" value="<?=isset($usuario['iduser'])?$_GET['id']:'-';?>"/>
</li>
<li>
Username: <?=isset($usuario['username'])?$usuario['username']:'';?>
</li>


<li>
Si: <input type="submit" name="borrar" value="Si"/>
</li>
<li>
No: <input type="submit" name="borrar" value="No"/>
</li>


</ul>
</form>