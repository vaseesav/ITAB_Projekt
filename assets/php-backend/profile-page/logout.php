<?php
session_start();
session_destroy();
// Sendet eine einfache Antwort zurück, die vom JavaScript verarbeitet wird
echo "Logged out";
