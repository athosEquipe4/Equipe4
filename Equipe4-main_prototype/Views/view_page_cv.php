<?php 
$title = "CV";
$nom_fichier_css = "cv.css";
?>


<?php require "view_begin_html.php";?>
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>-->
</head>
<body>
  <div class="wrapper">
    <header>Deposer votre CV</header>
    <form action="?controller=cv&action=cv">
      <input class="file-input" type="file" name="file" hidden>
      <i class="fas fa-cloud-upload-alt"></i>
      <p>Parcourir ...</p>
    </form>
    <section class="progress-area"></section>
    <section class="uploaded-area"></section>
  </div>
<div class="main">
 <button type="submit" class="send" >VALIDER</button>
                    <button type="button" class="send" id="butt"
                    onclick="location.href='?controller=accueil&action=accueil'">ANNULER</button>
    </div>

   <script type="text/javascript">
            document.getElementById("butt").onclick = function () {
                location.href = "?controller=accueil&action=accueil";
            };
        </script>
        <script type="text/javascript">
          const form = document.querySelector("form"),
fileInput = document.querySelector(".file-input"),
progressArea = document.querySelector(".progress-area"),
uploadedArea = document.querySelector(".uploaded-area");

// form click event
form.addEventListener("click", () =>{
  fileInput.click();
});

fileInput.onchange = ({target})=>{
  let file = target.files[0]; //getting file [0] this means if user has selected multiple files then get first one only
  if(file){
    let fileName = file.name; //getting file name
    if(fileName.length >= 12){ //if file name length is greater than 12 then split it and add ...
      let splitName = fileName.split('.');
      fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
    }
    uploadFile(fileName); //calling uploadFile with passing file name as an argument
  }
}

// file upload function
function uploadFile(name){
  let xhr = new XMLHttpRequest(); //creating new xhr object (AJAX)
  xhr.open("POST", "php/upload.php"); //sending post request to the specified URL
  xhr.upload.addEventListener("progress", ({loaded, total}) =>{ //file uploading progress event
    let fileLoaded = Math.floor((loaded / total) * 100);  //getting percentage of loaded file size
    let fileTotal = Math.floor(total / 1000); //gettting total file size in KB from bytes
    let fileSize;
    // if file size is less than 1024 then add only KB else convert this KB into MB
    (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
    let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
    // uploadedArea.innerHTML = ""; //uncomment this line if you don't want to show upload history
    uploadedArea.classList.add("onprogress");
    progressArea.innerHTML = progressHTML;
    if(loaded == total){
      progressArea.innerHTML = "";
      let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
      uploadedArea.classList.remove("onprogress");
      // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
      uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML); //remove this line if you don't want to show upload history
    }
  });
  let data = new FormData(form); //FormData is an object to easily send form data
  xhr.send(data); //sending form data
}

        </script>

  <script src="script.js"></script>
  <style type="text/css">
    
  </style>

</body>
</html>











<?php require "view_end_html.php";?>