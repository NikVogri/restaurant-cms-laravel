<x-master>
    <x-navigation></x-navigation>
    <x-sidebar></x-sidebar>
    <div id="content-wrapper">
        <div class="container-fluid">
            @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            {{ $slot }}
            <!-- /.container-fluid -->
        </div>
    </div>
    <x-footer></x-footer>
</x-master>
