<form id="sell_form" action="/sell.php" method="POST" enctype="multipart/form-data">
	<select name="category">
		<option value="0" selected="selected">Select Category</option>
		<option value="1">Books</option>
		<option value="2">Clothing</option>
		<option value="3">Electronics</option>
		<option value="4">Furniture</option>
		<option value="5">Sports</option>
		<option value="6">Vehicle</option>
		<option value="7">Others</option>
	<br>
	<input name="title" placeholder="Item Title (Min. char)" type="text">
	<br>
	<textarea name="desc" type="text" placeholder="Item description (Max. 200 char)"></textarea>
	<br>
	<input name="college" placeholder="College" type="text"><br>
	<textarea name="info" type="text" placeholder="Contact info (Min. 4 char)"></textarea>
	<br>
	<input name="radio" value="1" type="radio" onclick = "document.getElementById('price').style.visibility='hidden' ;">
	I want to Donate
	<input name="radio" value="0" checked="checked" type="radio" onclick = "document.getElementById('price').style.visibility='visible' ;">
	I want to Sell
	<br>
	<input name="price" id="price" placeholder="Your Price (In Rs.)" type="text">
	<br>
	Select image to upload:
    	<input type="file" name="fileToUpload" id="fileToUpload"><br>
	<button type="submit" form="sell_form">Submit</button>
</form>

