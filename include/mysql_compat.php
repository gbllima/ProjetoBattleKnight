<?php
/**
 * Compatibility layer for legacy mysql_* calls on modern PHP.
 * Keeps the original game code working while using mysqli internally.
 */

if (!function_exists('mysql_connect')) {
    $GLOBALS['_legacy_mysql_link'] = null;

    function mysql_connect($server = null, $username = null, $password = null)
    {
        $server = $server ?: '127.0.0.1';
        $host = $server;
        $port = 3306;

        if (strpos($server, ':') !== false) {
            [$host, $portString] = explode(':', $server, 2);
            if (ctype_digit($portString)) {
                $port = (int) $portString;
            }
        }

        $link = mysqli_connect($host, $username ?? '', $password ?? '', '', $port);
        if ($link) {
            $GLOBALS['_legacy_mysql_link'] = $link;
            mysqli_set_charset($link, 'utf8mb4');
        }
        return $link;
    }

    function mysql_select_db($database_name, $link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        return $link ? mysqli_select_db($link, $database_name) : false;
    }

    function mysql_query($query, $link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        return $link ? mysqli_query($link, $query) : false;
    }

    function mysql_fetch_row($result)
    {
        return $result ? mysqli_fetch_row($result) : false;
    }

    function mysql_fetch_assoc($result)
    {
        return $result ? mysqli_fetch_assoc($result) : false;
    }

    function mysql_fetch_array($result, $result_type = MYSQLI_BOTH)
    {
        return $result ? mysqli_fetch_array($result, $result_type) : false;
    }

    function mysql_num_rows($result)
    {
        return $result ? mysqli_num_rows($result) : 0;
    }

    function mysql_affected_rows($link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        return $link ? mysqli_affected_rows($link) : -1;
    }

    function mysql_insert_id($link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        return $link ? mysqli_insert_id($link) : 0;
    }

    function mysql_real_escape_string($unescaped_string, $link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        if (!$link) {
            return addslashes($unescaped_string);
        }
        return mysqli_real_escape_string($link, $unescaped_string);
    }

    function mysql_error($link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        return $link ? mysqli_error($link) : mysqli_connect_error();
    }

    function mysql_errno($link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        return $link ? mysqli_errno($link) : mysqli_connect_errno();
    }

    function mysql_close($link_identifier = null)
    {
        $link = $link_identifier ?: ($GLOBALS['_legacy_mysql_link'] ?? null);
        return $link ? mysqli_close($link) : false;
    }

    function mysql_free_result($result)
    {
        if (!$result) return false;
        mysqli_free_result($result);
        return true;
    }

    function mysql_data_seek($result, $row_number)
    {
        return $result ? mysqli_data_seek($result, $row_number) : false;
    }

    function mysql_result($result, $row = 0, $field = 0)
    {
        if (!$result || !mysqli_data_seek($result, (int) $row)) {
            return false;
        }
        $data = mysqli_fetch_array($result, MYSQLI_BOTH);
        return $data[$field] ?? false;
    }
}
