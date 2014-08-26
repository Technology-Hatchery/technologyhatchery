<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alfred
 * Date: 8/25/2014
 * Time: 7:16 PM
 */

/**
 * Adds an entry to the database to log when someone calls the URL
 */
if (isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
    /** Live environment Cloud SQL login and SITE_URL info */
    $link = mysql_connect(':/cloudsql/genuine-range-625:wordpress', 'root', '');
    $qry = 'USE wordpress_db';
    $result = mysql_query($qry);
    $qry = 'INSERT INTO logger (dateVal, userip) VALUES(\'' . date('Y-m-d H:i:s') . '\',\'' . $_SERVER['REMOTE_ADDR'] . '\');';
    $result = mysql_query($qry);
} else {
    /** Local environment MySQL login info */
    $link = mysql_connect('173.194.109.207', 'root', 'Cc17931793');
    $qry = 'USE wordpress_db';
    $result = mysql_query($qry);
    $qry = 'SET time_zone = \'-08:00\'';
    $result = mysql_query($qry);
    $qry = 'INSERT INTO logger (dateVal, userip, port) VALUES(\'' . date('Y-m-d H:i:s') . '\',\'' . $_SERVER['SERVER_ADDR'] . '\',\'' . $_SERVER['SERVER_PORT'] . '\');';
    $result = mysql_query($qry);
}
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

?>