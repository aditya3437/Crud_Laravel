<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="bg-dark py-3">
    <h3 class="text-white text-center">Crud Laravel</h3>
  </div>
  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="col-md-10 d-flex justify-content-end">
        <a href="{{route('products.create')}}" class="btn btn-dark">Create</a>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      @if(Session::has('success'))
      <div class="col-md-10">
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
      @endif
      <div class="col-md-10">
        <div class="card border-0 shadow-lg my-4">
          <div class="card-header bg-primary text-white">
            <h3 class="text-white">Products</h3>
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <td>ID</td>
                <td>Image</td>
                <td>Name</td>
                <td>Sku</td>
                <td>Price</td>
                <td>Created at</td>
                <td>Action</td>
              </tr>
              @if($products->isNotEmpty())
              @foreach($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>
                  @if(!empty($product->image))
                  <img width="50" src="{{ asset('uploads/products/' . $product->image) }}" alt="">
                  @endif
                </td>
                <td>{{$product->name}}</td>
                <td>{{$product->sku}}</td>
                <td>{{$product->price}}</td>
                <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d-m-Y') }}</td>
                <td>
                  <a href="{{route('products.edit',$product->id)}}" class="btn btn-dark">Edit</a>
                  <form action="{{route('products.destroy', $product->id)}}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>