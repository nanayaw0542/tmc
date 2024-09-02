<?php 
/**
 * 
 */
class managefirsttimers extends Controller
{
  
  function index()
  {
    $db = new Database();

    $members = $db->query("select * from firsttimers order by fullname asc");

    if(Auth::access_level('super_admin') || Auth::access_level('admin'))
     {
      require viewsPath("membership/managefirsttimers");
     }

    else if(Auth::access_level('admin'))
    {
      require viewsPath("membership/managefirsttimers");
    }

    else
    {
      Auth::setMessage("Only Admins can register users");
      require viewsPath('auth/denied');
    }

  }
}