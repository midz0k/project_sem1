@extends ('Admin.master') 
@section('CreateCategory') 
    <div class="row">
        <div class="col-xl-4 offset-xl-4">
            @if(Session::get('success'))
                <p style="padding-left: 120px; color: #c00606;">{{Session::get('success')}}</p>
            @endif
            <form method="POST" action="{{route('Creates')}}">
                @csrf
                <h4 style="margin-bottom: 20px;">Create Category</h4>
                <div class="form-group mr-20">
                    <p>Name</p>
                    <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Name" name="name" value="{{old('name')}}">
                    @error('name')
                        <small class="form-text" style="color: red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group mr-20">
                    <p>Slug</p>
                    <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="slug">
                </div>
                <div class="form-group">
                    <p>Status</p>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="1" checked >Hiện 
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="2" >Ẩn
                        </label>
                    </div>
                </div>
                <button name="submit" type="submit" style="margin-top: 10px;" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@stop