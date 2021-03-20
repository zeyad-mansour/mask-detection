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
    <a class="w3-button w3-black w3-padding-large w3-large w3-margin-top" href="#content">See More</a>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container" id="content">
    <div class="w3-content">
        <div class="w3-twothird">
            <h1>File Upload</h1>
            <h5 class="w3-padding-32">Upload your image/video here for processing.</h5>
            <p class="w3-text-grey"></p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <p>Select media to upload:</p>
              <input type="file" name="fileToUpload" id="fileToUpload"><br /><br />
              <input type="submit" value="Process Media" name="submit" class="w3-button w3-light-blue">
              <p class="w3-text-grey">Submit a PNG, JPG/JPEG, MP4, or MOV</p>
              <p class="w3-text-grey">Be wary of submitting sensitive content to this portal. We attempt to make your data as secure as possible.</p>
            </form>
        </div>

        <div class="w3-third w3-center">
            <img src="" style="width:90%;">
        </div>
    </div>
</div>
<div class="w3-row-padding w3-padding-64 w3-container" id="content">
    <div class="w3-content">
        <div class="w3-twothird">
            <h1>HTTP Stream</h1>
            <h5 class="w3-padding-32">Enter an HTTP stream URL here.</h5>
            <p class="w3-text-grey"></p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <label for="url">Enter URL:</label>
              <input type="text" name="url" id="url"><br /><br />
              <input type="submit" value="Process Stream" name="submit" class="w3-button w3-light-blue">
              <p class="w3-text-grey">Submit a URL to an HTTP stream</p>
              <p class="w3-text-grey">Be wary of submitting sensitive content to this portal. We attempt to make your data as secure as possible.</p>
            </form>
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
