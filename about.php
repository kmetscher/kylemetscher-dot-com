<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <script src="scripts/language.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>About | Kyle Metscher</title>
    <link href="styles/about.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

<body>
  <?php require_once('includes/headernav.php')?>
  <div class="container">
    <div class="main">

      <div class="about">
        <h2 class="about">About</h2>
        <img class="about" src="images/bigboyfortworth.jpg" alt="A photo of the author with the Big Boy locomotive in Fort Worth, Texas in the background">
        <p class="caption" name="caption" id="bigboy">With the Big Boy locomotive in Fort Worth, Texas</p>
        <h2>Who are you?</h2>
        <p>I'm Kyle Metscher, a student of Computer Science at Western Governors University. More casually, I study linguistics, music, history, and art.</p>
        <p>You can reach me via the <a href="contact.php">contact page.</a></p>
        <h2>What is this website for?</h2>
        <p>This site is a blog. I will post music and movie reviews, thoughts on various subjects of interest, and most importantly, about the work I do on the site itself. My intent is for it to become a living portfolio for colleagues, prospective employers, and those interested in collaborating to see what I'm up to.</p>
        <h2>How does this site work?</h2>
        <p>This site is powered by PHP, HTML, CSS, and a slowly increasing amount of JavaScript. The site's implementations are, as of now, all "vanilla" -- I did not use any frameworks or external libraries, and instead built from the ground up in a Sisyphean exercise of reinventing the wheel. The site was born as a form of study for a web development course at Western Governors University and runs on an AWS Lightsail LAMP instance. It is a perennial work in progress.</p>
        <p>You can navigate the site with the nav header on the top of the page, and through the sidebar menu (on desktop) or footer menu (on mobile).</p>
        <img class="about" src="images/mcmenamins.jpg" alt="A photo of the author playing billiards in a dimly-lit bar">
        <p class="caption">Billiards at McMenamin's Backstage Bar in Portland, Oregon</p>
        <h2>What credentials do you hold?</h2>
        <p>I graduated with an Associate of Arts in general studies from Clark College in Vancouver, Washington, where I enrolled at 16 years old and received my degree at 18 as part of Washington State's "Running Start" program. I am a small motors technician. I am actively pursuing my Project+ and ITIL Foundation certifications. Most importantly, I may claim the bespoke distinction of holding a food handler's card in both Washington <i>and</i> Texas.</p>
        <h2>What work experience do you have?</h2>
        <p>I have been a copy editor and writer, translator, conference volunteer, traveling salesman, fry cook, business owner, fireworks tent attendant, Christmas tree loader, internet marketer, front-end web designer, warehouse and airport freight handler, hackerspace punching bag, social media page owner, barista, automotive technician, and delivery boy. References are available upon request.</p>
        <h2>What programming languages do you have experience with?</h2>
        <p>C/C++, PHP, Python, Rust, Ruby, Lua, JavaScript, and for a more liberal definition, HTML and CSS. The list is certain to grow.</p>
        <img class="about" src="images/lanchidbudaivar.jpg" alt="A nighttime photo of the Chain Bridge in Budapest, Hungary, over the Danube River. The Buda Castle is in the background">
        <p class="caption">Buda Castle and the Chain Bridge at night, Budapest, Hungary</p>
        <h2>Besz??l magyarul?</h2>
        <p>Igen! Budapesten ??ltem k??t ??vet. Sajnos nem olyan sz??pen besz??lek mint igazi magyar, de kiprob??lom mindenesetre.</p>
        <h2>Sprechen Sie deutsch?</h2>
        <p>Mein Gro??vater aus Berlin w??rde nein sagen, weil ich zu oft nach Wien gereist bin, und deshalb nenne ich eine Tomate einen Paradeiser.</p>
      </div>

    </div>
  <?php require_once('includes/sidebar.php')?>
</body>
