# Coding challenge solution for a potential employer

Specifies a `Logger` trait and implements it in a `FileLogger` class.

For a live demo, see [my personal server](https://www.rdancer.org/reciteme-coding-challenge/).

## Installation

Simply clone the repository somewhere accessible by your web server, and point a browser to its root.

## Operation

The log file is created in /tmp, with a filename specified in
`lib/FileLogger.php`. This is enough for a demo; a production version would log
under /var/log or somewhere within its own directory structure, but for obvious
reasons a random PHP file doesn't, and shouldn't, have access there.
