@extends('layouts.app')

@section('content')
{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <ul>
                        <li>Name: {{ $current_user->name }} </li>
                        <li>Email {{ $current_user->email }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>--}}



<h2 style="text-align: center">List of Articles</h2><br>
@foreach($list_articles as $article)
<div class="container" style="margin-bottom: 40px">
<div class="col-sm-10 col-md-offset-1" style="border: 5px double pink;">
<div class="row" style="padding:20px;">



    <h2> {{ $article -> title }} </h2><p style="font-size: 15px;font-style: italic;">Created : {{ date('F d, Y', strtotime($article->created_at)) }} by Admin.<a href='{{ url("listArticles/$article->id")}}'> Leave a comment</a></p>

    <img src="/images/{{ $article->image }}" style="width:250px;float:left; border: 10px solid black; margin-right: 20px">
     <!--foreach (array as member)-->
    
    <p style="font-size: 15px">{{ $article->content }}</p>

    


</div><!--row-->
</div><!--col-->
</div><!--container-->

@endforeach


@endsection
