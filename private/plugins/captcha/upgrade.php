<?php
// +--------------------------------------------------------------------------+
// | CAPTCHA Plugin - glFusion CMS                                            |
// +--------------------------------------------------------------------------+
// | upgrade.php                                                              |
// |                                                                          |
// | Upgrade routines                                                         |
// +--------------------------------------------------------------------------+
// | Copyright (C) 2005-2017 by the following authors:                        |
// |                                                                          |
// | Mark R. Evans          mark AT glfusion DOT org                          |
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

if (!defined ('GVERSION')) {
    die ('This file can not be used on its own.');
}

require_once $_CONF['path'].'plugins/captcha/captcha.php';

function captcha_upgrade()
{
    global $_TABLES, $_CONF, $_CP_CONF;

    $currentVersion = DB_getItem($_TABLES['plugins'],'pi_version',"pi_name='captcha'");

    switch( $currentVersion ) {
        case "2.0.0" :
        case "2.0.1" :
        case "2.0.2" :
            DB_query("UPDATE {$_TABLES['plugins']} SET pi_version='2.1.0' WHERE pi_name='captcha' LIMIT 1");
        case "2.1.0" :
        case "2.1.1" :
        case "2.1.2" :
            $_SQL['cp_sessions'] =
                            "CREATE TABLE {$_TABLES['cp_sessions']} ( " .
                            "  `session_id` varchar(40) NOT NULL default '', " .
                            "  `cptime`  INT(11) NOT NULL default 0, " .
                            "  `validation` varchar(40) NOT NULL default '', " .
                            "  `counter`    INT(11) NOT NULL default 0, " .
                            "  PRIMARY KEY (`session_id`) " .
                            " );";

            foreach ($_SQL as $table => $sql) {
                COM_errorLog("Creating $table table",1);
                DB_query($sql,1);
                if (DB_error()) {
                    COM_errorLog("Error Creating $table table",1);
                }
                COM_errorLog("Success - Created $table table",1);
            }
            DB_query("UPDATE {$_TABLES['plugins']} SET pi_version='3.0.0' WHERE pi_name='captcha' LIMIT 1");
        case "3.0.0" :
        case "3.0.1" :
        case "3.0.2" :
        case "3.1.0" :
            // need to migrate the configuration to our new online configuration.
            require_once $_CONF['path_system'] . 'classes/config.class.php';
            require_once $_CONF['path'] . 'plugins/captcha/install_defaults.php';
            plugin_initconfig_captcha();
            include $_CONF['path'].'plugins/captcha/captcha.php';
        case "3.2.0" :
            $c = config::get_instance();
            $c->add('expire', '900','text',
                   0, 0, 0, 70, true, 'captcha');
        case '3.2.1' :
        case '3.2.2' :
        case '3.2.3' :
            $c = config::get_instance();
            $c->add('publickey', '','text',
                    0, 0, 0, 42, true, 'captcha');
            $c->add('privatekey', '','text',
                    0, 0, 0, 44, true, 'captcha');
            $c->add('recaptcha_theme', 'white','select',
                    0, 0, 6, 46, true, 'captcha');
        case '3.2.4' :
        case '3.2.5' :
            $c = config::get_instance();
            $c->add('pc_publickey', '','text',0, 0, 0, 48, true, 'captcha');
            $c->add('pc_privatekey', '','text',0, 0, 0, 49, true, 'captcha');

        case '3.3.0' :
            $c = config::get_instance();
            $c->add('ay_publickey', '','text',0, 0, 0, 50, true, 'captcha');
            $c->add('ay_privatekey', '','text',0, 0, 0, 51, true, 'captcha');

            $c->del('pc_publickey','captcha');
            $c->del('pc_privatekey','captcha');
            if ( $_CP_CONF['gfxDriver'] == 4 ) {
                $c->set('gfxDriver',6,'captcha');
            }
        case '3.4.0' :
            // no changes needed
        case '3.4.1' :
            // need to add column to table
            // ALTER TABLE `gl_cp_sessions` ADD `ip` VARCHAR(16) NOT NULL ;
            $sql = "ALTER TABLE {$_TABLES['cp_sessions']} ADD `ip` VARCHAR(16) NOT NULL";
            DB_query($sql,1);
            $sql = "ALTER TABLE {$_TABLES['cp_sessions']} CHANGE `counter` `counter` INT(11) NOT NULL DEFAULT '0';";
            DB_query($sql,1);

        case '3.5.1' :
            $c = config::get_instance();
            $c->del('ay_publickey','captcha');
            $c->del('ay_privatekey','captcha');
            if ( $_CP_CONF['gfxDriver'] == 5 ) {
                $c->set('gfxDriver',6,'captcha');
            }
        case '3.5.2' :
            $c = config::get_instance();
            $c->set('recaptcha_theme','light','captcha');
        case '3.5.3' :
            // no changes

        default :
            DB_query("UPDATE {$_TABLES['plugins']} SET pi_version='".$_CP_CONF['pi_version']."',pi_gl_version='".$_CP_CONF['gl_version']."' WHERE pi_name='captcha' LIMIT 1");
            break;
    }
    if ( DB_getItem($_TABLES['plugins'],'pi_version',"pi_name='captcha'") == $_CP_CONF['pi_version']) {
        return true;
    } else {
        return false;
    }
}
?>