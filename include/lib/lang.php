<?php
/**
 * 载入语言文件
 * @param string $model //Language File Name
 * @return none
 * @author Flyer
 */

function load_languages($model='') {
  global $LANGUAGES;
  global $LANGLISTS;

    $model = strtolower($model);
    $model = str_replace('_controller','',$model);
    $model = str_replace('_model','',$model);

  if(!isset($LANGUAGES)) {$LANGUAGES = array();}
  if(!isset($LANGLISTS)) {$LANGLISTS = array();}

if($model && !isset($LANGLISTS[$model])) {

$file = EMLOG_ROOT.'/lang/'.EMLOG_LANGUAGES.'/lang_'.$model.'.php';

if(is_file($file)) {

      $langs = array();
      $ok = @require_once $file;

      $LANGUAGES = array_merge($LANGUAGES, $langs);

      unset($langs);

      $LANGLISTS[$model] = 1;

    }

  }

}

/**
 * 返回语言变量
 *
 * @param string $key //Language Keyword
 * @return string //Language Value
 * @author Flyer
 */


function langs($key='') {
  global $LANGUAGES;
  return isset($LANGUAGES[$key]) ? $LANGUAGES[$key] : '{'.$key.'}';
}