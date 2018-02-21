<!DOCTYPE html>
<html>

<head>
  <title>EIC Upload To carousel</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <link rel="shortcut icon" href="res/img/favicon.ico" type="image/x-icon">
  <link rel='stylesheet' type='text/css' href="res/css/bootstrap.min.css" />
  <script type="text/javascript" src="res/js/jquery.min.js"></script>
  <script type="text/javascript" src="res/js/bootstrap.min.js"></script>
</head>
<?php
	include 'phpserver.php';
	if(isset($_GET['res'])) { if($_GET['res'] == 'success') {
		?>
	<div class="container">
		<div class="alert alert-success">
			Image inseree avec <b>success</b>
		</div>
<?php }} ?>
  <form action="#" method="POST" enctype="multipart/form-data">
  <?php 
    $target_dir = "res/img/";
	$title = $descr = '';
	if(isset($_POST['submit'])) {
		$target_file = $target_dir . basename($_FILES["img"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if(isset($_POST["title"]) || !empty($_POST["title"]) || isset($_POST["descr"]) || !empty($_POST["descr"]) ) {
			$title = $_POST["title"];
			$descr = $_POST["descr"];
			if(!file_exists($target_file)) {
				if(strtolower($imageFileType) == "jpg" || strtolower($imageFileType) == "png" || strtolower($imageFileType) == "jpeg" || strtolower($imageFileType) == "gif") {
					if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
						$sqlSend = $conn->prepare("INSERT into images values(NULL,:tf,:title,:descr);");
						$sqlSend->execute(Array(
							":tf"=>$target_file,
							":title"=>$title,
							":descr"=>$descr
						));
						header('Location: upload.php?res=success');
					}
				}
			}
		}
	}
  ?>
    <div class="form-group">
       <label>Selectionez l'image:</label>
       <input type="file" class="form-control" name="img"/>
    </div>
    <div class="form-group">
      <label>Titre:</label>
      <input type="text" class="form-control" name="title" value='<?php echo $title;?>'>
    </div>
	<div class="form-group">
      <label>Description:</label>
      <input type="text" class="form-control" name="descr" value='<?php echo $descr;?>'>
    </div>
   <input type="submit" value="submit" style="width:100%" name="submit" class="btn btn-primary">
</form>
</div>