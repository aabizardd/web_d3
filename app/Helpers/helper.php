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

function format_date($date)
{

    $tanggal = DateTime::createFromFormat('Y-m-d', $date);
    $tanggal_format = $tanggal->format('d F Y');

    return $tanggal_format;
}

function asdep($angka)
{

    $asdep = "";
    if ($angka == 1) {

        $asdep = "Asisten Deputi Minyak dan Gas, Pertambangan, dan Petrokimia / Sekretaris Deputi";
    } elseif ($angka == 2) {
        $asdep = "Asisten Deputi Agro, Farmasi, dan Pariwisata";
    } elseif ($angka == 3) {
        $asdep = "Asisten Deputi Jasa Keuangan dan Industri Informasi";
    } elseif ($angka == 4) {
        $asdep = "Asisten Deputi Utilitas dan Industri Manufaktur";
    } elseif ($angka == 4) {
        $asdep = "Asisten Deputi Niaga dan Transportasi";
    } else {
        $asdep = "Strukutr Secara Keseluruhan";
    }


    return $asdep;
}
