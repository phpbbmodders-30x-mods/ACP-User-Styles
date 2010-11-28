<?php
/**
*
*
* @package language
* @version $Id: users_styles.php 0005 16:35 21/09/2008 cherokee red $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

// View User Styles
$lang = array_merge($lang, array(
	'ACP_VIEW_USERS_STYLE'			=> 'View User Styles',
	'ACP_VIEW_USERS_STYLE_EXPLAIN'	=> 'See which style each user is currently using.',

	'INSTALL_USER_STYLES'			=> 'ACP User Styles',
	'NO_USERS_ACP'					=> 'There are currently no users on your forum',

    'USERNAME'		=> 'Username',
	'USER_STYLE'	=> 'Users Style',
	'VIEW_STYLE'	=> 'View Style',
	'USER_COUNT'	=> '1 user',
	'USER_COUNTS'	=> '%d users',
));

?>