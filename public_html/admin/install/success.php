<?php
// +--------------------------------------------------------------------------+
// | glFusion CMS                                                             |
// +--------------------------------------------------------------------------+
// | success.php                                                              |
// |                                                                          |
// | Page that is displayed upon a successful glFusion installation or upgrade|
// +--------------------------------------------------------------------------+
// | $Id::                                                                   $|
// +--------------------------------------------------------------------------+
// |                                                                          |
// | Based on the Geeklog CMS                                                 |
// | Copyright (C) 2000-2008 by the following authors:                        |
// |                                                                          |
// | Authors: Tony Bibbs        - tony AT tonybibbs DOT com                   |
// |          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net   |
// |          Jason Whittenburg - jwhitten AT securitygeeks DOT com           |
// |          Dirk Haun         - dirk AT haun-online DOT de                  |
// |          Randy Kolenko     - randy AT nextide DOT ca                     |
// |          Matt West         - matt AT mattdanger DOT net                  |
// +--------------------------------------------------------------------------+
// |                                                                          |
// | This program is free software; you can redistribute it and/or            |
// | modify it under the terms of the GNU General Public License              |
// | as published by the Free Software Foundation; either version 2           |
// | of the License, or (at your option) any later version.                   |
// |                                                                          |
// | This program is distributed in the hope that it will be useful,          |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
// | GNU General Public License for more details.                             |
// |                                                                          |
// | You should have received a copy of the GNU General Public License        |
// | along with this program; if not, write to the Free Software Foundation,  |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.          |
// |                                                                          |
// +--------------------------------------------------------------------------+

require_once '../../lib-common.php';

$type = (isset( $_GET['type'] ) && !empty( $_GET['type'] )) ? $_GET['type'] : 'install';
$lng  = (isset( $_GET['language'] ) && !empty( $_GET['language'] )) ? $_GET['language'] : 'english';
$language = preg_replace('/[^a-z0-9\-_]/', '', $lng);

require_once( 'language/' . $language . '.php' );

// enable detailed error reporting
$_SYSTEM['rootdebug'] = true;

$display  = COM_siteHeader( 'menu', $LANG_SUCCESS[0] );
$display .= COM_startBlock( $LANG_SUCCESS[1] . GVERSION . $LANG_SUCCESS[2] );

$display .= '<p>' . $LANG_SUCCESS[3] . (($type == 'install') ? $LANG_SUCCESS[20] : $LANG_SUCCESS[21]) . $LANG_SUCCESS[4] . '</p>' ;

if ($type == 'install') {
	$display .= '<p>' . $LANG_SUCCESS[5] . '</p>
    <p>' . $LANG_SUCCESS[6] . ' <strong>' . $LANG_SUCCESS[7] . '</strong><br' . XHTML . '>
    ' . $LANG_SUCCESS[8] . ' <strong>' . $LANG_SUCCESS[9] . '</strong></p> <br' . XHTML . '>';
}

$display .= '<h2 style="color:red">' . $LANG_SUCCESS[10] . '</h2>
<p>' . $LANG_SUCCESS[11] . ' <strong>' . (($type == 'upgrade') ? '2' : '3') . '</strong> ' . $LANG_SUCCESS[12] . ':</p>
<ol>
<li style="padding-bottom:3px">' . $LANG_SUCCESS[13] . ' <tt>' . $_CONF['path_html'] . 'admin/install</tt>.</li>';

if ($type == 'install') {
    $display .= "<li style=\"padding-bottom:3px\"><a href=\"{$_CONF['site_url']}/usersettings.php?mode=edit\">" . $LANG_SUCCESS[14] . ' <strong>' . $LANG_SUCCESS[7] . '</strong> ' . $LANG_SUCCESS[15] . '</a></li>';
}

$display .= '<li style="padding-bottom:3px">' . $LANG_SUCCESS[16] . ' <tt>' . $_CONF['path'] . 'db-config.php</tt> ' . $LANG_SUCCESS[17] . ' <tt>' . $_CONF['path_html'] . 'siteconfig.php</tt> ' . $LANG_SUCCESS[18] . ' 755.</li>
</ol>';

$display .= '<p><strong>'.$LANG_INSTALL['language_support'].'</strong></p>';
$display .= '<p>'.$LANG_INSTALL['language_pack'].'</p>';


$display .= COM_endBlock ();
$display .= COM_siteFooter ();

echo $display;

?>