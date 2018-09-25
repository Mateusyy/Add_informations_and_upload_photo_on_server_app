<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.09.2018
 * Time: 15:40
 */

session_start();
session_unset();
session_destroy();

header("Location: /ProjectTest/");