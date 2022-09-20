@extends('admin.index')

@section('content')
<div class="forms">
    <form action="{{route('locale.admin.tours.store', ['locale' => app()->getLocale()])}}" method="POST" class="validation" enctype="multipart/form-data">
        @csrf
        <div class="img{{ $errors->has('img') ? ' has-error' : ''}}">
            <label>Image <input type="file" name="img" value="{{old('img')}}"></label>
            @error('img')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_en{{ $errors->has('title_en') ? ' has-error' : ''}}">
            <label>Title EN <input type="text" name="title_en" value="{{old('title_en')}}"></label>
            @error('title_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_hy{{ $errors->has('title_hy') ? ' has-error' : ''}}">
            <label>Title HY <input type="text" name="title_hy" value="{{old('title_hy')}}"></label>
            @error('title_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="descr_en{{ $errors->has('descr_en') ? ' has-error' : ''}}">
            <label>Descr EN <textarea name="descr_en">{{old('descr_en')}}</textarea></label>
            @error('descr_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="descr_hy{{ $errors->has('descr_hy') ? ' has-error' : ''}}">
            <label>Descr HY <textarea name="descr_hy">{{old('descr_hy')}}</textarea></label>
            @error('descr_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="days-count">
            <label>Days <input type="number" name="days" min="0"></label>
        </div>
        <div class="days">
            <div class="daytitle1_en{{ $errors->has('daytitle1_en') ? ' has-error' : ''}}">
                <label>Day 1 Title EN <input type="text" name="daytitle1_en" value="{{old('daytitle1_en')}}"></label>
                @error('daytitle1_en')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="daydescr1_en{{ $errors->has('daydescr1_en') ? ' has-error' : ''}}">
                <label>Day 1 Descr EN <textarea name="daydescr1_en">{{old('daydescr1_en')}}</textarea></label>
                @error('daydescr1_en')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="daytitle1_hy{{ $errors->has('daytitle1_hy') ? ' has-error' : ''}}">
                <label>Day 1 Title HY <input type="text" name="daytitle1_hy" value="{{old('daytitle1_hy')}}"></label>
                @error('daytitle1_hy')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="daydescr1_hy{{ $errors->has('daydescr1_hy') ? ' has-error' : ''}}">
                <label>Day 1 Descr HY <textarea name="daydescr1_hy">{{old('daydescr1_hy')}}</textarea></label>
                @error('daydescr1_hy')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="price{{ $errors->has('price') ? ' has-error' : ''}}">
            <label>Price <span><input type="text" name="price" value="{{old('price')}}"><i class="fas fa-dollar-sign"></i></span></label>
            @error('price')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="discount{{ $errors->has('discount') ? ' has-error' : ''}}">
            <label>Discount <input type="text" name="discount" value="{{old('discount')}}"></label>
            @error('discount')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="duration_en{{ $errors->has('duration_en') ? ' has-error' : ''}}">
            <label>Duration EN <input type="text" name="duration_en" value="{{old('duration_en')}}"></label>
            @error('duration_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="duration_hy{{ $errors->has('duration_hy') ? ' has-error' : ''}}">
            <label>Duration HY <input type="text" name="duration_hy" value="{{old('duration_hy')}}"></label>
            @error('duration_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="min_age{{ $errors->has('min_age') ? ' has-error' : ''}}">
            <label>Min age <input type="text" name="min_age" value="{{old('min_age')}}"></label>
            @error('min_age')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="max_people{{ $errors->has('max_people') ? ' has-error' : ''}}">
            <label>Max people <input type="text" name="max_people" value="{{old('max_people')}}"></label>
            @error('max_people')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="availability{{ $errors->has('availability') ? ' has-error' : ''}}">
            <label>Availability <input type="text" name="availability" value="{{old('availability')}}"></label>
            @error('availability')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="from_en{{ $errors->has('from_en') ? ' has-error' : ''}}">
            <label>From EN <input type="text" name="from_en" value="{{old('from_en')}}"></label>
            @error('from_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="to_en{{ $errors->has('to_en') ? ' has-error' : ''}}">
            <label>To EN <input type="text" name="to_en" value="{{old('to_en')}}"></label>
            @error('to_en')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="from_hy{{ $errors->has('from_hy') ? ' has-error' : ''}}">
            <label>From HY <input type="text" name="from_hy" value="{{old('from_hy')}}"></label>
            @error('from_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="to_hy{{ $errors->has('to_hy') ? ' has-error' : ''}}">
            <label>To HY <input type="text" name="to_hy" value="{{old('to_hy')}}"></label>
            @error('to_hy')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="title_id">
            <label>Destination 
                <select name="destination" class="destination">
                    <option value="all_destinations">Choose destinaiton</option>
                    @foreach($datas['destinations'] as $data)
                        @foreach($data as $destination)
                        <option value="{{$destination['id']}}">{{$destination['title_'.app()->getLocale().'']}}</option>
                        @endforeach
                    @endforeach
                </select>
            </label>
        </div>
        <div class="title_id">
            <label>Category 
                <select name="category" class="category">
                    <option value="all_categories">Choose category</option>
                    @foreach($datas['categories'] as $data)
                        @foreach($data as $category)
                        <option value="{{$category['id']}}">{{$category['title_'.app()->getLocale().'']}}</option>
                        @endforeach
                    @endforeach
                </select>
            </label>
        </div>
        <button type="submit">Add</button>
    </form>
</div>
@endsection