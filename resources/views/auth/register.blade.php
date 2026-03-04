<x-layout>
  


            <h1 class="text-center">Register</h1>
 



                  <div class="container mt-5">
                      <div class="row d-flex justify-content-center">
                          <div class="col-6 mt-5">
                          <form action="{{ route('register') }}" method="POST">
                                @csrf

                        <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                    
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"  required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                          </div>
                      </div>
                  </div>




  







</x-layout>