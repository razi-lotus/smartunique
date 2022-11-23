<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.dashboard' ? 'active' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.users' ? 'active' : 'collapsed' }} " href="{{ route('admin.users') }}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.requests' ? 'active' : 'collapsed' }} " href="{{ route('admin.requests') }}">
          <i class="bi bi-person"></i>
          <span>Work Requests</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.withdrawal' ? 'active' : 'collapsed' }} " href="{{ route('admin.withdrawal') }}">
          <i class="bi bi-person"></i>
          <span>Withdrawal Requests</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.user_withdrawal' ? 'active' : 'collapsed' }} " href="{{ route('admin.user_withdrawal') }}">
          <i class="bi bi-person"></i>
          <span>User Withdrawal</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.user_transactions' ? 'active' : 'collapsed' }} " href="{{ route('admin.user_transactions') }}">
          <i class="bi bi-person"></i>
          <span>Users Transactions</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.transactions' ? 'active' : 'collapsed' }} " href="{{ route('admin.transactions') }}">
          <i class="bi bi-person"></i>
          <span>Transactions</span>
        </a>
      </li>
    </ul>
  </aside>

  @push('scripts')
      <script>
        $(document).ready(function () {
            $(function () {
                // $('.nav-item a').click(function (e) {
                //     e.preventDefault();
                //     $('a').removeClass('active');
                //     $(this).removeClass('collapsed');
                //     $(this).addClass('active');
                // });
            });
        });
      </script>
  @endpush
