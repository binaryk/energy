@extends('frontend.layouts.master')

@section('content')
	<div class="app signup v2 usersession">
		<div class="session-wrapper">
			<div class="session-carousel slide" data-ride="carousel" data-interval="3000">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active" style="background-image:url({!! asset('custom/img/bg1.jpg') !!});background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
					</div>
				</div>
			</div>
			<div class="card bg-white no-border">
				<div class="card-block">
                    {!! Form::open(['to' => 'auth/register', 'class' => 'form-horizontal', 'role' => 'form']) !!}
						<div class="text-center m-b">
							<h4 class="text-uppercase">Fă un cont acum</h4>
							<p>Alăturăte comunității noastre</p>
						</div>
						<div class="form-inputs">
							<div class="name">
								<label class="text-uppercase">Nume</label>
                                {!! Form::input('name', 'name', old('name'), ['class' => 'form-control input-lg']) !!}
							</div>
							<label class="text-uppercase">Adresa de email</label>
                            {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
							<label class="text-uppercase">Parola</label>
                            {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
							<label class="text-uppercase">Confirmă parola</label>
                            {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
						</div>
						<button class="btn btn-primary btn-block btn-lg m-b" type="submit">Creează contul</button>
						<p class="text-center"><small><em>Prin crearea contului accepți <a href="#">termenii și condițiile</a> platformei.</em></small>
						</p>
                        <p class="text-center"><a href="{!! url('auth/login') !!}" class="bottom-link">Pagina de login.</a></p>
                    {!! Form::close() !!}
				</div>
			</div>
			<div class="push"></div>
		</div>
	</div>
@endsection