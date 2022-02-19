@extends('layouts.template')
@section('page-title', 'Registre')
@section('body')
<div class="signUp-container">
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login-form" action="{{ route('register') }}" method="post">
                @csrf
				<div class="login__field">
					<input type="text" class="login__input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom">
				</div>
				<div class="login__field">
					<input type="text" class="login__input" name="surname" value="{{ old('surname') }}" placeholder="Cognoms">
				</div>
        		<div class="login__field">
					<input type="email" class="login__input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correu Electrònic">
				</div>
        		<div class="login__field">
					<input type="password" class="login__input" name="password" required autocomplete="new-password" placeholder="Contrasenya">
				</div>
        		<div class="login__field">
					<input type="password" class="login__input" name="password_confirmation" required autocomplete="new-password">
				</div>
				<button class="button login__submit" type="submit">
					<span class="button__text">Registra't</span>
				</button>				
			</form>
			<div class="social-login">
				<p>Registra't amb Auth</p>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
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
