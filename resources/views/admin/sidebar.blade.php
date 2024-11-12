      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admin/img/qaiser.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Qaiser Shameer</h1>
            <p>App Developer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('/home')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('crv')}}"> <i class="icon-padnote"></i>Receipts</a></li>
                <li><a href="{{url('cpv')}}"> <i class="icon-padnote"></i>Payments</a></li>
                <li><a href="{{url('jv')}}"> <i class="fa fa-ticket"></i>Journal Jv</a></li>
                <li><a href="{{url('ac_ledger')}}"> <i class="icon-padnote"></i>A/c Ledger</a></li>
                <li><a href="{{url('cash_book')}}"> <i class="icon-padnote"></i>Cash Book</a></li>
                <li><a href="{{url('trail_balance')}}"> <i class="icon-padnote"></i>Trial </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>General </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('accounts')}}">Accounts</a></li>
                    <li><a href="{{url('acctype')}}">A/c Types</a></li>
                    <li><a href="{{url('accparent')}}">A/c Parents</a></li>
                    <li><a href="{{url('area')}}">Areas</a></li>
                    <li><a href="{{url('currency')}}">Currencies</a></li>
                  </ul>
                </li>

                <li><a href="/home"> <i class="icon-logout"></i>Login page </a></li>

        </ul><span class="heading">Extras</span>        
        <ul class="list-unstyled">
          <li> <a href="/home"> <i class="icon-settings"></i>Settings </a></li>
          <li> <a href="/home"> <i class="icon-writing-whiteboard"></i>Project View </a></li>
          <li> <a href="/home"> <i class="icon-chart"></i>Financial Stats </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->