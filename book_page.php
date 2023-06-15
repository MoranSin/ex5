<?php include 'db.php'; ?>
<?php 
	$bookId = $_GET["book_id"];
	$query 	= "SELECT * FROM tbl_61_books where book_id=". $bookId;
	$result = mysqli_query($connection, $query);
	if($result) {
	$row = mysqli_fetch_assoc($result);
	}
	else die("DB query failed.");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">  
		<title>
            <?php echo $row["book_name"] . " Page"; ?>
        </title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>		<!-- <link href="includes/style.css" rel="stylesheet"> -->
	</head>
	<body>
		<div class="container">
			
			<section id="cat"></section>
			<section id="bookPrice"></section>
			<script src="js/getcat.js"></script>
			<?php 
		// echo '<h3>Category ' . $row["cat_id"] .'</h3>';
		echo '<h1>' . $row["book_name"] .'</h1>';
        echo '<section> Author:' . $row["book_author"] . '</section>';
        echo '<p>' . $row["book_desc"] . '</p>';
		$img = $row["book_bg"];
		echo '<img src="' . $img . '">';
		?> 
		

	
		<?php mysqli_free_result($result); ?>
	    </div>
	</body>
</html>
<?php mysqli_close($connection); ?>