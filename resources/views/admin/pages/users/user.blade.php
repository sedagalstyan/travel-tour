@extends('admin.index')

@section('content')
<div class="parent">
    <div class="add"><a href="{{route('locale.admin.users.create', ['locale' => app()->getLocale()])}}"><i class="fas fa-user"></i>Add user</a></div>
    <table> 
        <tr>
            <th>ID</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Password</th>
            <th colspan="2">Actions</th>
        </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>
                <img src="{{ asset('/storage/images/users/'.$user['avatar'].'') }}" alt="{{$user['avatar']}}">
                @if($user['avatar'] != 'user.png')
                <form action="{{route('locale.admin.users.update', ['locale' => app()->getLocale(), 'user' => $user['id'], 'avatarDel' => 'user.png', 'path' => $user['avatar']])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="del-avatar-btn" type="submit"><i class="fas fa-trash"></i></button>
                </form>
                @endif
            </td>
            <td>{{$user['name']}}</td>
            <td>{{$user['surname']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['password']}}</td>
            <td><a href="{{route('locale.admin.users.edit', ['locale' => app()->getLocale(), 'user' => $user['id']])}}" class="edit-btn">Edit</a></td>
            <td>
                <form action="{{route('locale.admin.users.destroy', ['locale' => app()->getLocale(), 'user' => $user['id']])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="del-btn" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{$users->links('vendor.pagination.custom')}}
</div>
@endsection
