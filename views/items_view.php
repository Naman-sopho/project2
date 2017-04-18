<?php
//Displays list of currently available items for sale
//and also a category or college search
?>

<?php if (isset($items)): ?>
<h4>Select a Category or College to filter products</h4>
<form id="items" action="items.php" method="POST">
	<select name="category">
		<option value="0" selected="selected">Select Category</option>
		<option value="1">Books</option>
		<option value="2">Clothing</option>
		<option value="3">Electronics</option>
		<option value="4">Furniture</option>
		<option value="5">Sports</option>
		<option value="6">Vehicle</option>
		<option value="7">Others</option>
	</select>
	<select name="college">
		<option value="0" select="selected">Select College</option>
		<?php while($college = mysqli_fetch_assoc($colleges)): ?>
			<option value="<?=$college["college"]?>"><?=$college["college"]?></option>
		<?php endwhile; ?>
	</select>
		<button type="submit" form="items">Submit</button>
</form>
<?php endif; ?>
<table style="padding:20px">
	<thead>
		<tr>
			<th>Image</th>
			<th>Title</th>
			<th>Price</th>
			<th>College</th>
			<th>Category</th>
			<th>Date Posted</th>
			<th>Contact Seller</th>
		</tr>
	</thead>

	<tbody>
		<?php while($item = mysqli_fetch_assoc($result)): ?>
		<tr>
			<td><img src="img/uploads/<?=$item["image"]?>" height=60px width=60px onerror="this.src='img/noimage.jpg';"></td>
			<td><?=$item["name"]?></td>
			<td><?php if (!empty($item["price"])): ?>
					<?=$item["price"]?>
				  <?php else: ?>
					<?php echo"On Donation"; ?>
				  <?php endif; ?>	
			</td>
			<td><?=$item["college"]?></td>
			<td><?php switch($item["category"]){
					case 1: echo "Books"; break;
					case 2: echo "Clothing"; break;
					case 3: echo "Electronics"; break;
					case 4: echo "Furniture"; break;
					case 5: echo "Sports"; break;
					case 6: echo "Vehicle"; break;
					case 7: echo "Others"; break;
				}?>
			<td><?=$item["date"]?></td>
			<?php if (!empty($_SESSION["id"]) && $_SESSION["id"] == $item["user_id"]):?>
					<td><?=$item["contact"]?> (Your Ad)</td>
			<?php elseif(!isset($contact)): ?>
				<td><a href="contact_seller.php?ad_id=<?=$item["ad_id"]?>">Contact Seller</a></td>
			<?php else: ?>
				<td><?=$item["contact"]?></td>
			<?php endif; ?>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
