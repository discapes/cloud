# cloud
A simple file hosting site that also works as a pastebin. Features include an ip logger, download links, text editing, listing files and temporarily trashing them. Also handles dates.

- requires mysql, php7, apache and mod_rewrite

```
CREATE DATABASE clouddb;
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER
ON cloud.*
TO oispaeliitti@localhost
IDENTIFIED BY 'password123!';
FLUSH PRIVILEGES;	

CREATE TABLE `deliplog` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `ip` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `hostname` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

CREATE TABLE `files` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `filename` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `isPaste` int(2) NOT NULL DEFAULT 0,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

CREATE TABLE `iplog` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `ip` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `hostname` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

CREATE TABLE `trash` (
 `num` int(11) NOT NULL AUTO_INCREMENT,
 `id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `filename` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
 `date` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
 `isPaste` int(2) NOT NULL DEFAULT 0,
 PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci

```

Remember to `git update-index --assume-unchanged files trash mysql.php`.

Just do `AllowOverride FileInfo AuthConfig`, `Options FollowSymLinks` and `HostnameLookups On`.

Finally, edit `variables.php` to fit your server.

### Warning: lots of SQL injection vulnerabilities inside