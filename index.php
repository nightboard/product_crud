<?php include_once "database_schema.php" ?>
<?php include_once "get_data.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<style type="text/css">
		.table td,th {
			text-align: center;
		}
	</style>
</head>
<body>
	<?php include_once "navbar.php" ?>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Title</th>
	      <th scope="col">Price</th>
	      <th scope="col">Create Date</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach ($products as $i => $product): ?>
	    	<tr>
		      <th scope="row"><?php echo $i + 1 ?></th>
		      <td><?php echo $product['title'] ?></td>
		      <td><?php echo $product['price'] ?></td>
		      <td><?php echo $product['date_created'] ?></td>
		      <td>
		      	<a href="update_data.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-primary mx-2">Edit</a>
		      	<form action="delete_data.php" method="POST" style="display: inline-block;">
		      		<input type="hidden" name="id" value="<?php echo $product['id'] ?>">
		      		<button type="submit" class="btn btn-sm btn-danger mx-2">Delete</button>
		      	</form>
		      </td>
		    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</body>
</html>