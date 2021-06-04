<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
 
    // Build POST request
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LeSDswZAAAAAKA4wsjA8lzd-QNgowiHFzmWUo8k';
    $recaptcha_response = $_POST['recaptcha_response'];
 
    // Make and decode POST request
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
 
    // Take action based on the score returned
    if ($recaptcha->score >= 0.5) {
    
        if(!empty($_POST['subscribeEmail'])){
            mail('info@torgi24.by', 'torgi24.by', htmlspecialchars($_POST['subscribeEmail']));
            echo '00';
        }elseif (!empty($_POST['surname'])) {
            $message = htmlspecialchars($_POST['surname']).' '.htmlspecialchars($_POST['name']).' '.htmlspecialchars($_POST['email']).' '.htmlspecialchars($_POST['message']);
            mail('info@torgi24.by', 'torgi24.by', $message);
            echo '01';
        }

        
    } else {
        
        echo '1';
    }
 
}
 