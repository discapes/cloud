# cloud
A simple file hosting site that also works as a pastebin. Features include an ip logger, download links, text editing, listing files and temporarily trashing them. Also handles dates.

- requires mysql, php7, apache

```
CREATE DATABASE clouddb;
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER
ON clouddb.*
TO cloud@localhost
IDENTIFIED BY 'password123!';
FLUSH PRIVILEGES;	

CREATE TABLE `DelIPlog` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `ip` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `hostname` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

CREATE TABLE `Files` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `filename` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `isPaste` int(2) NOT NULL DEFAULT 0,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

CREATE TABLE `IPlog` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `ip` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `hostname` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

CREATE TABLE `Trash` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `filename` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `isPaste` int(2) NOT NULL DEFAULT 0,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

```

Remember to create directories `files` and `trash`, then `git update-index --assume-unchanged files trash html/mysql.php`.

Just do `AllowOverride FileInfo AuthConfig`, `Options FollowSymLinks` and `HostnameLookups On`.

Finally, edit `variables.php` and `admin/.htaccess` to fit your server.
