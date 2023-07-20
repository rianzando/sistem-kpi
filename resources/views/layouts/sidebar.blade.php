<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span
                        class="nav-text">Dashboard</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                </ul>
            </li>
            <li class="nav-label">Kpi Setting</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">KPI</span></a>
                <ul aria-expanded="false">
                    <li><a href="./app-profile.html">KPI Corporate</a></li>
                    <li><a href="./app-calender.html">KPI Directorate</a></li>
                    <li><a href="./app-calender.html">KPI Departement</a></li>
                </ul>
            </li>
            <li class="nav-label">User</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">SETTING USER</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users.index') }}">User List</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
