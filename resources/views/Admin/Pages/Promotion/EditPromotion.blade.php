@extends ('Admin.master') 
@section('EditPromotion') 
    <div class="row">
        <div class="col-xl-6 offset-xl-3">
            @if(Session::get('success'))
                <p style="padding-left: 120px; color: #c00606;">{{Session::get('success')}}</p>
            @endif
            <form method="POST">
                @csrf
                <h4 style="margin-bottom: 20px;">Create Promotion</h4>
                <div class="row">
                    <div class="form-group mr-20 col-xl-12">
                        <p>Name</p>
                        <input type="text" class="form-control" id="" placeholder="Name" name="name" value="{{$Promotion->name}}">
                    </div>
                    <div class="form-group mr-20 col-xl-6">
                        <p>Chi Tiết 1</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="detail1" rows="3">{{$Promotion->detail1}}</textarea>
                        @error('detail1')
                            <small class="form-text" style="color: red">{{$message}}</small>
                        @enderror
                    </div> 
                    <div class="form-group mr-20 col-xl-6">
                        <p>Chi Tiết 2</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="detail2" rows="3">{{$Promotion->detail2}}</textarea>
                    </div>
                    <div class="form-group mr-20 col-xl-6">
                        <p>Chi Tiết 3</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="detail3" rows="3">{{$Promotion->detail3}}</textarea>
                    </div>
                    <div class="form-group mr-20 col-xl-6">
                        <p>Chi Tiết 4</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="detail4" rows="3">{{$Promotion->detail4}}</textarea>
                    </div>
                </div>
                <button name="submit" type="submit" style="margin-top: 10px;" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@stop