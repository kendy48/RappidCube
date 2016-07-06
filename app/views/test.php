<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
	<h1>My First Bootstrap Page</h1>
	<p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
	<h2>Vertical (basic) Form</h2>
	<form role="form">
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Enter email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" placeholder="Enter password">
		</div>
		<div class="checkbox">
			<label><input type="checkbox"> Remember me</label>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>

</body>
</html>

