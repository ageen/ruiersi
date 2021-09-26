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
				<dt><a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=1&Itemid=104');?>">关于我们</a></dt>
              	<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=1&Itemid=104');?>">关于我们</a></dd>
				<dd><a href="#">发展历程</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=12&Itemid=103');?>">新闻资讯</a></dd>
			</dl>
			<dl>
				<dt><a href="<?php echo JRoute::_('index.php?option=com_content&view=categories&id=13&Itemid=102');?>">产品中心</a></dt>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=8&lang=zh&Itemid=102');?>">家用缝纫机</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=9&lang=zh&Itemid=102');?>">工业缝纫机</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=10&lang=zh&Itemid=102');?>">包缝机</a></dd>
				<dd><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=11&lang=zh&Itemid=102');?>">缝纫机配件</a></dd>
			</dl>
		</div>
		<div class="pull-right">
			<ul>
              	<li class="title text-center"><a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id=50&Itemid=123');?>">联系我们</a></li>
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
