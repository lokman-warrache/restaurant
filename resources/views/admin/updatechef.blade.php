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

<form action="{{url('/updatefoodchef', $data->id)}}" method="post" enctype="multipart/form-data">

@csrf
    <div>
        <label>Name</label>
        <input style="color: blue;" type="text" name="name" value="{{$data->name}}" require>
    </div>
    <div>
        <label>Speciality</label>
        <input style="color: blue;" type="num" name="speciality" value="{{$data->speciality}}" require>
    </div>
    <div>
        <label>Old Image</label>
        <img height="100px" width="100px" src="/chefimage/{{$data->image}}">
    </div>
    <div>
        <label>New Image</label>
        <input style="color: white;" type="file" name="image">
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
