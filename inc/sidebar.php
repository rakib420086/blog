<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
				<?php
					$query = "select * from tbl_catagory";
					$value = $db->select($query);
					if ($value) {
						while ($results = $value->fetch_assoc()) {
				?>
					<ul>
						<li><a href="posts.php?catagoryid=<?php echo $results['id']; ?>"><?php echo $results['name'];?></a></li>
					<?php } } else{ ?>	
					<li>No Category Found </li>
					<?php  } ?>				
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php
					$query = "select * from tbl_post limit 5";
					$value = $db->select($query);
					if ($value) {
						while ($result = $value->fetch_assoc()) {
				?>
					<div class="popular clear">
						<h3><a href="post.php?postid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
						<a href="post.php?postid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>

						<?php echo $fm->textShorten($result['body'], 120); ?>
			
					</div>
					<?php } } else{header("Location:404.php"); }?> 
			</div>
			
		</div>