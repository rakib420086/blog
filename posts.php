

<?php include "inc/header.php"; ?>
<?php
	$posts = mysqli_real_escape_string($db->link, $_GET['catagoryid']);
	if (!isset($posts) || $posts == NULL) {
		header("Location:404.php");
	}else{  
		$catagoryid = $posts;
	}

?>




<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<?php
				$query = "select * from tbl_post where cat=$catagoryid";
				$value = $db->select($query);
				if ($value) {
					while ($result = $value->fetch_assoc()) {
			?>
		<div class="samepost clear">
			<h2><a href="post.php?postid=<?php echo $result['id']; ?>" ><?php echo $result['title']; ?></a></h2>

			<h4><?php echo $fm->formateDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
			 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>

			<?php echo $fm->textShorten($result['body']); ?>

			<div class="readmore clear">
  				<a href="post.php?postid=<?php echo $result['id']; ?>" >Read More</a>
			</div>
		</div>
		<?php } } else{ ?> 
			<h3>The Catagory Related Post Not Available!</h3>
		<?php } ?> 
	</div>

<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>
	

	