# kylemetscher-dot-com

Contains the HTML, style sheets, and server-side files needed for my personal website. The site will be a blog where I upload posts about vehicles I work
on at my current job, movie and music reviews, random thoughts, and updates on the site itself and other projects.

Local testing is done via apache2 and mySQL installations on my personal computer.

Test posts adapted from r/copypasta.

Originally set out with object-oriented paradigm in mind, mostly abandoned in favor of functional-procedural. MYSQLi connections and fetches are managed by object.

Current challenges:

Archiving by month

Future plans:

Scripting the top header to become a slow slideshow of other photographs I've taken.

Sorting posts by month via archiveview.php page and archive sidebar.

Making contact page actually do something.

Script a post upload function/method to insert a post into blog_posts table, tags into tags table while checking for duplication, and post id and tag ids into post_tags table

Allowing a user to switch the entire interface to their language via the language sidebar option, as well as populate index.php with most recent posts in their chosen language.

Functionalize PHP procedures and utilize scripts folder.

Evaluate possibility of object-oriented paradigm.

Host on Amazon EC2 instance with LAMP stack.

Actually write blog posts!
