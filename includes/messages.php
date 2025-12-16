<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set a message
function setMessage($type, $text) {
    $_SESSION['message'] = ['type' => $type, 'text' => $text];
}

// Get and display message (call this in pages)
function getMessage() {
    if (isset($_SESSION['message'])) {
        $msg = $_SESSION['message'];
        unset($_SESSION['message']); // clear after show
        
        $bg = $msg['type'] === 'success' ? '#d4edda' : '#f8d7da';
        $color = $msg['type'] === 'success' ? '#155724' : '#721c24';
        
        return '<div style="background:' . $bg . ';color:' . $color . ';padding:20px;margin:20px 0;border-radius:12px;text-align:center;font-weight:bold;border:1px solid ' . ($msg['type'] === 'success' ? '#c3e6cb' : '#f5c6cb') . ';">
                    ' . $msg['text'] . '
                </div>';
    }
    return '';
}
?>