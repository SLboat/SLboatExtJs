<?php
############################################################
#Author:
#Slboat,http://see.sl088.com
#
############################################################
# Setup and Hooks for the MsUpload extension
if (!defined('MEDIAWIKI')) {
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

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['ExtJs'] = $dir . 'ExtJs.i18n.php';

$wgHooks['EditPage::showEditForm:initial'][] = 'ExtJs_Edit_Setup';

$wgResourceModules['ext.ExtJs'] = array(
    // load the js module
    'scripts' => array(
        'js/inline-attach.js',
    ),
    // 多语言消息文本咯
    'messages' => array(
        'extjs-desc',

    ),
    //本地基础路径
    'localBasePath' => dirname(__FILE__),
    //远程扩展路径？
    'remoteExtPath' => 'ExtJs'
);


function ExtJs_Edit_Setup()
{
    //load module
    $wgOut->addModules('ext.ExtJs');
    
    return true;
}
