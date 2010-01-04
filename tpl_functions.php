<?php
/**
 * Function for DokuWiki template Typo
 *
 * @author Michael Klier <chi@chimeric.de>
 */

/**
 * Prints the navigation
 *
 * @author Michael Klier <chi@chimeric.de>
 */
function tpl_navigation() {
    global $ID;
    global $conf;
    $navpage = tpl_getConf('navigation_page');

    print '<div class="navigation">' . DOKU_LF;
    if(!page_exists($navpage)) {
        if(@file_exists(DOKU_TPLINC.'lang/'. $conf['lang'].'/nonavigation.txt')) {
            $out = p_render('xhtml', p_get_instructions(io_readFile(DOKU_TPLINC.'lang/'.$conf['lang'].'/nonavigation.txt')), $info);
        } else {
            $out = p_render('xhtml', p_get_instructions(io_readFile(DOKU_TPLINC.'lang/en/nonavigation.txt')), $info);
        }
        $link = '<a href="' . wl($navpage) . '" class="wikilink2">' . $navpage . '</a>' . DOKU_LF;
        print str_replace('LINK', $link, $out);
    } else {
        print p_wiki_xhtml($navpage);
    }
    print '</div>';
}

/**
 * Prints the actions links
 *
 * @author Michael Klier <chi@chimeric.de>
 */
function tpl_actions() {
    $actions = array('admin', 'revert', 'edit', 'history', 'recent', 'backlink', 'subscribe', 'subscribens', 'index', 'login', 'profile');

    print '<div class="sidebar_box">' . DOKU_LF;
    print '  <ul>' . DOKU_LF;

    foreach($actions as $action) {
        if(!actionOK($action)) continue;
        // start output buffering
        if($action == 'edit') {
            // check if new page button plugin is available
            if(!plugin_isdisabled('npd') && ($npd =& plugin_load('helper', 'npd'))) {
                $npb = $npd->html_new_page_button(true);
                if($npb) {
                    print '    <li><div class="li">';
                    print $npb;
                    print '</div></li>' . DOKU_LF;
                }
            }
        }
        ob_start();
        print '     <li><div class="li">';
        if(tpl_actionlink($action)) {
            print '</div></li>' . DOKU_LF;
            ob_end_flush();
        } else {
            ob_end_clean();
        }
    }
    print '  </ul>' . DOKU_LF;
    print '</div>' . DOKU_LF;
}

// vim:ts=4:sw=4:et:enc=utf-8:
