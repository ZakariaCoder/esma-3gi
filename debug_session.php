<?php
// Debug file to check session status
echo "<div style='position: fixed; top: 0; right: 0; background: rgba(0,0,0,0.7); color: white; padding: 10px; z-index: 9999; font-size: 12px;'>";
echo "<h4>Session Debug</h4>";
echo "<pre>";
echo "Session ID: " . session_id() . "\n";
echo "Session Status: " . session_status() . "\n";
echo "Session Name: " . session_name() . "\n";

if(isset($_SESSION['userdata'])) {
    echo "User Data:\n";
    print_r($_SESSION['userdata']);
} else {
    echo "No user data in session\n";
}

echo "</pre>";
echo "</div>";
?>
