@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <h5 class="card-header">Comment section</h5>
              <div class="card-body">
                <img src="{{ asset('img/laravel.jpg') }}" style="width:650px;height: 200px;" >
              </div>
   
               <div class="comment-area">



                    <div class="card card-body" style="border: none;">
                        <h6 class="card-title  font-weight-bold">comment about this image</h6>

                        <form method="POST" action="{{ url('blog/comment') }}" >
                            @csrf
                          <div class="form-group w-50">  
                            <input type="text" class="form-control"  placeholder="Author name" name="author">   
                          </div>
                           <div class="form-group w-50">
                            <textarea class="form-control" name="comment" placeholder="comment here..." rows="3"></textarea>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>

                    


                {{-- ============================================================ --}}




              <div class="caard card-body shadow-sm mt-3"> 
             
                @foreach($comments as $user)
                       
                    
                <div class="detail-area mt-5">
                         
                    
                     <div class="mb-3"> 
                          <div class="mb-1"><span style="border: 1px solid #ddd;height: 25px;width: 50px;padding-right: 25px;padding-top: 10px;font-weight: bold;margin-right: 10px;padding: 3px;border-radius: 10%">author</span>{{ $user->author }}</div>
                          <div class="mb-2">{{ $user->comment }}</div>
                     </div>


                      </div>
                       <div>
                           <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                           <a href="{{ url('comment/destroy/'.$user->id) }}" class="btn btn-danger btn-sm me-2">Delete</a>
                       </div>
                    
                    
                  @endforeach
                                 
                
            </div>





                {{-- ============================================================ --}}


                      
               </div>

            </div>

        </div>
    </div>




{{-- ===========================  comment ===================== --}}


{{-- ========================================================== --}}


<div style="margin-top:100px"></div>

@endsection
