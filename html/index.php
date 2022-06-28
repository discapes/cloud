<!DOCTYPE html>
<html>

<?php
    require 'logip.php';
?>

<head>
  <title>Site 58</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <script>
    function copyF() {
      var copyText = document.getElementById("linkfield");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");
      copyText.hidden = true;
      document.getElementById("copybut").hidden = true;
      document.getElementById("copybr1").hidden = true;
      document.getElementById("copybr2").hidden = true;
      document.getElementById("validfile").hidden = false;
      document.getElementById("copybr3").hidden = true;
      setTimeout(function () { document.getElementById("validfile").hidden = true }, 2000);
    }

    function getLink() {
      var formData = new FormData();
      formData.append("filename", document.getElementById("filenamefield").value);
      var request = new XMLHttpRequest();
      request.open("POST", "nametourl", false);
      request.send(formData);

      let url = request.responseText;
      if (url) {
        document.getElementById("inserthere").innerHTML = `
            <br id="copybr1">
            <input style="width:390px;text-align:center" type="text" id="linkfield" value="${url}" readonly><br id="copybr3">
            <button type="button" id="copybut" onclick="copyF()">Copy link</button>
            <span id="validfile" hidden=true style="color:green">Link copied to clipboard!</span>
            <br id="copybr2">`;
      } else {
        document.getElementById("inserthere").innerHTML = `<span id=\"invalidfile\" style=\"color:red\">Invalid file!</span>`;
        setTimeout(function () { document.getElementById("invalidfile").hidden = true }, 2000);
      }

    }
  </script>
</head>

<body style="background-image: url('lightbg.png')">
  <div style="margin-top: 100px" align="center">
    <form method="post" action="post">
      <input type="text" placeholder="File name" id="filenamefield" name="filename" required>
      <br>
      <span id="inserthere"></span>
      <br>
      <input id="download-submit" type="submit" name="submit" value="Download (POST)">
      <br>
      <br>
      <input id="copy-submit" onclick="getLink()" type="button" name="submit" value="Get download link (GET)">
    </form>
    <br>
    <form action="admin/panel">
      <input type="submit" value="Admin Panel" />
    </form>
  </div>
</body>

</html>
