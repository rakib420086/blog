	<meta name="language" content="English">
	<?php
		if (isset($_GET['postid'])) {
			$keywordid = $_GET['postid'];
			$query = "select * from tbl_post where id='$keywordid'";
			$keywords = $db->select($query);
			if ($keywords) {
				while ($result = $keywords->fetch_assoc()) {
	?>
	<meta name="description" content="<?php echo $result['description']; ?>">
	<meta name="keywords" content="<?php echo $result['tags']; ?>">
	<?php } } } else{ ?>
	<meta name="keywords" content="<?php echo KEYWORDS; ?>">
	<meta name="keywords" content="<?php echo DESCRIPTION; ?>">
	<?php } ?>
	<meta name="author" content="Delowar">