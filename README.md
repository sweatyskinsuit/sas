# Southern Appalachian Salamanders
## PHP/mySQL Project

This is a basic PHP project that connects to a MySQL database using credentials stored in a non-tracked secure file.

## Requirements

* PHP 7.4+
* MySQL 5.7+
* Web server (e.g., Aache, Nginx)

# Installation

1. Clone the repository

```sh
git clone https://github.com/our-username/your-repo-name.git
cs your-repo-name
```

2. Create the `db_credentials.php` file:

Inside the `private/` folder (create it if it doesn't exist), create a file named `db_credentials.php` with the following content:

```<?php
define("DBSERVER", "");
define("DBUSER", "");
define("DBPASS", "");
define("DBNAME", "");
```
3. Protect your credentials:

Make sure `db_credentials.php` is listed in your `.gitignore` file so it is not committed to version control:

`/private/db_credentials.php`

# Usage

This program is written so the `initalize.php` will alwas include the `db_credentials.php` file.

# Security Note

Never commit `db_credentials.php` to version control. Use `.gitignore` to prevent accidental exposure of sensitive credentials.

## Submit your work

* Submit your GitHub and webhost addresses in the comments section of Moodle.
* I have left open the link to submit our zipped files in case you are having difficulty uploading to GitHub.