@extends('master')
@section('content')


<div class='carousel carousel-animated carousel-animate-slide' data-autoplay="true" >
  <div class='carousel-container'>

  	@foreach($slides as $slide)
    <div class='carousel-item has-background'>
      <img class="is-background" src="{{ asset('/storage/'.$slide->image) }}" alt="" width="640" height="310" />
      <div class="title">{{ $slide->title }}<a href="https://lasongbox.com" target="_blank">La Song Box</a></div>
    </div>
    @endforeach
  </div>
  <div class="carousel-navigation">
    <div class="carousel-nav-left">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>
    <div class="carousel-nav-right">
      <i class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>
  </div>
</div>

  <br>
  <br>
  <br>

<div class="container">
		 <div class="is-divider" data-content="nos services"></div>

	<div class="columns is-marginless">


			 @foreach($services as $service)
		<div class="column">
			<div class="card">
			  <div class="card-image">
			    <figure class="image is-16by9">
			    	<a href="{{ url('service/'.$service->id) }}">
			         <img src="{{ asset('/storage/'.$service->image) }}" alt="Placeholder image">
			        </a>
			    </figure>
			  </div>
			  <div class="card-content">
			    <div class="media">
			      <div class="media-content">
			        <p class="title is-5">{{ $service->title }}</p>
			        <button class="button is-warning">voir plus</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>
		 @endforeach
	</div>

	 
</div>


<br>
<br>
		 <div class="is-divider" data-content="nos actualités"></div>
<br>

<section class="hero is-warning">
	<div class="hero-body">
		<div class="container">
	 	@foreach($posts->chunk(2) as $chunk)
	<div class="columns is-marginless">
		 @foreach($chunk as $post)
		<div class="column">
			<div class="card">
			  <div class="card-image">
			    <figure class="image is-16by9">
			    	<a href="{{ url('blog/'.$post->id) }}">
			         <img src="{{ asset('/storage/'.$post->image) }}" alt="Placeholder image">
			        </a>
			    </figure>
			  </div>
			  <div class="card-content">
			    <div class="media">
			      <div class="media-content">
			        <p class="title is-4">{{ $post->title }}</p>
			      </div>
			    </div>

			    <div class="content">
			    	{{ str_limit($post->excerpt,80) }}
			      <br>
			      <time>{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</time>
			    </div>
			  </div>
			</div>
		</div>
		 @endforeach
	</div>
		@endforeach
		</div>
	</div>
</section>



@endsection

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('css/bulma-carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bulma-divider.min.css') }}">

@endsection

@section('javascript')
	<script type="text/javascript" src="{{ asset('js/bulma-carousel.min1.js') }}"></script>
@endsection
