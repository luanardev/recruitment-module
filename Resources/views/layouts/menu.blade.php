
<li class="nav-item">
    <a href="{{route('recruitment.home')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-regular fa-newspaper"></i>
        
        <p>Vacancies</p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{route('vacancy.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Vacancy</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('vacancy.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Get Vacancies</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('shortlist.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Get Shortlist</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-regular fa-clipboard"></i>
        <p>Interviews</p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{route('interview.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Interview</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('interview.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Get Interviews</p>
            </a>
        </li>
    
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-regular fa-box-open"></i>
        <p> Archiving</p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
    
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Get Archives</p>
            </a>
        </li>
    
    </ul>
</li>


