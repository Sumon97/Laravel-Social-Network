@extends('layouts.user')

@section('Law Diary', 'Change the way')




@section('content')




<div class="container-fluid">
  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#cover-photo">
      <div class="page-header min-height-300 border-radius-xl mt-4" >
         @if(auth::user()->cover !== null)
        <img src="{{asset('/storage/usercover/' . auth::user()->cover) }}" alt="profile_photo" class="page-header min-height-300 border-radius-xl mt-4" style="background-position-y: 50%; width: 100%; height: 100%; width: 2200px; height: 300px;">
        @else
                  <img src="../assets/img/law.jpg"  class="page-header min-height-300 border-radius-xl mt-4" style="background-position-y: 50%; width: 100%; height: 100%; " >

        @endif

        

        <span class="mask bg-gradient-primary opacity-2"></span> 
 </a>

      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">

              <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#profile-photo">
                @if(auth::user()->photo !== null)
                <img src="{{asset('/storage/profile/' . auth::user()->photo) }}" alt="profile_photo" class="w-100 border-radius-lg shadow-sm" class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Click here to change photo" >
                 @else
                   <img src="../assets/img/user.jpg" class="avatar avatar-sm me-3" alt="user1">

              @endif

              </a>


              

              

            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               {{auth::user()->name}}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                
              </p>
            </div>
          </div>
   <!-- social info there -->
        </div>
      </div>
    </div>


    <div class="container-fluid py-4">
      <div class="row">

     
        <div class="col-12 col-xl-6">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Personal Information</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#profile-manage">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{auth::user()->name}}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Father's Name:</strong> &nbsp; {{auth::user()->father}}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Mother's Name:</strong> &nbsp; {{auth::user()->mother}}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Date Of Birth:</strong> &nbsp; {{auth::user()->dob}}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{auth::user()->phone}}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{auth::user()->email}}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Present Address:</strong> &nbsp; {{auth::user()->present}}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Permanent Address:</strong> &nbsp; {{auth::user()->permanent}}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Date Of Birth:</strong> &nbsp; {{auth::user()->dob}}</li>
                 <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; {{auth::user()->gender}}</li>
               
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Education & Professional Info</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">University:</strong> &nbsp; {{auth::user()->university}}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Program:</strong> &nbsp; {{auth::user()->course}}</li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Result:</strong> &nbsp; {{auth::user()->result}}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Major:</strong> &nbsp; {{auth::user()->specialize}}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Post:</strong> &nbsp; {{auth::user()->position}}</li>
           
              </ul>
            </div>
          </div>
        </div>

      </div>







      <!-- Profile Edit Modal -->
    <div class="modal fade" id="profile-manage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Profile Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <!-- start form from here -->
              <form role="form text-left" method="Post" action="/Profile/update" enctype="form-data">
                 @csrf
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name<span style="color:red;"> &#42; </span> </label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{@auth::user()->name}}">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label>Phone <span style="color:red;"> &#42; </span></label>
                    <input type="phone" name="phone" class="form-control" id="exampleFormControlInput1" value="{{@auth::user()->phone}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>E-mail </label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{@auth::user()->email}}">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="date" name="dob" class="form-control" id="exampleFormControlInput1" value="{{@auth::user()->dob}}">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Address <span style="color:red;"> &#42; </span></label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" value="{{@auth::user()->present}}">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label>Profession<span style="color:red;"> &#42; </span></label>
                    <input type="text" name="profession" class="form-control" id="exampleFormControlInput1" value="{{@auth::user()->profession}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{@auth::user()->phone}}">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label>Photo <span style="color:red;"> &#42; </span></label>
                    <input type="file" name="photo" class="form-control" id="exampleFormControlInput1" >
                  </div>
                </div>
              </div>
              


                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Submit</button>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>






      <!-- Profile photo -->
    <div class="modal fade" id="profile-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change the photo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <!-- start form from here -->
              <form role="form text-left" method="Post" action="/updatepro" enctype="multipart/form-data">
                 @csrf
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Profile Photo<span style="color:red;"> &#42; </span> </label>
                    <input type="file" name="profile" class="form-control" id="exampleFormControlInput1">
                  </div>
                </div>
              </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Upload</button>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Profile photo -->
    <div class="modal fade" id="cover-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change the Cover photo photo</h5>
            <p>800px*300px is the perfect size for the cover photo</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <!-- start form from here -->
              <form role="form text-left" method="Post" action="/updatecover" enctype="multipart/form-data">
                 @csrf
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Cover Photo<span style="color:red;"> &#42; </span> </label>
                    <input type="file" name="cover" class="form-control" id="exampleFormControlInput1">
                  </div>
                </div>
              </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">upload</button>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>






@endsection