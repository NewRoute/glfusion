<?php
/*
Bad Behavior - detects and blocks unwanted Web accesses
Copyright (C) 2005-2014 Michael Hampton

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

As a special exemption, you may link this program with any of the
programs listed below, regardless of the license terms of those
programs, and distribute the resulting program, without including the
source code for such programs: ExpressionEngine

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.

Please report any problems to badbots AT ioerror DOT us
*/

###############################################################################
###############################################################################

if (!defined ('GVERSION')) {
    die('This file can not be used on its own.');
}

global $_DB_table_prefix;

define('BB2_CWD', dirname(__FILE__));

// Settings you can adjust for Bad Behavior.
// Most of these are unused in non-database mode.
$bb2_settings_defaults = array(
    'log_table'     => $_DB_table_prefix . 'bad_behavior2',
    'ban_table'     => $_DB_table_prefix . 'bad_behavior2_ban',
    'wl_table'      => $_DB_table_prefix . 'bad_behavior2_whitelist',
    'bl_table'      => $_DB_table_prefix . 'bad_behavior2_blacklist',
    'display_stats' => 0,
    'strict'        => $_CONF['bb2_strict'],
    'verbose'       => $_CONF['bb2_verbose'],
    'logging'       => $_CONF['bb2_logging'],
    'httpbl_key'    => $_CONF['bb2_httpbl_key'],
    'httpbl_threat' => $_CONF['bb2_httpbl_threat'],
    'httpbl_maxage' => $_CONF['bb2_httpbl_maxage'],
    'offsite_forms' => $_CONF['bb2_offsite_forms'],
    'eu_cookie'     => $_CONF['bb2_eu_cookie'],
    'secure_cookie' => $_CONF['cookiesecure'],
    'reverse_proxy' => isset($_CONF['bb2_reverse_proxy']) ? $_CONF['bb2_reverse_proxy'] : 0,
    'reverse_proxy_header' => isset($_CONF['bb2_reverse_proxy_header']) ? $_CONF['bb2_reverse_proxy_header'] : 'X-Forwarded-For',
    'reverse_proxy_addresses' => isset($_CONF['bb2_reverse_proxy_addresses']) ? $_CONF['bb2_reverse_proxy_addresses'] : array(),
);

// Bad Behavior callback functions.

// Return current time in the format preferred by your database.
function bb2_db_date() {
    global $_CONF;
    $dt = new \Date('now',$_CONF['timezone']);
    $timestamp = $dt->format("Y-m-d H:i:s",true);
    return $timestamp;

    return date("Y-m-d H:i:s");
}

// Return affected rows from most recent query.
function bb2_db_affected_rows() {
    return DB_affectedRows();
}

// Escape a string for database usage
function bb2_db_escape($string) {
    if ( is_array($string) ) {
        return array_map('bb2_db_escape', $string);
    } else {
        return DB_escapeString($string);
    }
}

// Return the number of rows in a particular query.
function bb2_db_num_rows($result) {
    if ( $result !== FALSE ) {
        return DB_numRows($result);
    }
    return 0;
}

// Run a query and return the results, if any.
// Should return FALSE if an error occurred.
// Bad Behavior will use the return value here in other callbacks.
function bb2_db_query($query) {

    $result = DB_query($query,1);
    if ( $result === false ) {
        return FALSE;
    }
    return $result;
}

// Return all rows in a particular query.
// Should contain an array of all rows generated by calling mysql_fetch_assoc()
// or equivalent and appending the result of each call to an array.
function bb2_db_rows($result) {
    return DB_fetchArray($result);
}

// Return emergency contact email address.
function bb2_email() {
    global $_CONF;

    return $_CONF['site_mail'];
}

// retrieve settings from database
function bb2_read_settings() {
    global $_TABLES, $_CONF, $bb2_settings_defaults;

    // blacklisted data
    $_CONF['bb2_spambot_ip'] =    array();
    $_CONF['bb2_spambots_0'] =    array();
    $_CONF['bb2_spambots'] =      array();
    $_CONF['bb2_spambots_regex'] =array();
    $_CONF['bb2_spambots_url'] =  array();
    $_CONF['bb2_spambot_referer'] = array();
    $cacheInstance = 'bb2_bl_data';
    $retval = CACHE_check_instance($cacheInstance, 0);
    if ( $retval ) {
        $bb2_bl_tmp = unserialize($retval);
        if ( isset($bb2_bl_tmp['spambot_ip']))
            $_CONF['bb2_spambot_ip'] = $bb2_bl_tmp['spambot_ip'];
        if ( isset($bb2_bl_tmp['spambots_0']))
            $_CONF['bb2_spambots_0']  = $bb2_bl_tmp['spambots_0'];
        if ( isset($bb2_bl_tmp['spambots']))
            $_CONF['bb2_spambots']    = $bb2_bl_tmp['spambots'];
        if ( isset($bb2_bl_tmp['spambots_regex']))
            $_CONF['bb2_spambots_regex']  = $bb2_bl_tmp['spambots_regex'];
        if ( isset($bb2_bl_tmp['spambots_url']))
           $_CONF['bb2_spambots_url']  = $bb2_bl_tmp['spambots_url'];
        if ( isset($bb2_bl_tmp['spambot_referer']))
            $_CONF['bb2_spambot_referer']  = $bb2_bl_tmp['spambot_referer'];
    } else {
        $bb2_bl_tmp = array();
        $bb2_bl_tmp['spambot_ip'] = array();
        $bb2_bl_tmp['spambots_0'] = array();
        $bb2_bl_tmp['spambots'] = array();
        $bb2_bl_tmp['spambots_regex'] = array();
        $bb2_bl_tmp['spambots_url'] = array();
        $bb2_bl_tmp['spambot_referer'] = array();
        $result = DB_query("SELECT item,type FROM {$bb2_settings_defaults['bl_table']}",1);
        if ( $result !== false ) {
            while ( ($row = DB_fetchArray($result)) != NULL  ) {
                $bb2_bl_tmp[$row['type']][] = $row['item'];
            }
            if ( isset($bb2_bl_tmp['spambot_ip']))
                $_CONF['bb2_spambot_ip'] =     $bb2_bl_tmp['spambot_ip'];
            if ( isset($bb2_bl_tmp['spambots_0']))
                $_CONF['bb2_spambots_0'] =      $bb2_bl_tmp['spambots_0'];
            if ( isset($bb2_bl_tmp['spambots']))
                $_CONF['bb2_spambots'] =        $bb2_bl_tmp['spambots'];
            if ( isset($bb2_bl_tmp['spambots_regex']))
                $_CONF['bb2_spambots_regex'] =  $bb2_bl_tmp['spambots_regex'];
            if ( isset($bb2_bl_tmp['spambots_url']))
                $_CONF['bb2_spambots_url'] =    $bb2_bl_tmp['spambots_url'];
            if ( isset($bb2_bl_tmp['spambot_referer']))
                $_CONF['bb2_spambot_referer'] = $bb2_bl_tmp['spambot_referer'];
            $cache_bb2_bl_data = serialize($bb2_bl_tmp);
            CACHE_create_instance($cacheInstance, $cache_bb2_bl_data, 0);
        }
    }

    // whitelisted data
    $cacheInstance = 'bb2_wl_data';
    $_CONF['bb2_whitelist_ip_ranges'] = array();
    $_CONF['bb2_whitelist_user_agents'] = array();
    $_CONF['bb2_whitelist_urls'] = array();
    $retval = CACHE_check_instance($cacheInstance, 0);
    if ( $retval ) {
        $bb2_wl_tmp = unserialize($retval);
        if ( isset($bb2_wl_tmp['ip']))
            $_CONF['bb2_whitelist_ip_ranges']  = $bb2_wl_tmp['ip'];
        if ( isset($bb2_wl_tmp['ua']))
            $_CONF['bb2_whitelist_user_agents']  = $bb2_wl_tmp['ua'];
        if ( isset($bb2_wl_tmp['url']))
            $_CONF['bb2_whitelist_urls'] = $bb2_wl_tmp['url'];
    } else {
        $bb2_wl_tmp = array();
        $bb2_wl_tmp['ip'] = array();
        $bb2_wl_tmp['ua'] = array();
        $bb2_wl_tmp['url'] = array();
        $result = DB_query("SELECT item,type FROM {$bb2_settings_defaults['wl_table']}",1);
        if ( $result !== false ) {
            while ( ($row = DB_fetchArray($result)) != NULL  ) {
                $bb2_wl_tmp[$row['type']][] = $row['item'];
            }
            if ( isset($bb2_wl_tmp['ip']))
                $_CONF['bb2_whitelist_ip_ranges']  = $bb2_wl_tmp['ip'];
            if ( isset($bb2_wl_tmp['ua']))
                $_CONF['bb2_whitelist_user_agents']  = $bb2_wl_tmp['ua'];
            if ( isset($bb2_wl_tmp['url']))
                $_CONF['bb2_whitelist_urls'] = $bb2_wl_tmp['url'];
            $cache_bb2_wl_data = serialize($bb2_wl_tmp);
            CACHE_create_instance($cacheInstance, $cache_bb2_wl_data, 0);
        }
    }

    return array('log_table'      => $bb2_settings_defaults['log_table'],
                 'ban_table'      => $bb2_settings_defaults['ban_table'],
                 'wl_table'      => $bb2_settings_defaults['wl_table'],
                 'display_stats' => 0,
                 'strict'        => $_CONF['bb2_strict'],
                 'verbose'       => $_CONF['bb2_verbose'],
                 'logging'       => $_CONF['bb2_logging'],
                 'httpbl_key'    => $_CONF['bb2_httpbl_key'],
                 'httpbl_threat' => $_CONF['bb2_httpbl_threat'],
                 'httpbl_maxage' => $_CONF['bb2_httpbl_maxage'],
                 'offsite_forms' => $_CONF['bb2_offsite_forms'],
                 'eu_cookie'     => $_CONF['bb2_eu_cookie'],
                 'secure_cookie' => $_CONF['cookiesecure'],
                 'is_installed'  => true
                 );
}

// write settings to database
function bb2_write_settings($settings) {
   global $_TABLES;

   return true;
}

// installation
function bb2_install() {
    return;

    $settings = bb2_read_settings();
    if( $settings['is_installed'] == false ) {
        bb2_db_query(bb2_table_structure($settings['log_table']));
        $settings['is_installed'] = true;
        bb2_write_settings( $settings );
    }
}

// Screener
// Insert this into the <head> section of your HTML through a template call
// or whatever is appropriate. This is optional we'll fall back to cookies
// if you don't use it.
function bb2_insert_head() {
    global $bb2_timer_total;
    global $bb2_javascript;
    $retval = '';

    $retval =  "\n<!-- Bad Behavior " . BAD_BEHAVIOR_VERSION . " run time: " . number_format(1000 * $bb2_timer_total, 3) . " ms -->\n";
    $retval .= $bb2_javascript;
    return $retval;
}

// Display stats? This is optional.
function bb2_insert_stats($force = false) {

    static $retval = null;

    $settings = bb2_read_settings();

    if (!$force && !$settings['display_stats']) {
        return ''; // not cached
    }
    if ($retval !== null) {
        return $retval;
    }

    $blocked = bb2_db_query("SELECT COUNT(*) AS blocked FROM " . $settings['log_table'] . " WHERE `key` NOT LIKE '00000000'");
    $row = bb2_db_rows($blocked);
    if ($blocked !== FALSE) {
        $retval =  sprintf('<p><a href="http://www.bad-behavior.ioerror.us/">%1$s</a> %2$s <strong>%3$s</strong> %4$s</p>', 'Bad Behavior', 'has blocked', $row['blocked'], 'access attempts in the last 7 days.');
    }
    return $retval;
}

// Return the top-level relative path of wherever we are (for cookies)
// You should provide in $url the top-level URL for your site.
function bb2_relative_path() {
    global $_CONF;

    return $_CONF['cookie_path'];
}

function bb2_ban_check($ip)
{
    global $_TABLES;

    $sql = "SELECT id FROM {$_TABLES['bad_behavior2_blacklist']} WHERE item = '".DB_escapeString($ip)."'";
    $result = DB_query($sql);
    if ( DB_numRows($result) > 0 ) return true;
    return false;
}

function bb2_ban_remove($ip)
{
    global $_TABLES;
    $sql = "DELETE FROM {$_TABLES['bad_behavior2_blacklist']} WHERE item = '".DB_escapeString($ip)."'";
    $result = DB_query($sql,1);
    if ( $result !== false ) {
        CACHE_remove_instance('bb2_bl_data');
    }
    return true;
}


function bb2_ban($ip,$type = 1,$reason = '') {
    global $_CONF,$_TABLES, $LANG_BAD_BEHAVIOR;

    if ( $type != 0 && (!isset($_CONF['bb2_ban_enabled']) || $_CONF['bb2_ban_enabled'] != 1 )) {
        return;
    }

    if ( $ip == '' ) return;

    switch ( $type ) {
        case 0 :
            COM_errorLog("Banning " . $ip . " " . $LANG_BAD_BEHAVIOR['manually_added']);
            break;
        case 2 :
            COM_errorLog("Banning " . $ip . " " . $LANG_BAD_BEHAVIOR['automatic_captcha']);
            $reason = $LANG_BAD_BEHAVIOR['automatic_captcha'];
            break;
        case 3 :
            COM_ErrorLog("Banning " . $ip . " " . $LANG_BAD_BEHAVIOR['automatic_token']);
            $reason = $LANG_BAD_BEHAVIOR['automatic_token'];
            break;
        case 4 :
            COM_ErrorLog("Banning " . $ip . " " . $LANG_BAD_BEHAVIOR['automatic_hp']);
            $reason = $LANG_BAD_BEHAVIOR['automatic_hp'];
            break;
        default :
            COM_errorLog("Banning " . $ip . " for type " . $type );
            break;
    }
    $settings = bb2_read_settings();
    $timestamp = time();

    $sql = "INSERT INTO {$_TABLES['bad_behavior2_blacklist']}
           (item,type,autoban,reason,timestamp) VALUE ('".DB_escapeString($ip)."','spambot_ip',".(int) $type.",'".DB_escapeString($reason)."', ".$timestamp.")";
    $result = DB_query($sql,1);
    if ( $result !== false ) {
        CACHE_remove_instance('bb2_bl_data');
    }
    if ( $type != 0 && $type != 4 ) echo COM_refresh($_CONF['site_url']);
    return true;
}


function bb2_expireBans() {
    global $_CONF, $_TABLES;
    if ( !isset($_CONF['bb2_ban_timeout']) ) $_CONF['bb2_ban_timeout'] = 24;
    if ($_CONF['bb2_ban_timeout'] == 0 ) return;
    $settings = bb2_read_settings();
    $oldBans = time() - ($_CONF['bb2_ban_timeout']*60*60);
    $result = DB_query("DELETE FROM {$_TABLES['bad_behavior2_blacklist']} WHERE autoban != 0 AND timestamp < " . $oldBans,1);
    if ( $result !== false ) CACHE_remove_instance('bb2_bl_data');
    return;
}

$bb2_mtime = explode(" ", microtime());
$bb2_timer_start = $bb2_mtime[1] + $bb2_mtime[0];

// Calls inward to Bad Behavor itself.
require_once(BB2_CWD . "/bad-behavior/version.inc.php");
require_once(BB2_CWD . "/bad-behavior/core.inc.php");

bb2_install();

bb2_start(bb2_read_settings());

$bb2_mtime = explode(" ", microtime());
$bb2_timer_stop = $bb2_mtime[1] + $bb2_mtime[0];
$bb2_timer_total = $bb2_timer_stop - $bb2_timer_start;
?>