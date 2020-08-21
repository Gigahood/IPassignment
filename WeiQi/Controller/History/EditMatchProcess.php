<?php

if (!isset($_POST["submit"])) {
    header("Location: ../../View/HistoryModule/HistoryView.php");
} else {
    updateHistory();
}

function updateHistory() {
    
}

