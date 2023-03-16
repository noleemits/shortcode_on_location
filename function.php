<?php 

function display_shortcode_by_location() {
    // Get the visitor's IP address
    $ip = $_SERVER['REMOTE_ADDR'];

    // Get the visitor's location using a geolocation service (replace YOUR_API_KEY with your actual API key)
    $url = "http://api.ipapi.com/api/$ip?access_key=YOUR_API_KEY";
    $response = wp_remote_get($url);
    $data = json_decode(wp_remote_retrieve_body($response));

    // Display the appropriate shortcode based on the visitor's state
    if ($data->region_name === 'New York') {
        echo do_shortcode('[INSERT_ELEMENTOR id="1"]');
    } elseif ($data->region_name === 'Michigan') {
        echo do_shortcode('[INSERT_ELEMENTOR id="2"]');
    } else {
        // Default shortcode to display if the visitor is not from NY or MI
        return;
    }
}

add_shortcode('display_shortcode_by_location', 'display_shortcode_by_location');
