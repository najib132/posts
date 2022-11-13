@extends('master')
@section('content')

<section class="hero is-dark">
  <div class="hero-body">
    <div class="container">
    	<nav class="breadcrumb" aria-label="breadcrumbs">
		  <ul>
		    <li><a href="{{ url('/') }}">Acceuil</a></li>
		    <li><a href="#">A propos</a></li>
		    <li class="is-active"><a href="#" aria-current="page">{{ $page->title }}</a></li>
		  </ul>
		</nav>
      <h1 class="title">
        {{ $page->title }}
      </h1>
      <h4 class="subtitle">{{ $page->excerpt }}</h4>
    </div>
  </div>
</section>
<div class="container">
	<div class="columns">
		<div class="column">
			{{!! $page->body !!}}
		</div>
	</div>
</div>

@endsection
