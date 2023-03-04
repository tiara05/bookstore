<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">


	<title>Tiara's Bookstore</title>

	<link href="{{asset('assetadmin/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		
    {{-- navbar --}}
    @include('Admin.Layout.Sidebar')

		<div class="main">
			
        {{-- navbar --}}
        @include('Admin.Layout.Navbar')

			<main class="content">
            {{-- content --}}
            @yield('content')
			</main>

            {{-- navbar --}}
            @include('Admin.Layout.Footer')
			
		</div>
	</div>

	<script src="{{asset('assetadmin/js/app.js')}}"></script>


</body>

</html>
