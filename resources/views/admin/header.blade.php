<header class="header">   
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="{{url('/home')}}" class="navbar-brand">
            <div class="brand-text brand-big text-uppercase"><strong class="text-primary">Welcome </strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm visible"><strong class="text-primary">D</strong><strong>A</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle active"><i class="fa fa-long-arrow-right"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">    
          <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
          <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="icon-email"></i><span class="badge dashbg-1">5</span></a>
            <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages"><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                  <div class="status online"></div>
                </div>
                <div class="content">   <strong class="d-block">Nadia Halsey</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">9:30am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="img/avatar-2.jpg" alt="..." class="img-fluid">
                  <div class="status away"></div>
                </div>
                <div class="content">   <strong class="d-block">Peter Ramsy</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">7:40am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                  <div class="status busy"></div>
                </div>
                <div class="content">   <strong class="d-block">Sam Kaheil</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">6:55am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="img/avatar-5.jpg" alt="..." class="img-fluid">
                  <div class="status offline"></div>
                </div>
                <div class="content">   <strong class="d-block">Sara Wood</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">10:30pm</small></div></a><a href="#" class="dropdown-item text-center message"> <strong>See All Messages <i class="fa fa-angle-right"></i></strong></a></div>
          </div>
          <!-- Tasks-->
          <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink2" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link tasks-toggle"><i class="icon-new-file"></i><span class="badge dashbg-3">9</span></a>
            <div aria-labelledby="navbarDropdownMenuLink2" class="dropdown-menu tasks-list"><a href="#" class="dropdown-item">
                <div class="text d-flex justify-content-between"><strong>Task 1</strong><span>40% complete</span></div>
                <div class="progress">
                  <div role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-1"></div>
                </div></a><a href="#" class="dropdown-item">
                <div class="text d-flex justify-content-between"><strong>Task 2</strong><span>20% complete</span></div>
                <div class="progress">
                  <div role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-3"></div>
                </div></a><a href="#" class="dropdown-item">
                <div class="text d-flex justify-content-between"><strong>Task 3</strong><span>70% complete</span></div>
                <div class="progress">
                  <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-2"></div>
                </div></a><a href="#" class="dropdown-item">
                <div class="text d-flex justify-content-between"><strong>Task 4</strong><span>30% complete</span></div>
                <div class="progress">
                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-4"></div>
                </div></a><a href="#" class="dropdown-item">
                <div class="text d-flex justify-content-between"><strong>Task 5</strong><span>65% complete</span></div>
                <div class="progress">
                  <div role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" class="progress-bar dashbg-1"></div>
                </div></a><a href="#" class="dropdown-item text-center"> <strong>See All Tasks <i class="fa fa-angle-right"></i></strong></a>
            </div>
          </div>
          <!-- Tasks end-->
          <!-- Megamenu-->
          <div class="list-inline-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="nav-link">Mega <i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu megamenu">
              <div class="row">
                <div class="col-lg-3 col-md-6"><strong class="text-uppercase">General</strong>
                  <ul class="list-unstyled mb-3">
                    <li><a href="{{url('accounts')}}">Accounts</a></li>
                    <li><a href="{{url('acctype')}}">A/c Types</a></li>
                    <li><a href="{{url('accparent')}}">A/c Parents</a></li>
                    <li><a href="{{url('area')}}">Areas</a></li>
                    <li><a href="{{url('currency')}}">Currencies</a></li>
                  </ul>
                </div>
                <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Vouchers</strong>
                  <ul class="list-unstyled mb-3">
                    <li><a href="{{url('crv')}}">Receipts</a></li>
                    <li><a href="{{url('cpv')}}">Payments</a></li>
                    <li><a href="{{url('jv')}}">Journal Jv</a></li>
                    <li><a href="{{url('/home')}}">Purchases</a></li>
                    <li><a href="{{url('/home')}}">Sales</a></li>
                    <li><a href="{{url('/home')}}">Stock In</a></li>
                    <li><a href="{{url('/home')}}">Stock Out</a></li>
                  </ul>
                </div>
                <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Reports</strong>
                  <ul class="list-unstyled mb-3">
                    <li><a href="{{url('ac_ledger')}}">A/c Ledger</a></li>
                    <li><a href="{{url('cash_book')}}">Cash Book</a></li>
                    <li><a href={{url('trial_balance')}}">Trial Balance</a></li>
                    <li><a href="{{url('/home')}}">Transactions</a></li>
                    <li><a href="{{url('/home')}}">Income Statement</a></li>
                    <li><a href="{{url('/home')}}">Balance Sheet</a></li>
                  </ul>
                </div>
                <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Settings</strong>
                  <ul class="list-unstyled mb-3">
                    <li><a href="{{url('/home')}}">DarK Theme</a></li>
                    <li><a href="{{url('/home')}}">Blocked Users</a></li>
                    <li><a href="{{url('/home')}}">Date Closing</a></li>
                    <li><a href="{{url('/home')}}">Backup</a></li>
                    <li><a href="{{url('/home')}}">Default Printer</a></li>
                    <li><a href="{{url('/home')}}">App Configruation</a></li>
                    <li><a href="{{url('/home')}}">Account Configuration</a></li>
                  </ul>
                </div>
              </div>
              <div class="row megamenu-buttons text-center">
                <div class="col-lg-2 col-md-4"><a href="{{url('/home')}}" class="d-block megamenu-button-link dashbg-1"><i class="fa fa-eye"></i><strong>CR 62,345 SAR</strong></a></div>
                <div class="col-lg-2 col-md-4"><a href="{{url('/home')}}" class="d-block megamenu-button-link dashbg-2"><i class="fa fa-eye"></i><strong>CR 54,397 SAR</strong></a></div>
                <div class="col-lg-2 col-md-4"><a href="{{url('/home')}}" class="d-block megamenu-button-link dashbg-4"><i class="fa fa-clock-o"></i><strong>Jv 193,456 SAR</strong></a></div>
                <div class="col-lg-2 col-md-4"><a href="{{url('/home')}}" class="d-block megamenu-button-link bg-success"><i class="fa fa-eye"></i><strong>CR 56,923,650 PKR</strong></a></div>
                <div class="col-lg-2 col-md-4"><a href="{{url('/home')}}" class="d-block megamenu-button-link bg-danger"><i class="fa fa-eye"></i><strong>CP 39,852,358 PKR</strong></a></div>
                <div class="col-lg-2 col-md-4"><a href="{{url('/home')}}" class="d-block megamenu-button-link dashbg-3"><i class="fa fa-clock-o"></i><strong>Jv 63,987,654 PKR</strong></a></div>
              </div>
            </div>
          </div>
          <!-- Megamenu end     -->
          
          {{-- <!-- Languages dropdown    -->
          <div class="list-inline-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
            <div aria-labelledby="languages" class="dropdown-menu"><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2"><span>German</span></a><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2"><span>French  </span></a></div>
          </div> --}}

          <!-- Log out               -->
          <div class="list-inline-item logout">

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input class="btn btn-primary" type="submit" value="Logout">
                </form>

        </div>



        </div>
      </div>
    </nav>
  </header>
  <div class="d-flex align-items-stretch">