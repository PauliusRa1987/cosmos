<nav class="navbar">
    <a class="navbar-brand" href="#">
        <img src="{{asset('img/5294a45f8ba69038c90bc2f483ca99c6.jpg')}}" width="120" height="60" class="" alt="">
    </a>
    <h2 class="nav-h2">Helium-3 mission</h2>
    <ul class="nav">
        <li class="nav-item">
            <div class="dropdown">
                <a class="dropbtn" href="{{route('country-index')}}">Countries</a>
                <div class="dropdown-content">
                    <a href="{{route('country-create')}}">Create</a>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link" href="{{route('pit-index')}}">Pits</a>
                <div class="dropdown-content">
                    <a href="{{route('pit-create')}}">Create</a>
                </div>
            </div>
        </li>
       <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link" href="{{route('union-index')}}">Unions</a>
                <div class="dropdown-content">
                    <a href="{{route('union-create')}}">Create</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link" href="{{route('ship-index')}}">Ships</a>
                <div class="dropdown-content">
                    <a href="{{route('ship-create')}}">Create</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('front-index')}}">Report</a>
        </li>
    </ul>
</nav>
