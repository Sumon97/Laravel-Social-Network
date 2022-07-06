@extends('layouts.user')


@section('content')

<div class="container-fluid py-4">
    

      <div class="row g-4">
        <div class="col-12 col-xl-3">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"> </h6>
            </div>
            <div class="card-body p-3">
              <div class="card-body px-0 pt-0 pb-2">
               <h6 class="text-center">Add Friends</h6>
              <div class="table-responsive">
                @foreach($users as $user)
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"><a href="/Profile/{{$user->id}}">{{$user->name}}</a></h6>
              <h6 class="mb-0">{{$user->senders_count}}</h6>
              <h6 class="mb-0">{{$user->receivers_count}}</h6>
               <!-- start form from here -->
               <form role="form text-left" method="Post"  action="/friend" enctype="form-data">
                 @csrf
                  <div class="row">
                          <div class="col-md-6">
                            <div class="form-group"> 
                              <input type="hidden" name="receiver_id" class="form-control" id="exampleFormControlInput1" value="{{$user->id}}">
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group"> 
                              <input type="hidden" name="status" class="form-control" id="exampleFormControlInput1" value="1">
                            </div>
                          </div>
                        </div>
              
                 <button class="btn btn-sm btn-secondary"> Add </button>
               

               </form>
              
          </div>
          @endforeach

          <div>
            <h4>Response</h4>
             @foreach($confirms as $confirm)
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"><a href="">{{$confirm->status}}</a></h6>
              <h6 class="mb-0"><a href=""></a></h6>
               <!-- start form from here -->
               <form role="form text-left" method="Post"  action="{{ route('friend.update', $confirm->id)}}" enctype="form-data">
                 @csrf
                  <div class="row">
                          
                        <div class="col-md-6">
                            <div class="form-group"> 
                              <input type="hidden" name="status" class="form-control" id="exampleFormControlInput1" value="2">
                            </div>
                          </div>
                        </div>
              
                 <button class="btn btn-sm btn-secondary"> Confirm </button>
               

               </form>
              
          </div>
          @endforeach

          </div>
           
              </div>
              <div class="card-header pb-0 p-3">
              <h6 class="mb-0"></h6> 
            </div>
            </div>
            </div>
          </div> 
        </div>

    <div class="col-12 col-xl-6">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"> </h6>
            </div>
            <div class="card-body p-3">
              <div class="card-body px-0 pt-0 pb-2">
              

                <!-- start form from here -->
                        <form role="form text-left" method="Post" action="Post" enctype="multipart/form-data">
                           @csrf
                          <div class="row">
                            <div class="input-group">
                             
                                <textarea class="form-control" name="title" placeholder="What's on Your Mind" aria-label="With textarea"></textarea>
                                
                           </div>
                        </div>
                            <div class="text-right">
                              <button type="submit" class="btn bg-gradient-secondary btn-rounded  mt-4 mb-0">Submit</button>
                            </div>
                        </form>

              <div class="card-header pb-0 p-3">
              <h6 class="mb-0">People shares their Thoughts</h6>
              <hr> 


              <div class="row g-3">
              @foreach($posts as $post)

        <div class="col-12 col-xl-12">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"> </h6>
            </div>
            <div class="card-body p-3">
              <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive">
             <img class="img-fluid" src="" style="border-radius: 15px;" width="280px" max-height="150px">
              </div>
              <div class="card-header pb-0 p-3">
                <div class="">
              <h6 class="mb-0">{{$post->User->name}} </h6>
              </div>

              <div class="pt-3">

               <p class="mb-0">{{$post->title}}</p>

               </div>

               <div class="container">
                  <div  class="row text-center">
                    <div class="col">
                     {{$post->likes_count}}
                    </div>
                    <div class="col">
                  
                    </div>
                    <div class="col">
                       {{$post->comments_count}}
                    </div>
                  </div>
                </div>
               <hr>

               <div class="container">
                <div class="row">
                  <div class="col-sm">
                    
        

                 <form role="form text-left" method="Post" action="/Like" enctype="multipart/form-data">
                       @csrf

                       <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">

                        <div class="text-right">
     
                          <button type="submit" class="btn  btn-secondary" > <i class="bi bi-hand-thumbs-up-fill">Like</i></button>
                        </div>
                    </form>
                  </div>
                  <div class="col-sm">
                    
                  </div>
                  <div class="col-sm">
                               <!-- Button trigger modal -->
                <a  href="#" class="btn  btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                  comment
                </a>
                  </div>
                </div>
              </div>
                            
               
              
            </div>
            </div>
            </div>
          </div> 
        </div>
@endforeach
</div>
      
            </div>
            </div>
            </div>
          </div> 
        </div>

        <div class="col-12 col-xl-3">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"> </h6>
            </div>
            <div class="card-body p-3">
              <div class="card-body px-0 pt-0 pb-2">
                <h5 class="text-center"><a style="color:black;" href="/Profile">Profile</a> </h5>
              <div class="text-center aria-label">
              <h6>{{auth::user()->name}}</h6>
              <h6> {{auth::user()->email}}</h6>
              </div>
              <div class="card-header pb-0 p-3">
              <h6 class="mb-0"></h6> 
            </div>
            </div>
            </div>
          </div> 
        </div>

      </div>
    </div>








<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form text-left" method="Post" action="/Comment" enctype="form-data">
                       @csrf
                       <input type="text" name="comment" placeholder="Write your comment" class="form-control">
                       <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">

                        <div class="text-right">
     
                   <div class="text-center">
                              <button type="submit" class="btn bg-gradient-secondary btn-rounded  mt-4 mb-0">Submit</button>
                            </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>







@endsection