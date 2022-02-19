@extends('layouts.template')
@section('page-title', 'Inicia Sessió')
@section('body')
<div class="logIn-container">
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form method="POST" action="/login" class="login-form">
				<div class="login__field">
					<em class="material-icons">
                        person
                    </em>
					<input type="text" class="login__input" name="usuari" placeholder="User name / Email">
				</div>
				<div class="login__field">
					<em class="material-icons">
                        lock
                    </em>
					<input type="password" class="login__input" name="contrasenya" placeholder="Password">
				</div>
				<button type="submit" class="button login__submit">
					<span class="button__text">Log In Now</span>
					<em class="material-icons">
                        chevron_right
                    </em>
				</button>				
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</div>
@endsection