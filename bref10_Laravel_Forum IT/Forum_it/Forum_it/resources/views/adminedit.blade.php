@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="post" action="{{route('admineditupdate',$questions->id)}}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier la question </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="Title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{$questions->title}}" aria-describedby="title">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" value="{{$questions->description}} " id="description">
                            </div>
                            <div class="mb-3" style="display:none">
                                <label for="user_id" class="form-label">user id</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="../admin"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </a>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>

    </div>
</div>
</div>
@endsection