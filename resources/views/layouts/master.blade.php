<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layouts.header',['title' => 'dashboard'])
</head>

<body data-layout-mode="light" class="bg-gray-100 dark:bg-gray-900 bg-[url('../images/bg-body.png')] dark:bg-[url('../images/bg-body-2.png')]">
    @include('layouts.navbar')
    <div class="container mx-auto px-2 min-h-[calc(100vh-123px)] relative mt-16">
        @yield('content')
        @include('layouts.footer')
    </div>
</body>

</html>