<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Products</h1>
        <form action="{{route('products')}}" method="get">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Search</label>
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type something">
            </div>
            <div class="mb-3">
                <div class="form-label">Choose category</div>
                <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category->id) selected @endif @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="row mt-5">
            @foreach($products as $product)
                <div class="col-lg-4">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{mb_substr($product->description, 0 , 100)}}...</p>
                            <div class="btn btn-primary">{{$product->category['name']}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$products->withQueryString()->links('vendor.pagination.bootstrap-4')}}
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
