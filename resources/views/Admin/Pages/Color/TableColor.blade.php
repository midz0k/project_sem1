@extends ('Admin.master') @section('TableColor')
    <div class="row">
        @if(Session::get('success'))
        <div class="alert alert-info ml-lg-auto" id="hide" style="width: 300px; margin-right: 118px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('success')}}!</strong>
        </div>
        @endif
        <div class="col-xl-10 offset-xl-1">
            <div class="row">
                <div class="col-xl-2">
                    <form>
                        @csrf
                        <select class="form-control" name="sort" id="sort">
                            <option>---Lọc---</option>
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

        <div class="col-xl-10 offset-xl-1" style="margin-top: 20px">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-3 col-sm-3" scope="col">#</th>
                        <th class="col-3 col-sm-3" scope="col">Name</th>
                        <th class="col-3 col-sm-3" scope="col">Code_Color</th>
                        <th class="col-3 col-sm-3"></th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($Color as $value)
                    <tr>
                        <th scope="row">{{$loop -> index +1}}</th>
                        <td>{{$value -> name}}</td>
                        <td style="background: {{$value -> code_color}};color:white;border-radius: 10px;">{{$value -> code_color}}</td>
                        <td style="text-align: right" class="col-3 col-sm-3"> 
                            <a href="{{route('editColor',$value->id)}}" class="btn btn-success">Sửa</a>
                            <a href="{{route('deleteColor',$value->id)}}" onclick="return confirm('Liên Quan Khóa Ngoại. Bạn Có Chắc Muốn Xóa Không?')" id="delete" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
            <div class="col-xl-6 offset-xl-3">
                <div class="pagination" style="margin-left: 80px;">
                    @if (ceil($Color->total()/8)>1)
                        <a href="#">«</a>
                        @for($i=1;$i<=ceil($Color->total()/8);$i++)
                            <a class="page-item {{($i == $Color->currentPage())?'active':''}}" href="?page={{$i}}">{{$i}}</a>
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