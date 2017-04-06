@extends('layouts.master')

@section('content')
    <div class="content row">
        <div class="content row">
            <div class="col-lg-12">
                <header class="clearfix">
                    <section class="text-center" id="a1header">
                        <h1>Tweeter inspector 2</h1>
                    </section>
                </header>  <!-- header -->
            </div>
        </div>
    </div> <!-- header -->

    <section id="postTweetSection" class="col col-lg-8 col-lg-offset-2">
        <h2 class="text-center">Last Tweets timeline</h2>
        <div class="row">

            <form method="POST" action="{{ route('post.tweet') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if(count($errors))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label>Add Tweet Text:</label>
                    <textarea class="form-control" name="tweet"></textarea>
                </div>

                <div class="form-group">
                    <label>Add Multiple Images:</label>
                    <input type="file" name="images[]" multiple class="form-control">
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success">Post New Tweet</button>
                </div>

            </form>
        </div>
    </section>

    <section id="getTweetsSection" class="col col-lg-12">
        <div class="row">
            <hr />
            <table class="table">
                <thead>
                    <tr>
                        <th width="30px" class="text-center">No</th>
                        <th class="text-center">Twitter Id</th>
                        <th class="text-center">Message</th>
                        <th class="text-center">Images</th>
                        <th class="text-center">Favorite</th>
                        <th class="text-center">Retweets</th>
                    </tr>
                </thead>

                <tbody>
                    @if(!empty($data))
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value['id'] }}</td>
                                <td>{{ $value['text'] }}</td>
                                <td>
                                    @if(!empty($value['extended_entities']['media']))
                                        @foreach($value['extended_entities']['media'] as $v)
                                            <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                                        @endforeach
                                    @endif
                                </td>

                                <td class="text-right">{{ $value['favorite_count'] }}</td>
                                <td class="text-right">{{ $value['retweet_count'] }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">There are no data.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
