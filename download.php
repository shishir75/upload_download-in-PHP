<?php
	$db = mysqli_connect("localhost","root","", "up_down");

	$query=mysqli_query($db, "select * from upload");
	$rowcount=mysqli_num_rows($query);
?>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>File Name</td>
			<td>Download</td>
		</tr>
		<?php
			for($i=1;$i<=$rowcount;$i++)
			{
				$row=mysqli_fetch_array($query);

			?>
			<tr>
				<td><?php echo $row["id"] ?></td>
				<td><?php echo $row["file"]?></td>
				<td><a href="upload/<?php echo $row["file"] ?>" target=_blank>Download Now</a></td>
			</tr>

			<?php
			}

		?>
	</table>