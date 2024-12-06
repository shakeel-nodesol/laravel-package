<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Category with Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

{{--@if(session('errors'))--}}
{{--    @dd(session('errors'))--}}
{{--@endif--}}

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{ url('categories/store') }}">
                @csrf
                <div class="form-group mt-4">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" name="name" value="{{ old('name')  }}">
                    @error('name')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <input type="text" class="form-control @error('product.name') is-invalid @enderror" placeholder="Product Name" name="product[name]" value="{{old('product.name')}}">
                    @error('product.name')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <input type="text" class="form-control @error('product.description') is-invalid @enderror" placeholder="Product Description" name="product[description]">
                    @error('product.description')
                    <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
