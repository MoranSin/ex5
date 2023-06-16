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
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
		<!-- <link rel="stylesheet" href="css/style.css"> -->
		<script src="js/getbookcat.js"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
	<br>
	<br>
		<div class="container">
			<?php 
		echo '<h1>' . $row["book_name"] .'</h1>';
        echo '<h2> Author:' . $row["book_author"] . '</h2>';
        echo '<p>' . $row["book_desc"] . '</p>';
		$img = $row["book_bg"];
		$categoryId = $row["cat_id"];
		echo '<div id="dataServices"></div>';
		echo '<br>';
		echo '<img src="' . $img . '"class="container">';
		?> 
		'<div class="hiddenDiv" id="categoryVal" data-value="<?php echo $categoryId; ?>"></div>
	
	</div>
	<?php mysqli_free_result($result); ?>
	</body>
</html>
<?php mysqli_close($connection); ?>