@extends('master')

@section("site-title"," Article || List ")

@push('styles')
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
@endpush

@section('content')
    <div class="row mb-5">
        <div class="col-md-12 mt-3">
            @if (session()->has('success'))
                <div class="alert alert-success d-flex align-items-center " role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        {{session('error') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Article List
                    <a class="btn btn-sm btn-info float-end" href="{{ route('articles.create') }}">Create</a>
                </div>
                <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Category</th>
                          <th scope="col">Excerpt</th>
                          <th scope="col">meta Title</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($articles as $key => $article )
                            <tr>
                                <td scope="row">{{ $key + 1}}</td>
                                <td>{{ $article->title  }}</td>
                                <td>{{ $article->category  }}</td>
                                <td>{{ $article->excerpt  }}</td>
                                <td>{{ $article->meta_title  }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info d-inline" href="{{ route('articles.show',$article->id) }}">Show</a>
                                    <a class="btn btn-sm btn-warning d-inline" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                                  <form method="POST" class="d-inline mt-5" action="{{ route('articles.destroy',$article->id ) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit d-inline" style="margin-top: 10px;" class="btn btn-sm btn-danger" class="dropdown-item">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                      {{-- <footer>
                        {{ $articles->links() }}
                      </footer> --}}
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
