@extends('admin.index')
@section('content')
<div class="parent">
    <div class="add"><a href="{{route('locale.admin.tours.create', ['locale' => app()->getLocale()])}}"><i class="fas fa-user"></i>Add tour package</a></div>
    <table> 
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Descr</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Duration</th>
            <th>Min age</th>
            <th>Max people</th>
            <th>Availability</th>
            <th>Reviews</th>
            <th colspan="2">Actions</th>
        </tr>
    @foreach($tours as $tour)
        <tr>
            <td>{{$tour['id']}}</td>
            <td><img src="{{ asset('storage/images/tours/thumbs/'.$tour['img'].'') }}" alt="{{$tour['title_'.app()->getLocale().'']}}"></td>
            <td>{{$tour['title_en']}}</td> 
            <td>{{mb_substr($tour['descr_en'], 0, 40).'...'}}</td>
            <td>{{$tour['price']}}</td>
            <td>{{$tour['discount']}}</td>
            <td>{{$tour['duration_en']}}</td>
            <td>{{$tour['min_age']}}</td>
            <td>{{$tour['max_people']}}</td>
            <td>{{$tour['availability']}}</td>
            <td>{{$tour['reviews']}}</td>
            <td><a href="{{route('locale.admin.tours.edit', ['locale' => app()->getLocale(), 'tour' => $tour['id']])}}" class="edit-btn">Edit</a></td>
            <td>
                <form action="{{route('locale.admin.tours.destroy', ['locale' => app()->getLocale(), 'tour' => $tour['id']])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="del-btn" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{$tours->links('vendor.pagination.custom')}}
</div>
@endsection