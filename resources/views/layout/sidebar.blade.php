<nav class="sidebar">
  <a href="index.php?page=dashboard" class="">Dashboard</a>
  <a href="{{ url('/user') }}"
    class="{{ request()->is('user') ? 'active' : '' }}">
    Users
  </a>
  <a href="{{ url('/user_role') }}"
    class="{{ request()->is('user_role') ? 'active' : '' }}">
    Users Role
  </a>
  <a href="index.php?page=projects" class="">Projects</a>
  <a href="index.php?page=skills" class="">Skills</a>
  <a href="index.php?page=experience" class="">Experience</a>

   <a href="{{ url('/user_post') }}"
    class="{{ request()->is('user_post') ? 'active' : '' }}">
    User Post
  </a>
</nav>