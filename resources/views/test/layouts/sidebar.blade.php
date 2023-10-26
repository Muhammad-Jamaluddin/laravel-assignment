<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">DASHBOARD</li>
                        <li class="active"><a href="{{ url('/') }}">
                                <i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                        </li>

                        <li class="divider">TASKS</li>
                        <li><a href="{{ url('task/show') }}">
                        <i class="icon mdi mdi-dot-circle"></i><span>
                                    Tasks</span></a>

                        </li>

                        <li class="divider">Categoy</li>
                        <li class="active"><a href="{{ url('category/show') }}">
                        <i class="icon mdi mdi-dot-circle"></i><span>Categories</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>