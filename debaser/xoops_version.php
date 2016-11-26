<?php
// $Id: xoops_version.php,v 0.7 2004/09/10 10:00:00 frankblack Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
include_once XOOPS_ROOT_PATH . '/modules/debaser/include/functions.php';
global $xoopsUser, $xoopsModuleConfig;

$modversion['name']        = _MI_DEBASER_NAME;
$modversion['version']     = 0.92;
$modversion['description'] = _MI_DEBASER_DESC;
$modversion['author']      = 'frankblack';
$modversion['credits']     = _MI_DEBASER_CREDITS;
$modversion['help']        = 'help.html';
$modversion['license']     = 'GPL see LICENSE';
$modversion['official']    = 0;
$modversion['image']       = 'images/debaser_slogo.jpg';
$modversion['dirname']     = 'debaser';

$modversion['author_realname']     = 'Joachim (Joe) Liedtke';
$modversion['author_website_url']  = 'http://www.myxoops.org';
$modversion['author_website_name'] = 'myXoops';
$modversion['author_email']        = 'frankblack@myxoops.de';
$modversion['status']              = 'Version 0.92';

$modversion['warning'] = _MI_DEBASER_WARNING;

$modversion['support_site_url']  = 'http://dev.xoops.org/modules/xfmod/project/?group_id=1024';
$modversion['support_site_name'] = 'debaser on the Developers Forge';
$modversion['submit_bug']        = 'http://dev.xoops.org/modules/xfmod/tracker/?func=add&group_id=1024&atid=197';
$modversion['submit_feature']    = 'http://dev.xoops.org/modules/xfmod/tracker/?func=add&group_id=1024&atid=200';

$modversion['author_word'] = _MI_DEBASER_AUTHORMSG;

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'debaser_files';
$modversion['tables'][1] = 'debaser_player';
$modversion['tables'][2] = 'debaservotedata';
$modversion['tables'][3] = 'debaser_user';
$modversion['tables'][4] = 'debaser_genre';
$modversion['tables'][5] = 'debaserradio';
$modversion['tables'][6] = 'debaser_mimetypes';

// Admin things
$modversion['system_menu']   = 0;
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu']  = 'admin/menu.php';

// Menu
$modversion['hasMain'] = 1;

if (is_object($xoopsUser) && isset($xoopsModuleConfig['uploadmpegs'])) {
    $groups = $xoopsUser->getGroups();

    if (array_intersect($xoopsModuleConfig['uploadmpegs'], $groups)) {
        $modversion['sub'][1]['name'] = _MI_DEBASER_SUBMIT;
        $modversion['sub'][1]['url']  = 'upload.php';
    }
} else {
    if (isset($xoopsModuleConfig['anonpost']) && $xoopsModuleConfig['anonpost'] == 1) {
        $modversion['sub'][1]['name'] = _MI_DEBASER_SUBMIT;
        $modversion['sub'][1]['url']  = 'upload.php';
    }
}

if (is_object($xoopsUser) && isset($xoopsModuleConfig['preselect_player'])) {
    $groups = $xoopsUser->getGroups();

    if (array_intersect($xoopsModuleConfig['preselect_player'], $groups)) {
        /* no user player-select */
    } else {
        $modversion['sub'][2]['name'] = _MI_DEBASER_MYDEBASER;
        $modversion['sub'][2]['url']  = 'mydebaser.php';
    }
}

// Comments
$modversion['hasComments']          = 1;
$modversion['comments']['itemName'] = 'id';
$modversion['comments']['pageName'] = 'singlefile.php';

// Search
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'debaser_search';

// Templates
$modversion['templates'][1]['file']         = 'debaser_upload.html';
$modversion['templates'][1]['description']  = _MI_DEBASER_UPLOADER;
$modversion['templates'][2]['file']         = 'debaser_player.html';
$modversion['templates'][2]['description']  = _MI_DEBASER_MPEGPLAYER;
$modversion['templates'][3]['file']         = 'debaser_index.html';
$modversion['templates'][3]['description']  = _MI_DEBASER_INDEX;
$modversion['templates'][4]['file']         = 'debaser_genre.html';
$modversion['templates'][4]['description']  = _MI_DEBASER_GENRES;
$modversion['templates'][5]['file']         = 'debaser_ameditgenre.html';
$modversion['templates'][5]['description']  = _MI_DEBASER_AMEDITGENRE;
$modversion['templates'][6]['file']         = 'debaser_amgenremanage.html';
$modversion['templates'][6]['description']  = _MI_DEBASER_AMGENREMANAGE;
$modversion['templates'][7]['file']         = 'debaser_amplaymanage.html';
$modversion['templates'][7]['description']  = _MI_DEBASER_AMPLAYMANAGE;
$modversion['templates'][8]['file']         = 'debaser_amshowmpegs.html';
$modversion['templates'][8]['description']  = _MI_DEBASER_AMSHOWMPEGS;
$modversion['templates'][9]['file']         = 'debaser_ameditplay.html';
$modversion['templates'][9]['description']  = _MI_DEBASER_AMEDITPLAY;
$modversion['templates'][10]['file']        = 'debaser_ameditmpegs.html';
$modversion['templates'][10]['description'] = _MI_DEBASER_EDITMPEGS;
$modversion['templates'][11]['file']        = 'debaser_amapprove.html';
$modversion['templates'][11]['description'] = _MI_DEBASER_APPROVE;
$modversion['templates'][12]['file']        = 'debaser_singlefile.html';
$modversion['templates'][12]['description'] = _MI_DEBASER_SINGLEFILE;
$modversion['templates'][13]['file']        = 'debaser_mydebaser.html';
$modversion['templates'][13]['description'] = '';
$modversion['templates'][14]['file']        = 'debaser_radiopopup.html';
$modversion['templates'][14]['description'] = '';
$modversion['templates'][15]['file']        = 'debaser_uploadresult.html';
$modversion['templates'][15]['description'] = '';
$modversion['templates'][16]['file']        = 'debaser_amupload.html';
$modversion['templates'][16]['description'] = '';

// Blocks
$modversion['blocks'][1]['file']        = 'debaser_blocks_latest.php';
$modversion['blocks'][1]['name']        = _MI_DEBASER_LATEST;
$modversion['blocks'][1]['description'] = _MI_DEBASER_LATEST_DESC;
$modversion['blocks'][1]['show_func']   = 'b_debaser_latest_show';
$modversion['blocks'][1]['edit_func']   = 'b_debaser_latest_edit';
$modversion['blocks'][1]['options']     = '5';
$modversion['blocks'][1]['template']    = 'debaser_block_latest.html';

$modversion['blocks'][2]['file']        = 'radio_block.php';
$modversion['blocks'][2]['name']        = _MI_DEBASERRAD_TITLE;
$modversion['blocks'][2]['description'] = _MI_DEBASERRAD_DESC;
$modversion['blocks'][2]['show_func']   = 'debaser_showradio';
$modversion['blocks'][2]['template']    = 'radioselect.html';

$modversion['blocks'][3]['file']        = 'debaser_blocks_rated.php';
$modversion['blocks'][3]['name']        = _MI_DEBASER_RATED;
$modversion['blocks'][3]['description'] = _MI_DEBASER_RATED_DESC;
$modversion['blocks'][3]['show_func']   = 'b_debaser_rated_show';
$modversion['blocks'][3]['edit_func']   = 'b_debaser_rated_edit';
$modversion['blocks'][3]['options']     = '5';
$modversion['blocks'][3]['template']    = 'debaser_block_rated.html';

$modversion['blocks'][4]['file']        = 'debaser_blocks_hits.php';
$modversion['blocks'][4]['name']        = _MI_DEBASER_HITS;
$modversion['blocks'][4]['description'] = _MI_DEBASER_HITS_DESC;
$modversion['blocks'][4]['show_func']   = 'b_debaser_hits_show';
$modversion['blocks'][4]['edit_func']   = 'b_debaser_hits_edit';
$modversion['blocks'][4]['options']     = '5';
$modversion['blocks'][4]['template']    = 'debaser_block_hits.html';

$modversion['blocks'][5]['file']        = 'debaser_blocks_views.php';
$modversion['blocks'][5]['name']        = _MI_DEBASER_VIEWS;
$modversion['blocks'][5]['description'] = _MI_DEBASER_VIEWS_DESC;
$modversion['blocks'][5]['show_func']   = 'b_debaser_views_show';
$modversion['blocks'][5]['edit_func']   = 'b_debaser_views_edit';
$modversion['blocks'][5]['options']     = '5';
$modversion['blocks'][5]['template']    = 'debaser_block_views.html';

$modversion['blocks'][6]['file']        = 'debaser_blocks_displatest.php';
$modversion['blocks'][6]['name']        = _MI_DEBASER_DISPLATEST;
$modversion['blocks'][6]['description'] = _MI_DEBASER_DISPLATEST_DESC;
$modversion['blocks'][6]['show_func']   = 'b_debaser_displatest_show';
$modversion['blocks'][6]['edit_func']   = 'b_debaser_displatest_edit';
$modversion['blocks'][6]['options']     = '150|160';
$modversion['blocks'][6]['template']    = 'debaser_block_displatest.html';

$modversion['blocks'][7]['file']        = 'debaser_blocks_disprated.php';
$modversion['blocks'][7]['name']        = _MI_DEBASER_DISPRATED;
$modversion['blocks'][7]['description'] = _MI_DEBASER_DISPRATED_DESC;
$modversion['blocks'][7]['show_func']   = 'b_debaser_disprated_show';
$modversion['blocks'][7]['edit_func']   = 'b_debaser_disprated_edit';
$modversion['blocks'][7]['options']     = '150|160';
$modversion['blocks'][7]['template']    = 'debaser_block_disprated.html';

$modversion['blocks'][8]['file']        = 'debaser_blocks_dispfeatured.php';
$modversion['blocks'][8]['name']        = _MI_DEBASER_DISPFEATURED;
$modversion['blocks'][8]['description'] = _MI_DEBASER_DISPFEATURED_DESC;
$modversion['blocks'][8]['show_func']   = 'b_debaser_dispfeatured_show';
$modversion['blocks'][8]['edit_func']   = 'b_debaser_dispfeatured_edit';
$modversion['blocks'][8]['options']     = '150|160|1';
$modversion['blocks'][8]['template']    = 'debaser_block_dispfeatured.html';

$modversion['blocks'][9]['file']        = 'debaser_blocks_dispdown.php';
$modversion['blocks'][9]['name']        = _MI_DEBASER_DISPDOWN;
$modversion['blocks'][9]['description'] = _MI_DEBASER_DISPDOWN_DESC;
$modversion['blocks'][9]['show_func']   = 'b_debaser_dispdown_show';
$modversion['blocks'][9]['edit_func']   = 'b_debaser_dispdown_edit';
$modversion['blocks'][9]['options']     = '150|160';
$modversion['blocks'][9]['template']    = 'debaser_block_dispdown.html';

$modversion['blocks'][10]['file']        = 'debaser_blocks_dispviewed.php';
$modversion['blocks'][10]['name']        = _MI_DEBASER_DISPVIEWED;
$modversion['blocks'][10]['description'] = _MI_DEBASER_DISPVIEWED_DESC;
$modversion['blocks'][10]['show_func']   = 'b_debaser_dispviewed_show';
$modversion['blocks'][10]['edit_func']   = 'b_debaser_dispviewed_edit';
$modversion['blocks'][10]['options']     = '150|160';
$modversion['blocks'][10]['template']    = 'debaser_block_dispviewed.html';

//reads the upload_max_size from php.ini
$uploadmax = (ini_get('upload_max_filesize') * 1048576 - 1024);
//

//Config settings
$modversion['config'][1]['name']        = 'debaserallowdown';
$modversion['config'][1]['title']       = '_MI_DEBASER_DOWNLOAD';
$modversion['config'][1]['description'] = '_MI_DEBASER_ALLOWDOWN';
$modversion['config'][1]['formtype']    = 'yesno';
$modversion['config'][1]['valuetype']   = 'int';
$modversion['config'][1]['default']     = 1;

$modversion['config'][2]['name']        = 'debaserplaylist';
$modversion['config'][2]['title']       = '_MI_DEBASER_PLAYLIST';
$modversion['config'][2]['description'] = '_MI_DEBASER_PLAYLISTDSC';
$modversion['config'][2]['formtype']    = 'yesno';
$modversion['config'][2]['valuetype']   = 'int';
$modversion['config'][2]['default']     = 1;

$modversion['config'][3]['name']        = 'indexperpage';
$modversion['config'][3]['title']       = '_MI_DEBASER_VIEWLIMIT';
$modversion['config'][3]['description'] = '_MI_DEBASER_VIEWLIMITDESC';
$modversion['config'][3]['formtype']    = 'select';
$modversion['config'][3]['valuetype']   = 'int';
$modversion['config'][3]['default']     = 10;
$modversion['config'][3]['options']     = array(
    '5'  => 5,
    '10' => 10,
    '15' => 15,
    '20' => 20,
    '25' => 25,
    '30' => 30,
    '50' => 50
);

$modversion['config'][4]['name']        = 'uploadmpegs';
$modversion['config'][4]['title']       = '_MI_DEBASER_UPLOAD';
$modversion['config'][4]['description'] = '_MI_DEBASER_UPLOADDESC';
$modversion['config'][4]['formtype']    = 'group_multi';
$modversion['config'][4]['valuetype']   = 'array';
$modversion['config'][4]['default']     = array('1' => 1, '2' => 2);

$modversion['config'][5]['name']        = 'anonpost';
$modversion['config'][5]['title']       = '_MI_DEBASER_ANONPOST';
$modversion['config'][5]['description'] = '_MI_DEBASER_ANONPOSTDESC';
$modversion['config'][5]['formtype']    = 'yesno';
$modversion['config'][5]['valuetype']   = 'int';
$modversion['config'][5]['default']     = 0;

$modversion['config'][6]['name']        = 'autofileapprove';
$modversion['config'][6]['title']       = '_MI_DEBASER_AUTOFILEAPPROVE';
$modversion['config'][6]['description'] = '_MI_DEBASER_AUTOFILEAPPROVEDSC';
$modversion['config'][6]['formtype']    = 'yesno';
$modversion['config'][6]['valuetype']   = 'int';
$modversion['config'][6]['default']     = 1;

$modversion['config'][7]['name']        = 'autolinkapprove';
$modversion['config'][7]['title']       = '_MI_DEBASER_AUTOLINKAPPROVE';
$modversion['config'][7]['description'] = '_MI_DEBASER_AUTOLINKAPPROVEDSC';
$modversion['config'][7]['formtype']    = 'yesno';
$modversion['config'][7]['valuetype']   = 'int';
$modversion['config'][7]['default']     = 1;

$modversion['config'][8]['name']        = 'autobatchapprove';
$modversion['config'][8]['title']       = '_MI_DEBASER_AUTOBATAPPROVE';
$modversion['config'][8]['description'] = '_MI_DEBASER_AUTOBATAPPROVEDSC';
$modversion['config'][8]['formtype']    = 'yesno';
$modversion['config'][8]['valuetype']   = 'int';
$modversion['config'][8]['default']     = 1;

$modversion['config'][9]['name']        = 'debasermaxsize';
$modversion['config'][9]['title']       = '_MI_DEBASER_MAXSIZE';
$modversion['config'][9]['description'] = '_MI_DEBASER_MAXSIZEDSC';
$modversion['config'][9]['formtype']    = 'textbox';
$modversion['config'][9]['valuetype']   = 'text';
$modversion['config'][9]['default']     = $uploadmax;

$modversion['config'][10]['name']        = 'debaserupsel';
$modversion['config'][10]['title']       = '_MI_DEBASER_UPSEL';
$modversion['config'][10]['description'] = '_MI_DEBASER_UPSELDSC';
$modversion['config'][10]['formtype']    = 'select';
$modversion['config'][10]['valuetype']   = 'int';
$modversion['config'][10]['default']     = 3;
$modversion['config'][10]['options']     = array('_MI_DEBASER_UPFILE' => '1', '_MI_DEBASER_UPLINK' => '2', '_MI_DEBASER_UPBOTH' => '3');

$modversion['config'][11]['name']        = 'guestvote';
$modversion['config'][11]['title']       = '_MI_DEBASER_GUESTVOTE';
$modversion['config'][11]['description'] = '_MI_DEBASER_GUESTVOTEDSC';
$modversion['config'][11]['formtype']    = 'yesno';
$modversion['config'][11]['valuetype']   = 'int';
$modversion['config'][11]['default']     = 0;

$modversion['config'][12]['name']        = 'autogenresingle';
$modversion['config'][12]['title']       = '_MI_DEBASER_AUTOGENRESINGLE';
$modversion['config'][12]['description'] = '_MI_DEBASER_AUTOGENRESINGLEDSC';
$modversion['config'][12]['formtype']    = 'yesno';
$modversion['config'][12]['valuetype']   = 'int';
$modversion['config'][12]['default']     = 0;

$modversion['config'][13]['name']        = 'autogenrebatch';
$modversion['config'][13]['title']       = '_MI_DEBASER_AUTOGENREBATCH';
$modversion['config'][13]['description'] = '_MI_DEBASER_AUTOGENREBATCHDSC';
$modversion['config'][13]['formtype']    = 'yesno';
$modversion['config'][13]['valuetype']   = 'int';
$modversion['config'][13]['default']     = 0;

$modversion['config'][14]['name']        = 'catimage';
$modversion['config'][14]['title']       = '_MI_DEBASER_CATEGORYIMG';
$modversion['config'][14]['description'] = '';
$modversion['config'][14]['formtype']    = 'textbox';
$modversion['config'][14]['valuetype']   = 'text';
$modversion['config'][14]['default']     = 'modules/debaser/images/category';

$modversion['config'][15]['name']        = 'usethumbs';
$modversion['config'][15]['title']       = '_MI_DEBASER_USETHUMBS';
$modversion['config'][15]['description'] = '_MI_DEBASER_USETHUMBSDSC';
$modversion['config'][15]['formtype']    = 'yesno';
$modversion['config'][15]['valuetype']   = 'int';
$modversion['config'][15]['default']     = 1;

$modversion['config'][16]['name']        = 'shotwidth';
$modversion['config'][16]['title']       = '_MI_DEBASER_SHOTWIDTH';
$modversion['config'][16]['description'] = '_MI_DEBASER_SHOTWIDTHDSC';
$modversion['config'][16]['formtype']    = 'textbox';
$modversion['config'][16]['valuetype']   = 'int';
$modversion['config'][16]['default']     = 140;

$modversion['config'][17]['name']        = 'shotheight';
$modversion['config'][17]['title']       = '_MI_DEBASER_SHOTHEIGHT';
$modversion['config'][17]['description'] = '';
$modversion['config'][17]['formtype']    = 'textbox';
$modversion['config'][17]['valuetype']   = 'int';
$modversion['config'][17]['default']     = 79;

$modversion['config'][18]['name']        = 'imagequality';
$modversion['config'][18]['title']       = '_MI_DEBASER_QUALITY';
$modversion['config'][18]['description'] = '';
$modversion['config'][18]['formtype']    = 'textbox';
$modversion['config'][18]['valuetype']   = 'int';
$modversion['config'][18]['default']     = 100;

$modversion['config'][19]['name']        = 'updatethumbs';
$modversion['config'][19]['title']       = '_MI_DEBASER_IMGUPDATE';
$modversion['config'][19]['description'] = '_MI_DEBASER_IMGUPDATEDSC';
$modversion['config'][19]['formtype']    = 'yesno';
$modversion['config'][19]['valuetype']   = 'int';
$modversion['config'][19]['default']     = 1;

$modversion['config'][20]['name']        = 'keepaspect';
$modversion['config'][20]['title']       = '_MI_DEBASER_KEEPASPECT';
$modversion['config'][20]['description'] = '_MI_DEBASER_KEEPASPECTDSC';
$modversion['config'][20]['formtype']    = 'yesno';
$modversion['config'][20]['valuetype']   = 'int';
$modversion['config'][20]['default']     = 1;

$modversion['config'][21]['name']        = 'usecatperm';
$modversion['config'][21]['title']       = '_MI_DEBASER_USECATPERM';
$modversion['config'][21]['description'] = '_MI_DEBASER_USECATPERMDSC';
$modversion['config'][21]['formtype']    = 'yesno';
$modversion['config'][21]['valuetype']   = 'int';
$modversion['config'][21]['default']     = 0;

$modversion['config'][22]['name']        = 'usefileperm';
$modversion['config'][22]['title']       = '_MI_DEBASER_USEFILEPERM';
$modversion['config'][22]['description'] = '_MI_DEBASER_USEFILEPERMDSC';
$modversion['config'][22]['formtype']    = 'yesno';
$modversion['config'][22]['valuetype']   = 'int';
$modversion['config'][22]['default']     = 0;

$modversion['config'][23]['name']        = 'preselect_player';
$modversion['config'][23]['title']       = '_MI_DEBASER_PRESELECTPLAY';
$modversion['config'][23]['description'] = '_MI_DEBASER_PRESELECTPLAYDESC';
$modversion['config'][23]['formtype']    = 'group_multi';
$modversion['config'][23]['valuetype']   = 'array';
$modversion['config'][23]['default']     = array('1' => 1, '2' => 2);

$modversion['config'][24]['name']        = 'index_sortby';
$modversion['config'][24]['title']       = '_MI_DEBASER_SORTBY';
$modversion['config'][24]['description'] = '_MI_DEBASER_SORTBY_DSC';
$modversion['config'][24]['formtype']    = 'select';
$modversion['config'][24]['valuetype']   = 'text';
$modversion['config'][24]['default']     = 'd.artist';
$modversion['config'][24]['options']     = array('_MI_DEBASER_ID' => 'd.xfid', '_MI_DEBASER_ARTIST' => 'd.artist', '_MI_DEBASER_TITLE' => 'd.title', '_MI_DEBASER_WEIGHT' => 'd.weight');

$modversion['config'][25]['name']        = 'index_orderby';
$modversion['config'][25]['title']       = '_MI_DEBASER_ORDERBY';
$modversion['config'][25]['description'] = '_MI_DEBASER_ORDERBY_DSC';
$modversion['config'][25]['formtype']    = 'select';
$modversion['config'][25]['valuetype']   = 'text';
$modversion['config'][25]['default']     = 'DESC';
$modversion['config'][25]['options']     = array('_ASCENDING' => 'ASC', '_DESCENDING' => 'DESC');

$modversion['config'][26]['name']        = 'catindex_sortby';
$modversion['config'][26]['title']       = '_MI_DEBASER_CATSORTBY';
$modversion['config'][26]['description'] = '_MI_DEBASER_CATSORTBY_DSC';
$modversion['config'][26]['formtype']    = 'select';
$modversion['config'][26]['valuetype']   = 'text';
$modversion['config'][26]['default']     = 'genretitle';
$modversion['config'][26]['options']     = array('_MI_DEBASER_ID' => 'genreid', '_MI_DEBASER_CATEGORY' => 'genretitle', '_MI_DEBASER_WEIGHT' => 'catweight');

$modversion['config'][27]['name']        = 'catindex_orderby';
$modversion['config'][27]['title']       = '_MI_DEBASER_CATORDERBY';
$modversion['config'][27]['description'] = '_MI_DEBASER_CATORDERBY_DSC';
$modversion['config'][27]['formtype']    = 'select';
$modversion['config'][27]['valuetype']   = 'text';
$modversion['config'][27]['default']     = 'DESC';
$modversion['config'][27]['options']     = array('_ASCENDING' => 'ASC', '_DESCENDING' => 'DESC');

$modversion['config'][28]['name']        = 'usetooltips';
$modversion['config'][28]['title']       = '_MI_DEBASER_USETOOLTIPS';
$modversion['config'][28]['description'] = '_MI_DEBASER_USETOOLTIPSDSC';
$modversion['config'][28]['formtype']    = 'yesno';
$modversion['config'][28]['valuetype']   = 'int';
$modversion['config'][28]['default']     = 0;

/* Notification */
$modversion['hasNotification']             = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'debaser_notify_iteminfo';

$modversion['notification']['category'][1]['name']           = 'global';
$modversion['notification']['category'][1]['title']          = _MI_DEBASER_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description']    = _MI_DEBASER_GLOBAL_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php', 'genre.php', 'singlefile.php');

$modversion['notification']['category'][2]['name']           = 'song';
$modversion['notification']['category'][2]['title']          = _MI_DEBASER_SONG_NOTIFY;
$modversion['notification']['category'][2]['description']    = _MI_DEBASER_SONG_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = array('singlefile.php');
$modversion['notification']['category'][2]['item_name']      = 'xfid';

$modversion['notification']['event'][1]['name']          = 'new_genre';
$modversion['notification']['event'][1]['category']      = 'global';
$modversion['notification']['event'][1]['title']         = _MI_DEBASER_GENRE_NEWGENRE_NOTIFY;
$modversion['notification']['event'][1]['caption']       = _MI_DEBASER_GENRE_NEWGENRE_NOTIFYCAP;
$modversion['notification']['event'][1]['description']   = _MI_DEBASER_GENRE_NEWGENRE_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template'] = 'global_newgenre_notify';
$modversion['notification']['event'][1]['mail_subject']  = _MI_DEBASER_GENRE_NEWGENRE_NOTIFYSBJ;

$modversion['notification']['event'][2]['name']          = 'song_submit';
$modversion['notification']['event'][2]['category']      = 'global';
$modversion['notification']['event'][2]['admin_only']    = 1;
$modversion['notification']['event'][2]['title']         = _MI_DEBASER_NEWSUBMIT_NOTIFY;
$modversion['notification']['event'][2]['caption']       = _MI_DEBASER_NEWSUBMIT_NOTIFYCAP;
$modversion['notification']['event'][2]['description']   = _MI_DEBASER_NEWSUBMIT_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template'] = 'global_songsubmit_notify';
$modversion['notification']['event'][2]['mail_subject']  = _MI_DEBASER_NEWSUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][3]['name']          = 'new_song';
$modversion['notification']['event'][3]['category']      = 'global';
$modversion['notification']['event'][3]['title']         = _MI_DEBASER_SONG_NEWSONG_NOTIFY;
$modversion['notification']['event'][3]['caption']       = _MI_DEBASER_SONG_NEWSONG_NOTIFYCAP;
$modversion['notification']['event'][3]['description']   = _MI_DEBASER_SONG_NEWSONG_NOTIFYDSC;
$modversion['notification']['event'][3]['mail_template'] = 'global_newsong_notify';
$modversion['notification']['event'][3]['mail_subject']  = _MI_DEBASER_SONG_NEWSONG_NOTIFYSBJ;

$modversion['notification']['event'][4]['name']          = 'mimetype_submit';
$modversion['notification']['event'][4]['category']      = 'global';
$modversion['notification']['event'][4]['admin_only']    = 1;
$modversion['notification']['event'][4]['title']         = _MI_DEBASER_MIMETYPESUBMIT_NOTIFY;
$modversion['notification']['event'][4]['caption']       = _MI_DEBASER_MIMETYPESUBMIT_NOTIFYCAP;
$modversion['notification']['event'][4]['description']   = _MI_DEBASER_MIMETYPESUBMIT_NOTIFYDSC;
$modversion['notification']['event'][4]['mail_template'] = 'global_mimetypesubmit_notify';
$modversion['notification']['event'][4]['mail_subject']  = _MI_DEBASER_MIMETYPESUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][5]['name']          = 'empty_mimetype';
$modversion['notification']['event'][5]['category']      = 'global';
$modversion['notification']['event'][5]['admin_only']    = 1;
$modversion['notification']['event'][5]['title']         = _MI_DEBASER_EMPTYMIMETYPE_NOTIFY;
$modversion['notification']['event'][5]['caption']       = _MI_DEBASER_EMPTYMIMETYPE_NOTIFYCAP;
$modversion['notification']['event'][5]['description']   = _MI_DEBASER_EMPTYMIMETYPE_NOTIFYDSC;
$modversion['notification']['event'][5]['mail_template'] = 'global_emptymimetype_notify';
$modversion['notification']['event'][5]['mail_subject']  = _MI_DEBASER_EMPTYMIMETYPE_NOTIFYSBJ;
