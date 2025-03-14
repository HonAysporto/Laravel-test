<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user_sign_up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
   
        <div class="mx-auto col-6 shadow p-5 my-3">
            <h3 class="text-center text-secondary">Sign up</h3>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname">
                    @if (session('errors')!=null)
                        <div class="text-danger">{{session('errors')->first('fullname')}}</div>
                    @endif
                </div>

                <div class="form-group mb-2">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email">
                    @if (session('errors')!=null)
                    <div class="text-danger">{{session('errors')->first('email')}}</div>
                @endif
                </div>

                <div class="form-group mb-2">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number">
                    @if (session('errors')!=null)
                    <div class="text-danger">{{session('errors')->first('phone_number')}}</div>
                @endif
                </div>

                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                    @if (session('errors')!=null)
                    <div class="text-danger">{{session('errors')->first('password')}}</div>
                @endif
                </div>

                <div class="form-group mb-2  ms-auto">
                    <button class="btn btn-md bg-dark text-light px-3"> Register </button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>