<!doctype html>
<html lang="en">

<head>
<title>:: Iconic :: Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/toastr/toastr.min.css') }}">

</head>

<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-cyan">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="{{ asset('admin/assets/images/logo-white.svg' )}}" alt="Iconic">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="{{ route('admin.login.submit')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="email" value="kafilahinvestasi@gmail.com" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="password" value="Papa25061994" placeholder="Password">
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>								
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
    <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script>    
    <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/toastr/toastr.js') }}"></script>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr['error']('{{ $error }}', '', {
                positionClass: 'toast-top-right'
            });
        </script>
    @endforeach
    @endif

    @if (session()->get('error'))
        <script>
            toastr['error']('{{ session()->get('error') }}', '', {
                positionClass: 'toast-top-right'
            });
        </script>
    @endif

    @if (session()->get('success'))
        <script>
            toastr['success']('{{ session()->get('success') }}', '', {
                positionClass: 'toast-top-right'
            });
        </script>
    @endif

</body>
</html>