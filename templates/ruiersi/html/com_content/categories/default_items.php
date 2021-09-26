<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$class = ' class="first"';
$lang  = JFactory::getLanguage();
if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
<section class="product-center">
<h2 class="row-header"><?php echo JText::_('PRODUCT_CENTER_TITLE'); ?></h2>
<div class="row">
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
    <div class="col-sm-6">
      <dl class="box-item">
        <dt>
			<?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>
          		<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));?>"><img src="<?php echo $item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>" /></a>
			<?php else:?>
          <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));?>"><img src="images/product.png" alt="NO IMAGES" /></a>
			<?php endif; ?>
        </dt>
        <dd><h4>
          <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));?>"><?php echo $this->escape($item->title); ?></a>
         </h4></dd>
      </dl>
    </div>
	<?php endforeach; ?>
<?php endif; ?>