<nav class="sidebar">
    <div class="sidebar-body text-center pt-5 px-4">
        <a href="#" class="sidebar-brand mb-2">
            <img src="{{ auth()->user()->avatar }}" style="max-width:400px;">
        </a>
        <h4 class="mb-3">Admin</h4>
        <h2 class="mb-1">{{ auth()->user()->name }}</h2>
        <h3 class="mb-5">{{ auth()->user()->division }}</h3>
        <div class="container" style="background-color:#1566BE; border-radius:2rem;">
            <div class="row py-5 px-4">
                <div class="col-12 mb-3
                @if (auth()->user()->username != 'admin')
                    d-none
                @endif
                ">
                    <a href="{{ route('institutions.index') }}" class="btn btn-block rounded-pill py-3 w-100
                    @if( in_array(request()->route()->getName(), array('institutions.index', 'institutions.show', 'institutions.edit', 'institutions.create')) )
                        active
                    @endif
                    " style="background-color:#fff;">
                        <h4>Admins</h4>
                    </a>
                </div>
                <div class="col-12 mb-3
                @if (auth()->user()->username == 'admin')
                    d-none
                @endif
                ">
                    <a href="{{ route('quotas.index') }}" class="btn btn-block rounded-pill py-3 w-100" style="background-color:#fff;
                    @if( in_array(request()->route()->getName(), array('quotas.index', 'home')) )
                        background-color:#7ED857; !important
                    @endif">
                        <h4>Quota Usage</h4>
                    </a>
                </div>
                <div class="col-12 mb-3
                @if (auth()->user()->username == 'admin')
                    d-none
                @endif
                ">
                    <a href="{{ route('chats.index') }}" class="btn btn-block rounded-pill py-3 w-100" style="background-color:#fff;
                    @if( in_array(request()->route()->getName(), array('chats.index')) )
                        background-color:#7ED857; !important
                    @endif
                    ">
                        <h4>Chat History</h4>
                    </a>
                </div>
                <div class="col-12 mb-3
                @if (auth()->user()->username == 'admin')
                    d-none
                @endif
                ">
                    <a href="{{ route('databox.index') }}" class="btn btn-block rounded-pill py-3 w-100" style="background-color:#fff;
                    @if( in_array(request()->route()->getName(), array('databox.index')) )
                        background-color:#7ED857; !important
                    @endif
                    ">
                        <h4>Data Box</h4>
                    </a>
                </div>
                <div class="col-12 mt-5">
                    <form action="{{ route('logout') }}" method="POST" id="logout">
                        @csrf
                        <a id="logoutButton" style="cursor:pointer;" class="px-1 btn btn-block rounded-pill py-3 w-100 bg-danger text-white">
                            <i class="me-2 icon-md d-inline mb-1" data-feather="log-out"></i> <h4 class="d-inline">Sign Out</h4>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
