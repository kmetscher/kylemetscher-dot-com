# kylemetscher-dot-com

Contains the HTML, style sheets, scripts, and server-side files needed for my personal website. The site will be a blog where I upload posts about vehicles I work
on at my current job, movie and music reviews, random thoughts, and updates on the site itself and other projects.

Local testing is done via apache2 and mySQL installations on my personal computer.

Test posts adapted from r/copypasta.

Originally set out with object-oriented paradigm in mind, mostly abandoned in favor of functional-procedural. MYSQLi connections and fetches are managed by object.

Security notes:

POST method querying for viewing posts, by tag, and by language tested with sqlmap.py (https://github.com/sqlmapproject/sqlmap) (https://sqlmap.org/)

Current challenges:

~smooth sailing~

Future plans:

Collapse stylesheets

Scripting the top header to become a slow slideshow of other photographs I've taken.

Flesh out language UI change script
