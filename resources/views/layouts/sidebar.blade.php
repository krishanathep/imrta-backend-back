<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.index') }}" class="brand-link text-center">
        <!--
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        -->
        {{-- <span class="brand-text font-weight-light">{{ config('app.name') }}</span> --}}


        <img src="{{ \App\Models\SystemConfig::where('name', 'front_base')->first()->value.'assets/images/logo.png' }}" alt="" style="width: 100px; background: white; border-radius: 4px; padding: 4px 8px;">
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
