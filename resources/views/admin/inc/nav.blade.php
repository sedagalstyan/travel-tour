<nav class="admin-nav">
    <div class="close-toggle"><i class="fas fa-times"></i></div>
    <div class="admin">
        <img src="/images/logo.jpg" alt="Logo">
        <div class="creator">
            <div class="name">Seda Galstyan</div>
            <div class="role">Admin</div>
        </div>
    </div>
    <ul>
        <li class="nav-item{{str_contains(url()->current(), 'users') ? ' active' : ''}}"><a href="{{route('locale.admin.users.index', ['locale' => app()->getLocale()])}}"><i class="fas fa-users"></i>Users</a></li>
        <li class="nav-item{{str_contains(url()->current(), 'pages-titles') ? ' active' : ''}}"><a href="{{route('locale.admin.pages-titles.index', ['locale' => app()->getLocale()])}}"><i class="fas fa-plus"></i>Pages Titles</a></li>
        <li class="nav-item{{str_contains(url()->current(), 'categories') ? ' active' : ''}}"><a href="{{route('locale.admin.categories.index', ['locale' => app()->getLocale()])}}"><i class="fas fa-plus"></i>Categories</a></li>
        <li class="nav-item{{str_contains(url()->current(), 'destinations') ? ' active' : ''}}"><a href="{{route('locale.admin.destinations.index', ['locale' => app()->getLocale()])}}"><i class="fas fa-plus"></i>Destinations</a></li>
        <li class="nav-item{{str_contains(url()->current(), 'tours') ? ' active' : ''}}"><a href="{{route('locale.admin.tours.index', ['locale' => app()->getLocale()])}}"><i class="fas fa-plus"></i>Tour Packages</a></li>
        <li class="nav-item"><a href="{{route('locale.admin.logout', ['locale' => app()->getLocale()])}}"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
</nav>