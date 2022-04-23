<?php 
function wp_trim_words($content, $words_number = 15){
    $content_into_array = explode(" ", $content);
    $small_content = array_slice($content_into_array, 0, $words_number);
    $content = implode(" ", $small_content);
    return $content; 
}
