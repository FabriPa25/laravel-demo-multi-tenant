<x-layout>
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h5 class="text-center">Login</h6>
        </div>    
    </div>
</div>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4">



        <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
               
                <div class="mb-3">
                    <a href="{{ route('register') }}">Non sei registrato? Clicca qui</a>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    
    </div>
    </div>
</div>



</x-layout>