@extends('layouts.app')

@section('main_content')

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@elseif (session('alert2'))
    <div class="alert alert-danger">
        {{ session('alert2') }}
    </div>
@endif



@if (Auth::user() != null && Auth::user()->username == 'admin')
<div class="row" style="position: fixed;width:180px; bottom:0px; right:15px;z-index: 1;margin-bottom: 0px" >
    <div class="z-depth-5" style="text-align: center;"">
      <div class="card-panel teal" style="padding:10px">
        <span class="white-text">Hi Admin, do you want to create a new article?
        </span>
        <a class="btn purple darken-4" href='{{url("articles/create")}}' class="href">Yes</a>
      </div>
    </div>
  </div>
@endif

<div class="container">
<div class="row">
<h4 style="text-align: center">Latest Articles</h4><br>

@foreach ($all_articles->reverse()->slice(0, 4) as $article)

   
    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-image">
          <img src="/images/{{ $article->image }}">
          
          <a href='{{ url("articles/$article->id")}}' class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">input</i></a>
        </div>
        <div class="card-content">
        <span class="card-title" style="font-size: 18px">{{ $article -> title }}</span>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.</p>
          
        </div>
      </div>
    </div>
@endforeach

</div>
</div>

<div class="container">
    <div class="row">
        <h4 style="text-align: center">All Articles</h4>
    <div class="col l8 m11 s12">
        @foreach($all_articles as $article)
        <div class="col s12" >
            <div class="card horizontal" >
                
                <div class="card-image">
                    <img src="/images/{{ $article->image }}" style="width: 200px">
                </div><!--image-->   
                <div class="card-stacked">
                <div class="card-content">
                    <h5 class="header">{{ $article -> title }} <small style="font-size:15px"> Created : {{ date('F d, Y', strtotime($article->created_at)) }}</small></h5>
                  <p style="font-size:13px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.</p>
                  </a>Share : <a href=""><img src='{{URL::asset("/public/img/fb.jpg")}}' style="width:20px; padding: 0; margin: 0"></a>
                  <a href=""><img src='{{URL::asset("/public/img/tw.jpg")}}' style="width:20px"></a>
                  <a href=""><img src='{{URL::asset("/public/img/pt.jpg")}}' style="width:20px"></a>
                  <a href=""><img src='{{URL::asset("/public/img/ewan.jpg")}}' style="width:20px"></a>
                  <a href=""><img src='{{URL::asset("/public/img/ig.jpg")}}' style="width:20px"></a>
                  
                </div>
                <div class="card-action">
                  <a href='{{ url("articles/$article->id")}}'>See more...</a>
                  
                </div>
                </div>
                    
                        
                        
                
            </div><!--card-->
        </div><!--col12-->
         @endforeach
    </div><!--col9-->

    <div class="col s5 m4 l4" style="text-align: center">
        
        
        <div class="panel panel-default" >
            <div class="panel-heading grey darken-3">
             <p style="color:white">Sign up for Inked</p>
            </div>
            <div class="panel-body">
            <input type="" name="" placeholder="(no function yet)">
            <br><br>
            <p class="btn amber darken-3">Subscribe</p>
            <a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup"> share this </a>
            </div>        
        </div><!--panel-->
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/Kyles-tattoo-shop-750171141673814/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Kyles-tattoo-shop-750171141673814/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Kyles-tattoo-shop-750171141673814/">Kyle&#039;s tattoo shop</a></blockquote></div>
<br><br>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/pandptattoo/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pandptattoo/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pandptattoo/">P&amp;P tattoo</a></blockquote></div>

    </div><!--col-->




</div><!--row-->
</div><!--container-->


@endsection


