<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up </title>
  <link rel="stylesheet" href="/style/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action={{route('admin.regester')}} method="post">
                    @csrf
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}                   </div>
                      @endif
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="password" name="password_confirmation" placeholder="password_confirmation" required="">
                    <button type="submit">Sign up</button>
                    <a  href="{{ route('login_form') }}">
                        <button type="button" class="btn btn-primary">Login</button>
                    </a>
				</form>
			</div>

	</div>
</body>
</html>
<!-- partial -->

</body>
</html>
