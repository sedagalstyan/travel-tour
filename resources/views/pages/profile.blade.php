@extends('index')

@section('content')
<!-- Main -->
<main class="page-content">
    <div class="profile-container hide-overflow">
        <div class="profile">
            <div class="profile-avatar">
                <img src="{{ asset('/storage/images/users/'.$user['avatar'].'') }}" alt="{{$user->avatar}}">
                <form action="{{route('locale.profile.update', ['locale' => app()->getLocale(), 'profile' => $user->id])}}" method="POST" class="upload-image" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <label><i class="fas fa-camera"></i><input type="file" name="avatar"></label>
                    <button type="submit"></button>
                </form>
            </div>
            <div class="profile-info">
                <div class="profile-header">
                    <div class="profile-name">{{$user->name.' '.$user->surname}}</div>
                    <div class="profile-edit"><a href="{{route('locale.profile.edit', ['locale' => app()->getLocale(), 'profile' => $user->id])}}"><i class="fas fa-edit"></i>{{__('edit')}}</a></div>
                </div>
                <div class="profile-joined">{{$user->created_at->diffForHumans()}}</div>
                <div class="profile-email">{{$user->email}}</div>
                <div class="profile-actions">
                    <a class="profile-logout" href="{{route('locale.logout', ['locale' => app()->getLocale()])}}">{{__('logout')}}</a>
                    <form action="{{route('locale.profile.destroy', ['locale' => app()->getLocale(), 'profile' => $user->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="del-btn" type="submit">{{__('del_account')}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bookings">
            <div class="booking-title">{{__('profile_booking')}}</div>
            <div class="booking-descr">{{__('no_bookings')}}</div>
        </div>
    </div>
</main>
@endsection