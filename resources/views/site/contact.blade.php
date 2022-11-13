@extends('master')
@section('content')

<section class="hero is-dark">
  <div class="hero-body">
    <div class="container">
    	<nav class="breadcrumb" aria-label="breadcrumbs">
		  <ul>
		    <li><a href="{{ url('/') }}">Acceuil</a></li>
		    <li><a href="#" aria-current="page">Contactez nous</a></li>
		  </ul>
		</nav>
      <h1 class="title">
        Contactez Nous
      </h1>
      <h4 class="subtitle">Laissez un message </h4>
    </div>
  </div>
</section>

<div class="container">	

	@if(session('status'))
      <div class="notification is-success">
      	{{ session('status') }}
      </div>
	@endif

	<div class="tile is-ancestor is-marginless">
  <div class="tile is-parent">
    <article class="tile is-child box notification is-warning">
      <p class="title">telephone</p>
      <p class="subtitle">{{setting('contact.telephone')}}</p>
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box notification is-warning">
      <p class="title">Email</p>
      <p class="subtitle">{{setting('contact.email')}}</p>
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box notification is-warning">
      <p class="title">Reseau sociaux</p>
      <p class="subtitle">Subtitle</p>
    </article>
  </div>
</div>

	<div class="columns">
		<div class="column is-9">
			{!! setting('contact.maps') !!}
			
		</div>
		<div class="column is-3">
			<form action="{{ url('/contact') }}" method="post">
				{{ csrf_field() }}
				<div class="field">
					 <label for="nom" class="label">votre nom</label>
					 <div class="control">
					 	<input value="{{ old('name') }}" name="name" id="nom" type="text" class="input
					 	@if($errors->has('name')) is-danger @endif" placeholder="Votre nom complet">
					 </div>
					 @if($errors->has('name'))
					 <p class="help is-danger">{{ $errors->first('name') }}</p>
					 @endif
				</div>
				<div class="field">
					 <label for="email" class="label">votre email</label>
					 <div class="control">
					 	<input value="{{ old('email') }}" name="email" id="email" type="text" class="input @if($errors->has('email')) is-danger @endif"  placeholder="Votre email complet">
					 </div>
					 @if($errors->has('email'))
					 <p class="help is-danger">{{ $errors->first('email') }}</p>
					 @endif
				</div>
				<div class="field">
					 <label for="message" class="label">votre message</label>
					 <div class="control">
					 	<textarea name="message" id="message" rows="6" type="text" class="textarea  @if($errors->has('message')) is-danger @endif" placeholder="Votre message complet">{{ old('message') }}</textarea>
					 </div>
					 @if($errors->has('message'))
					 <p class="help is-danger">{{ $errors->first('message') }}</p>
					 @endif
				</div>
				<button type="submit" class="button is-warning">Envoyer</button>
			</form>
		</div>
	</div>
</div>

@endsection
 