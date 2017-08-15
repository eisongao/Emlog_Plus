var LNG = {
//---------------------------
//admin/views/js/common.js
 'twitter_del_sure'	: '你确定要删除该条微语吗？',
 'comment_del_sure'	: '你确定要删除该评论吗？',
 'comment_ip_del_sure'	: '你确定要删除来自该IP的所有评论吗？',
 'link_del_sure'	: '你确定要删除该链接吗？',
 'navi_del_sure'	:'你确定要删除该导航吗？',
 'backup_import_sure'	:'你确定要导入该备份文件吗？',
 'attach_del_sure'	: '你确定要删除该附件吗？',
 'avatar_del_sure'	:'你确定要删除头像吗？',
 'category_del_sure'	: '你确定要删除该分类吗？',
 'page_del_sure'	:'你确定要删除该页面吗？',
 'user_del_sure'	:'你确定要删除该用户吗？',
 'template_del_sure'	: '你确定要删除该模板吗？',
 'plugin_reset_sure'	: '你确定要恢复组件设置到初始状态吗？这样会丢失你自定义的组件。',
 'plugin_del_sure'	:'你确定要删除该插件吗？',
 'title_empty'		:'标题不能为空',
 'alis_link_error'	:'链接别名错误',
 'alias_invalid_chars'	:'别名错误，应由字母、数字、下划线、短横线组成',
 'alias_digital'	:'别名错误，不能为纯数字',
 'alias_format_must_be'	:'别名错误，不能为\'post\'或\'post-数字\'',
 'alias_system_conflict'	:'别名错误，与系统链接冲突',
 'wysiwyg_switch'		: '请先切换到所见所得模式',
 'click_view_fullsize'		:'点击查看原图',
 'alis_link_error_not_saved'	: '链接别名错误，自动保存失败',
 'saving'		:'正在保存',
 'saved_ok_time'	:'成功保存于',
 'save_system_error'	:'网络或系统出现异常...保存可能失败',
 'title_drag':'拖动和删除一个文件在这里或单击',
 'title_drag2':'拖动和下降或单击以替换',
 'removes':'移除',
'sliderunlock':'滑动解锁',
'sliderunlock_success':'解锁成功',

//---------------------------
//include/lib/js/common_tpl.js
 'loading'		: '加载中...',
 'max_140_bytes'	: '回复长度需在140个字内',
 'nickname_empty'	: '(昵称不能为空)',
 'captcha_error'	: '(验证码错误)',
 'nickname_disabled'	: '(不允许使用该昵称)',
 'nickname_exists'	: '(已存在该回复)',
 'comments_disabled'	: '(禁止回复)',
 'comment_ok_moderation'	: '(回复成功，等待管理员审核)', 

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
