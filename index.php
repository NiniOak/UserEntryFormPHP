
		<?php include 'header.php'; ?>
		<?php include 'admin.php'; ?>


        <!-- Sign up page -->
		<span class="display_error"><?php echo $display;?></span>

        <!-- Display error message -->
		<form method="post" action="index.php">
			<input type="hidden" name="signuppage" value="signuppage">
			<table class="left">
				<tr>
					<th colspan="2">Sign Up</th>
				</tr>
				<tr>
					<td>Email </td>
					<td><input name="email" type="email" required/></td>
				</tr>
				<tr>
					<td>Password </td>
					<td><input name="password" type="password" required/></td>
				</tr>

				<tr>
					<td>First Name: </td>
					<td><input name="FirstName" type="text" required/></td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td><input name="LastName" type="text" required/></td>
				</tr>
				<tr>
					<td> </td>
					<td><input name="submit" type="submit" value="enter" class="right"/></td>
				</tr>
			</table>
		</form>

        <!-- Login -->
		<form method="post" action="home.php">
			<input type="hidden" name="login" value="login">
			<table class="right">
				<tr>
					<th colspan="2">Login</th>
				</tr>
				<tr>
					<td>Email </td>
					<td><input name="email" type="email" required/></td>
				</tr>
				<tr>
					<td>Password </td>
					<td><input name="password" type="password" required/></td>
				</tr>
				<tr>
					<td> </td>
					<td><input name="submit" type="submit" value="login" class="right"/></td>
				</tr>
			</table>
		</form>

<?php include_once ('footer.php'); exit; ?>

