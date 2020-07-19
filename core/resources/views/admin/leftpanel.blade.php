<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                <a href="{{route('admin.home')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title"></li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Contents Section</a>
                    <ul class="sub-menu children dropdown-menu">                            
                    <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.addContent')}}">Add Contents</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="{{route('admin.viewallcontent')}}">View All Content</a></li>
                        
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Speakers</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{route('admin.speaker')}}">Add Speaker</a></li>
                    <li><i class="fa fa-table"></i><a href="{{route('admin.speakerlist')}}">View All Speaker</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Ticket Section</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-th"></i><a href="{{route('admin.tickets')}}">Add Ticket</a></li>
                    <li><i class="menu-icon fa fa-th"></i><a href="{{route('admin.viewtickets')}}">View All Ticket</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-tasks"></i>Booking Section</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{route('admin.viewallbookings')}}">View All booking</a></li>
                        
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Blog Section</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-line-chart"></i><a href="{{route('admin.blog')}}">Add Blog Content</a></li>
                    <li><i class="menu-icon fa fa-area-chart"></i><a href="{{route('admin.viewallblog')}}">View All Blog</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Topics</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-map-o"></i><a href="{{route('admin.conference')}}">Add Conference Topics</a></li>
                    <li><i class="menu-icon fa fa-street-view"></i><a href="{{route('admin.showallconference')}}">View All Topics</a></li>
                    <li><i class="menu-icon fa fa-street-view"></i><a href="{{route('admin.topicsaddtospeaker')}}">View All Topics</a></li>

                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Sponsors Section</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('admin.sponsor')}}">Add Sponsor Requirements</a></li>
                    <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('admin.update')}}">Update Requirements</a></li>
                    <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('admin.managersponsor')}}">Manage Sponsors</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="{{route('admin.setting')}}"><i class="menu-icon fa fa-sign-in"></i>All Setting</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>