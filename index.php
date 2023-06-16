<?php
include 'db.php';
if (isset($_GET['categoryId'])) {
    $category = $_GET["categoryId"];
    $query = "SELECT * FROM tbl_61_books where cat_id=" . $category;
}else{
    $query 	= "SELECT * FROM tbl_61_books";
}
$result = mysqli_query($connection, $query);
if(!$result) {
    die("DB query failed.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5th Assignment</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/getcat.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <div class="nav1">
            <div id="dataServices"></div>
        </div>
        <h3>Moran Sinai</h3>
</nav>
<main>
<?php
    while($row = mysqli_fetch_assoc($result)) {
			$img = $row["book_img"];
            echo '<div class="col" data-category="'.$row["cat_id"].'">';
            echo '<div class="books">';
            echo '<div>';
			echo 		'<img src="' . $img . '" class="book-img">';
            echo '</div>';
			echo    '<div class="descp">';
			echo   		'<h2 class="book-name">' . $row["book_name"] . '</h2>';
			echo    	'<a href="book_page.php?book_id=' . $row["book_id"] . '">See book details</a>';
			echo '</div></div></div>';

		}
        ?>


<?php mysqli_free_result($result);?>
</main>

</body>

</html>
<?php mysqli_close($connection); ?>
