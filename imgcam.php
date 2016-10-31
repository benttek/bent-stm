<!DOCTYPE html>
 
<html>
 
 
 
 
<head>
 
 
 
 
 
    <title>MyCheck-in Pic</title>
 
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY Check In</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider css -->
    <link href="css/skdslider.css" rel="stylesheet">
    <!-- Font awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- Main style css -->
    <link rel="stylesheet" href="style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>     
   <script type="text/javascript" src="assets/js/filestyle/src/bootstrap-filestyle.min.js"> </script>
<style>
.row{
  margin-top: 30px;
  margin-bottom: 30px
}
</style>
 
 
    <script type="text/javascript">
	
	$(":file").filestyle();
 
      function fileSelected() {
 
        var count = document.getElementById('fileToUpload').files.length;
 
              document.getElementById('details').innerHTML = "";
 
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById('fileToUpload').files[index];
 
                     var fileSize = 0;
 
                     if (file.size > 1024 * 1024)
 
                            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
 
                     else
 
                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
 
                     document.getElementById('details').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;
 
                     document.getElementById('details').innerHTML += '<p>';
 
              }
 
      }
 
      function uploadFile() {
 
        var fd = new FormData();
 
              var count = document.getElementById('fileToUpload').files.length;
 
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById('fileToUpload').files[index];
 
                     fd.append('myFile', file);
 
              }
 
        var xhr = new XMLHttpRequest();
 
        xhr.upload.addEventListener("progress", uploadProgress, false);
 
        xhr.addEventListener("load", uploadComplete, false);
 
        xhr.addEventListener("error", uploadFailed, false);
 
        xhr.addEventListener("abort", uploadCanceled, false);
 
        xhr.open("POST", "savetofile.php");
 
        xhr.send(fd);
 
      }
 
      function uploadProgress(evt) {
 
        if (evt.lengthComputable) {
 
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
 
          document.getElementById('progress').innerHTML = percentComplete.toString() + '%';
 
        }
 
        else {
 
          document.getElementById('progress').innerHTML = 'unable to compute';
 
        }
 
      }
 
      function uploadComplete(evt) {
 
        /* This event is raised when the server send back a response */
 
        alert(evt.target.responseText);
 
      }
 
      function uploadFailed(evt) {
 
        alert("There was an error attempting to upload the file.");
 
      }
 
      function uploadCanceled(evt) {
 
        alert("The upload has been canceled by the user or the browser dropped the connection.");
 
      }
 
    </script>
 
</head>
 
<body style="background-color:black;">


  <section id="featuresSection">
    <div class="container">
      
        <div class="col-lg-12 col-md-12">
          <div class="features_area">
           

		   <span><?php echo $uname;?></span>
					<span></span>
                    
                    
            </div>
            <div class="features_responsive">
              

				<div class="col-md-12">
                  
				<form id="form1" enctype="multipart/form-data" method="post" action="Upload.aspx">
 
					<div>
				 
					  <label for="fileToUpload" style="color:white;">Take photo</label><br />
				 
					<input type="file" class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Your label here.">

					 <input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();" accept="image/*" capture="camera" style="btn btn-lg btn-round btn-primary" value="take photo"/>
				 
					</div>
				 
					<div id="details"></div>
						<br><br>
					<div>
				 
					  <input type="button" class="btn btn-info" onclick="uploadFile()" value="Upload" />
				 
					</div>
				 
					<div id="progress"></div>
				 
				</form>
                  
				  <a href="udash.php?u=<?php echo $user;?>" style="height:50px;width:250px; ; border: 6px; padding: 5px;">                   
				   <h2>Continue</h2>

					</a>
				  
                </div>
				
				
		
              
            </div>
           </div>
      
      </div>
    </div>  
 </section>

 
</body>
 
</html>