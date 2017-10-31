<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TaskCreate</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/myStyle.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-3.0.0.js')}}"></script>

</head>
<body>
    <a href="{{url('/')}}" class="btn btn-md btn-info">Back to tasklist</a><br/>
    @foreach ($items as $item)
        <div class="item">Item: {{ $item->name }} </div><br/>
        <div class="deadline">Deadline:{{ $item->date_dead }} </div><br/>
    @endforeach


    @foreach ($tasks as $task)
        <div class="row">
            <div class="col-md-12">Comment: {{ $task->comment }}</div>
        </div>
        <div class="row">
            <div class="col-md-8">Author: {{ $task->author }} </div>
            <div class="col-md-4">Date comment: {{ $task->date_comment }}</div>
        </div><br/>
    @endforeach

    <div class="alertComment">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>

        {!! Form::open(['url' => 'list/comment']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('comment' , 'Comment:') !!}
            {!! Form::textarea('comment', null, ['class' => 'form-control','placeholder' => 'Enter the comment']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('author' , 'Author:') !!}
            {!! Form::text('author', null, ['class' => 'form-control','placeholder' => 'Enter the name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('date_comment' , 'DateComment:') !!}
            {!! Form::date('date_comment', null, ['class' => 'form-control']) !!}
        </div>

    @foreach ($items as $item)
        <div class="form-group">
            {!! Form::hidden('task_id', $item->id) !!}
        </div>
    @endforeach
        <div class="form-group">
            {!! Form::submit('Add Comment', ['class' => 'btn btn-success form-control']) !!}
        </div>

        {!! Form::close() !!}

</body>
</html>