<!DOCTYPE html>
<html lang="en">
<title>SDM</title>
<script
        crossorigin="anonymous"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        src="https://code.jquery.com/jquery-3.3.1.js">
</script>
<body>

<link href="/style.css" rel="stylesheet">
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
<link rel="icon" href="favicon.ico" type="image/x-icon" />

<style>
.container {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
  width: 100%;
}

input[type="file"] {
  font-size: 17px;
  color: #1f1f1f;
}

.button-wrap {
  position: relative;
}

.button {
  display: inline-block;
  padding: 12px 18px;
  cursor: pointer;
  border-radius: 5px;
  background-color: #8ebf42;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
}
</style>

<!-- Header -->
<header class="w3-container w3-light-blue w3-center" style="padding:128px 16px">
    <h1 class="w3-margin w3-jumbo">SDM</h1>
    <p class="w3-xlarge">Mask Detection Portal</p>
    <a class="w3-button w3-black w3-padding-large w3-large w3-margin-top" href="#content">See Results</a>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container" id="content">
    <div class="w3-content">
        <div class="w3-twothird">
            <h1>Results</h1>
<?php
  if (isset($_POST['url'])) {
    $cmd = escapeshellcmd("/home/zeyad/anaconda3/bin/python sdm.py " . $_POST['url']);
    $cmd_op = shell_exec($cmd);
    $exp_op = explode(';', $cmd_op);
    echo $exp_op[0];
    die();
  }
  $ext = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
  $accepted = ['png', 'jpg', 'jpeg', 'mp4', 'mov', 'webm'];
  if (!in_array($ext, $accepted)) die("<p style='color:red;'>Invalid file type... Please upload a PNG, JPG/JPEG, or MP4 file.</p>");
  rename($_FILES["fileToUpload"]["tmp_name"], $_FILES["fileToUpload"]["tmp_name"] . "." . $ext);
  $vidfile = $_FILES["fileToUpload"]["tmp_name"] . "." . $ext;
  $cmd = escapeshellcmd("/home/zeyad/anaconda3/bin/python sdm.py " . $vidfile);
  // $cmd = escapeshellcmd("python test.py");
  $cmd_op = shell_exec($cmd);
  $exp_op = explode(';', $cmd_op);
  $num_masks = floatval($exp_op[0]);
  $num_nomasks = floatval($exp_op[1]);
  $num_incormasks = floatval($exp_op[2]);
  $path = $exp_op[3];
  $img = $exp_op[4];
  $mask_score = round(($num_masks + 0.1 * $num_incormasks) / ($num_masks + $num_nomasks + $num_incormasks) * 100.0);
  echo "Mask Score: " . $mask_score . "/100 &nbsp;";
  if ($mask_score >= 99.99) echo "<p style='color:dark-green;'>Excellent</p>";
  else if ($mask_score >= 94.99) echo "<p style='color:green;'>Good</p>";
  else if ($mask_score >= 74.99) echo "<p style='color:orange;'>OK</p>";
  else echo "<p style='color:red;'>Poor</p>";
  echo "<h4>Annotated File</h4>";
  $filepath = $path . substr($vidfile, 4);
  if ($img[0] == 'i') echo "<img src='" . $filepath . "' style='width:950px;'><br />";
  // if ($ext == 'mp4') echo "<video controls autoplay style='width:950px;'><source src='" . $filepath . "' type='video/mp4'></video><br />";
  echo "<a href='" . $filepath . "' download>Download Annotated File</a>";
  if ($img[0] == 'v') echo "<h4>Plot of Mask Wearers</h4><img src='" . $exp_op[5] . "' style='width:950px;'><br />";
?>
<br /><a href="/sdm" class="w3-button w3-light-blue">Back</a>
<!--            <h5 class="w3-padding-32">Upload your image/video here for processing.</h5>
            <p class="w3-text-grey"></p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <p>Select media to upload:</p>
              <input type="file" name="fileToUpload" id="fileToUpload"><br /><br />
              <input type="submit" value="Process Media" name="submit" class="w3-button w3-light-blue">
              <p class="w3-text-grey">Submit a PNG, JPG/JPEG, MP4, or MOV</p>
              <p class="w3-text-grey">Be wary of submitting sensitive content to this portal. We attempt to make your data as secure as possible.</p>
            </form>-->
        </div>

        <div class="w3-third w3-center">
            <img src="" style="width:90%;">
        </div>
    </div>
</div>

<!--
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-third w3-center">
            <i class="fa fa-coffee w3-padding-64 w3-hover-text-lime w3-margin-right"></i>
        </div>
        <div class="w3-twothird">
            <h1>Lorem Ipsum</h1>
            <h5 class="w3-padding-32">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</h5>
            <p class="w3-text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</div>
<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>-->

<div id="footer"></div>

</body>
</html>
