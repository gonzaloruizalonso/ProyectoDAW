<?php
require_once("../db/db.php");
session_start();
require_once("../models/historial.php");



$array = mirar_historial($conn);
require_once("../views/historial.php");
