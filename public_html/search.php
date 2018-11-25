<?php
// +--------------------------------------------------------------------------+
// | glFusion CMS                                                             |
// +--------------------------------------------------------------------------+
// | search.php                                                               |
// |                                                                          |
// | glFusion search tool.                                                    |
// +--------------------------------------------------------------------------+
// | Copyright (C) 2000-2008 by the following authors:                        |
// |                                                                          |
// | Authors: Tony Bibbs        - tony AT tonybibbs DOT com                   |
// |          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net   |
// |          Jason Whittenburg - jwhitten AT securitygeeks DOT com           |
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

require_once 'lib-common.php';

if ( isset($_VARS['service_search'] ) ) {
    if ( class_exists ( $_VARS['service_search'],true) ) {
        $className = $_VARS['service_search'];
    } else {
        $className = 'Search';
    }
} else {
    $className = 'Search';
}
$searchObj = new $className;

if (isset ($_GET['mode']) && ($_GET['mode'] == 'search')) {
    $display = COM_siteHeader('menu', $LANG09[11]);
    $display .= $searchObj->doSearch();
} else {
    $display = COM_siteHeader ('menu', sprintf($LANG09[1],$_CONF['site_name']));
    $display .= $searchObj->showForm();
}

$display .= COM_siteFooter();

echo $display;

?>