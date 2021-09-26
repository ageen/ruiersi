<?php
defined('_JEXEC') or die;
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
JHTML::_('script', 'http://api.map.baidu.com/api?v=2.0&ak=Qqg5823LXYMZorYHttdqDLAMxsKrsFHM', false, false, false, false, true);
JHTML::_('script', 'http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js', false, false, false, false, trues);
JHTML::_('stylesheet', 'http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css', false, true, false);
$info_box_title = JText::_("MOD_BAIDUMAP_INFO_BOX_TITLE");
$longtitude = htmlspecialchars($params->get('longtitude'));
$latitude = htmlspecialchars($params->get('latitude'));
$title = JText::_("MOD_BAIDUMAP_FIELD_TITLE_VALUE");
$telephone = JText::_("MOD_FOOTER_PHONE");
$address = JText::_("MOD_FOOTER_ADDRESS");
$email = JText::_("MOD_FOOTER_MAIL");
$describe = JText::_("MOD_BAIDUMAP_FIELD_DESCRIBE_VALUE");
require JModuleHelper::getLayoutPath('mod_baidumap', $params->get('layout', 'default'));