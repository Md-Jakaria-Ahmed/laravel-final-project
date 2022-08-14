<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  


</head>
<body>



 <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-block-inline" href="{{ url('/') }}">
                    {{ config('app.name', 'Blog') }}
                   
                </a>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>




<div class="container">

  
  <div class="row">
  <div class="col-md-8">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Post List:</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">

{{--                                  --}}

<div class="col-md-4 float-right d-block-inline">

    <div class="input-group mb-3">  
      <input type="text" class="form-control" placeholder="search post" >
      <div class="input-group-prepend">
        <span class="input-group-text" id="search">search</span>
      </div>
    </div>

</div>
{{-- ================================= --}}

            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead class="bg-dark text-light text-center">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-right">Action</th>
                    </tr>
                </thead>
              <tbody>
                @php 
                    $sr = 1;
                @endphp
                    @foreach($posts as $post)
                    <tr>
                      <th scope="row">{{ $sr++ }}</th>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->description }}</td>
                      <td>
                        <a href="{{ url('post/edit/'.$post->id) }}" class="btn btn-primary btn-sm">Edit <i class="fa fa-edit"></i></a>

                        <a href="{{ url('post/destroy/'.$post->id) }}" onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger">
                        Delete <i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach
                                 
                </tbody>
            </table>
        </div>
    </div>
</div>

  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h6 class="font-weight-bold">Add New Post</h6>
      </div>
  @if(session('success'))

      {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}

      <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>{{ session('success') }}</strong>
      </div>
 @endif
   @if(session('delete'))

      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>{{ session('delete') }}</strong>
      </div>
 @endif

      <div class="card-body">
        
        <form action="{{ url('blog/post_page') }}" method="POST">
          @csrf
            <div class="form-group mb-2">
              <label for="exampleInputEmail1">Post title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"  name="title">
              @error('title')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputEmail1">Description</label>
              <textarea class="form-control  @error('description') is-invalid @enderror" id="exampleInputEmail1" style="text-align: left;"  name="description">
              </textarea>
               @error('description')
                <strong class="text-danger">{{ $message }}</strong>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>


 <a href="{{ url('home') }}" class="btn btn-dark" style="text-decoration: none;font-weight: bold;"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>

</div>



</body>
</html>