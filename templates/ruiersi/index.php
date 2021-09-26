<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add Stylesheets
$doc->addStyleSheetVersion('https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css');

// Template color
if ($this->params->get('templateColor'))
{
	$doc->addStyleDeclaration("
	a:hover,a:focus{
		color: " . $this->params->get('templateColor') . ";
	}
    .theme-color{
    	color: " . $this->params->get('templateColor') .";
    }
    .search-input{
    	border-color: " . $this->params->get('templateColor') .";
    }
	.navbar-default .navbar-toggle:hover {
	}
	.topmenu .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover{
		color: " . $this->params->get('templateColor') .";
	}
	.topmenu .navbar-default .navbar-nav>li a:before{
		border-bottom: 4px solid " . $this->params->get('templateColor') . ";
	}
	.topmenu .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
	    border-bottom:4px solid " . $this->params->get('templateColor') . ";
	}
	.topmenu .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
	    color: " . $this->params->get('templateColor') . ";
	}
    .nav__icon::before, .nav__icon::after{
    	background-color: " . $this->params->get('templateColor') . ";
    }
	.box {
		border-bottom: 1px solid " . $this->params->get('templateColor') . ";
	}
	.product-center{
		border-top: 2px solid " . $this->params->get('templateColor') . ";
	}
    .pagination > li > a, .pagination > li > span{
    	color: " . $this->params->get('templateColor') . ";
    }
    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
    	background-color: " . $this->params->get('templateColor') . ";
        border-color: " . $this->params->get('templateColor') . ";
    }
    .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover{
    	color: " . $this->params->get('templateColor') . "; 
    }");
}

// Check for a custom CSS file
$userCss = JPATH_SITE . '/templates/' . $this->template . '/css/style.css';

if (file_exists($userCss) && filesize($userCss) > 0)
{
	$this->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/style.css');
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
else
{
	$logo = '<img src="images/logo.gif" class="site-title" title="' . $sitename . '" />';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<jdoc:include type="head" />
  	<script src="/templates/ruiersi/javascript/template.js"></script>
	<!--[if lt IE 9]><script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
</head>
<body>
<header class="topmenu box-shadow-1">
<div class="row" style="max-width:1280px;margin:0 auto;">
<div class="col-sm-10 col-xs-12">
<a href="<?php echo JURI::base();?>" class="navbar-brand"><?php echo $logo; ?></a>
<jdoc:include type="modules" name="position-1" style="none" />
</div>
<div class="col-sm-2 col-xs-12" style="margin:0;padding:0;">
<jdoc:include type="modules" name="position-2" style="none" />
</div>
</div>
<div style="width:100%;overflow:hidden;margin:0 auto;">
<nav role="navigation" class="navbar navbar-default">
      <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header visible-xs">
    <a href="#" data-target="#navbarCollapse" data-toggle="collapse" class="nav__trigger">
    <span class="nav__icon"></span>
    </a>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
    	<jdoc:include type="modules" name="navigation" style="none" />
    </div>
</nav>
</div>
</header>
<jdoc:include type="modules" name="breadcrumbs" style="none" />
<jdoc:include type="modules" name="banner" style="none" />
<?php if($this->countModules('left')&&$this->countModules('right')):?>
<section class="news-about">
<div class="row">
	<div class="col-sm-8"><jdoc:include type="modules" name="left" style="none" /></div>
  	<div class="col-sm-4"><jdoc:include type="modules" name="right" style="none" /></div>
</div>
</section>
<?php endif;?>
<main id="content" role="main">
	<!-- Begin Content -->
	<jdoc:include type="message" />
	<jdoc:include type="component" />
	<!-- End Content -->
</main>
<jdoc:include type="modules" name="bottom" style="none" />
<jdoc:include type="modules" name="footer" style="none" />
<jdoc:include type="modules" name="3" style="none" />
<div style="position: fixed;bottom: 50px; right: 20px;z-index: 999;" class="text-center unseen"><a class="back-to-top" href="javascript:void(0);" style=""><span class="glyphicon glyphicon-chevron-up" style="font-size: 16px;"></span></a>
</div>
<script>
(function($)
{
	$(document).ready(function(){
	  var $backToTop = $(".back-to-top");
	  $backToTop.hide();
	 
	  $(window).on('scroll', function() {
	   if ($(this).scrollTop() > 100) { 
	   $backToTop.fadeIn();
	   } else {
	   $backToTop.fadeOut();
	   }
	  });
	 
	  $backToTop.on('click', function(e) {
	   $("html, body").animate({scrollTop: 0}, 500);
	  });
	})
})(jQuery);  
</script>
</body>
</html>