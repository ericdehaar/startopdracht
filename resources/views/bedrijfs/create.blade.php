@extends('bedrijfs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 mt40">
            <div class="pull-left">
                <h2>Voeg een bedrijf toe</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bedrijfs.store') }}" method="POST" name="add_bedrijfs">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Bedrijfsnaam</strong>
                    <input type="text" name="naam" class="form-control" placeholder="Bedrijfsnaam">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>E-mail</strong>
                    <input type="text" name="email" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Logo</strong>
                    <input type="text" name="logo" class="form-control" placeholder="Logo">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Website</strong>
                    <input type="text" name="website" class="form-control" placeholder="Website">
                </div>
            </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Aanmaken</button>
            </div>
        </div>

    </form>
@endsection
