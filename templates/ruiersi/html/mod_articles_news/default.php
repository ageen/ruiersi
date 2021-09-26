<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="newsflash<?php echo $params->get('moduleclass_sfx'); ?>">
  	<h3 class="box-header"><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id=12&Itemid=103');?>"><?php echo JText::_('NEWS_FLASH_TITLE'); ?></a></h3>
  	<?php if(empty($list)):?>
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></strong>
    </div>
  	<?php else:?>
    <div class="box-show col-sm-5">
      	<?php
      		$img0 = json_decode($list[0]->images)->image_intro;
      		if(!empty($img0)):
      	?>
      	<img src="<?php echo $img0; ?>" title="<?php echo $list[0]->title;?>">
      	<?php
      		else:
      	?>
      	<img src="images/news.png" title="<?php echo $list[0]->title;?>">
      	<?php
      		endif;
      	?>
    </div>
  	<div class="box-list col-sm-7">
	<?php foreach ($list as $item) : ?>
		<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
	<?php endforeach; ?>
  	</div>
  	<?php endif;?>
</div>