<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

// Create some shortcuts.
$params    = &$this->item->params;
$n         = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

// Check for at least one editable article
$isEditable = false;

if (!empty($this->items))
{
	foreach ($this->items as $article)
	{
		if ($article->params->get('access-edit'))
		{
			$isEditable = true;
			break;
		}
	}
}
?>

<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="form-inline">
<?php if ($this->params->get('show_headings') || $this->params->get('filter_field') != 'hide' || $this->params->get('show_pagination_limit')) :?>
	<fieldset class="filters btn-toolbar clearfix">
		<?php if ($this->params->get('filter_field') != 'hide') :?>
			<div class="btn-group">
				<?php if ($this->params->get('filter_field') != 'tag') :?>
					<label class="filter-search-lbl element-invisible" for="filter-search">
						<?php echo JText::_('COM_CONTENT_' . $this->params->get('filter_field') . '_FILTER_LABEL') . '&#160;'; ?>
					</label>
					<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="inputbox" onchange="document.adminForm.submit();" title="<?php echo JText::_('COM_CONTENT_FILTER_SEARCH_DESC'); ?>" placeholder="<?php echo JText::_('COM_CONTENT_' . $this->params->get('filter_field') . '_FILTER_LABEL'); ?>" />
				<?php else :?>
					<select name="filter_tag" id="filter_tag" onchange="document.adminForm.submit();" >
						<option value=""><?php echo JText::_('JOPTION_SELECT_TAG'); ?></option>
						<?php echo JHtml::_('select.options', JHtml::_('tag.options', true, true), 'value', 'text', $this->state->get('filter.tag')); ?>
					</select>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_pagination_limit')) : ?>
			<div class="btn-group">
				<label for="limit" class="element-invisible">
					<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
				</label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
		<?php endif; ?>

		<input type="hidden" name="filter_order" value="" />
		<input type="hidden" name="filter_order_Dir" value="" />
		<input type="hidden" name="limitstart" value="" />
		<input type="hidden" name="task" value="" />
	</fieldset>
<?php endif; ?>

<?php if (empty($this->items)) : ?>

	<?php if ($this->params->get('show_no_articles', 1)) : ?>
		<p class="text-center"><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
	<?php endif; ?>

<?php else : ?>
<?php foreach ($this->items as $i => $article) : ?>
	<dl class="row">
		<dt class="col-sm-4 text-center">
			<?php
			$image_intro = json_decode($article->images)->image_intro;
			if(!empty($image_intro)):?>
          	<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>"><img src="<?php echo $image_intro; ?>"></a>
			<?php else:?>
          	<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>"><img src="images/news.png" alt="NO IMAGES"></a>
			<?php endif;?>
		</dt>
		<dd class="col-sm-8">
			<h4>
				<?php if (in_array($article->access, $this->user->getAuthorisedViewLevels())) : ?>
					<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
						<?php echo $this->escape($article->title); ?>
					</a>
				<?php else: ?>
					<?php
					echo $this->escape($article->title) . ' : ';
					$menu   = JFactory::getApplication()->getMenu();
					$active = $menu->getActive();
					$itemId = $active->id;
					$link   = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
					$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)));
					?>
					<a href="<?php echo $link; ?>" class="register">
						<?php echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE'); ?>
					</a>
				<?php endif; ?>
			</h4>
			<?php echo $article->introtext; ?>
			<ul class="row">
				<?php if ($this->params->get('list_show_date')) : ?>
					<li class="col-md-2 col-sm-3"><?php
						echo JHtml::_(
							'date', $article->displayDate,
							$this->escape($this->params->get('date_format', JText::_('DATE_FORMAT_LC3')))
						); ?></li>
				<?php endif; ?>
				<?php if ($this->params->get('list_show_author', 1)) : ?>
					<li class="col-md-2 col-sm-3">
						<?php if (!empty($article->author) || !empty($article->created_by_alias)) : ?>
							<?php $author = $article->author ?>
							<?php $author = ($article->created_by_alias ? $article->created_by_alias : $author);?>
							<?php if (!empty($article->contact_link) && $this->params->get('link_author') == true) : ?>
								<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', $article->contact_link, $author)); ?>
							<?php else: ?>
								<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
							<?php endif; ?>
						<?php endif; ?>
					</li>
				<?php endif; ?>
				<?php if ($this->params->get('list_show_hits', 1)) : ?>
					<li class="col-md-2 col-sm-3">
						<span class="badge badge-info">
							<?php echo JText::sprintf('JGLOBAL_HITS_COUNT', $article->hits); ?>
						</span>
					</li>
				<?php endif; ?>
				<?php if ($isEditable) : ?>
					<li class="col-md-2 col-sm-3">
						<?php if ($article->params->get('access-edit')) : ?>
							<?php echo JHtml::_('icon.edit', $article, $params); ?>
						<?php endif; ?>
					</li>
				<?php endif; ?>
				<?php if ($article->state == 0) : ?>
					<li class="col-md-2 col-sm-3"><span class="list-published label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span></li>
				<?php endif; ?>
				<?php if (strtotime($article->publish_up) > strtotime(JFactory::getDate())) : ?>
					<li class="col-md-2 col-sm-3"><span class="list-published label label-warning">
								<?php echo JText::_('JNOTPUBLISHEDYET'); ?>
							</span></li>
				<?php endif; ?>
				<?php if ((strtotime($article->publish_down) < strtotime(JFactory::getDate())) && $article->publish_down != JFactory::getDbo()->getNullDate()) : ?>
					<li class="col-md-2 col-sm-3"><span class="list-published label label-warning">
								<?php echo JText::_('JEXPIRED'); ?>
							</span></li>
				<?php endif; ?>
			</ul>
		</dd>
	</dl>
<?php endforeach;?>

<?php endif; ?>

<?php // Code to add a link to submit an article. ?>
<?php if ($this->category->getParams()->get('access-create')) : ?>
	<?php echo JHtml::_('icon.create', $this->category, $this->category->params); ?>
<?php  endif; ?>

<?php // Add pagination links ?>
<?php if (!empty($this->items)) : ?>
	<?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
		<div class="pagination-list text-right">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</p>
			<?php endif; ?>

			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	<?php endif; ?>
<?php  endif; ?>
</form>