<?php

//require our files, remember should be relative to index.php

require_once "../app/core/Router.php";
require_once '../app/models/Model.php';
require '../app/controllers/Controller.php';
require_once '../app/controllers/MainController.php';
require_once '../app/controllers/UserController.php';
require_once '../app/controllers/FeedbackController.php';
require_once '../app/models/User.php';
require_once '../app/models/Feedback.php';
require_once '../app/models/AQModel.php';


//set up env variables
$env = parse_ini_file('../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBDRIVER', 'mysql');
//define('API_KEY', $env['API_KEY']);


//set up other configs
define('DEBUG', true);