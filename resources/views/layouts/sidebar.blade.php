<!-- SIDEBAR -->
<section id="sidebar">
    <a href="/dashboard" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">E-OFFICE</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ Request::path() === 'dashboard' ? 'active' : ''}} ">
            <a href="/dashboard">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ Request::url() == request()->routeIs('buat-surat.*') ? 'active' : ''}} ">
            <a href="{{ route('buat-surat.create') }}">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Buat Surat</span>
            </a>
        </li>
        <li class="{{ Request::url() == request()->routeIs('surat.index') ? 'active' : ''}} ">
            <a href="{{ route('surat.index') }}">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Daftar Surat</span>
            </a>
        </li>
        <li class="{{ Request::path() === 'riwayat' ? 'active' : ''}} ">
            <a href="/riwayat">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Riwayat</span>
            </a>
        </li>
        <li class="{{ Request::url() == request()->routeIs('mahasiswa.*') ? 'active' : ''}} ">
            <a href="{{ route('mahasiswa.index') }}">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Daftar Mahasiswa</span>
            </a>
        </li>
        <li class="{{ Request::url() == request()->routeIs('prodi.*') ? 'active' : ''}} ">
            <a href="{{ route('prodi.index') }}">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Program Studi</span>
            </a>
        </li>
        <li class="{{ Request::url() == request()->routeIs('dosen.*') ? 'active' : ''}} ">
            <a href="{{ route('dosen.index') }}">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Daftar Dosen</span>
            </a>
        </li>
        <li class="{{ Request::url() == request()->routeIs('mahasiswa.*') ? 'active' : ''}} ">
            <a href="{{ route('mahasiswa.index') }}">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Template Surat</span>
            </a>
        </li>
        {{-- <li>
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Team</span>
            </a>
        </li> --}}
    </ul>
    <ul class="side-menu">
        <li>
            <a href="/health" target="blank">
                <i class='bx bxs-heart'></i>
                <span class="text">Check Health</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->