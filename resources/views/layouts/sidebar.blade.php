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
            <li class="nav-label">Directorates</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">DIRECTORATES</span></a>
                <ul aria-expanded="false">
                    <li @if (request()->is('directorates')) class="active" @endif>
                        <a href="{{ route('directorates.index') }}">Directorate</a>
                    </li>
                    <li @if (request()->is('departements')) class="active" @endif>
                        <a href="{{ route('departements.index') }}">Departement</a>
                    </li>
                </ul>
            </li>
            <li class="nav-label">Kpi Setting</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">KPI</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('corporates.index') }}">Corporate</a></li>
                    <li><a href="{{ route('kpidirectorate.index') }}">Directorate</a></li>
                    <li><a href="{{ route('kpidepartement.index') }}">Departement</a></li>
                </ul>
            </li>
            <li class="nav-label">User</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-cog"></i></i><span
                        class="nav-text">SETTING USER</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users.index') }}">User List</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
