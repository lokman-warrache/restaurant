<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>



   @include('admin.admincss')


  </head>
  <body>

  <div class="container-scroller">

  @include("admin.navbar")

  <div style="position: relative; top: 60px; right: -150px">
      <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">

      @csrf
          <div>
              <label>Name</label>
              <input style="color: blue;" type="text" name="name" placeholder="write a name" require>
          </div>
          <div>
              <label>Speciality</label>
              <input style="color: blue;" type="text" name="speciality" placeholder="write a speciality" require>
          </div>
          <div>
              <label>Image</label>
              <input style="color: white;" type="file" name="image" placeholder="choose a image" require>
          </div>
          <div>
              <input style="color: black;" type="submit" value="Save">
          </div>
      </form>

      <div>

      <div style="position: relative; top: 70px; right: -150px">

      <table bgcolor="black">
          <tr>
              <th style="padding: 30px;">Chef Name</th>
              <th style="padding: 30px;">Speciality</th>
              <th style="padding: 30px;">Image</th>
              <th style="padding: 30px;">Action</th>
              <th style="padding: 30px;">Action2</th>
          </tr>

          @foreach ($data as $data)

          <tr align="center">
              <td>{{$data->name}}</td>
              <td>{{$data->speciality}}</td>
              <td><img height="100px" width="100px" src="chefimage/{{$data->image}}"></td>
              <td><a href="{{url('/deletechef', $data->id)}}">Delete</a></td>
              <td><a href="{{url('/updatechef', $data->id)}}">Update</a></td>
          </tr>
          @endforeach
      </table>
  </div>
  </div>

  @include('admin.adminscript')
  </body>
</html>
