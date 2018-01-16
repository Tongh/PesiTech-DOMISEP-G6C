<form action ="../item/add" method="post">
	<input type="text" value="I have to..." onclick="this.value=''" name="value">
	<input type="submit" name="Ajouter">
</form>

<br/><br/>

<?php 
	$number = 0;

	$a1 = "../../item/view/" . $todoitem['Item']['id'] . "/" . strtolower(str_replace(' ', '-', $todoitem['item']['item_name']));
	$a2 = "../item/delete/" . $todoitem['Item']['id'];
	?>

<?php foreach ($todo as $todoitem):?>
	<a class="big" href=<?php echo $a1 ?>>
		<span class="item">
			<?php echo ++$number ?>
			<?php echo $todoitem['item']['item_name'] ?>
		</span>
	</a>
	----
	<a class="big" href=<?php echo $a2 ?>>Supprimer</a>
<br/>
<?php endforeach?>