<!DOCTYPE html>
<html lang="en">
    @include('components.head')

    @section('style')
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    @endsection
    @yield('content')
</html>
