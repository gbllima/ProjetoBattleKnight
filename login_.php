<?php
include "include/antet.php";
include "include/func.php";

if (isset($_POST["name"], $_POST["pass"]))
{
    $_SESSION["user"] = login($_POST["name"], md5($_POST["pass"]));

    if (!is_array($_SESSION["user"]) || empty($_SESSION["user"][0])) {
        $_SESSION["user"] = [];
        msg1($lang['noUserWrong']);
        exit;
    }

    $config = config();
    if (isset($config[2][1]) && !$config[2][1] && (int)($_SESSION["user"][4] ?? 0) < 4)
    {
        $_SESSION = array();
        session_destroy();
        msg1($lang['loginClosed']);
        exit;
    }

    if (check_d($_SESSION["user"][0]))
    {
        update_lastVisit($_SESSION["user"][0]);

        $userId = (int) $_SESSION["user"][0];
        $query = "select id from towns where isCapital=1 and owner=" . $userId . " limit 1";
        $result = mysql_query($query, $db_id);
        $capital = $result ? mysql_fetch_row($result) : false;
        $capitalId = ($capital && isset($capital[0])) ? (int) $capital[0] : 0;

        if ($capitalId <= 0) {
            header("Location: createf.php");
        } else {
            header("Location: town.php?town=" . $capitalId);
        }
        exit;
    }

    header('Location: towns.php');
    exit;
}

msg1($lang['noInput']);
exit;
?>