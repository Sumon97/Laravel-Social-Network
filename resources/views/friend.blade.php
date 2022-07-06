@extends('layouts.user')



@section('content')
<div class="container" >
  <div class="top" style="text-align: center;">
    <h2 >Friend's List</h2>
     <h4 >Total friend {{(count($friends))}}</h4>
  </div>
  <div class="row" >
    <div class="shadow" style="  box-shadow: 0px 0px 5px 0px;
  padding-top: 10px;">
  @foreach($friends as $friend)
      <div class="col-sm-12">
        <div class="col-sm-2">
          <img style="border-radius:35px;" src="../assets/img/user.jpg" class="img-circle" width="60px">
        </div>
        <div class="col-sm-8">
          <h4><a href="#">Name</a></h4>
           
        </div>
        <div class="col-sm-2">

          <br>
          <a href="#">Friend</a>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr />
      @endforeach
     </div>
  </div>
</div>

@endsection