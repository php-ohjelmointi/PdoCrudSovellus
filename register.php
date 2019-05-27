<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="header">
  	<h2>Rekisteröinti</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Käyttäjätunnus</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Sähköposti</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Salasana</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Vahvista Salasana</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Rekisteröidy</button>
  	</div>
  	<p>
  		Oletjo jo jäsen? <a href="login.php">Kirjaudu</a>
  	</p>
  </form>
</body>
</html>