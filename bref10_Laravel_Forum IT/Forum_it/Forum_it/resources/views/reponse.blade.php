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
                                    <input type="text" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}">
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





            @foreach($questionts as $key => $data)
           
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
                    <p class="text-right">{{$data->created_at}}</p>
                    <hr>
                    <div class="d-flex justify-content-between" onclick="myFunction({{$key}})">
                    <button type="button" class="btn btn-outline-secondary" >
                                Commentaire
                    </button>
                     
                    </div>
                    <div class="mt-4 myDIV" style="display:none">
                    <form method="POST" action="{{route('reponse.ajouter')}}">
                    @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control col-10 " name="commentaire" id="commentaire" placeholder="Commentaire">
                      <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                        <div class="mb-3" style="display:none">
                                    <label for="user_id" class="form-label">user id</label>
                                    <input type="text" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        </div>
                        <div class="mb-3" style="display:none">
                                    <label for="user_id" class="form-label">user id</label>
                                    <input type="text" class="form-control" name="question_id" id="question_id" value="{{$data->id}}">
                                  
                        </div>
                        
                    </form>
                    @foreach($questiont as  $datas)
                        <div class="mt-4 border border-dark p-1 bg-light">
                       <u class="h5"> {{$datas->name}}</u> :    {{$datas->commentaire}}
                       
                       <p class="text-right">{{$datas->created_at}}</p>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</div>
@endsection