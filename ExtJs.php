<?php
############################################################
#Author:
#Slboat,http://see.sl088.com
#
############################################################
# Setup and Hooks for the MsUpload extension
if (!defined('MEDIAWIKI'))
  {
    echo ("This file is an extension to the MediaWiki software and cannot be used standalone.\n");
    die(1);
  }

## Register extension setup hook and credits:
$wgExtensionCredits['parserhook'][] = array(
    'name' => 'SLboatExJs',
    'url' => 'http://see.sl088.com/',
    'descriptionmsg' => 'extjs-desc',
    'version' => '1.2',
    'author' => '[http://see.sl088.ccom SLboat]'
);

$dir                               = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['ExtJs'] = $dir . 'ExtJs.i18n.php';

$wgHooks['EditPage::showEditForm:initial'][] = 'ExtJs_Edit_Setup';

/* 页面显示之前的玩意钩子 */
//$wgHooks['BeforePageDisplay'][] = 'ExtJs_Edit_Setup';

$SLboatExtTpl = array(
    'localBasePath' => dirname(__FILE__), //本地基本路径
    'remoteExtPath' => 'ExtJs', //远程基本路径...这是指向对的吗?
    'group' => 'SLboat.ExtJs' //分组
);

/* 这个钩子看起来是载入了全部扩展啥的 准备初始化的时候 */
//$wgExtensionFunctions[] = 'ExtJs_Edit_Setup';

//TODO:可以增加个extjs资源啥的
$wgResourceModules += array(
    /* 引入部件索引 */
    'jquery.textcomplete' => $SLboatExtTpl + array(
        //资源里的js
        'scripts' => array(
            'js/jquery.textcomplete.min.js',
        ),
        //资源里的css
        'styles' => array(
            'css/fixborder.css', //修复边框的破碎,必须同时载入,否则可能破碎
            'css/dropmenu.css' //下拉菜单的bootstrap缩微css            
        ),
        'dependencies' => array( //依赖jquery
            'jquery'
        )
    ), //自动完成注入完毕
    'jquery.hotkeys' => $SLboatExtTpl + array(
        //资源里的js
        'scripts' => array(
            'js/jquery.hotkeys.js'
        ),
        'dependencies' => array( //依赖jquery
            'jquery'
        ),
    ), //热键完成
    /* 加入更多? */
);


function ExtJs_Edit_Setup()
  {
    //召唤全局变量
    global $wgOut;
    
    //在页面输出的时候添加模块进去
    $wgOut->addModules('jquery.hotkeys');
    $wgOut->addModules('jquery.textcomplete');
    
    return true;
  }
