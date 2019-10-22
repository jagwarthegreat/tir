<?php

/*
 * --------------------------------------------------------------------
 * LOAD DEFINES
 * --------------------------------------------------------------------
 */
	define("ROUTE", "index.php?view=");
	define("SYSTEM_PATH", "app/system/");
	define("SYSTEM_NAME", "BTIR");

/*
 * --------------------------------------------------------------------
 * SET SITE UNDER MAINTENANCE
 * --------------------------------------------------------------------
 *	usage:
 *	TRUE => site down
 *	FALSE => site up
 */
	define("MAINTENANCE", "FALSE");

/*
 * --------------------------------------------------------------------
 * SET DATABASE CONFIGURATIONS
 * --------------------------------------------------------------------
 */
	
	// //byetonline
	// define("HOST", "sql112.byethost31.com");
	// define("USERNAME", "b31_22324247");
	// define("PASSWORD", "syswow2177!");
	// define("DATABASE", "b31_22324247_btir");


	//online
	define("HOST", "mysql.hostinger.ph");
	define("USERNAME", "u983050363_wow");
	define("PASSWORD", "syswow2177!");
	define("DATABASE", "u983050363_tir");

// //local
// 	define("HOST", "localhost");
// 	define("USERNAME", "root");
// 	define("PASSWORD", "");
// 	define("DATABASE", "tir");

/*
 * --------------------------------------------------------------------
 * SET ENVIRONMENT
 * --------------------------------------------------------------------
 *	usage:
 *	development => display errors
 *	production => hide errors
 */
	define("ENVIRONMENT", "production");

define ("VALUE",serialize (array ("core.php","functions.php","routes.php","auth.php","core_script.php")));

