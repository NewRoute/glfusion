<?php
###############################################################################
# czech.php  (iso 8859-2)
# This is the czech language page for the glFusion Calendar Plug-in!
#
# Copyright (C) 2007 Ondrej Rusek
# rusek@gybon.cz
# (c) 2010 Ivan Simunek ivsi@post.cz
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################

if (!defined ('GVERSION')) {
    die ('This file cannot be used on its own.');
}

global $LANG32;

###############################################################################
# Array Format:
# $LANGXX[YY]:  $LANG - variable name
#               XX    - file id number
#               YY    - phrase id number
###############################################################################

# index.php
$LANG_CAL_1 = array(
    1 => 'Kalend�� ud�lost�',
    2 => 'Bohu�el. ��dn� ud�losti k zobrazen�.',
    3 => 'Kdy',
    4 => 'Kde',
    5 => 'Popis',
    6 => 'P�idat ud�lost',
    7 => 'Bl��c� se ud�losti',
    8 => 'By adding this event to your calendar you can quickly view only the events you are interested in by clicking "My Calendar" from the User Functions area.',
    9 => 'P�idat do osobn�ho kalend��e.',
    10 => 'Odebrat z m�ho kalend��e',
    11 => 'P�idat ud�lost do osobn�ho kalend��e u�ivatele %s',
    12 => 'Ud�lost',
    13 => 'Za��tek',
    14 => 'Konec',
    15 => 'Zp�t na kalend��',
    16 => 'Kalend��',
    17 => 'Po��te�n� datum',
    18 => 'Koncov� datum',
    19 => 'Po�adavky kalend��e',
    20 => 'Titulek',
    21 => 'Po��te�n� datum',
    22 => 'URL',
    23 => '<hr>...soukrom�',
    24 => '...ve�ejn�',
    25 => '��dn� bl��c� se ud�losti',
    26 => 'Poslat ud�lost',
    27 => "Odesl�n�m ud�losti pro {$_CONF['site_name']} p�id�te va�i ud�lost do hlavn�ho kalend��e. Po odesl�n� bude ud�lost podrobena schv�len� a pot� bude publikov�na v hlavn�m kalend��i.",
    28 => 'Titulek',
    29 => '�as konce',
    30 => '�as za��tku',
    31 => 'V�echny ud�losti dne',
    32 => 'Adresa 1',
    33 => 'Adresa 2',
    34 => 'M�sto',
    35 => 'St�t',
    36 => 'PS�',
    37 => 'Typ ud�losti',
    38 => 'Editovat typy ud�lost�',
    39 => 'Um�st�n�',
    40 => 'P�idat ud�lost do',
    41 => 'Hlavn� kalend��',
    42 => 'Osobn� kalend��',
    43 => 'Odkaz',
    44 => 'HTML tagy nejsou povoleny',
    45 => 'Odeslat',
    46 => 'Ud�losti v syst�mu',
    47 => 'Top Ten ud�lost�',
    48 => 'Kliknut�',
    49 => '��dn� ud�losti.',
    50 => 'Ud�losti',
    51 => 'Vymazat',
    52 => 'P�idal(a)',
    53 => 'Calendar View'
);

$_LANG_CAL_SEARCH = array(
    'results' => 'V�sledky kalend��e',
    'title' => 'Titulek',
    'date_time' => 'Datum & �as',
    'location' => 'Um�st�n�',
    'description' => 'Popis'
);

###############################################################################
# calendar.php ($LANG30)

$LANG_CAL_2 = array(
    8 => 'P�idat osobn� ud�lost',
    9 => '%s ud�lost',
    10 => 'Ud�losti pro',
    11 => 'Hlavn� kalend��',
    12 => 'M�j kalend��',
    25 => 'Zp�t do ',
    26 => 'Cel� den',
    27 => 'T�den',
    28 => 'Osobn� kalend�� pro',
    29 => 'Ve�ejn� kalend��',
    30 => 'vymazat ud�lost',
    31 => 'P�idat',
    32 => 'Ud�lost',
    33 => 'Datum',
    34 => '�as',
    35 => 'Rychle p�idat',
    36 => 'Odeslat',
    37 => 'Bohu�el, pou�it� osobn�ho kalend��e nen� povoleno',
    38 => 'Osobn� editor ud�lost�',
    39 => 'Den',
    40 => 'T�den',
    41 => 'M�s�c',
    42 => 'P�idat hlavn� ud�lost',
    43 => 'Po�adavky ud�lost�'
);

###############################################################################
# admin/plugins/calendar/index.php, formerly admin/event.php ($LANG22)

$LANG_CAL_ADMIN = array(
    1 => 'Editor ud�lost�',
    2 => 'Chyba',
    3 => 'Post Mode',
    4 => 'URL ud�losti',
    5 => 'Datum za��tku',
    6 => 'Datum konce',
    7 => 'Um�st�n� ud�losti',
    8 => 'Popis ud�losti',
    9 => '(v�etn� http://)',
    10 => 'Mus�te zadata datum/�as, titulek a popis',
    11 => 'Spr�vce kalend��e',
    12 => 'Pro zm�nu nebo vymaz�n� ud�losti, klikn�te na ikonu ud�losti.  Pro vytvo�en� nov� ud�losti, klikn�te na "Vytvo�it novou". Kliknut�m na ikonu kopie vytvo��te kopii ud�losti.',
    13 => 'Vlastn�k',
    14 => 'Datum za��tku',
    15 => 'Datum konce',
    16 => '',
    17 => "P�istupujete k ud�losti, na kterou nem�te dostate�n� pr�va. Tento pokus byl zalogov�n. Pros�m, <a href=\"{$_CONF['site_admin_url']}/plugins/calendar/index.php\">vra�e ze zp�t na administraci ud�lost�</a>.",
    18 => '',
    19 => '',
    20 => 'ulo�it',
    21 => 'cancel',
    22 => 'vymazat',
    23 => 'Chybn� datum za��tku.',
    24 => 'Chybn� datum konce.',
    25 => 'Koncov� datum je p�ed datem za��tku.',
    26 => 'D�vkov� zpracov�n�',
    27 => 'Tohle jsou ud�losti star�� ne� ',
    28 => ' m�s�c�. Pokud chce�, zm�� d�lku obdob� a pak klikni na Obnov v�pis. Pro odstran�n� z datab�ze vyber jednu nebo v�ce ud�lost�  a pak klikni na ikonu pro vymaz�n�. Budou vymaz�ny pouze vybran� ud�losti ze zobrazen�ch.',
    29 => '',
    30 => 'Obnov v�pis',
    31 => 'Are You sure you want to permanently delete ALL selected users?',
    32 => 'Vypsat v�e',
    33 => 'Nic nebylo vybr�no pro vymaz�n�',
    34 => 'Event ID',
    35 => 'could not be deleted',
    36 => '�sp�n� vymaz�no',
    37 => 'Moderate Event',
    38 => 'Batch Event Admin',
    39 => 'Event Admin',
    40 => 'Event List',
    41 => 'This screen allows you to edit / create events. Edit the fields below and save.'
);

$LANG_CAL_AUTOTAG = array(
    'desc_calendar' => 'Link: to a Calendar event on this site; link_text defaults to event title: [calendar:<i>event_id</i> {link_text}]'
);

$LANG_CAL_MESSAGE = array(
    'save' => 'Ud�lost byla �sp�n� ulo�ena.',
    'delete' => 'Ud�lost byla �sp�n� vymaz�na.',
    'private' => 'Ud�lost byla ulo�ena do va�eho osobn�ho kalend��e',
    'login' => 'Nemohu otev��t v� osobn� kalend�� dokud se nep�ihl�s�te',
    'removed' => 'Ud�lost byla odstran�na z va�eho osobn�ho kalend��e',
    'noprivate' => 'Bohu�el, osobn� kalend��e tento server nepodporuje',
    'unauth' => 'Bohu�el, nem�te administr�torsk� p��stup. Tento v� pokus byl zalogov�n',
    'delete_confirm' => 'OPRAVDU chce� vymazat tuto ud�lost?'
);

$PLG_calendar_MESSAGE4 = "D�kujeme za odesl�n� ud�losti pro {$_CONF['site_name']}.  Nyn� o�ek�v� potvrzen�.  Jakmile bude potvrzena, naleznete ji v <a href=\"{$_CONF['site_url']}/calendar/index.php\">kalend��i</a>.";
$PLG_calendar_MESSAGE17 = 'Ud�lost byla �sp�n� ulo�ena.';
$PLG_calendar_MESSAGE18 = 'Ud�lost byla �sp�n� vymaz�na.';
$PLG_calendar_MESSAGE24 = 'Ud�lost byla ulo�ena do kalend��e.';
$PLG_calendar_MESSAGE26 = 'Ud�lost byla vymaz�na.';

// Messages for the plugin upgrade
$PLG_calendar_MESSAGE3001 = 'Plugin upgrade not supported.';
$PLG_calendar_MESSAGE3002 = $LANG32[9];

// Localization of the Admin Configuration UI
$LANG_configsections['calendar'] = array(
    'label' => 'Calendar',
    'title' => 'Calendar Configuration'
);

$LANG_confignames['calendar'] = array(
    'calendarloginrequired' => 'Calendar Login Required?',
    'hidecalendarmenu' => 'Hide Calendar Menu Entry?',
    'personalcalendars' => 'Enable Personal Calendars?',
    'eventsubmission' => 'Enable Submission Queue?',
    'showupcomingevents' => 'Show upcoming Events?',
    'upcomingeventsrange' => 'Upcoming Events Range',
    'event_types' => 'Event Types',
    'hour_mode' => 'Hour Mode',
    'notification' => 'Notification Email?',
    'delete_event' => 'Delete Events with Owner?',
    'aftersave' => 'After Saving Event',
    'default_permissions' => 'Event Default Permissions',
    'only_admin_submit' => 'P�idat ud�lost sm� jen Admin',
    'displayblocks' => 'Display glFusion Blocks'
);

$LANG_configsubgroups['calendar'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_fs['calendar'] = array(
    'fs_main' => 'General Calendar Settings',
    'fs_permissions' => 'Default Permissions'
);

// Note: entries 0, 1, 6, 9, 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['calendar'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => true, 'False' => false),
    6 => array('12' => 12, '24' => 24),
    9 => array('Forward to Event' => 'item', 'Display Admin List' => 'list', 'Display Calendar' => 'plugin', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3),
    13 => array('Left Blocks' => 0, 'Right Blocks' => 1, 'Left & Right Blocks' => 2, 'None' => 3)
);

?>