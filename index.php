<?php
include 'db.php';
$query 	= "SELECT * FROM tbl_61_books order by book_name";
$result = mysqli_query($connection, $query);
if(!$result) {
    die("DB query failed.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>5th Practice</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>	
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <h1>Moran's Favorite Books & Novels</h1>
</header>
<main id="wrapper">
    <?php
    while($row = mysqli_fetch_assoc($result)) {
			$img = $row["book_img"];
			echo '<div class="col-sm-3">';
			echo    '<div class="card">';
			echo 		'<img src="' . $img . '" class="card-img-top">';
			echo 		'<div class="card-body">';
			echo   		'<h5 class="card-title">' . $row["book_name"] . '</h5>';
			echo    	'<a href="book_page.php?book_id=' . $row["book_id"] . '" class="btn btn-primary">See book details</a>';
			echo '</div></div></div>';
		}
        ?>

<?php mysqli_free_result($result);?>


</main>
</body>
</html>
<?php mysqli_close($connection); ?>

