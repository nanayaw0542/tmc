<?php 
$db = new Database();
    $query  = "select count(userid) as totals from users where status ='Active'";
    $total = $db->query($query);
    $totalusers = $total[0]["totals"];

    $query  = "select count(ministryid) as totals from ministry where status ='Active'";
    $total = $db->query($query);
    $totalministry = $total[0]["totals"];

    $query  = "select count(memberid) as totals from members where status ='Active'";
    $total = $db->query($query);
    $totalmember = $total[0]["totals"];

    $query  = "select count(convertid) as totals from newconverts where status ='Active'";
    $total = $db->query($query);
    $totalconverts = $total[0]["totals"];

    $query  = "select count(firsttimersid) as totals from firsttimers where status ='Active'";
    $total = $db->query($query);
    $totalfirsttimers = $total[0]["totals"];
 ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=ROOT?>" class="brand-link">
      <img src="assets/image/logo.jpg" alt="TMCS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">T M C S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=crop($_SESSION['USER']['Image'])?>" class="img-circle elevation-2 shadow" alt="User Image">
        </div>
        <div class="info">
          <h4 class="d-block" style="color: white;"><?=strtoupper($_SESSION['USER']['Username'])?></h4><b style="color: white;">Logged In as:</b>
          <h6 class="" style="color: white;"><?=$_SESSION['USER']['Role']?></h6>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?=ROOT?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Members
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-warning right"><?=$totalmember + $totalconverts + $totalfirsttimers?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=ROOT?>/managemembers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <span class="badge badge-primary right"><?=$totalmember?></span>
                  <p>View Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/addmember" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/manageconverts" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <span class="badge badge-primary right"><?=$totalconverts?></span>
                  <p>View Converts</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="<?=ROOT?>/addconvert" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Convert</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?=ROOT?>/managefirsttimers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <span class="badge badge-primary right"><?=$totalfirsttimers?></span>
                  <p>View First Timers</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="<?=ROOT?>/addfirsttimers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add First Timers</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Ministry/Basonta
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-success right"><?=$totalministry?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=ROOT?>/manageministry" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Ministry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/addministry" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Ministry</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Bacenta
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Bacenta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Bacenta</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li> -->
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=ROOT?>/manageattendance" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/addattendance" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/viewconvertattendance" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Converts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/convertsattendance" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Converts Attendance</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?=$totalusers?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=ROOT?>/manageusers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/adduser" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=ROOT?>/profile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Profile</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contact-us.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact us</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Manage Church
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=ROOT?>/manageservice" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Services</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=ROOT?>/addservice" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Service</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View System Setting</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="pages/examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Reports
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Attendance Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>