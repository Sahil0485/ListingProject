<?php
function custom_echo($x, $length = 4)
{
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

function createSlug($string)
{
    $slug = mb_strtolower($string, 'UTF-8');
    $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

function toastMsg($message, $type = 'info', $duration = 2000)
{
    $validTypes = ['info', 'success', 'warning', 'error'];

    if (!in_array($type, $validTypes)) {
        $type = 'info';
    }

    // HTML code for the toast
    echo "
    <div id='toast' class='toast toast-$type' style='display: none;'>
        $message
    </div>
    
    <script>
        function showToast() {
            var toast = document.getElementById('toast');
            toast.style.display = 'block';
            setTimeout(function() {
                toast.style.display = 'none';
            }, $duration);
        }
        
        window.onload = function() {
            showToast();
        }
    </script>
    
    <style>
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px;
            border-radius: 5px;
            color: white;
            z-index: 1000;
        }
        .toast-info { background-color: #909497; }
        .toast-success { background-color: #28a745; }
        .toast-warning { background-color: #ffc107; }
        .toast-error { background-color: #EC7063; }
    </style>
    ";
}
?>