<?php

//////Page/////
$type = isset($_GET['type']) ? preg_replace('/[^a-z_]/i', '', $_GET['type']) : '';

if (empty($type)) {
    $type = "news";
    $title2 = "Novidades";
} elseif ($type === "news") {
    $title2 = "Novidades";
} elseif ($type === "register") {
    $title2 = "Registro";
} elseif ($type === "contact") {
    $title2 = "Contato";
} else {
    $type = "news";
    $title2 = "Novidades";
}
?>