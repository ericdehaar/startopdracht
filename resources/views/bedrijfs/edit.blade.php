@extends('bedrijfs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 mt40">
            <div class="pull-left">
                <h2>Update</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oeps!</strong> Er is iets verkeerd gegaan<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bedrijfs.update', $bedrijf_info->id) }}" method="POST" name="update_bedrijf">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Naam</strong>
                    <input type="text" name="naam" class="form-control" placeholder="Enter Title" value="{{ $bedrijf_info->naam }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>E-mail</strong>
                    <input type="text" name="email" class="form-control" placeholder="Enter Title" value="{{ $bedrijf_info->email }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Logo</strong>
                    <input type="text" name="logo" class="form-control" placeholder="Enter Title" value="{{ $bedrijf_info->logo }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Website</strong>
                    <input type="text" name="website" class="form-control" placeholder="Enter Title" value="{{ $bedrijf_info->website }}">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
