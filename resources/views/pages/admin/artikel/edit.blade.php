@extends('layouts.admin')

@section('content')
@section('title', 'Edit artikel')
@push('after-style')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('artikel.update', $artikel->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title" class="font-weight-bolder">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" aria-describedby="emailHelp"
                        placeholder="Judul" value="{{ $artikel->title }}" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail" class="font-weight-bolder">Thumbnail</label>
                    <div class="col-md-7">
                        <img src="{{ Storage::url($artikel->thumbnail) }}" alt="" srcset="" style="height: 150px">
                    </div>
                    <br>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" aria-describedby="emailHelp"
                        placeholder="thumbnail" value="{{ $artikel->thumbnail }}" required>
                        @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="textarea-input" class="form-control-label ">Konten</label>
                    <textarea name="content" id="summernote" rows="9" class="form-control @error('content') is-invalid @enderror" required>{{ $artikel->content }}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div align="center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                </form>
            </div>
        </div>



      </div>
      <!-- /.container-fluid -->
      <script>
        $('#summernote').summernote({
          placeholder: 'Isi Konten Disini ...',
          tabsize: 2,
          height: 300,
        });
      </script>
@endsection

@push('scripts')

    
@endpush

@push('after-scripts')

@endpush