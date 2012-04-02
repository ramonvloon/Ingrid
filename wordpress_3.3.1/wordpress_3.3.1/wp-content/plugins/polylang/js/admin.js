var pll_tagBox;(function($){pll_tagBox={clean:function(tags){return tags.replace(/\s*,\s*/g,',').replace(/,+/g,',').replace(/[,\s]+$/,'').replace(/^[,\s]+/,'');},parseTags:function(el){var id=el.id,num=id.split('-check-num-')[1],taxbox=$(el).closest('.tagsdiv'),thetags=taxbox.find('.the-tags'),current_tags=thetags.val().split(','),new_tags=[];delete current_tags[num];$.each(current_tags,function(key,val){val=$.trim(val);if(val){new_tags.push(val);}});thetags.val(this.clean(new_tags.join(',')));this.quickClicks(taxbox);return false;},quickClicks:function(el){var thetags=$('.the-tags',el),tagchecklist=$('.tagchecklist',el),id=$(el).attr('id'),current_tags,disabled;if(!thetags.length)
return;disabled=thetags.prop('disabled');current_tags=thetags.val().split(',');tagchecklist.empty();$.each(current_tags,function(key,val){var span,xbutton;val=$.trim(val);if(!val)
return;span=$('<span />').text(val);if(!disabled){xbutton=$('<a id="'+id+'-check-num-'+key+'" class="ntdelbutton">X</a>');xbutton.click(function(){pll_tagBox.parseTags(this);});span.prepend(' ').prepend(xbutton);}
tagchecklist.append(span);});},flushTags:function(el,a,f){a=a||false;var text,tags=$('.the-tags',el),newtag=$('input.newtag',el),newtags;text=a?$(a).text():newtag.val();tagsval=tags.val();newtags=tagsval?tagsval+','+text:text;newtags=this.clean(newtags);newtags=array_unique_noempty(newtags.split(',')).join(',');tags.val(newtags);this.quickClicks(el);if(!a)
newtag.val('');if('undefined'==typeof(f))
newtag.focus();return false;},get:function(id,a){var tax=id.substr(id.indexOf('-')+1);var data={action:'get-tagcloud',lang:$('#post_lang_choice').attr('value'),tax:tax}
$.post(ajaxurl,data,function(r,stat){if(0==r||'success'!=stat)
r=wpAjax.broken;r=$('<p id="tagcloud-'+tax+'" class="the-tagcloud">'+r+'</p>');$('a',r).click(function(){pll_tagBox.flushTags($(this).closest('.inside').children('.tagsdiv'),this);return false;});if(a==1)
$('#'+id).after(r);else{v=$('.the-tagcloud').css('display');$('.the-tagcloud').replaceWith(r);$('.the-tagcloud').css('display',v);}});},suggest:function(){ajaxtag=$('div.ajaxtag');$('input.newtag',ajaxtag).unbind().blur(function(){if(this.value=='')
$(this).parent().siblings('.taghint').css('visibility','');}).focus(function(){$(this).parent().siblings('.taghint').css('visibility','hidden');}).keyup(function(e){if(13==e.which){pll_tagBox.flushTags($(this).closest('.tagsdiv'));return false;}}).keypress(function(e){if(13==e.which){e.preventDefault();return false;}}).each(function(){var lang=$('#post_lang_choice').attr('value');var tax=$(this).closest('div.tagsdiv').attr('id');$(this).suggest(ajaxurl+'?action=polylang-ajax-tag-search&lang='+lang+'&tax='+tax,{delay:500,minchars:2,multiple:true,multipleSep:","});});},init:function(){var t=this,ajaxtag=$('div.ajaxtag');$('.tagsdiv').each(function(){pll_tagBox.quickClicks(this);});$('input.tagadd',ajaxtag).click(function(){t.flushTags($(this).closest('.tagsdiv'));});$('div.taghint',ajaxtag).click(function(){$(this).css('visibility','hidden').parent().siblings('.newtag').focus();});pll_tagBox.suggest();$('#post').submit(function(){$('div.tagsdiv').each(function(){pll_tagBox.flushTags(this,false,1);});});$('a.tagcloud-link').click(function(){pll_tagBox.get($(this).attr('id'),1);$(this).unbind().click(function(){$(this).siblings('.the-tagcloud').toggle();return false;});return false;});}};})(jQuery);jQuery(document).ready(function($){var taxonomies=new Array();$('.categorydiv').each(function(){var this_id=$(this).attr('id'),taxonomyParts,taxonomy;taxonomyParts=this_id.split('-');taxonomyParts.shift();taxonomy=taxonomyParts.join('-');taxonomies.push(taxonomy);$('#'+taxonomy+'-add-submit').before($('<input />').attr('type','hidden').attr('id',taxonomy+'-lang').attr('name','term_lang_choice').attr('value',$('#post_lang_choice').attr('value')));});$('#post_lang_choice').change(function(){var data={action:'post_lang_choice',lang:$(this).attr('value'),taxonomies:taxonomies,post_id:$('#post_ID').attr('value')}
$.post(ajaxurl,data,function(response){var res=wpAjax.parseAjaxResponse(response,'ajax-response');$.each(res.responses,function(){switch(this.what){case'translations':$('#post-translations').html(this.data);break;case'taxonomy':var tax=this.data;$('#'+tax+'checklist').html(this.supplemental.all);$('#'+tax+'checklist-pop').html(this.supplemental.populars);$('#new'+tax+'_parent').replaceWith(this.supplemental.dropdown);$('#'+tax+'-lang').val($('#post_lang_choice').attr('value'));break;case'pages':$('#parent_id').replaceWith(this.data);break;default:break;}});$('.tagcloud-link').each(function(){var id=$(this).attr('id');pll_tagBox.get(id,0);});pll_tagBox.suggest();});});$('#side-sortables, #normal-sortables, #advanced-sortables').children('div.postbox').each(function(){if(this.id.indexOf('tagsdiv-')===0){$(this).attr('id','pll-'+this.id);}});if($('#pll-tagsdiv-post_tag').length){pll_tagBox.init();}else{$('#side-sortables, #normal-sortables, #advanced-sortables').children('div.postbox').each(function(){if(this.id.indexOf('pll-tagsdiv-')===0){pll_tagBox.init();return false;}});}
$('#term_lang_choice').change(function(){var data={action:'term_lang_choice',lang:$(this).attr('value'),term_id:$("input[name='tag_ID']").attr('value'),taxonomy:$("input[name='taxonomy']").attr('value')}
$.post(ajaxurl,data,function(response){var res=wpAjax.parseAjaxResponse(response,'ajax-response');$.each(res.responses,function(){switch(this.what){case'translations':$("#term-translations").html(this.data);break;case'parent':$('#parent').replaceWith(this.data);break;default:break;}});});});$('#lang_list').change(function(){value=$(this).attr('value').split('-');selected=$("select option:selected").text().split(' - ');$('input[name="slug"]').val(value[0]);$('input[name="description"]').val(value[1]);$('input[name="rtl"]').val([value[2]]);$('input[name="name"]').val(selected[0]);});});