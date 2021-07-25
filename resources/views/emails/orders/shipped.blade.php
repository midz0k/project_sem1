<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <div class="container">
      <h4>Cảm Ơn Qúy Khách Đã Đặt Hàng!</h4>
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th class="col-md-3 col-xl-2" scope="col">STT</th>
              <th class="col-md-3 col-xl-4" scope="col">Tên Sản Phẩm</th>
              <th class="col-md-3 col-xl-3" scope="col">Số Lượng</th>
              <th class="col-md-3 col-xl-3" scope="col">Giá Tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Cart->content() as $value)
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                <td scope="row">{{$value['name']}}</td>
                <td scope="row">{{$value['quantity']}}</td>
                <th scope="col">{{$value['price']}}</th>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
          <tr>
              <th colspan="3">Tổng Tiền</th>
              <th>{{$Cart->get_Total_price()}}.000đ</th>
          </tr>
      </tfoot>
      </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>