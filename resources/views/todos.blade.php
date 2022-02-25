@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row py-5">

        <div class="col-md-3">
            <div class="small-box bg-primary text-white px-2 py-1 text-center">
                <div class="inner d-flex align-items-center justify-content-between mx-2">
                    <h5>Total Todos</h5>
                    <h3>{{ $total_todos; }}</h3>
                </div>
            </div>
            <div class="small-box bg-success text-white px-2 py-1 text-center">
                <div class="inner d-flex align-items-center justify-content-between mx-2">
                    <h5>Completed</h5>
                    <h3>{{ $complete_todos }}</h3>
                </div>
            </div>
            <div class="small-box bg-danger text-white px-2 py-1 text-center">
                <div class="inner d-flex align-items-center justify-content-between mx-2">
                    <h5>Incomplete</h5>
                    <h3>{{ $incomplete_todos }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <form method="POST" action="/todo/store">
                @csrf
                <div class="input-group rounded">
                    <input name="todo_item" type="search" class="form-control rounded" placeholder="What's in your mind today?"
                        aria-label="Todo" aria-describedby="search-addon" />
                    <button class="btn btn-success my-2 my-sm-0" type="submit">
                        <i class="fas fa-add"></i>
                        Add</button>
                </div>
            </form>

            @foreach ($todos as $todo)
            <div class="card my-3" style="">
                <span class="py-1 {{ $todo->completed == True ? 'bg-success' : 'bg-danger'  }}"></span>
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <p class="card-text">{{ $todo->item; }}</p>
                    
                        <div class="text-right">
                            <a href="#" class="btn btn-primary btn-sm btn-block my-1">Edit</a>
                            <a href="/todo/delete/{{ $todo->tid }}" class="btn btn-danger btn-sm btn-block my-1">Delete</a>
                            <a href="/todo/complete/{{ $todo->tid }}" class="btn btn-success btn-sm btn-block my-1">Complete</a>
                        </div>
                    </div>
                    
                    <h6 class="card-subtitle text-muted"><small>{{ $todo->created_at; }}</small></h6>
                </div>
            </div>
            @endforeach

        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col">

        </div>
    </div>
</div>

@endsection