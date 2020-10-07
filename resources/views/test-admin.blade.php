@extends('admin-layout.master')

@section('title','Quan Tri')

@section('content-header','Danh Sach Sinh Vien')

@section('content')
<table class="table">
  <thead>
    <th>id</th>
    <th>name</th>
    <th>phone</th>
    <th>age</th>
    <th>gender</th>
    <th>active</th>
    <th><a href="{{route('students.create')}}"><button class="btn btn-success ml-4">Them</button></a></th>
  </thead>
  <tbody>
    @foreach($list as $li)
    <tr>
      <td>{{$li->id}}</td>
      <td>{{$li->name}}</td>
      <td>{{$li->phone}}</td>
      <td>{{$li->age}}</td>
      <td>
        @if ($li->gender == 0)
        Nu
        @elseif ($li->gender == 1)
        Nam
        @else
        NOTHING
        @endif
      </td>
      <td>{{$li->is_active == 1 ? 'YES' : 'NO'}}</td>
      <td class="d-flex justify-content-center">
        <a href="/students/show/{{$li->id}}" class="btn btn-success">Xem</a>
        <a href="{{route('students.edit',$li->id)}}"><button class="btn btn-success mx-2">Sửa</button></a>
        <form action="{{route('students.destroy',$li->id)}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="DELETE"></input>
          <button class="btn btn-danger" type="submit">Xóa</button> <a href="students/{{$li->id}}"></a>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection