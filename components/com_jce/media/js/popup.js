/* jce - 2.6.15 | 2017-06-03 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2017 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(win){function ready(){doc.addEventListener?doc.addEventListener("DOMContentLoaded",function(){return doc.removeEventListener("DOMContentLoaded",arguments.callee,!1),WFWindowPopup._init()},!1):doc.attachEvent&&(doc.attachEvent("onreadystatechange",function(){if("complete"===doc.readyState)return doc.detachEvent("onreadystatechange",arguments.callee),WFWindowPopup._init()}),doc.documentElement.doScroll&&win==win.top&&!function(){if(!domLoaded){try{doc.documentElement.doScroll("left")}catch(error){return void setTimeout(arguments.callee,0)}return WFWindowPopup._init()}}()),win.attachEvent&&win.attachEvent("onload",function(){return WFWindowPopup._init()})}var doc=win.document,body=doc.body,domLoaded=!1,WFWindowPopup={init:function(width,height,click){if(this.width=parseInt(width),this.height=parseInt(height),this.click=!!click,this.width||this.height)return domLoaded?void this._init():ready()},_init:function(){this.resize(),this.click&&this.noclick()},resize:function(){var x,oh=0,vw=win.innerWidth||doc.documentElement.clientWidth||body.clientWidth||0,vh=win.innerHeight||doc.documentElement.clientHeight||body.clientHeight||0,divs=doc.getElementsByTagName("div");for(x=0;x<divs.length;x++)"contentheading"==divs[x].className&&(oh=divs[x].offsetHeight);win.resizeBy(vw-this.width,vh-(this.height+oh)),this.center()},center:function(){var vw=win.innerWidth||doc.documentElement.clientWidth||body.clientWidth||0,vh=win.innerHeight||doc.documentElement.clientHeight||body.clientHeight||0,x=(screen.width-vw)/2,y=(screen.height-vh)/2;win.moveTo(x,y)},noclick:function(){doc.onmousedown=function(e){return win.close()}}};win.WFWindowPopup=WFWindowPopup}(window);