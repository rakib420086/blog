<?php include "config/config.php"; ?>
<?php include "lib/Database.php"; ?>
<?php include "helpers/helper.php"; ?>
<?php
	$db = new Database();
	$fm = new Format();
?>
   <!DOCTYPE html>
<html>
<head>
	<?php 
	if(isset($_GET['pageid'])){
	    $pagetitleid =$_GET['pageid'];
		$query = "select * from tbl_page where id='$pagetitleid'";
	    $pages = $db->select($query);
	    if ($pages) {
	        while ($result = $pages->fetch_assoc()) { ?>

	<title><?php echo $result['name'] ?>-<?php echo TITLE; ?></title>

	<?php } } } elseif (isset($_GET['postid'])){
	    $postid =$_GET['postid'];
		$query = "select * from tbl_post where id='$postid'";
	    $posts = $db->select($query);
	    if ($posts) {
	        while ($results = $posts->fetch_assoc()) {
	?>

	<title><?php echo $results['title']; ?>-<?php echo TITLE; ?></title> 

	<?php  } } }else{ ?>

	<title><?php echo $fm->title(); ?>-<?php echo TITLE; ?></title>
	<?php } ?> 


	<?php include "script/meta.php"; ?>
	<?php include "script/css.php"; ?>
	<?php include "script/script.php"; ?>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<?php 
                $query = "select * from title_slogan";
                $select = $db->select($query);
                if ($select) {
                    while ($result = $select->fetch_assoc()) { 
                ?> 
			<div class="logo">
				<img src="admin/<?php echo $result['logo']; ?>" alt="Logo"/>
				<h2><?php echo $result['title']; ?></h2>
				<p><?php echo $result['slogan']; ?></p>
			</div>
			<?php } } ?>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php 
                    $query = "select * from tbl_social";
                    $select = $db->select($query);
                    if ($select) {
                        while ($result = $select->fetch_assoc()) { 
                ?>   
				<a href="<?php echo $result['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['ln']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gp']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php } } ?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<?php
		$path = $_SERVER['SCRIPT_FILENAME'];
	  	$currentpage = basename($path,'.php');
		?>
		<li><a  
			<?php 
				if ($currentpage == 'index') {
					echo 'id="active"'; 
				}
			?>
			href="index.php">Home</a></li>
		
		<?php //ai tuku holo tbl_page er data select er junno 
        $query = "select * from tbl_page";
        $value = $db->select($query);
        if ($value) {
            while ($results = $value->fetch_assoc()) {
        ?>  

		<li><a 
			<?php 
			if (isset($_GET['pageid']) && $_GET['pageid'] == $results['id']) {
				echo 'id="active"';
			}
			?>
			href="page.php?pageid=<?php echo $results['id']; ?>"><?php echo $results['name']; ?></a></li>	
		<?php } } ?>
		
		<li><a 
			<?php 
				if ($currentpage == 'contact') {
					echo 'id="active"'; 
				}
			?>
			href="contact.php">Contact</a></li>
	</ul>
</div>
