<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">

   @include('admin.admincss')


  </head>
  <body>

  <div class="container-scroller">

  @include("admin.navbar")

  <div style="position: relative; top: 60px; right: -150px">

      <form action="{{url('/update', $data->id)}}" method="post" enctype="multipart/form-data">

      @csrf
          <div>
              <label>Title</label>
              <input style="color: blue;" type="text" name="title" value="{{$data->title}}" require>
          </div>
          <div>
              <label>Price</label>
              <input style="color: blue;" type="num" name="price" value="{{$data->price}}" require>
          </div>
          <div>
              <label>Description</label>
              <input style="color: blue;" type="text" name="description" value="{{$data->description}}" require>
          </div>
          <div>
              <label>Old Image</label>
              <img height="150px" width="150px" src="/foodimage/{{$data->image}}">
          </div>
          <div>
              <label>New Image</label>
              <input style="color: white;" type="file" name="image" require>
          </div>
          <div>
              <input style="color: black;" type="submit" value="Save">
          </div>
      </form>

  </div>
  </div>



  @include('admin.adminscript')
  </body>
</html>
