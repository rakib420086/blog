</div>
<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	<?php 
      	$query = "select * from tbl_copyright";
        $select = $db->select($query);
        if ($select) {
            while ($result = $select->fetch_assoc()) { 
    ?>
	  <p><?php echo $result['copyright']; ?> <?php echo date('Y'); ?></p>
	<?php } } ?>
	</div>
	<div class="fixedicon clear">
		<?php 
            $query = "select * from tbl_social";
            $select = $db->select($query);
            if ($select) {
                while ($result = $select->fetch_assoc()) { 
        ?>   
		<a href="<?php echo $result['fb']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['tw']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['ln']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['gp']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php } } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>