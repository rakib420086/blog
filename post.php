<?php include "inc/header.php"; ?>
<?php
	$post = mysqli_real_escape_string($db->link, $_GET['postid']);
	if (!isset($post) || $post == NULL) {
		header("Location:404.php");
	}else{  
		$postid = $post;
	}

?>

<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<?php
				$query = "select * from tbl_post where id=$postid";
				$value = $db->select($query);
				if ($value) {
					while ($results = $value->fetch_assoc()) {
			?>
			<h2><?php echo $results['title']; ?></h2>
			<h4><?php echo $fm->formateDate($results['date']); ?>, By <a href="#"><?php echo $results['author']; ?></a></h4>
			<img src="admin/<?php echo $results['image']; ?>" alt="post image"/>
 			<p><?php echo $results['body']; ?></p>
			
			<div class="relatedpost clear">
				<h2>Related articles</h2>
				<?php
				$catid = $results['cat'];
				$queryrelated = "select * from tbl_post where cat='$catid' order by rand() limit 6";
				$relatedpost= $db->select($queryrelated);
				if ($relatedpost) {
					while ($rresult = $relatedpost->fetch_assoc()) {
				?>
				<a href="?postid=<?php echo $rresult['id']; ?>"><img src="admin/<?php echo $rresult['image']; ?>" alt="post image"/></a>
				<?php } } else{ echo"No Related Post Available !!";}?> 
			</div>
			<?php } } else{ header("Location:404.php"); }?> 
		</div>

	</div>

<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>