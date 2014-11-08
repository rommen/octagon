<html>
<head> <title>Form received</title>
<?php include "header.php";?>

<style>
	tr > td:first-child {
		font-weight:bold;
	}
	div {
		width: 300px;
		margin:10px;
	}
</style>
<head>
<body>
	<div>
		<table class="table table-responsive table-striped">
			<?php
			foreach ($_POST as $key => $value){
				echo '<tr>';
				echo '<td>'. htmlspecialchars($key) .'</td>';
				echo '<td>'. htmlspecialchars($value) .'</td>';
				echo '</tr>';
			}
			?>
		</table>
	</div>

</body>

</html>
