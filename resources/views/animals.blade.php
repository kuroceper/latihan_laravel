@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <h1>List nama hewan</h1><br>

            <form class="row g-3" action="/animals/search" method="GET">
              <div class="col-auto"><input class="form-control" type="text" name="searchTerm"
                  placeholder="Cari nama hewan .."></div>
              <div class="col-auto"><input class="btn btn-secondary" type="submit" value="Search"></div>

            </form>
            <a class="btn btn-info float-end" href="/animals/create">Add New Animal</a>
            <table class="table-striped table-hover table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>karakteristik</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($animals as $animal)
                  <tr>
                    <td> {{ $animal->id }} </td>
                    <td> {{ $animal->name }} </td>
                    <td> {{ $animal->characteristic->name }} </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="/animals/{{ $animal->id }}/form">Edit</a>
                        <form action="/animals/{{ $animal->id }}" method="POST">
                          @csrf
                          @method('delete')
                          <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $animals->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection