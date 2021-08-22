@extends('master')

@section("site-title"," Article || Details ")

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
                            Edit Article
                        </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Title </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title',$article->title) }}" name="title" readonly  placeholder="Enter title">
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug </label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug',$article->slug) }}" name="slug" readonly placeholder="Enter slug">
                            </div>
                            <div class="col-md-6"">
                                <label for="category" class="form-label">Category </label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" value="{{ old('category',$article->category) }}" readonly  name="category"  placeholder="Enter category">
                            </div>
                            <div class="col-md-6">
                               <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}">
                            </div>
                            <div class="col-md-12">
                                <label for="excerpt" class="form-label">Excerpt </label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" rows="3" name="excerpt"  readonly placeholder="Enter Excerpt">{{ old('excerpt',$article->excerpt) }}</textarea>
                            </div>
                            <div class="col-md-12"">
                                <label for="content" class="form-label">Content </label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content" readonly  placeholder="Enter Content">{!! old('content',$article->content) !!}</textarea>
                            </div>
                            <div class="col-md-12"">
                                <label for="meta_title" class="form-label">Meta Title </label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title"  readonly value="{{ old('meta_title',$article->meta_title) }}"  placeholder="Enter meta title">
                            </div>
                            <div class="col-md-12"">
                                <label for="meta_description" class="form-label">Meta Description </label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"  rows="3" readonly name="meta_description"  placeholder="Enter meta description">{{ old('meta_description',$article->meta_title) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_keyword" class="form-label">Meta Keyword </label>
                                <textarea class="form-control @error('meta_keyword') is-invalid @enderror" id="meta_keyword" rows="3" name="meta_keyword" readonly  placeholder="Enter meta keyword">{{ old('meta_keyword',$article->meta_keyword) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('articles.index') }}" class="btn btn-default">Cancel</a>
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
