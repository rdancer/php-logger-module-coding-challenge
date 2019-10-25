# Coding challenge solution for a potential employer

Specifies a `Logger` trait and implements it in a `FileLogger` class.

For a live demo, see [my server](https://www.flatwalls.co.uk/reciteme-coding-challenge/).

## Installation

1. Clone the repository somewhere accessible by your web server, and point a browser to its root.
2. Ensure the `log` directory in the root of the repository is writeable by the
   web browser (`chgrp www-data log && chmod g+w log` on Debian-based systems);

## Operation

The log file is created in the `log` subdirectory of this repository, with a
filename specified in `lib/FileLogger.php`. This is enough for a demo; a
production version would log under /var/log or somewhere within its own
directory structure, but for obvious reasons a random PHP file doesn't, and
shouldn't, have access there.
