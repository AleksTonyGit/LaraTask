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
    <div class="page-header">
        <h3>Write a New Task</h3>
    </div>
        <div class="alert">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>

        {!! Form::open(['url' => 'list']) !!}
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('name' , 'Task:') !!}
                {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter new task']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('date_dead' , 'Deadline:') !!}
                {!! Form::date('date_dead', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Task', ['class' => 'btn btn-success form-control']) !!}
            </div>
        {!! Form::close() !!}
    </body>
</html>