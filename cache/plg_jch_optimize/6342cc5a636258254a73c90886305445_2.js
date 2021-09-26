try{(function($)
{$(document).ready(function()
{$('.nav__trigger').on('click',function(e){e.preventDefault();$(this).parent().toggleClass('nav--active');});$('*[rel=tooltip]').tooltip()
$('.radio.btn-group label').addClass('btn');$('fieldset.btn-group').each(function(){if($(this).prop('disabled')){$(this).css('pointer-events','none').off('click');$(this).find('.btn').addClass('disabled');}});$(".btn-group label:not(.active)").click(function()
{var label=$(this);var input=$('#'+label.attr('for'));if(!input.prop('checked')){label.closest('.btn-group').find("label").removeClass('active btn-success btn-danger btn-primary');if(input.val()==''){label.addClass('active btn-primary');}else if(input.val()==0){label.addClass('active btn-danger');}else{label.addClass('active btn-success');}
input.prop('checked',true);input.trigger('change');}});$(".btn-group input[checked=checked]").each(function()
{if($(this).val()==''){$("label[for="+$(this).attr('id')+"]").addClass('active btn-primary');}else if($(this).val()==0){$("label[for="+$(this).attr('id')+"]").addClass('active btn-danger');}else{$("label[for="+$(this).attr('id')+"]").addClass('active btn-success');}});$('#back-top').on('click',function(e){e.preventDefault();$("html, body").animate({scrollTop:0},1000);});})})(jQuery);}catch(e){console.error('Error in file:/templates/ruiersi/javascript/template.js; Error:'+e.message);};
;