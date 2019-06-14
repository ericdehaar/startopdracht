@extends('bedrijfs.layout')

@section('content')
    <div class="row mt40">
        <div class="col-md-10">
            <h2>Bedrijven</h2>
        </div>
        <div class="col-md-2">
            <a href="{{ route('bedrijfs.create') }}" class="btn btn-danger">Voeg een bedrijf toe</a>
        </div>
        <br><br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-bordered" id="laravel_crud">
            <thead>
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Toegevoegd op</th>
                <td colspan="2">Actie</td>
            </tr>
            </thead>
            <tbody>
            @foreach($bedrijfs as $bedrijf)
                <tr>
                    <td>{{ $bedrijf->id }}</td>
                    <td>{{ $bedrijf->naam }}</td>
                    <td>{{ $bedrijf->email }}</td>
                    <td>{{ $bedrijf->logo }}</td>
                    <td>{{ $bedrijf->website }}</td>
                    <td>{{ date('d m Y', strtotime($bedrijf->created_at)) }}</td>
                    <td><a href="{{ route('bedrijfs.edit',$bedrijf->id)}}" class="btn btn-
                  primary">Edit</a></td>
                    <td>
                        <form action="{{ route('bedrijfs.destroy', $bedrijf->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $bedrijfs->links() !!}
    </div>
    @endsection
    </div>
