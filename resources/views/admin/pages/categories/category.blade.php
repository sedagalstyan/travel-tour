@extends('admin.index')
@section('content')
<div class="parent">
    <div class="add"><a href="{{route('locale.admin.categories.create', ['locale' => app()->getLocale()])}}"><i class="fas fa-user"></i>Add category</a></div>
    <table> 
        <tr>
            <th>ID</th>
            <th>Category EN</th>
            <th>Category HY</th>
            <th>Slug</th>
            <th colspan="2">Actions</th>
        </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{$category['id']}}</td>
            <td>{{$category['title_en']}}</td>
            <td>{{$category['title_hy']}}</td>
            <td>{{$category['slug']}}</td>
            <td><a href="{{route('locale.admin.categories.edit', ['locale' => app()->getLocale(), 'category' => $category['id']])}}" class="edit-btn">Edit</a></td>
            <td>
                <form action="{{route('locale.admin.categories.destroy', ['locale' => app()->getLocale(), 'category' => $category['id']])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="del-btn" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{$categories->links('vendor.pagination.custom')}}
</div>
@endsection
