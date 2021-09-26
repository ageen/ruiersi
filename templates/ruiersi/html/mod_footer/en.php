<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<footer class="footer<?php echo $moduleclass_sfx ?>">
	<div class="footer-menu">
		<div class="pull-left hidden-xs">
			<dl>
				<dt><a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=8&Itemid=108');?>">About Us</a></dt>
              	<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=1&Itemid=108');?>">Company Introduce</a></dd>
				<dd><a href="#">Course</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=12&Itemid=103');?>">News Center</a></dd>
			</dl>
			<dl>
				<dt><a href="<?php echo JRoute::_('index.php?option=com_content&view=categories&id=17&Itemid=107');?>">Products Center</a></dt>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=18&lang=en&Itemid=107');?>">Household sewing machine</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=19&lang=en&Itemid=107');?>">Industry Sewing Machine</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=20&lang=en&Itemid=107');?>">Overlock Machine</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=21&lang=en&Itemid=107');?>">Parts Of Sewing Machine</a></dd>
			</dl>
		</div>
		<div class="pull-right">
			<ul>
              	<li class="title text-center"><a href="JRoute::_('index.php?option=com_content&view=article&id=51&Itemid=124');">Contact Us</a></li>
				<li class="row"><strong class="col-xs-3 text-right"><span class="glyphicon glyphicon-home"></span></strong><p class="col-xs-9"><?php echo JText::_('MOD_FOOTER_ADDRESS'); ?></p></li>
				<li class="row"><strong class="col-xs-3 text-right"><span class="glyphicon glyphicon-phone-alt"></span></strong><p class="col-xs-9"><?php echo JText::_('MOD_FOOTER_PHONE'); ?></p></li>
				<li class="row"><strong class="col-xs-3 text-right"><span class="glyphicon glyphicon-envelope"></span></strong><p class="col-xs-9"><?php echo JText::_('MOD_FOOTER_MAIL'); ?></p></li>
			</ul>
		</div>   
	</div>
	<div class="copyright">
		<div><?php echo $lineone; ?></div>
		<div><a href="http://beian.miit.gov.cn" target="_blank"><?php echo JText::_('MOD_FOOTER_LINE2'); ?></a></div>
	</div>
</footer>
