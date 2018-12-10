@if(Auth::guard('web')->check())
    <h4>User loggedin {{ Auth::guard('web')->user() }}</h4>
@endif

@if(Auth::guard('admin')->check())
    <h4>Admin loggedin {{ Auth::guard('admin')->user() }}</h4>
@endif