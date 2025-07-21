<?php

return [

	// To use SQLite, set 'dbdriver' to 'sqlite' and provide the path to the database file.
	// To use MySQL, set 'dbdriver' to 'mysql' and provide host, user, pass, and dbname.

	// Example for SQLite:
	// "dbdriver" => "sqlite",
	// "db" => "src/data/db.sqlite",

	// Example for MySQL:
	// "dbdriver" => "mysql",
	// "dbhost" => "127.0.0.1",
	// "dbuser" => "root",
	// "dbpass" => "",
	// "dbname" => "tiny_mvc",

	// --- Default: SQLite ---
	"dbdriver" => "sqlite",
	"db" => "/app/src/data/db.sqlite",

	// --- Uncomment below to use MySQL ---
	// "dbdriver" => "mysql",
	// "dbhost" => "127.0.0.1",
	// "dbuser" => "root",
	// "dbpass" => "newpassword",
	// "dbname" => "tiny_mvc",

	"default-controller" => "home"
];
