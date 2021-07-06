<?php
session_unset();
session_destroy();
header("Location: ../OOSD/index.html");
exit();
