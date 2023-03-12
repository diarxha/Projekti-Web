<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
    include "../includes/header.php"
?>
    

<div id="contact">
        <form action="https://formsubmit.co/diarxharavina@gmail.com" method="POST">
               <div class="contact-form">
                <input type="hidden" name="_subject" value="Message From Your Website">
                <input type="text" name="name" required="" placeholder="Your Name" id="name">
                <input type="email" name="email" required="" placeholder="Email Address" id="email">
                <input type="hidden" name="_next" value="http://localhost/projekti/index.php#contact">
  <textarea placeholder="Your Message" class="form-control" name="message" rows="6" required="" id="text-area"></textarea>
  <input type="hidden" name="_autoresponse" value="Ne sapo morrem mesazhin tend dhe do you pergjigjemi se shpejti!">
  <input type="hidden" name="_captcha" value="false">
  <input type="hidden" name="_template" value="table">
                <button type="submit" id="btn">Send</button>
               </div>
                </form>
        </div>

</body>
</html>