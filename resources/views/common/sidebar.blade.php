<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    @if (Auth::user() && Auth::user()->type == 'Admin')
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.dashboard' ? 'active' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.addBonus' ? 'active' : 'collapsed' }}" href="{{ route('admin.addBonus') }}">
          <i class="bi bi-grid"></i>
          <span>Bonus</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.userTree' ? 'active' : 'collapsed' }} " href="{{ route('admin.userTree') }}">
          <i class="bi bi-person"></i>
          <span>User Tree</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.users' ? 'active' : 'collapsed' }} " href="{{ route('admin.users') }}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.requests' ? 'active' : 'collapsed' }} " href="{{ route('admin.requests') }}">
          <i class="bi bi-person"></i>
          <span>Work Requests</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.balanceTransfer' ? 'active' : 'collapsed' }} " href="{{ route('admin.balanceTransfer') }}">
          <i class="bi bi-person"></i>
          <span>Balance Transfer</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.withdrawal' ? 'active' : 'collapsed' }} " href="{{ route('admin.withdrawal') }}">
          <i class="bi bi-person"></i>
          <span>Withdrawal Requests</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.adminWorkRequests' ? 'active' : 'collapsed' }} " href="{{ route('admin.adminWorkRequests') }}">
          <i class="bi bi-person"></i>
          <span>Work Requests</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.transactions' ? 'active' : 'collapsed' }} " href="{{ route('admin.transactions') }}">
          <i class="bi bi-person"></i>
          <span>Transactions</span>
        </a>
      </li>

    @else
    <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.userDashboard' ? 'active' : 'collapsed' }}" href="{{ route('admin.userDashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.userTree' ? 'active' : 'collapsed' }} " href="{{ route('admin.userTree') }}">
          <i class="bi bi-person"></i>
          <span>User Tree</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.userBonus' ? 'active' : 'collapsed' }} " href="{{ route('admin.userBonus') }}">
          <i class="bi bi-person"></i>
          <span>Bonus</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.user_withdrawal' ? 'active' : 'collapsed' }} " href="{{ route('admin.user_withdrawal') }}">
          <i class="bi bi-person"></i>
          <span>Withdraw Amount</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.user_transactions' ? 'active' : 'collapsed' }} " href="{{ route('admin.user_transactions') }}">
          <i class="bi bi-person"></i>
          <span>Transactions</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() === 'admin.sendWorkRequest' ? 'active' : 'collapsed' }} " href="{{ route('admin.sendWorkRequest') }}">
          <i class="bi bi-person"></i>
          <span>Send Work Request</span>
        </a>
      </li>
      @endif
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
