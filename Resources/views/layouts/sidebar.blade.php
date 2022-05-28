<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('recruitment.home')}}" class="brand-link">
        <span class="brand-text font-weight-light">{{config('recruitment.name')}}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include("recruitment::layouts.menu")
            </ul>
        </nav>
    </div>

</aside>
