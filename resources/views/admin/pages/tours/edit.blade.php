@extends('admin.index')

@section('content')
    @foreach($datas['tour'] as $tour)
    <div class="forms">
        <form action="{{route('locale.admin.tours.update', ['locale' => app()->getLocale(), 'tour' => $tour['id']])}}" method="POST" class="validation" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="img{{ $errors->has('img') ? ' has-error' : ''}}">
                <label>Image <input type="file" name="img"></label>
                @error('img')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="title_en{{ $errors->has('title_en') ? ' has-error' : ''}}">
                <label>Title EN <input type="text" name="title_en" value="{{$tour['title_en']}}"></label>
                @error('title_en')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="title_hy{{ $errors->has('title_hy') ? ' has-error' : ''}}">
                <label>Title HY <input type="text" name="title_hy" value="{{$tour['title_hy']}}"></label>
                @error('title_hy')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="descr_en{{ $errors->has('descr_en') ? ' has-error' : ''}}">
                <label>Descr EN <textarea name="descr_en">{{$tour['descr_en']}}</textarea></label>
                @error('descr_en')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="descr_hy{{ $errors->has('descr_hy') ? ' has-error' : ''}}">
                <label>Descr HY <textarea name="descr_hy">{{$tour['descr_hy']}}</textarea></label>
                @error('descr_hy')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="days-count-edit">
                <label>Days <input type="number" name="days" min="0" value="{{sizeof($tour['days_en']['days'])}}"></label>
            </div>
            <div class="days">
                @foreach($tour['days_en']['days'] as $key => $days)
                    <div class="daytitle">
                    <label>Day {{$key+1}} Title EN <input type="text" name="daytitle{{$key+1}}_en" value="{{$days['title']}}"></label>
                    </div>
                    <div class="daydescr">
                    <label>Day {{$key+1}} Descr EN <textarea name="daydescr{{$key+1}}_en">{{$days['descr']['info']}}</textarea></label>
                    </div>
                @endforeach
                @foreach($tour['days_hy']['days'] as $key => $days)
                    <div class="daytitle">
                    <label>Day {{$key+1}} Title HY <input type="text" name="daytitle{{$key+1}}_hy" value="{{$days['title']}}"></label>
                    </div>
                    <div class="daydescr">
                    <label>Day {{$key+1}} Descr HY <textarea name="daydescr{{$key+1}}_hy">{{$days['descr']['info']}}</textarea></label>
                    </div>
                @endforeach
            </div>
            <div class="price{{ $errors->has('price') ? ' has-error' : ''}}">
                <label>Price <span><input type="text" name="price" value="{{$tour['price']}}"><i class="fas fa-dollar-sign"></i></span></label>
                @error('price')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="discount{{ $errors->has('discount') ? ' has-error' : ''}}">
                <label>Discount <input type="text" name="discount" value="{{$tour['discount']}}"></label>
                @error('discount')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="duration_en{{ $errors->has('duration_en') ? ' has-error' : ''}}">
                <label>Duration En <input type="text" name="duration_en" value="{{$tour['duration_en']}}"></label>
                @error('duration_en')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="duration_hy{{ $errors->has('duration_hy') ? ' has-error' : ''}}">
                <label>Duration HY <input type="text" name="duration_hy" value="{{$tour['duration_hy']}}"></label>
                @error('duration_hy')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="min_age{{ $errors->has('min_age') ? ' has-error' : ''}}">
                <label>Min age <input type="text" name="min_age" value="{{$tour['min_age']}}"></label>
                @error('min_age')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="max_people{{ $errors->has('max_people') ? ' has-error' : ''}}">
                <label>Max people <input type="text" name="max_people" value="{{$tour['max_people']}}"></label>
                @error('max_people')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="availability{{ $errors->has('availability') ? ' has-error' : ''}}">
                <label>Availability <input type="text" name="availability" value="{{$tour['availability']}}"></label>
                @error('availability')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="from_en{{ $errors->has('from_en') ? ' has-error' : ''}}">
                <label>From EN <input type="text" name="from_en" value="{{$tour['from_en']}}"></label>
                @error('from_en')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="to_en{{ $errors->has('to_en') ? ' has-error' : ''}}">
                <label>To EN <input type="text" name="to_en" value="{{$tour['to_en']}}"></label>
                @error('to_en')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="from_hy{{ $errors->has('from_hy') ? ' has-error' : ''}}">
                <label>From HY <input type="text" name="from_hy" value="{{$tour['from_hy']}}"></label>
                @error('from_hy')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="to_hy{{ $errors->has('to_hy') ? ' has-error' : ''}}">
                <label>To HY <input type="text" name="to_hy" value="{{$tour['to_hy']}}"></label>
                @error('to_hy')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="title_id">
                <label>Destination 
                    <select name="destination" class="destination">
                        @foreach($datas['destinations'] as $data)
                            @foreach($data as $destination)
                            <option {{($destination->id == $tour->title_id) ? 'selected' : '' }}  value="{{$destination['id']}}">
                                {{$destination['title_'.app()->getLocale().'']}}
                            </option>
                            @endforeach
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="title_id">
                <label>Category 
                    <select name="category" class="category">
                        @foreach($datas['categories'] as $data)
                            @foreach($data as $category)
                            <option {{($category->id == $tour->title_id) ? 'selected' : '' }} value="{{$category['id']}}">{{$category['title_'.app()->getLocale().'']}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </label>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
    @endforeach
@endsection