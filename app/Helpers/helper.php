<?php


function limit_text($text, $limit)
{
    $words = explode(' ', $text);
    if (count($words) > $limit) {
        return implode(' ', array_slice($words, 0, $limit)) . '...';
    } else {
        return $text;
    }
}

function format_date($date){

    $tanggal = DateTime::createFromFormat('Y-m-d', $date);
    $tanggal_format = $tanggal->format('d F Y');

    return $tanggal_format;
}