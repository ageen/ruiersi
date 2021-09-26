<?php
defined('_JEXEC') or die;
JFactory::getDocument()->addStyleDeclaration("
#baidumap {height:300px;width:100%;overflow: hidden;}
.baidumap_info_box{
    border: 1px solid #ccc;
    height: 300px;
    width: 98%;
}
.baidumap_info_box dt{
    border-bottom: 1px solid #ccc;
    font-size: 16px;
    font-weight: normal;
    line-height: 80px;
    text-align: center;
}
.baidumap_info_box dd{
    font-size: 14px;
    line-height: 30px;
    padding: 10px 15px 0;
}
.baidumap_info_box dd strong{padding-right: 10px;}
");
?>
<div class="row" class="baidumap_box">
    <div class="col-sm-8" style="padding:0;"><div id="baidumap"></div></div>
    <div class="col-sm-4" style="padding:0;">
        <dl class="baidumap_info_box">
            <dt><?php echo $info_box_title; ?></dt>
            <dd><strong><span class="glyphicon glyphicon-home"></span></strong><?php echo $address; ?></dd>
            <dd><strong><span class="glyphicon glyphicon-phone-alt"></span></strong><?php echo $telephone; ?></dd>
            <dd><strong><span class="glyphicon glyphicon-envelope"></span></strong><?php echo $email; ?></dd>
            <dd><div class="text-center theme-color"><?php echo $describe; ?></div></dd>
        </dl>
    </div>
</div>
<script type="text/javascript">
var map = new BMap.Map('baidumap');
var poi = new BMap.Point(<?php echo $longtitude; ?>,<?php echo $latitude; ?>);
map.centerAndZoom(poi, 16);
map.enableScrollWheelZoom();

var content = '<div style="margin:0;line-height:20px;padding:2px;"><p><?php echo $address;?></p></div>';
var searchInfoWindow = null;
searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
        title  : "<strong><?php echo $title;?></strong>",
        panel  : "panel", 
        enableAutoPan : true,
        searchTypes   :[
            BMAPLIB_TAB_SEARCH, 
            BMAPLIB_TAB_TO_HERE,
            BMAPLIB_TAB_FROM_HERE
        ]
    });
var marker = new BMap.Marker(poi);
marker.enableDragging();
searchInfoWindow.open(marker);
map.addOverlay(marker);
</script>