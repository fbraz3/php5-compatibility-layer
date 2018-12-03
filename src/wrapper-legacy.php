<?php
/**
 * Created by PhpStorm.
 * User: felipebraz
 * Date: 09/07/18
 * Time: 13:33
 */

if(version_compare(phpversion(), '7.0', '<')){
    return;
}

if (!function_exists('ereg')) {
    function ereg($pattern, $subject, &$matches = array())
    {
        return preg_match('/' . $pattern . '/', $subject, $matches);
    }
}
if (!function_exists('eregi')) {
    function eregi($pattern, $subject, &$matches = array())
    {
        return preg_match('/' . $pattern . '/i', $subject, $matches);
    }
}
if (!function_exists('ereg_replace')) {
    function ereg_replace($pattern, $replacement, $string)
    {
        return preg_replace('/' . $pattern . '/', $replacement, $string);
    }
}
if (!function_exists('eregi_replace')) {
    function eregi_replace($pattern, $replacement, $string)
    {
        return preg_replace('/' . $pattern . '/i', $replacement, $string);
    }
}
if (!function_exists('split')) {
    function split($pattern, $subject, $limit = -1)
    {
        return preg_split('/' . $pattern . '/', $subject, $limit);
    }
}
if (!function_exists('spliti')) {
    function spliti($pattern, $subject, $limit = -1)
    {
        return preg_split('/' . $pattern . '/i', $subject, $limit);
    }
}
if (!function_exists('session_unregister')) {
    function session_unregister($value)
    {
        unset($_SESSION[$value]);
        return true;
    }
}
if (!function_exists('session_register')) {
    function session_register($variavel)
    {
        global $$variavel;
        $_SESSION[$variavel] = $$variavel;
        return true;
    }
}

/**
 * Escapa as mesmas strings do mysql_real_escape_string, mas sem precisar de ponteiro de conexao
 * "Characters encoded are \, ', ", NUL (ASCII 0), \n, \r, and Control+Z"
 * @see https://dev.mysql.com/doc/refman/5.7/en/mysql-real-escape-string.html
 * @see https://stackoverflow.com/questions/1162491/alternative-to-mysql-real-escape-string-without-connecting-to-db
 * @param string $value
 * @return string
 */
function mres($value)
{
    $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
    $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}

if (!function_exists('mysql_real_escape_string')) {
    /**
     * Escapes special characters in a string for use in an SQL statement
     * @link http://php.net/manual/en/function.mysql-real-escape-string.php
     * The string that is to be escaped.
     * </p>
     * @return string the escaped string, or false on error.
     * @since 4.3.0
     * @since 5.0
     */
    function mysql_real_escape_string($value)
    {
        return mres($value);
    }
}
if (!function_exists('mysql_escape_string')) {
    /**
     * Escapes a string for use in a mysql_query
     * @link http://php.net/manual/en/function.mysql-escape-string.php
     * @deprecated 5.3.0 Use mysql_real_escape_string() instead
     * The string that is to be escaped.
     * </p>
     * @return string the escaped string.
     * @since 4.0.3
     * @since 5.0
     */
    function mysql_escape_string($value)
    {
        return mres($value);
    }
}