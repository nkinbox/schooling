  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>SCHOOLLING</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <?php  if(isset($_SESSION['ADMINID'])){ ?>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-edit"></i> <span>Manage Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-circle-o"></i>Admin</a></li>
          </ul>
        </li>
        <?php  } ?>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="users.php"><i class="fa fa-circle-o"></i>Users</a></li>      
          </ul>
           <ul class="treeview-menu">
            <li><a href="usersdata.php"><i class="fa fa-circle-o"></i>Export Data</a></li>      
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Manage Schools</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"> 
            <li><a href="regions.php"><i class="fa fa-circle-o"></i>Regions</a></li>      
            <li><a href="school.php"><i class="fa fa-circle-o"></i>School</a></li>      
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Site Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="page.php"><i class="fa fa-circle-o"></i>Pages</a></li>           
            <li><a href="siteinfo.php"><i class="fa fa-circle-o"></i>Siteinfo</a></li>           
            <li><a href="offer.php"><i class="fa fa-circle-o"></i>Super Offers</a></li>           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Application Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="form.php"><i class="fa fa-circle-o"></i>Form</a></li>           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Manage Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="order.php"><i class="fa fa-circle-o"></i>Orders</a></li>           
          </ul>
        </li>

         <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Outstation Car</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="outstation-car.php"><i class="fa fa-circle-o"></i>Outstation Car</a></li>           
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Booking</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="booking_detail.php"><i class="fa fa-circle-o"></i>Booking Detail</a></li>        
            <li><a href="rental_booking_detail.php"><i class="fa fa-circle-o"></i>Rental Car Booking</a></li>        
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Feedback</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="feedback.php"><i class="fa fa-circle-o"></i>Feedback</a></li>      
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Complain</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="complain.php"><i class="fa fa-circle-o"></i>Complain</a></li>      
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>CMS Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="page.php"><i class="fa fa-circle-o"></i>Page</a></li>      
            <li><a href="siteinfo.php"><i class="fa fa-circle-o"></i>Siteinfo</a></li>      
          </ul>
        </li> -->
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>