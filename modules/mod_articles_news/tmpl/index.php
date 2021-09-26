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
<h3 class="box-header"><a href="#">新闻资讯</a> | <small>NEWS CENTER</small></h3>
<div class="box-border row">
	<div class="box-show col-sm-5">
		<img src="./images/latest-pic.gif" alt="gif">
	</div>
	<div class="box-list col-sm-7">
		<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
			<?php $item = $list[$i]; ?>
			<dl>
				<dt><a href="#">2017年度“蝴蝶杯”拼布缝纫创意大<small class="pull-right">2017-05-24</small></a></dt>
				<dd>2017年度“蝴蝶杯”拼布缝纫创意大赛（修订4.0）一、大赛主题：“家”参赛作品需围绕大赛主题“家”进行创…</dd>
			</dl>
			<li>
				<?php if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) : ?>
					<span class="article-separator">&#160;</span>
				<?php endif; ?>
			</li>
		<?php endfor; ?>

		<dl>
			<dt><a href="#">2017年度“蝴蝶杯”拼布缝纫创意大<small class="pull-right">2017-05-24</small></a></dt>
			<dd>2017年度“蝴蝶杯”拼布缝纫创意大赛（修订4.0）一、大赛主题：“家”参赛作品需围绕大赛主题“家”进行创…</dd>
		</dl>
		<dl>
			<dt><a href="#">2017年度“蝴蝶杯”拼布缝纫创意大<small class="pull-right">2017-05-24</small></a></dt>
			<dd>2017年度“蝴蝶杯”拼布缝纫创意大赛（修订4.0）一、大赛主题：“家”参赛作品需围绕大赛主题“家”进行创…</dd>
		</dl>
	</div>
</div>