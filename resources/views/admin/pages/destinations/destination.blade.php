@extends('admin.index')
@section('content')
<div class="parent">
    <div class="add"><a href="{{route('locale.admin.destinations.create', ['locale' => app()->getLocale()])}}"><i class="fas fa-user"></i>Add category</a></div>
    <table> 
        <tr>
            <th>ID</th>
            <th>Destination EN</th>
            <th>Destination HY</th>
            <th>Slug</th>
            <th>Image</th>
            <th colspan="2">Actions</th>
        </tr>
    @foreach($destinations as $destination)
        <tr>
            <td>{{$destination['id']}}</td>
            <td>{{$destination['title_en']}}</td>
            <td>{{$destination['title_hy']}}</td>
            <td>{{$destination['slug']}}</td>
            <td><img src="{{ asset('/storage/images/destinations/'.$destination['img'].'') }}" alt="{{$destination['img']}}"></td>
            <td><a href="{{route('locale.admin.destinations.edit', ['locale' => app()->getLocale(), 'destination' => $destination['id']])}}" class="edit-btn">Edit</a></td>
            <td>
                <form action="{{route('locale.admin.destinations.destroy', ['locale' => app()->getLocale(), 'destination' => $destination['id']])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="del-btn" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{$destinations->links('vendor.pagination.custom')}}
</div>
@endsection
