<?php error_reporting(0); ?>
<?php include "inc/header.php"; ?>
<?php 
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$firstname = $fm->validation($_POST['firstname']);
				$lastname = $fm->validation($_POST['lastname']);
				$email = $fm->validation($_POST['email']);
				$body = $fm->validation($_POST['body']);

				$firstname = mysqli_real_escape_string($db->link, $firstname);
				$lastname = mysqli_real_escape_string($db->link, $lastname);
				$email = mysqli_real_escape_string($db->link, $email);
				$body = mysqli_real_escape_string($db->link, $body);

				
                if (empty($firstname)) {
                   $errorfirstname = "First name  must not be empty !";
               }if (empty($lastname)) {
                   $errolastname = "Second name must not be empty !";
               }if (empty($email)) {
                   $erroremail = "Email must not be empty !";
               }if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   $errorfil = "Invalid Email Address !";
                }if (empty($body)) {
                   $errorbody = "Body must not be empty !";
                }
                if (!empty($body) && !empty($lastname) && !empty($email) && !empty($body) && !$errorfil){
                	$query = "INSERT INTO  tbl_contact (firstname,lastname,email,body) VALUES ('$firstname','$lastname','$email','$body')";
                        
                    $catinsert = $db->insert($query);
                        
                    if ($catinsert) {
                        $msg = "Message Sent Successfuly !";
                    }else{
                        $error = "Message Not Sent !";
                    }
                }
            
        }
?>
<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<h2>Contact us</h2>
<style type="">
	.error{color: red; float: left;}
</style>			
			<?php 
			
				if (isset($error)) {
					echo "<span style='color:red'>$error</span>";
				}
				elseif (isset($msg)) {
					echo "<span style='color:green'>$msg</span>";
				}
				
			?>
			
				<form action="" method="post">
					<table>
						<tr>
							<td>Your First Name:</td>
							
							<td>
							<?php
							if (isset($errorfirstname)) {
								echo "<span class='error'>$errorfirstname</span>";
							}
							?>
							<input type="text" name="firstname" placeholder="Enter first name" />
							</td>
						</tr>
						<tr>
							<td>Your Last Name:</td>
							
							<td>
							<?php
							if (isset($errolastname)) {
								echo "<span class='error'>$errolastname</span>";
							}
							?>
							<input type="text" name="lastname" placeholder="Enter Last name" />
							</td>
						</tr>
						
						<tr>
							<td>Your Email Address:</td>
							
							<td>
							<?php
							if (isset($erroremail)) {
								echo "<span class='error'>$erroremail</span>";
							}elseif(isset($errorfil)){
								echo "<span class='error'>Invalid Email Address !</span>";
							}
							?>
							<br>
							<input type="text" name="email" placeholder="Enter Email Address" />
							</td>
						</tr>
						<tr>
							<td>Your Message:</td>
							
							<td>
							<?php
							if (isset($errorbody)) {
								echo "<span class='error'>$errorbody</span>";
							}
							?>
							<br>
							<textarea name="body"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<input type="submit" name="submit" value="Submit"/>
							</td>
						</tr>
				</table>
			</form>				
	 	</div>
	</div>

<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>
