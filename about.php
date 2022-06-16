<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
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
        <img class="about" src="images/bigboyfortworth.jpg">
        <p class="caption">With the Big Boy locomotive in Fort Worth, Texas</p>
        <h2>Who are you?</h2>
        <p>I'm Kyle Metscher, a student of Computer Science at Western Governors University and a service technician at Baker Road Automotive in Stevenson, Washington. More casually, I study linguistics, music, history, and art.</p>
        <p>You can reach me via the <a href="contact.php">contact page.</a></p>
        <h2>What is this website for?</h2>
        <p>This site primarily serves as a blog where I will post about vehicles I work on at the shop, mostly in a lessons-learned repair guide format. I will also post music and movie reviews, and updates about my personal projects, including work I do on the site itself. My intent is for it to become a living portfolio for colleagues, prospective employers, and those interested in collaborating to see what I'm up to.</p>
        <h2>How does this site work?</h2>
        <p>This site is powered by PHP, HTML, CSS, and a slowly increasing amount of JavaScript. The site's implementations are, as of now, all "vanilla" -- I did not use any frameworks or external libraries, and instead built from the ground up in a Sisyphean exercise of reinventing the wheel. The site was born as a form of study for a web development course at Western Governors University. It runs on an AWS Lightsail LAMP instance. It is a perennial work in progress.</p>
        <p>Up top, just below the site header, a navigation menu can take you to the Home page, to this About page, and to the Contact page. On the Home page, the ten most recent posts appear as previews in publishing order. You can view a post by clicking or tapping its title or featured image. You can also see what other posts were filed under the same subject by clicking or tapping the name of a tag in the "Filed under" section.</p>
        <p>The Contact page contains a link to my GitHub, where the source code of this site happily resides. If you encounter an issue with the site or want to suggest something, please don't hesitate to use GitHub's "issues" feature for those purposes.</p>
        <p>If you're on desktop, a sidebar sits on the right-hand side of any page you're on. You can toggle a light and dark theme to apply across the site by clicking the Sun or Moon tarot faces. Below that, a list of tags used to file posts under are in a scrollable list. As time goes on, posts made in a given month will appear under their respective entries in the Archives, also a scrollable list. You can filter posts by language by clicking that language's name.</p>
        <p>If you're on mobile, this sidebar appears at the bottom of the page you're on as a footer. The light and dark theme can be toggled by tapping the tarot faces. To view tags on mobile, tap the "Tags" link to visit a page with all tags arranged alphabetically. Archives will work the same way, once implemented. To filter by language, just tap the language you want to see posts in.</p>
        <img class="about" src="images/mcmenamins.jpg">
        <p class="caption">Billiards at McMenamin's Backstage Bar in Portland, Oregon</p>
        <h2>What credentials do you hold?</h2>
        <p>I graduated with an Associate of Arts in general studies from Clark College in Vancouver, Washington, where I enrolled at 16 years old and received my degree at 18 as part of Washington State's "Running Start" program. I am a small motors technician. I am actively pursuing my Project+ and ITIL Foundation certifications. Most importantly, I may claim the bespoke distinction of holding a food handler's card in both Washington <i>and</i> Texas.</p>
        <h2>What work experience do you have?</h2>
        <p>I have been a copy editor and writer, translator, conference volunteer, traveling salesman, fry cook, business owner, fireworks tent attendant, Christmas tree loader, internet marketer, front-end web designer, warehouse and airport freight handler, hackerspace punching bag, social media page owner, barista, automotive technician, and delivery boy. References are available upon request.</p>
        <h2>What programming languages do you have experience with?</h2>
        <p>C/C++, PHP, Python, Rust, Ruby, Lua, JavaScript, and for a more liberal definition, HTML and CSS. The list is certain to grow.</p>
        <img class="about" src="images/lanchidbudaivar.jpg">
        <p class="caption">Buda Castle and the Chain Bridge at night, Budapest, Hungary</p>
        <h2>Beszél magyarul?</h2>
        <p>Igen! Budapesten éltem két évet. Sajnos nem olyan szépen beszélek mint igazi magyar, de kiprobálom mindenesetre.</p>
        <h2>Sprechen Sie deutsch?</h2>
        <p>Mein Großvater aus Berlin würde nein sagen, weil ich zu oft nach Wien gereist bin, und deshalb nenne ich eine Tomate einen Paradeiser.</p>
      </div>

    </div>
  <?php require_once('includes/sidebar.php')?>
</body>
