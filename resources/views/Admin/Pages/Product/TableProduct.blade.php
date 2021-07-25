@extends ('Admin.master') @section('TableProduct')
    <div class="row">
        @if(Session::get('success'))
        <div class="alert alert-info ml-lg-auto" id="hide" style="width: 300px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('success')}}!</strong>
        </div>
        @endif
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-2">
                    <form>
                        @csrf
                        <select class="form-control" name="sort" id="sort">
                            <option>---Lọc---</option>
                            <option value="{{Request::url()}}?sort_by=giam">--Giá Giảm Dần--</option>
                            <option value="{{Request::url()}}?sort_by=tang">--Giá Tăng Dần--</option>
                            <option value="{{Request::url()}}?sort_by=kytu_az">--A đến Z--</option>
                            <option value="{{Request::url()}}?sort_by=kytu_za">--Z đến A--</option>
                            <option value="{{Request::url()}}">--Không--</option>
                        </select>
                    </form>
                </div>
                <div class="col-xl-5 offset-xl-5">
                    <form class="form-inline" style="float: right;" method="get">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </form>
                </div>
            </div>
        </div>
    

    <div class="col-xl-12" style="margin-top: 20px">
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sale_Price</th>
                        <th scope="col">Promotion_id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Origin</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Status</th>
                        <th class="col-xl-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($Product as $value)
                    <tr>
                        <a href="">
                            <th scope="col">{{$loop -> index +1}}</th>
                            <td scope="col" class="col-sm-2">{{$value -> name}}</td>
                            <td scope="col">{{$value -> price}}.000đ</td>
                            <td scope="col" >
                                @if ($value -> sale_price > 0)
                                    {{$value->price-(($value->price * $value->Promotion->detail1)/100)}}.000đ
                                @else
                                    không
                                @endif
                               
                            </td>
                            <td scope="col">
                                @if ($value->promotion_id == null)
                                    Không
                                @else
                                    {{$value-> Promotion -> name}}
                                @endif
                            </td>
                            <td scope="col"><img style="width: 80px;" src="{{url('uploads')}}/{{$value -> image}}" alt=""></td>
                            <td scope="col" >{{$value -> origin}}</td>
                            <td scope="col" >{{$value -> weight}} (g)</td>
                            @if ($value -> status == 1)
                                <td><span class="btn btn-success">Hiện</span></td>
                            @else
                                <td><span class="btn btn-danger">Ẩn</span></td>
                            @endif
                            <td style="text-align: right">
                                <a href="{{route('editProduct',$value->id)}}" class="btn btn-success">Sửa</a>
                                <a href="{{route('deletePro',$value->id)}}" onclick="return confirm('Liên Quan Khóa Ngoại. Bạn Có Chắc Muốn Xóa Không?')" id="delete" class="btn btn-danger">Delete</a>
                            </td>
                        </a>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
            <div class="col-xl-6 offset-xl-3">
                <div class="pagination" style="margin-left: 80px;">
                    @if (ceil($Product->total()/8)>1)
                        <a href="#">«</a>
                        @for($i=1;$i<=ceil($Product->total()/8);$i++)
                            <a class="page-item {{($i == $Product->currentPage())?'active':''}}" href="?page={{$i}}">{{$i}}</a>
                        @endfor
                        <a href="#">»</a>
                    @else
                                        
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('Search')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@stop