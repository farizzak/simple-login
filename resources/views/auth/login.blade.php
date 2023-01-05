<!doctype html>
<html lang="en">



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>Login</title>
</head>
 
<body style="background-color:#3F4E4F">
    <div class="row justify-content-center align-items-center h-100" style="margin-top: 10px">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <main class="form-registration">
            <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    
      <div class="card bg-dark text-white" style="border-radius: 2rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-0 mt-md-0 pb-0">

            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
            <p class="text-white-50 mb-5"><b>Please enter your login and password!</b></p>
                
            <form action="/login" method="POST">
                    @csrf
                  
                    <div class="form-outline form-white mb-4">
                        <input type="email" class="form-control form-control-lg"name="email" id="email" required
                            value="{{ old('email') }}" placeholder="Email">
                        <label for="email"></label>
                   
       
                    <div class="form-outline form-white mb-4">
                        <input type="password" class="form-control form-control-lg" name="password" id="password" required
                            placeholder="Password">
                        <label for="password"></label>
                    
                    </div>
                 
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </form>
                <small class="d-block mt-3">Doesn't have an account? <a class="text-danger 50 fw-bold" href="/register">
                        Register Now!</a></small>
            </main>

    
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
 
</html>

   