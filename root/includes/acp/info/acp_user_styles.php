<?php
/**
*
* @package acp
* @version $Id: acp_user_styles.php, 0002 16:34 21/09/2008 cherokee red Exp $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package module_install
*/
class acp_user_styles_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_user_styles',
			'title'		=> 'ACP_USER_STYLES',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'acp_user_styles'	=> array('title' => 'ACP_USER_STYLES', 'auth' => 'acl_a_user', 'cat' => array('ACP_CAT_USERS')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}

?>