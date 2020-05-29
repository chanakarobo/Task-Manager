<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container">
<div class="text-center">
<h1>Daily task</h1>
    <div class="row">
        <div class="col-md-12">
              @foreach($errors->all() as $error)
              
              <div class="alert alert-danger" role="alert">
              {{$error}}
              </div>
              @endforeach
            <form method="post" action="/saveTask">
            {{ csrf_field() }}
                <input type="text" class="form-control" name="task" placeholder="enter your task...">
                </br>
                <input type="submit" class="btn btn-primary" value="SAVE">
                <input type="button" class="btn btn-warning" value="CLEAR">

            </form>
            <table class="table table-dark">
             <th>ID</th>
             <th>Task</th>
             <th>Completed</th>
             <th>Action</th>

             @foreach($task as $task)
             <tr>
             <td>{{$task->id}}</td>
             <td>{{$task->task}}</td>
             <td>
             @if($task->Iscompleted)
             <button class="btn btn-success">Completed</button>
             @else
             <button class="btn btn-warning">Not Completed</button>
             @endif
             </td>
             <td>
             @if(!$task->Iscompleted)
             <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark as completed</a>
             
             @else
             <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark as not completed</a>
             @endif
             </td>
             </tr>
             @endforeach
            </table>
        </div>

    </div>


</div>



</div>
    
</body>
</html>