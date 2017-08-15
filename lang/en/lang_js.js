var LNG = {
//---------------------------
//admin/views/js/common.js
 'twitter_del_sure'	: 'Are you sure you want to delete this twitt?',
 'comment_del_sure'	: 'Are you sure you want to delete this comment?',
 'comment_ip_del_sure'	: 'Are you sure you want to delete all comments from that IP?',
 'link_del_sure'	: 'Are you sure you want to delete this link?',
 'navi_del_sure'	: 'Are you sure you want to delete this navigation?',
 'backup_import_sure'	: 'Are you sure you want to import the backup files?',
 'attach_del_sure'	: 'Are you sure you want to delete this attachment?',
 'avatar_del_sure'	: 'Are you sure you want to delete this avatar?',
 'category_del_sure'	: 'Are you sure you want to delete this category?',
 'page_del_sure'	: 'Are you sure you want to delete this page?',
 'user_del_sure'	: 'Are you sure you want to delete this user?',
 'template_del_sure'	: 'Are you sure you want to delete default template?',
 'plugin_reset_sure'	: 'Are you sure you want to restore default plugin settings? This operation will lose your custom plugin configuration.',
 'plugin_del_sure'	: 'Are you sure you want to delete this plugin?',
 'title_empty'		: 'Title can not be empty',
 'alis_link_error'	: 'Link Alias error',
 'alias_invalid_chars'	: 'Alias should contain only latin letters, numbers, underscores and dashes',
 'alias_digital'	: 'Alias cannot contain numbers only',
 'alias_format_must_be'	: 'Invalid alias. It can not contain \'post\' or \'post-digits\'',
 'alias_system_conflict'	: 'Alias error (system conflict)',
 'wysiwyg_switch'		: 'Please, switch to WYSIWYG mode',
 'click_view_fullsize'		: 'Click to view full size',
'alis_link_error_not_saved'	: 'Invalid Link Alias. Can not be saved automatically.',
 'saving'		: 'Saving',
'saved_ok_time'	: 'Successfully saved at ',
 'save_system_error'	: 'Error while saving... Unable to save.',
 'title_drag':'Drag and drop a file here or click',
 'title_drag2':'Drag and drop or click to replace',
 'removes':'Remove',

//---------------------------
//include/lib/js/common_tpl.js
'loading'		: 'Loading...',
'max_140_bytes'	: '(Up to 140 characters)',
 'nickname_empty'	: '(Nickname cannot be empty)',
 'captcha_error'	: '(Verification code error)',
 'nickname_disabled'	: '(This nickname is not allowed)',
 'nickname_exists'	: '(This nickname already exists)',
 'comments_disabled'	: '(Comments disabled)',
 'comment_ok_moderation'	: '(Your comment saved successfully and is awaiting for moderation.)',
'sliderunlock':'Slide to unlock',
'sliderunlock_success':'Unlock Success',

//----------------
// The LAST key. DO NOT EDIT!!!
  '@' : '@'
};

//------------------------------
// Return the language var value
function lang(key) {
  if(LNG[key]) {
    val = LNG[key];
  } else {
    val = '{'+key+'}';
  }
  return val;
}
