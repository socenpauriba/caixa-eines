<?php
/**
 * Plugin Name: Caixa d'Eines
 * Plugin URI: http://nuvol.cat
 * Description: Un conjunt d'eines útils per a WordPress
 * Version: 1.0
 * Author: Nuvol.cat
 * Author URI: http://nuvol.cat
 */

 // Shortcode [any] retorna l'any actual
function shortcode_any_actual() {
    return date("Y");
}
add_shortcode('any', 'shortcode_any_actual');

 // Shortcode [temps_lectura] retorna el temps de lectura aproximat
function shortcode_temps_lectura() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $words_per_minute = 200;
    $time = ceil($word_count / $words_per_minute);
    if ($time <= 1) {
        return "1 minut";
    } else {
        return $time . " minuts";
    }
}
add_shortcode('temps_lectura', 'shortcode_temps_lectura');
?>