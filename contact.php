<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contact | Kyle Metscher</title>
    <link href="styles/contact.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php require_once('includes/headernav.php')?>
    <div class="container">
      <div class="main">
        <div class="contact">
          <h2>Contact</h2>
          <div class="form">
            <form action="#">
              <h3>Name</h3>
              <input type="text" id="name" name="name"<br>
              <h3>Subject</h3>
              <input type="text" id="subject" name="subject"<br>
              <h3>Organization</h3>
              <input type="text" name="organization" id="organization">
              <h3>Email</h3>
              <input type="text" name="email" id="email">
              <h3>Phone</h3>
              <input type="text" name="phone" id="phone">
              <h3>Message</h3>
              <textarea id="message" name="message" rows="12" cols="100"></textarea><br><br>
              <input type="submit" value="submit">
              </form>
            </div>
          </div>
      </div>

      <?php require_once('includes/sidebar.php')?>
    </body>
