<?php
/**
*
* @package umil
* @version $Id
* @copyright (c) 2013 phpbbmodders.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
	{
		trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
	}
	
/*
* The language file which will be included when installing
* Language entries that should exist in the language file for UMIL (replace $mod_name with the mod's name you set to $mod_name above)
* $mod_name
* 'INSTALL_' . $mod_name
* 'INSTALL_' . $mod_name . '_CONFIRM'
* 'UPDATE_' . $mod_name
* 'UPDATE_' . $mod_name . '_CONFIRM'
* 'UNINSTALL_' . $mod_name
* 'UNINSTALL_' . $mod_name . '_CONFIRM'
*/
$language_file = 'mods/user_styles';
	
// The name of the mod to be displayed during installation.
$mod_name = 'INSTALL_USER_STYLES';
	
/*
* The name of the config variable which will hold the currently installed version
* You do not need to set this yourself, UMIL will handle setting and updating the version itself.
*/
$version_config_name = 'user_styles_version';

$versions = array(
	// Version 1.0.0
	'1.0.0'	=> array(	
		'module_add'	=> array(
            array('acp', 'ACP_CAT_USERS', array(
					'module_basename'	=> 'user_styles',
					'module_langname'	=> 'ACP_USER_STYLES',
					'module_mode'		=> 'acp_user_styles',
					'module_auth'		=> 'acl_a_user',
				),
			),
		),
		'cache_purge'	=> (''),
	),
	// Version 1.0.1
	'1.0.1'	=> array(
	// nothing to do
	),	
);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);
?>