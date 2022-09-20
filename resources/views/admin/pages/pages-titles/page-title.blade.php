@extends('admin.index')
@section('content')
<div class="parent">
    <div class="add"><a href="{{route('locale.admin.pages-titles.create', ['locale' => app()->getLocale()])}}"><i class="fas fa-user"></i>Add title</a></div>
    <table> 
        <tr>
            <th>ID</th>
            <th>Title EN</th>
            <th>Title HY</th>
            <th>Page</th>
            <th colspan="2">Actions</th>
        </tr>
    @foreach($pages_titles as $page_title)
        <tr>
            <td>{{$page_title['id']}}</td>
            <td>{{$page_title['title_en']}}</td>
            <td>{{$page_title['title_hy']}}</td>
            <td>{{$page_title['page']}}</td>
            <td><a href="{{route('locale.admin.pages-titles.edit', ['locale' => app()->getLocale(), 'pages_title' => $page_title['id']])}}" class="edit-btn">Edit</a></td>
            <td>
                <form action="{{route('locale.admin.pages-titles.destroy', ['locale' => app()->getLocale(), 'pages_title' => $page_title['id']])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="del-btn" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{$pages_titles->links('vendor.pagination.custom')}}
</div>
@endsection
