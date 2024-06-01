<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
      <h3 class="text-white text-center">Edit Product</h3>
    </div>
    <div class="container">
      <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
          <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card border-0 shadow-lg my-3">
            <div class="card-header">
              <h3>Edit Product</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="mb-3">
                  <label for="">Name</label>
                  <input type="text" class="form-control form-control-lg" placeholder="Name" name="name" value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                  <label for="">Sku</label>
                  <input type="text" class="form-control form-control-lg" placeholder="Sku" name="sku" value="{{ $product->sku }}">
                </div>
                <div class="mb-3">
                  <label for="">Price</label>
                  <input type="text" class="form-control form-control-lg" placeholder="Price" name="price" value="{{ $product->price }}">
                </div>
                <div class="mb-3">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" cols="30" rows="5">{{ $product->description }}</textarea>
                </div>
                <div class="mb-3">
                  <label for="">Image</label>
                  <input type="file" class="form-control form-control-lg" name="image">
                  @if(!empty($product->image))
                    <img class="w-25 my-2" src="{{ asset('uploads/products/' . $product->image) }}" alt="">
                  @endif
                </div>
                <div class="mb-3">
                  <button class="btn btn-lg btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
