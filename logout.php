<?php

session_start();
include_once ("core/functions.php");

session_destroy();

redirect("login.php");

die;
