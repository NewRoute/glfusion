<?php
###############################################################################
# hebrew_utf-8.php
#
# This is the Hebrew language file for the glFusion Polls plugin
#
# Copyright (C) 2008
# http://lior.weissbrod.com
# Version 1.5#1

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

$LANG_POLLS = array(
    'polls' => 'סקרים',
    'results' => 'תוצאות',
    'pollresults' => 'תוצאות סקרים',
    'votes' => 'הצבעות',
    'vote' => 'הצבעה',
    'pastpolls' => 'סקרי עבר',
    'savedvotetitle' => 'ההצבעה נשמרה',
    'savedvotemsg' => 'הצבעתם נשמרה בסקר',
    'pollstitle' => 'סקרים במערכת',
    'polltopics' => 'סקרים נוספים',
    'stats_top10' => 'עשרת הסקרים הגדולים',
    'stats_topics' => 'נושא הסקר',
    'stats_votes' => 'הצבעות',
    'stats_none' => 'נראה שאין סקרים באתר זה או שאף אחד עוד לא הצביע.',
    'stats_summary' => 'סקרים (תשובות) במערכת',
    'open_poll' => 'פתוח להצבעה',
    'answer_all' => 'אנא ענו על כל השאלות שנותרו',
    'not_saved' => 'התוצאות לא נשמרו',
    'upgrade1' => 'התקנתם גרסה חדשה של plugins הסקרים. אנא',
    'upgrade2' => 'שדרגו',
    'editinstructions' => 'אנא מלאו את קוד הזיהוי של הסקר, לפחות שאלה אחת ושתי תשובות לה.',
    'pollclosed' => 'This poll is closed for voting.',
    'pollhidden' => 'You have already voted. This poll results will only be shown when voting is closed.',
    'start_poll' => 'Start Poll',
    'deny_msg' => 'Access to this poll is denied.  Either the poll has been moved/removed or you do not have sufficient permissions.',
    'login_required' => "<a href=\"{$_CONF['site_url']}/users.php\" rel=\"nofollow\">Login</a> required to vote",
    'username' => 'Username',
    'ipaddress' => 'IP Address',
    'date_voted' => 'Date Voted',
    'description' => 'Description',
    'general' => 'General',
    'poll_questions' => 'Poll Questions',
    'permissions' => 'Permissions'
);

###############################################################################
# admin/plugins/polls/index.php

$LANG25 = array(
    1 => 'מצב',
    2 => 'אנא הכניסו נושא, לפחות שאלה אחת ולפחות תשובה אחת לה.',
    3 => 'הסקר נוצר',
    4 => 'הסקר %s נשמר',
    5 => 'עריכת הסקר',
    6 => 'קוד זיהוי סקר',
    7 => '(אל תשתמשו ברווחים)',
    8 => 'הופעה בקוביית המידע של סקרים',
    9 => 'נושא',
    10 => 'תשובות / הצבעות / הערות',
    11 => 'חלה שגיאה בהוצאת מידע על תשובות הסקר לגבי הסקר %s',
    12 => 'חלה שגיאה בהוצאת מידע על שאלת הסקר לגבי הסקר %s',
    13 => 'צרו סקר',
    14 => 'שמירה',
    15 => 'ביטול',
    16 => 'מחיקה',
    17 => 'אנא הכניסו קוד זיהוי סקר',
    18 => 'רשימת הסקרים',
    19 => 'כדי לשנות או למחוק סקר, ליחצו על אייקון העריכה של הסקר.  כדי ליצור סקר חדש, ליחצו על "צרו חדש" שלעיל.',
    20 => 'מצביעים',
    21 => 'הגישה לא אושרה',
    22 => "הנכם מנסים לגשת לסקר שאין לכם גישה אליו.  נסיון זה נרשם ביומן. אנא <a href=\"{$_CONF['site_admin_url']}/plugins/links/index.php\">חיזרו למסך ניהול הסקרים</a>.",
    23 => 'סקר חדש',
    24 => 'דף הניהול הראשי',
    25 => 'כן',
    26 => 'לא',
    27 => 'עריכה',
    28 => 'שליחה',
    29 => 'חיפוש',
    30 => 'הגבלת תוצאות',
    31 => 'שאלה',
    32 => 'כדי למחוק שאלה זו מהסקר, מיחקו את טקסט השאלה',
    33 => 'פתוח להצבעות',
    34 => 'נושא הסקר:',
    35 => 'לסקר זה יש',
    36 => 'שאלות נוספות.',
    37 => 'החבאת תוצאות כל זמן שהסקר פתוח',
    38 => 'בזמן שהסקר פתוח, רק יוצריו והמנהלים הראשיים יוכלו לצפות בתוצאות',
    39 => 'הנושא יוצג רק אם יש יותר משאלה אחת.',
    40 => 'צפו בכל התשובות של סקר זה',
    41 => 'Are you sure you want to delete this Poll?',
    42 => 'Are you absolutely sure you want to delete this Poll?  All questions, answers and comments that are associated with this Poll will also be permanently deleted from the database.',
    43 => 'Login Required to Vote'
);

###############################################################################
# autotag descriptions

$LANG_PO_AUTOTAG = array(
    'desc_poll' => 'Link: to a Poll on this site.  link_text defaults to the Poll topic.  usage: [poll:<i>poll_id</i> {link_text}]',
    'desc_poll_result' => 'HTML: renders the results of a Poll on this site.  usage: [poll_result:<i>poll_id</i>]',
    'desc_poll_vote' => 'HTML: renders a voting block for a Poll on this site.  usage: [poll_vote:<i>poll_id</i>]'
);

$PLG_polls_MESSAGE19 = 'הסקר שלכם נשמר בהצלחה.';
$PLG_polls_MESSAGE20 = 'הסקר שלכם נמחק בהצלחה.';

// Messages for the plugin upgrade
$PLG_polls_MESSAGE3001 = 'אין תמיכה בשדרוג ה-plugin.';
$PLG_polls_MESSAGE3002 = $LANG32[9];

// Localization of the Admin Configuration UI
$LANG_configsections['polls'] = array(
    'label' => 'סקרים',
    'title' => 'ניהול הסקרים'
);

$LANG_confignames['polls'] = array(
    'pollsloginrequired' => 'נדרשת הזדהות בשביל צפייה בסקרים?',
    'hidepollsmenu' => 'החבאת ההפנייה לסקרים בתפריט?',
    'maxquestions' => 'כמות השאלות המקסימלית בסקר',
    'maxanswers' => 'כמות האפשרויות המקסימלית לכל שאלה',
    'answerorder' => 'מיון תוצאות ...',
    'pollcookietime' => 'עוגיית המצביעים תקיפה עד',
    'polladdresstime' => 'כתובת ה-IP של המצביעים תקיפה עד',
    'delete_polls' => 'מחיקת הסקרים עם יוצריהם?',
    'aftersave' => 'לאחר שמירת סקר',
    'default_permissions' => 'הרשאות ברירת המחדל של סקר',
    'displayblocks' => 'Display glFusion Blocks'
);

$LANG_configsubgroups['polls'] = array(
    'sg_main' => 'הגדרות ראשיות'
);

$LANG_fs['polls'] = array(
    'fs_main' => 'General Polls Settings',
    'fs_permissions' => 'Default Permissions'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['polls'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => true, 'False' => false),
    2 => array('As Submitted' => 'submitorder', 'By Votes' => 'voteorder'),
    9 => array('Forward to Poll' => 'item', 'Display Admin List' => 'list', 'Display Public List' => 'plugin', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3),
    13 => array('Left Blocks' => 0, 'Right Blocks' => 1, 'Left & Right Blocks' => 2, 'None' => 3)
);

?>