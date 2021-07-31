@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Ajouter
            </button>

            <div class="col-sm-12 m-4">

                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
            </div>
            <!-- Modal add -->
            <form method="POST" action="{{route('questions.ajouter')}}">
                @csrf
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une question </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="Title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" aria-describedby="title">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description" id="description">
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="user_id" class="form-label">user id</label>
                                    @if(Auth::user())
                                    <div class="alert alert-success">
                                        <input type="text" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>





            @foreach($questiont as $key => $data)

            <div class="card mt-3">




                <div class="p-2 bg bg-dark h4 col-6 text-white">{{($data->name)}}</div>
                <div class="card-header">{{($data->title)}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{($data->description)}}
                    <hr>
                    <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" >
                                <a href="reponse/{{$data->id}}" class="text-dark" style="text-decoration: none;">Commentaire</a></td>
                    </button>                 
                        <div>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenters">
                                <a href="adminedit/{{$data->id}}" class="text-light" style="text-decoration: none;">Modifier</a></td>
                            </button>

                            <button class="btn btn-danger" type="submit">
                                <a href="/delete/{{$data->id}}" class="text-light" style="text-decoration: none;">
                                    Delete
                            </a>
                            </button>

                        </div>
                    </div>
                  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection