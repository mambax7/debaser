<?php
// $Id: blocks/debaser_blocks.php,v 0.60 2004/06/30 10:00:00 frankblack Exp $
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

    function b_debaser_views_show($options)
    {
        global $xoopsDB, $xoopsUser;

        $moduleHandler = xoops_getHandler('module');
        $module = $moduleHandler->getByDirname('debaser');
        $configHandler = xoops_getHandler('config');
        $moduleConfig =& $configHandler->getConfigsByCat(0, $module->getVar('mid'));

        $groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
        $module_id = $module->getVar('mid');
        $gpermHandler =  xoops_getHandler('groupperm');

        $myts = MyTextSanitizer::getInstance();
        $block = array();
        $sql = 'SELECT xfid, title, artist, album, year, addinfo, track, genre, length, bitrate, frequence FROM '
           . $xoopsDB->prefix('debaser_files') . ' WHERE approved = 1 AND views > 0 ORDER BY views DESC LIMIT '
           . $options[0] . '';
        $result = $xoopsDB->query($sql);

        while ($myrow = $xoopsDB->fetchArray($result)) {
            if ($moduleConfig['usefileperm'] == 1) {
                if ($gpermHandler->checkRight('DebaserFilePerm', $myrow['xfid'], $groups, $module_id)) {
                    $views = array();
                    $views['id'] = $myts->makeTboxData4Show($myrow['xfid']);
                    $views['title'] = $myts->makeTboxData4Show($myrow['title']);
                    $views['artist'] = $myts->makeTboxData4Show($myrow['artist']);
                    if ($moduleConfig['usetooltips'] == 1) {
                        $views['album'] = $myts->makeTboxData4Show($myrow['album']);
                        $views['year'] = $myts->makeTboxData4Show($myrow['year']);
                        $views['addinfo'] = $myts->makeTboxData4Show($myrow['addinfo']);
                        $views['track'] = $myts->makeTboxData4Show($myrow['track']);
                        $views['genre'] = $myts->makeTboxData4Show($myrow['genre']);
                        $views['length'] = $myts->makeTboxData4Show($myrow['length']);
                        $views['bitrate'] = $myts->makeTboxData4Show($myrow['bitrate']);
                        $views['frequence'] = $myts->makeTboxData4Show($myrow['frequence']);
                        $views['usetooltips'] = true;
                    }
                }
            } else {
                $views = array();
                $views['id'] = $myts->makeTboxData4Show($myrow['xfid']);
                $views['title'] = $myts->makeTboxData4Show($myrow['title']);
                $views['artist'] = $myts->makeTboxData4Show($myrow['artist']);
                if ($moduleConfig['usetooltips'] == 1) {
                    $views['album'] = $myts->makeTboxData4Show($myrow['album']);
                    $views['year'] = $myts->makeTboxData4Show($myrow['year']);
                    $views['addinfo'] = $myts->makeTboxData4Show($myrow['addinfo']);
                    $views['track'] = $myts->makeTboxData4Show($myrow['track']);
                    $views['genre'] = $myts->makeTboxData4Show($myrow['genre']);
                    $views['length'] = $myts->makeTboxData4Show($myrow['length']);
                    $views['bitrate'] = $myts->makeTboxData4Show($myrow['bitrate']);
                    $views['frequence'] = $myts->makeTboxData4Show($myrow['frequence']);
                    $views['usetooltips'] = true;
                }
            }

            $block['debaser_filesviews'][] = $views;
        }

        return $block;
    }

    function b_debaser_views_edit($options)
    {
        $form = '' . _MB_DEBASER_BLOCLATE . "<input type='text' size='3' maxlength='2' name='options[]' value='" . $options[0] . "' />&nbsp;" . _MB_DEBASER_SONGS . '';

        return $form;
    }
