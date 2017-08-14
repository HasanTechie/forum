@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Threads</div>

                    <div class="panel-body">
                        <form method="POST" action="/threads" role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <div class="form-group">
                                <label for="body" class="col-sm-2 control-label">Body</label>
                                    <textarea name="body" class="form-control" id="body" rows="8"></textarea>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="body"></label>--}}
                                {{--<textarea name="body" id="body" class="form-control" placeholder="Have Something to say?" rows="5"></textarea>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for=""></label>--}}
                                {{--<input type="text" class="form-control" name="" id="" placeholder="Input...">--}}
                            {{--</div>--}}


                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
