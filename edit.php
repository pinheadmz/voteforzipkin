<?
	$PW = '59dcd687a2ce676d99e7624545efd5ed797dd2ec';
	$sponsors = file_get_contents('sponsors.txt');
	$endorsements = file_get_contents('endorsements.txt');
	
	/*
	$s = fopen("sponsors.txt", "r");
	$sponsors = fread($s, filesize("sponsors.txt"));
	fclose($s);
	
	$e = fopen("endorsements.txt", "r");
	$endorsements = fread($e, filesize("endorsements.txt"));
	fclose($e);
	*/
	
	if (!empty($_POST['password'])){
		$hash = hash('ripemd160', $_POST['password']);
		if ($hash == $PW){
			file_put_contents('sponsors.txt', $_POST['sponsors']);
			file_put_contents('endorsements.txt', $_POST['endorsements']);
			header("Location: edit.php");
		}	
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit VoteForZipkin.com</title>
</head>
<body>
<form action="edit.php" method="POST">
	<h1> SPONSORS: </H1>
	<textarea style="width:1000px;height:300px;" name="sponsors"><?= $sponsors ?></textarea>
	<br>
	<H1> ENDORSEMENTS: </H1>
	<textarea style="width:1000px;height:300px;" name="endorsements"><?= $endorsements ?></textarea>
	<br>
	Password: 
	<input type="password" name="password">
	<br>
	<input type="submit">
</form>
</body>
</html>