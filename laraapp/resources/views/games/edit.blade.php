@extends('layouts.app')

@section('title', 'Edit Game')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}"><i class="fas fa-clipboard-list"></i> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('games') }}"><i class="fas fa-list-alt"></i> Module Games</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-search"></i> Edit Game</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header text-uppercase text-center">
                    <h5>
                        <i class="fa fa-pen"></i> 
                        Edit Game
                    </h5>
                </div>
            
                <div class="card-body">
                    <form method="POST" action="{{ url('games/'.$game->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $game->id }}">
                        <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $game->name) }}" placeholder="Name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group">
                                <div class="text-center my-3">
                                    <img src="{{ asset($game->image) }}" width="120px" id="preview" class="img-thumbnail rounded-circle">
                                </div>
                                <button type="button" class="btn btn-block btn-secondary btn-upload"> 
                                    <i class="fas fa-upload"></i>
                                    Upload game Image 
                                </button>
                                <input id="photo" type="file" class="form-control d-none @error('image') is-invalid @enderror" name="image" accept="image/*">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description', $game->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Select Category...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('category_id',$game->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <select name="slider" id="slider" class="form-control @error('slider') is-invalid @enderror">
                                <option value="">Select Important Game...</option>
                                <option value="1" @if(old('slider',$game->slider) == 1) selected @endif>No</option>
                                <option value="2" @if(old('slider',$game->slider) == 2) selected @endif>Yes</option>
                            </select>

                            @error('slider')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="price" type="number" min="1" max="99" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price',$game->price) }}" placeholder="Price" autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block text-uppercase">
                                    <i class="fas fa-pen"></i> 
                                    Edit
                                </button>
                                <a href="{{ route('games.index') }}" class="btn btn-block btn-secondary text-uppercase">
                                    <i class="fas fa-arrow-left"></i> 
                                    Cancel
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection