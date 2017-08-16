$(function () {
$('#LockScreen').click(function(){
          $('#lock_box').show();
        })
        var slider = new SliderUnlock(".slideunlock-slider", {
            labelTip: lang('sliderunlock'),
            successLabelTip: lang('sliderunlock_success'),
            duration: 200,
        }, function(){
        $('#lock_box').hide();
        slider.reset();
        }, function(){
            $(".warn").text("index:" + slider.index + "， max:" + slider.max + ",lableIndex:" + slider.lableIndex + ",value:" + $(".slideunlock-lockable").val() + " date:" + new Date().getUTCDate());
        });
        slider.init();
    })

function getChecked(node) {
    var re = false;
    $('input.'+node).each(function(i){
        if (this.checked) {
            re = true;
        }
    });
    return re;
}
function timestamp(){
    return new Date().getTime();
}
function em_confirm (id, property, token) {
    switch (property){
         case 'tw':
     var urlreturn="twitter.php?action=del&id="+id;
	var msg = lang('twitter_del_sure');break;
        case 'comment':
            var urlreturn="comment.php?action=del&id="+id;
            var msg = lang('comment_del_sure');break;
        case 'commentbyip':
            var urlreturn="comment.php?action=delbyip&ip="+id;
            var msg = lang('comment_ip_del_sure');break;
        case 'link':
            var urlreturn="link.php?action=dellink&linkid="+id;
            var msg = lang('link_del_sure');break;
        case 'navi':
            var urlreturn="navbar.php?action=del&id="+id;
            var msg = lang('navi_del_sure');break;
        case 'backup':
            var urlreturn="data.php?action=renewdata&sqlfile="+id;
            var msg = lang('backup_import_sure');break;
        case 'attachment':
            var urlreturn="attachment.php?action=del_attach&aid="+id;
            var msg = lang('attach_del_sure');break;
        case 'avatar':
            var urlreturn="blogger.php?action=delicon";
            var msg = lang('avatar_del_sure');break;
        case 'sort':
            var urlreturn="sort.php?action=del&sid="+id;
            var msg = lang('category_del_sure');break;
        case 'sortlink':
        var urlreturn="sortlink.php?action=del&linksort_id="+id;
        var msg = lang('category_del_sure');break;
        case 'page':
            var urlreturn="page.php?action=del&gid="+id;
            var msg = lang('page_del_sure');break;
        case 'user':
            var urlreturn="user.php?action=del&uid="+id;
            var msg = lang('user_del_sure');break;
        case 'tpl':
            var urlreturn="template.php?action=del&tpl="+id;
            var msg = lang('template_del_sure');break;
        case 'reset_widget':
            var urlreturn="widgets.php?action=reset";
            var msg = lang('plugin_reset_sure');break;
        case 'plu':
            var urlreturn="plugin.php?action=del&plugin="+id;
            var msg = lang('plugin_del_sure');break;
    }
    if(confirm(msg)){window.location = urlreturn + "&token="+token;}else {return;}
}
function focusEle(id){try{document.getElementById(id).focus();}catch(e){}}
function hideActived(){
    $(".alert-success").hide();
    $(".alert-danger").hide();
    //$(".error").hide();
}
function displayToggle(id, keep){
    $("#"+id).toggle();
    if (keep == 1){$.cookie('em_'+id,$("#"+id).css('display'),{expires:365});}
    if (keep == 2){$.cookie('em_'+id,$("#"+id).css('display'));}
}
function isalias(a){
    var reg1=/^[\u4e00-\u9fa5\w-]*$/;
    var reg2=/^[\d]+$/;
    var reg3=/^post(-\d+)?$/;
    if(!reg1.test(a)) {
        return 1;
    }else if(reg2.test(a)){
        return 2;
    }else if(reg3.test(a)){
        return 3;
    }else if(a=='t' || a=='m' || a=='admin'){
        return 4;
    } else {
        return 0;
    }
}
function checkform(){
    var a = $.trim($("#alias").val());
    var t = $.trim($("#title").val());
    if (t==""){
       alert(lang('title_empty'));
        $("#title").focus();
        return false;
    }else if(0 == isalias(a)){
        return true;
    }else {
        alert(lang('alis_link_error'));
        $("#alias").focus();
        return false
    };
}
function checkalias(){
    var a = $.trim($("#alias").val());
    if (1 == isalias(a)){
       $("#alias_msg_hook").html('<span id="input_error">'+lang('alias_invalid_chars')+'</span>');
    }else if (2 == isalias(a)){
        $("#alias_msg_hook").html('<span id="input_error">'+lang('alias_digital')+'</span>');
    }else if (3 == isalias(a)){
        $("#alias_msg_hook").html('<span id="input_error">'+lang('alias_format_must_be')+'</span>');
    }else if (4 == isalias(a)){
       $("#alias_msg_hook").html('<span id="input_error">'+lang('alias_system_conflict')+'</span>');
    }else {
        $("#alias_msg_hook").html('');
        $("#msg").html('');
    }
}
function addattach_img(fileurl,imgsrc,aid, width, height, alt){
if(editor==1){
    if (editorMap['content'].designMode === false){
        alert(lang('wysiwyg_switch'));
    }else if (imgsrc != "") {
        editorMap['content'].insertHtml('<a target=\"_blank\" href=\"'+fileurl+'\" id=\"ematt:'+aid+'\"><img src=\"'+imgsrc+'\" title="'+lang('click_view_fullsize')+'" alt=\"'+alt+'\" border=\"0\" width="'+width+'" height="'+height+'"/></a>');
    }
}
if(editor==2){
tinyMCE.execCommand('mceInsertContent',false,'<a target=\"_blank\" href=\"'+fileurl+'\" id=\"ematt:'+aid+'\"><img src=\"'+imgsrc+'\" title="'+lang('click_view_fullsize')+'" alt=\"'+alt+'\" border=\"0\" width="100%" height="'+height+'"/></a>');
}
if(editor==3){
if (UE.getEditor('content').queryCommandState("source")== true){
		alert(lang('wysiwyg_switch'));
	}else if(imgsrc != "") {
		UE.getEditor('content').execCommand("insertHtml",'<a target=\"_blank\" href=\"'+fileurl+'\" id=\"ematt:'+aid+'\"><img src=\"'+imgsrc+'\" title="'+lang('click_view_fullsize')+'" alt=\"'+alt+'\" border=\"0\" width="'+width+'" height="'+height+'"/></a>');
	}
}
}
function addattach_file(fileurl,filename,aid){
if(editor==1){
    if (editorMap['content'].designMode === false){
        alert(lang('wysiwyg_switch'));
    } else {
        editorMap['content'].insertHtml('<span class=\"attachment\"><a target=\"_blank\" href=\"'+fileurl+'\" >'+filename+'</a></span>');
    }
}
if(editor==2){
tinyMCE.execCommand('mceInsertContent',false,'<span class=\"attachment\"><a target=\"_blank\" href=\"'+fileurl+'\" >'+filename+'</a></span>'); 
}
if(editor==3){
if (UE.getEditor('content').queryCommandState("source")== true){
		alert(lang('wysiwyg_switch'));
	} else {
		UE.getEditor('content').execCommand("insertHtml", '<span class=\"attachment\"><a target=\"_blank\" href=\"'+fileurl+'\" >'+filename+'</a></span>');
	}
}
}
function insertThumb (pic){
	var targetinput = $("#thumbs").val();
       targetinput += pic;
       if($("#thumbs").val()==""){      $("#thumbs").val(targetinput);
      }else{
       $("#thumbs").attr('value','');

      
      }
       $('#add_thumb').modal('hide')
}
function insertTag (tag, boxId){
    var targetinput = $("#"+boxId).val();
    if(targetinput == ''){
        targetinput += tag;
    }else{
        var n = ',' + tag;
        targetinput += n;
    }
    $("#"+boxId).val(targetinput);
    if (boxId == "tag")
        $("#tag_label").hide();
}
//act:0 auto save,1 click attupload,2 click savedf button, 3 save page, 4 click page attupload
function autosave(act){
    var nodeid = "as_logid";
    if (act == 3 || act == 4){
    if(editor==1){
        editorMap['content'].sync();
        var content = $('#content').val();		
        }
        var url = "page.php?action=autosave";
        var title = $.trim($("#title").val());
        var alias = $.trim($("#alias").val());
        var template = $.trim($("#template").val());
        var logid = $("#as_logid").val();
        if(editor==2){
		var content = tinyMCE.get('content').getContent();
	 }
	 if(editor==3){
	        var content = UE.getEditor('content').getContent();
	 }
	 var pageurl = $.trim($("#url").val());
        var allow_remark = $("#page_options #allow_remark").attr("checked") == 'checked' ? 'y' : 'n';
        var is_blank = $("#page_options #is_blank").attr("checked") == 'checked' ? 'y' : 'n';
        var token = $.trim($("#token").val());
        var ishide = $.trim($("#ishide").val());
        var ishide = ishide == "" ? "y" : ishide;
        var querystr = "content="+encodeURIComponent(content)
                    +"&title="+encodeURIComponent(title)
                    +"&alias="+encodeURIComponent(alias)
                    +"&template="+encodeURIComponent(template)
                    +"&allow_remark="+allow_remark
                    +"&is_blank="+is_blank
                    +"&url="+pageurl
                    +"&token="+token
                    +"&ishide="+ishide
                    +"&as_logid="+logid;
    }else{
        if(editor==1){
	    editorMap['content'].sync();
	    editorMap['excerpt'].sync();
	var content = $('#content').val();
	var excerpt = $('#excerpt').val();
	 }
        var url = "save_log.php?action=autosave";
        var title = $.trim($("#title").val());
        var alias = $.trim($("#alias").val());
        var sort = $.trim($("#sort").val());
        var postdate = $.trim($("#postdate").val());
        var date = $.trim($("#date").val());
        var logid = $("#as_logid").val();
        var author = $("#author").val();
        if(editor==2){
	 var content = tinyMCE.get('content').getContent();
	 var excerpt = tinyMCE.get('excerpt').getContent();
}
if(editor==3){
		var content = UE.getEditor('content').getContent();
		var excerpt = UE.getEditor('excerpt').getContent();
	 }
        var tag = $.trim($("#tag").val());
        var top = $("#post_options #top").attr("checked") == 'checked' ? 'y' : 'n';
        var sortop = $("#post_options #sortop").attr("checked") == 'checked' ? 'y' : 'n';
        var allow_remark = $("#post_options #allow_remark").attr("checked") == 'checked' ? 'y' : 'n';
        var allow_tb = $("#post_options #allow_tb").attr("checked") == 'checked' ? 'y' : 'n';
        var password = $.trim($("#password").val());
        var ishide = $.trim($("#ishide").val());
        var token = $.trim($("#token").val());
        var ishide = ishide == "" ? "y" : ishide;
        var querystr = "content="+encodeURIComponent(content)
                    +"&excerpt="+encodeURIComponent(excerpt)
                    +"&title="+encodeURIComponent(title)
                    +"&alias="+encodeURIComponent(alias)
                    +"&author="+author
                    +"&sort="+sort
                    +"&postdate="+postdate
                    +"&date="+date
                    +"&tag="+encodeURIComponent(tag)
                    +"&top="+top
                    +"&sortop="+sortop
                    +"&allow_remark="+allow_remark
                    +"&allow_tb="+allow_tb
                    +"&password="+password
                    +"&token="+token
                    +"&ishide="+ishide
                    +"&as_logid="+logid;
    }
    if (title==""){
		alert(lang('title_empty'));
		$("#title").focus();
		$("#FrameUpload").hide();
		return false;
	};
    //check alias
    if(alias != '') {
        if (0 != isalias(alias)){
            $("#msg").html("<div class=\"actived alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>"+lang('alis_link_error_not_saved')+"</div>");
            if(act == 0){setTimeout("autosave(0)",60000);}
            return;
        }
    }
    if(act == 0){
        if(ishide == 'n'){return;}
        if (content == ""){
            setTimeout("autosave(0)",60000);
            return;
        }
    }
    if(act == 1 || act == 4){
        var gid = $("#"+nodeid).val();
        if (gid != -1){return;}
    }
    $("#msg").html("<div class=\"actived alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>"+lang('saving')+"...</div>");
    var btname = $("#savedf").val();
    $("#savedf").val(lang('saving'));
    $("#savedf").attr("disabled", "disabled");
    $.post(url, querystr, function(data){
        data = $.trim(data);
        var isrespone=/autosave\_gid\:\d+\_df\:\d*\_/;
        if(isrespone.test(data)){
            var getvar = data.match(/\_gid\:([\d]+)\_df\:([\d]*)\_/);
            var logid = getvar[1];
            if (act == 0 || act == 1 || act == 2){
                var dfnum = getvar[2];
                if(dfnum > 0){$("#dfnum").html("("+dfnum+")")};
            }
            $("#"+nodeid).val(logid);
            var digital = new Date();
            var hours = digital.getHours();
            var mins = digital.getMinutes();
            var secs = digital.getSeconds();
            $("#msg_2").html("<div class=\"actived alert alert-warning alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>"+lang('saved_ok_time')+hours+':'+mins+':'+secs+"</div>");
            $("#savedf").attr("disabled", false);
            $("#savedf").val(btname);
            $("#msg").html("");
        }else{
            $("#savedf").attr("disabled", false);
            $("#savedf").val(btname);
            $("#msg").html("<div class=\"actived alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>'+lang('save_system_error')+'</div>");
        }
    });
    if(act == 0){
        setTimeout("autosave(0)",60000);
    }
}
//toggle plugin
$.fn.toggleClick = function(){
    var functions = arguments ;
    return this.click(function(){
            var iteration = $(this).data('iteration') || 0;
            functions[iteration].apply(this, arguments);
            iteration = (iteration + 1) % functions.length ;
            $(this).data('iteration', iteration);
    });
};
function selectAllToggle(){
    $("#select_all").toggleClick(function () {$(".ids").prop("checked", "checked");},function () {$(".ids").removeAttr("checked");});
}