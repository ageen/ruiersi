<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage(); 
JLoader::register('JHtmlString', JPATH_LIBRARIES.'/joomla/html/html/string.php');
?>

<ul class="pager pagenav">
<?php if ($row->prev) :
	$direction = $lang->isRtl() ? 'right' : 'left'; ?>
	<li class="previous">
		<a href="<?php echo $row->prev; ?>" rel="prev">
			<?php echo '<span class="glyphicon glyphicon-menu-' . $direction . '"></span> ' . JHTML::_('string.cutStrTitle', $row->prev_label, $this->params->get('titletruncate')); ?>
		</a>
	</li>
<?php endif; ?>
<?php if ($row->next) :
	$direction = $lang->isRtl() ? 'left' : 'right'; ?>
	<li class="next">
		<a href="<?php echo $row->next; ?>" rel="next">
			<?php echo JHTML::_('string.cutStrTitle', $row->next_label, $this->params->get('titletruncate')) . ' <span class="glyphicon glyphicon-menu-' . $direction . '"></span>'; ?>
		</a>
	</li>
<?php endif; ?>
</ul>