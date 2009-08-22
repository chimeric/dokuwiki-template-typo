<?php
/**
 * DokuWiki template Typo
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://dokuwiki.org/template:typo
 * @author Michael Klier <chi@chimeric.de>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
require_once(DOKU_TPLINC . 'tpl_functions.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php tpl_pagetitle()?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>
</head>

<body>

<div class="dokuwiki">
  <?php html_msgarea()?>
  <a href="#" name="dokuwiki__top">&nbsp;</a>

  <div id="content">
    <?php $toc = tpl_toc(true)?>
    <?php if($toc) { ?>
    <?php print $toc ?>
      <div class="clearer"></div>
     <?php } ?>

    <div class="page">
      <!-- wikipage start -->
      <?php tpl_content(false)?>
      <?php flush()?>
      <!-- wikipage stop -->
      <div class="clearer"></div>
      <div class="bar-right" id="bar__bottomright">
        <?php tpl_actionlink('top')?>&nbsp;
      </div>
    </div>

  </div>

  <div id="sidebar">
    <div id="header">
      <div class="logo">
        <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top" accesskey="h" title="[H]"')?>
      </div>
      <?php tpl_navigation() ?>
    </div>

    <div class="actions">
      <?php tpl_actions()?>
    </div>

    <div id="pagemeta">
      <?php tpl_license(false);?>
      <br />

      <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
      <a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fwww.chimeric.de&amp;profile=css3&amp;usermedium=all&amp;warning=1"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" /></a>
      <div class="clearer"></div>
      <div class="doc">
        <?php tpl_pageinfo()?>
      </div>
    </div>
  </div>

  <?php flush()?>

  <div class="clearer"></div>

</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
