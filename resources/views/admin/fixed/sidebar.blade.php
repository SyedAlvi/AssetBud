<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
      <div class="user-image">
        <img src="{{url('Backend/images/faces/face29.png')}}">
      </div>
      <div class="user-name">
          Syed Alvi Islam Nifaz
      </div>
      <div class="user-designation">
          Site Admin
      </div>
    </div>

    <ul class="nav">
      @if(auth()->user()->role=='user')
      <li class="nav-item">
        <a class="nav-link" href="{{route('asset.cart')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Asset List</span>
        </a>
      </li>
      @endif
     
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Employee</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            
          <li class="nav-item"> <a class="nav-link" href="{{route('manage.employee')}}">Manage Employee</a></li>
          {{-- <li class="nav-item"> <a class="nav-link" href=""></a></li> --}}
          </ul>
        </div>
      </li>
      @endif
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Asset</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
                 
      
            <li class="nav-item"> <a class="nav-link" href="{{route('manage.asset')}}">Manage Asset</a></li>
    
          </ul>
        </div>
      </li>
      @endif
      @if(auth()->user()->role=='admin')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Request</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
                 
     
            <li class="nav-item"> <a class="nav-link" href="{{route('request.list')}}">Manage Request</a></li>
        
           
          </ul>
        </div>
      </li>
      @endif
     
      <li class="nav-item">
        <a class="nav-link" href="{{route('transfer.list')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Asset Transfer History</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Feedback</span>
        </a>
 
      <li class="nav-item">
    
    </ul>
  </nav