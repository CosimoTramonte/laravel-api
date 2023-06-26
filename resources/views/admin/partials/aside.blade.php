
<aside>
    <nav>
        <ul>
            <a href="{{ route('admin.home') }}">
                <li>
                    <i class="fa-solid fa-chart-line pb-2"></i>
                    <span>Dashboard</span>
                </li>
            </a>
            <a href="{{route('admin.projects.index')}}">
                <li>
                    <i class="fa-solid fa-list pb-2"></i>
                    <span>List Projects</span>
                </li>
            </a>
            <a href="{{route('admin.projects.create')}}">
                <li>
                    <i class="fa-solid fa-square-plus pb-2"></i>
                    <span>New Projects</span>
                </li>
            </a>
            <a href="{{route('admin.kindProjects')}}">
                <li>
                    <i class="fa-solid fa-network-wired pb-2"></i></i>
                    <span>List Kind</span>
                </li>
            </a>
            <a href="{{route('admin.technologyProjects')}}">
                <li>
                    <i class="fa-solid fa-microchip pb-2"></i></i>
                    <span class="text-center">List Technologies</span>
                </li>
            </a>
        </ul>
    </nav>
</aside>
