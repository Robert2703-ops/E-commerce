<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/crud-products.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
    <div class="body">
        <div class="flex-content">
            <div class="main-content">

                <div class="logout">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="logout">
                    </form>
                </div>

                <div class="products">
                    @if ( isset($products) )
                        <table cellpadding="3" cellspacing="10">
                            <thead>
                                <tr>
                                    <th> <h2>Id</h2> </th>
                                    <th> <h2>Name</h2> </th>
                                    <th> <h2>Price</h2> </th>
                                    <th> <h2>Category</h2> </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <th> {{ $item['id'] }} </th>
                                        <th> {{ $item['name'] }} </th>
                                        <th> {{ $item['price'] }} </th>
                                        <th> {{ $item['category'] }} </th>
                                        <th>
                                            <div class="product-options">
                                                <div class="option change-product">
                                                    <button type="button" value="{{ $item['id'] }}" onclick="validationFields('change')"><i class="fas fa-pencil-alt"></i></button>
                                                </div> 
                                                <div class="option delete-product">
                                                    <form action="{{ route('delete-product', $item['id']) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                    
                                                        <div class="delete">
                                                            <button type="button"><i class="fas fa-trash-alt"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <div class="create-product">
                        <button type="button" onclick="validationFields( 'create' )" class="submit"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            
                <div>
                    @if (session()->has('message'))
                        <ul>
                            <li>{{ session()->get('message') }}</li>
                        </ul>
                    @endif
                </div> 
            </div>
        </div>
    </div>

    <!-- modal create product  -->
    <div id="modal-create-product" class="modal-container">
        <div class="modal">
            <button type="button" class="close"><i class="fas fa-times"></i></button>

            <h1>Create Product</h1>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach    
                </ul>      
            @endif

            <form action="{{ route('create-product') }}" method="post" class="modal-product modal-create-product">
                @csrf
        
                <div class="form-input"> 
                    <div>
                        <label class="form-label">Product name: </label>
                        <input type="text" name="name" class="input-info input">
                    </div>
                    <div class="span">
                        <span class="error-message"> this field need, at least, 4 characters! </span>
                    </div>
                </div>
                
                <div class="form-input-radio">
                    <label class="form-label">Product category: </label>
                    <div class="input-radio">
                        <div>
                            <input type="radio" name="category" value="smartphone" checked id="">
                            <label for="">Smartphone</label>
                        </div>
                        <div>
                            <input type="radio" name="category" value="PC" id="">
                            <label for="">PC</label>
                        </div>
                        <div>
                            <input type="radio" name="category" value="peripherals" id="">
                            <label for="">Peripherals</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-input">
                    <div>
                        <label class="form-label">Product price: </label>
                        <input type="number" name="price" value="0" class="input-info input">
                    </div>
                    <div class="span"> 
                        <span class="error-message"> This field can´t be under 1! </span>
                    </div>
                </div>
                
                <div class="submit-button">
                    <button type="button" class="interact-buttons input-submit submit" value="create">create</button>
                </div>

            </form>

        </div>
    </div>

    <!-- modal change product  -->
    <div id="modal-change-product" class="modal-container">
        <div class="modal">
            <button type="button" class="close"><i class="fas fa-times"></i></button>

            <h1>Change Product</h1>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach    
                </ul>      
            @endif

            <form action="{{ route('change-product', 8) }}" method="post" class="modal-product modal-change-product">
                @csrf
                @method('PUT')
        
                <div class="form-input">
                    <div>
                        <label class="form-label">Product new name: </label>
                        <input type="text" name="name" id="name" class="input-info input">
                    </div>
                    <div class="span">
                        <span class="error-message"> this field need, at least, 4 characters! </span>
                    </div>
                </div>
                
                <div class="form-input-radio">
                    <label class="form-label">Product new category: </label>
                    <div class="input-radio">
                        <div>
                            <input type="radio" name="category" value="smartphone" class="category">
                            <label for="">Smartphone</label>
                        </div>
                        <div>
                            <input type="radio" name="category" value="PC" class="category">
                            <label for="">PC</label>
                        </div>
                        <div>
                            <input type="radio" name="category" value="peripherals" class="category">
                            <label for="">Peripherals</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-input">
                    <div>
                        <label class="form-label">Product new price: </label>
                        <input type="number" name="price" value="0" id="price" class="input-info input">
                    </div>
                    <div class="span"> 
                        <span class="error-message"> This field can´t be under 1! </span>
                    </div>
                </div>

                <div class="submit-button">
                    <button type="button" class="interact-buttons input-submit submit" value="create">change</button>
                </div>

            </form>

        </div>
    </div>

    <!-- delete product modal -->
    <div id="modal-delete-product" class="modal-container">
        <div class="modal">
            <button type="button" class="close"><i class="fas fa-times"></i></button>
            
            <div class="options modal-product">
                <p> You sure want to delete this product?</p>
                <div class="delete-options">
                    <div>
                        <button type="button" id="delete">delete</button>
                    </div>
                    <div>
                        <button type="button" id="cancel">cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/create-product.js"></script>
</body>
</html>