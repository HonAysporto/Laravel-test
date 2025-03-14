<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
   
        <div class="mx-auto col-6 shadow p-5 my-3">
            <h3 class="text-center text-secondary">Login in</h3>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group mb-2">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email">
                    @if (session('errors')!=null)
                    <div class="text-danger">{{session('errors')->first('email')}}</div>
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
                    <button class="btn btn-md bg-dark text-light px-3"> login</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>