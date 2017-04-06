@extends('layouts.master')

@section('content')

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

                <div class="form-group">
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
                        <th width="50px">No</th>
                        <th>Twitter Id</th>
                        <th>Message</th>
                        <th>Images</th>
                        <th>Favorite</th>
                        <th>Retweet</th>
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

                                <td>{{ $value['favorite_count'] }}</td>
                                <td>{{ $value['retweet_count'] }}</td>
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
