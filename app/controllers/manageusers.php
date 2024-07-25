<?php 

/**
 * Users controller
 */
class manageusers extends Controller
{
	
	function index()
	{
	$db = new Database();

	$limit = 10;
	$pager = new Pager($limit);
	$offset = $pager->offset;
	
	$users = $db->query("select * from users order by username asc limit $limit offset $offset");


	require viewsPath('auth/manageusers');
	}
}

