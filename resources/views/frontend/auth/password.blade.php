@extends('frontend.layouts.master')

@section('content')
	<div class="app forgot-password usersession">
		<div class="session-wrapper">
			<div class="page-height row-equal align-middle">
				<div class="column">
					<div class="card bg-white no-border">
						<div class="card-block">
							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
							{!! Form::open(['to' => 'password/email', 'class' => 'form-horizontal', 'role' => 'form']) !!}
								<div class="text-center m-b">
									<h4 class="text-uppercase">Resetează parola</h4>
								</div>
								<div class="form-inputs">
									<label class="text-uppercase">Adresa dvs de email</label>
									{!! Form::input('email', 'email', old('email'), ['class' => 'form-control input-lg', 'placeholder' => 'Adresa de email']) !!}
								</div>
								{!! Form::submit('Trimite un link pentru resetare parolă', ['class' => 'btn btn-primary']) !!}
							{!! Form::close() !!}
							</form>
						</div>
						<a href="{!! url('auth/login') !!}" class="bottom-link">Pagina de login.</a>
					</div>
				</div>
			</div>
		</div>
		<!-- bottom footer -->
		<footer class="session-footer">
			<nav class="footer-right">
				<ul class="nav">
					<li>
						<a href="javascript:;">Feedback</a>
					</li>
					<li>
						<a href="javascript:;" class="scroll-up">
							<i class="fa fa-angle-up"></i>
						</a>
					</li>
				</ul>
			</nav>
			<nav class="footer-left hidden-xs">
				<ul class="nav">
					<li>
						<a href="javascript:;"><span>Despre</span> Pactul primăriilor</a>
					</li>
					<li>
						<a href="javascript:;">Politica de intimitate</a>
					</li>
					<li>
						<a href="javascript:;">Termeni și condiții</a>
					</li>
					<li>
						<a href="javascript:;">Ajutor</a>
					</li>
				</ul>
			</nav>
		</footer>
		<!-- /bottom footer -->
@endsection