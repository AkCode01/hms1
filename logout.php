<?php
session_start();
session_destroy();
header("location:welcome.php?err=Please Login");
