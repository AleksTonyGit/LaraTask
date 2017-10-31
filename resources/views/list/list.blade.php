

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>TaskList</title>
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-3.0.0.js')}}"></script>

    </head>
    <body>
    @extends('layouts.app')
    @section('content')
        <div class="tab">
            <table class = "table table-bordered">
                <thead>
                    <tr>
                        <th>Done</th>
                        <th>Task name</th>
                        <th>Deadline</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @foreach ($lists as $list)
                    <tr>
                        <td>{{ Form::open(['route' =>'check']) }}
                        <input type="checkbox" name="task" id="task_{{ $list -> id }}" {{ $list->status ? 'checked' : '' }}
                            onclick="this.form.submit()">
                        <input type="hidden" name="task_id" value="{{ $list -> id }}"  />
                        <label for="task_{{ $list->id }}"></label>
                            {{ Form::close() }}
                        </td>

                        <td><a href="{{URL::to('list/comment/'.$list -> id)}}">{{ $list -> name }}</a></td>

                        <td>{{$list -> date_dead}}</td>
                        <td>{{$list -> status}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    {{--<a href="{{ URL::route('list/create') }}">New task</a>--}}
        <a href='list/create' class="btn btn-md btn-info">New task</a>
@endsection
    </body>
</html>









