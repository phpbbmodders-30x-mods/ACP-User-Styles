<?php
/**
*
* @package acp
* @version $Id: acp_user_styles.php,0024 09:28 01/09/2008 cherokee red Exp $
* @copyright (c) 2007 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package acp
*/
class acp_user_styles
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $template, $config, $phpEx;

		$user->add_lang('mods/user_styles');

		// Set up general vars
		$start = request_var('start', 0);

		// Set up the page
		$this->tpl_name     = 'acp_user_styles';
		$this->page_title     = 'ACP_USER_STYLES';

		$user_types = array(USER_FOUNDER, USER_NORMAL);
		// How many users do we have?
		$sql = 'SELECT COUNT(user_id) AS total_users
			FROM ' . USERS_TABLE . '
			WHERE ' . $db->sql_in_set('user_type', $user_types) . '
			ORDER BY user_id';
		$result = $db->sql_query($sql);
		$total_users = (int) $db->sql_fetchfield('total_users');
		$db->sql_freeresult($result);

		// Pull users & styles from the database
		$sql = $db->sql_build_query('SELECT', array(
			'SELECT'    => 'u.user_id, u.username, u.username_clean, u.user_colour, u.user_style, u.user_type, s.style_id, s.style_name',
			'FROM'        => array(
				USERS_TABLE        => 'u',
				STYLES_TABLE        => 's'
			),
			'WHERE'        => $db->sql_in_set('user_type', $user_types) . ' AND u.user_style = s.style_id',
			'ORDER_BY'    => 's.style_name, u.username_clean ASC'
		));
		$result = $db->sql_query_limit($sql, $config['topics_per_page'], $start);

		while ($row = $db->sql_fetchrow($result))
		{
			$style_id = $row['style_id'];
			$template->assign_block_vars('users', array(
				'STYLE_ID'			=> $row['style_id'],
				'USER_STYLE'		=> $row['style_name'],
				'USERNAME_FULL'		=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
				'USERNAME'			=> get_username_string('username', $row['user_id'], $row['username'], $row['user_colour']),
				'USER_COLOR'		=> get_username_string('colour', $row['user_id'], $row['username'], $row['user_colour']),
				'U_VIEW_PROFILE'	=> get_username_string('profile', $row['user_id'], $row['username'], $row['user_colour']),
				'U_PREVIEW_STYLE'	=> generate_board_url() . "/index.$phpEx?style=$style_id",
			));
		}
		$db->sql_freeresult($result);

		$pagination_url = $this->u_action;

		$template->assign_vars(array(
			'PAGINATION'		=> generate_pagination($pagination_url, $total_users, $config['topics_per_page'], $start, true),
			'S_ON_PAGE'			=> on_page($total_users, $config['topics_per_page'], $start),
			'TOTAL_USERS'		=> ($total_users == 1) ? $user->lang['USER_COUNT'] : sprintf($user->lang['USER_COUNTS'], $total_users),
			'U_ACTION'			=> $this->u_action)
		);
	}
}

?>