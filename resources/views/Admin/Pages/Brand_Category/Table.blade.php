@extends ('Admin.master') @section('TableBrand-Categor')
    <div class="row">
        @if(Session::get('success'))
        <div class="alert alert-info ml-lg-auto" id="hide" style="width: 300px; margin-right: 118px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('success')}}!</strong>
        </div>
        @endif
        <div class="col-xl-10 offset-xl-1">
            <div class="row">
                <div class="col-xl-4 offset-xl-8">
                    <form class="form-inline" style="float: right;" method="get">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-10 offset-xl-1" style="margin-top: 20px">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-3 col-sm-3" scope="col">#</th>
                        <th class="col-4 col-sm-4" scope="col">Brand_id</th>
                        <th class="col-2 col-sm-2" scope="col">Category_id</th>
                        <th class="col-3 col-sm-3"></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($BrandCategory as $value)
                        <tr>
                            <th scope="row">{{$loop -> index +1}}</th>
                            <td scope="row">{{$value->Brand->name}}</td>
                            <td scope="row">{{$value->Category->name}}</td>
                            <td scope="row" style="text-align: right" class="col-3 col-sm-3">
                                <a href="{{route('edit-Brand-Category',$value->id)}}" class="btn btn-success">Sửa</a>
                                <a href="{{route('delete-Brand-Category',$value->id)}}" onclick="return confirm('Liên Quan Khóa Ngoại. Bạn Có Chắc Muốn Xóa Không?')" id="delete" class="btn btn-danger">Delete</a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-xl-6 offset-xl-3">
                <div class="pagination" style="margin-left: 80px;">
                    @if (ceil($BrandCategory->total()/8)>1)
                        <a href="#">«</a>
                        @for($i=1;$i<=ceil($BrandCategory->total()/8);$i++)
                            <a class="page-item {{($i == $BrandCategory->currentPage())?'active':''}}" href="?page={{$i}}">{{$i}}</a>
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