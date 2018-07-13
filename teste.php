<?php 
  $folder = 'imagem/';
  $orig_w = 500;

  if( isset($_POST['submit']) ){
    $imageFile = $_FILES['image']['tpm_name'];
    $filename = basename( $_FILES['image']['name']);

    list ($width, $height) = getimagesize($imageFile);

    $src = imagecreatefromjpeg($imageFile);
    $orig_h = ($height/$width)* $orig_w;

    $tpm = imagecreatetruecolor($orig_w, $orig_h);

    imagecopyresampled($tpm, $src, 0,0,0,0,$orig_w,$orig_h,$width,$height);
    imagejpeg($tpm, $folder.$filename,100);

    imagedestroy($tpm);
    imagedestroy($src);

    $filename = urlencode($filename);
    header("Location:crop.php");

  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crotar Imagem</title>
  </head>
  <body>
    <h1>Upload Imagem</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <p><label for="image">Imagem:</label> </p>
      <input type="file" name="image" id="image" /><br />
      <p>
        <input type="submit" name="submit" value="Upload Imagem!" /> 
      </p>
    </form>
  </body>
</html>
