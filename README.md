# Coding challenge solution for a potential employer

Specifies a `Logger` trait and implements it in a `FileLogger` class.

For a live demo, see [my server](https://www.flatwalls.co.uk/reciteme-coding-challenge/).

<!-- put a screenshot here -->


## Implementation

The modules are autoloaded using a custom function (an alternative would be to use *composer*). The code assumes to be running 
on Linux, on PHP 7.1. The only external library it uses is jQuery.

The code has been successfully run through a *PSR12* linter, and uses *PSR4* autoloading.

Using the `Logger` interface is very simple: `(new FileLogger()).log($message[, "warn|error")`; it is also possible to use two convenience methods, `warn()` and `error()`, which are aliases for `log(..., "warn")` and `log(..., "error")` respectively.

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

## Code structure

| file name           | note                                                                                                                        |
|---------------------|-----------------------------------------------------------------------------------------------------------------------------|
| `lib/`              | The logger module itself                                                                                                    |
| `   FileLogger.php` | Implements the `Logging` interface, and uses the `Logger` trait                                                             |
| `   Logger.php`     | The `Logger` trait; the assignment asked for a trait, but this should perhaps   more straightforwardly been a parent class. |
| `   Logging.php`    | Specifies the interface `FileLogger` implements                                                                             |
| `log/`              | Log files will be written here -- this directory needs to be writable by the    web server process                          |
| `LICENSE`           | text of the MIT license; this code is free to use                                                                           |
| `autoloader.php`    | module autoloading                                                                                                          |
| `index.php`         | the main page; open it in a browser                                                                                         |

### Examples

```$logger = new FileLogger();

// The format is:
// <severity> <time_stamp> - <referrer> Freeform log message

// [info] 2019-10-25T02:30:29+00:00 90.249.126.58 - http://example.com/ Hello, world!
$logger.log("Hello, world");

// [warning] 2019-10-25T04:02:40+00:00 90.249.126.58 - http://example.com This is a warning
$logger.log("This is a warning", Logging::LOG_WARNING)

// [error] 2019-10-25T04:02:05+00:00 90.249.126.58 - http://example.com/ That's all we know!
$logger.error("That's all we know!");
```

## Troubleshooting

Make sure the `log/` subdirectory is writeable by the web server process.
