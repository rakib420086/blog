<?php include "inc/header.php"; ?>
<?php 
	$page = mysqli_real_escape_string($db->link, $_GET['pageid']);
    if (!isset($page) || $page==NULL) {
        echo "<script>window.location='index.php'</script>";
    }else{
        $id =$page;
    }
?>

<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<?php 
        $query = "select * from tbl_page where id='$id'";
        $value = $db->select($query);
        if ($value) {
            while ($results = $value->fetch_assoc()) {
        ?>  
		
			<h2><?php echo $results['name'] ?></h2>
	
			<p><?php echo $results['body'] ?></p>
		<?php } } else{header("Location:404.php");} ?>
		</div>

	</div>
		
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>