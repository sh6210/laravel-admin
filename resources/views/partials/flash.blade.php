
@if($flash = session('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ $flash }} <a href="#" class="alert-link"></a>.
    </div>
@endif

@if($flash = session('error'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ $flash }} <a href="#" class="alert-link"></a>.
    </div>
@endif

@if($flash = session('info'))
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ $flash }} <a href="#" class="alert-link"></a>.
    </div>
@endif

@if($flash = session('warning'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ $flash }} <a href="#" class="alert-link"></a>.
    </div>
@endif