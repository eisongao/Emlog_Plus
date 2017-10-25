<?php 
/**
 * 表情
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<script>
function grin(tag) {
      var myField;
      tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
        myField = document.getElementById('comment');
      } else {
        return false;
      }
      if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = tag;
        myField.focus();
      }
      else if (myField.selectionStart || myField.selectionStart == '0') {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        var cursorPos = startPos;
        myField.value = myField.value.substring(0, startPos)
                + tag
                + myField.value.substring(endPos, myField.value.length);
        cursorPos += tag.length;
        myField.focus();
        myField.selectionStart = cursorPos;
        myField.selectionEnd = cursorPos;
      }      else {
        myField.value += tag;
        myField.focus();
       
      }
       $("#faceWraps").hide();
    }
    </script>

<div id="smilelink" >
<a onclick="javascript:grin(':happy:')"><span class="icon-happy grin"></span></a>
<a onclick="javascript:grin(':smile:')"><span class="icon-smile grin"></span></a>
<a onclick="javascript:grin(':tongue:')"><span class="icon-tongue grin"></span></a>
<a onclick="javascript:grin(':sad:')"><span class="icon-sad grin"></span></a>
<a onclick="javascript:grin(':wink:')"><span class="icon-wink grin"></span></a>
<a onclick="javascript:grin(':grin:')"><span class="icon-grin grin"></span></a>
<a onclick="javascript:grin(':cool:')"><span class="icon-cool grin"></span></a>
<a onclick="javascript:grin(':grin:')"><span class="icon-grin grin"></span></a>
<a onclick="javascript:grin(':angry:')"><span class="icon-angry grin"></span></a>
<a onclick="javascript:grin(':evil:')"><span class="icon-evil grin"></span></a>
<a onclick="javascript:grin(':shocked:')"><span class="icon-shocked grin"></span></a>
<a onclick="javascript:grin(':baffled:')"><span class="icon-baffled grin"></span></a>
<a onclick="javascript:grin(':confused:')"><span class="icon-confused grin"></span></a>
<a onclick="javascript:grin(':neutral:')"><span class="icon-neutral grin"></span></a>
<a onclick="javascript:grin(':hipster:')"><span class="icon-hipster grin"></span></a>
<a onclick="javascript:grin(':wondering:')"><span class="icon-wondering grin"></span></a>
<a onclick="javascript:grin(':sleepy:')"><span class="icon-sleepy grin"></span></a>
<a onclick="javascript:grin(':frustrated:')"><span class="icon-frustrated grin"></span></a>
<a onclick="javascript:grin(':crying:')"><span class="icon-crying grin"></span></a>
</div>
