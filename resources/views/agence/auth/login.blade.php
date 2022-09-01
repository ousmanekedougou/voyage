
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="shortcut icon" href="{{asset('admin/assets/images/bus.svg')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('user/assets/css/login2.css') }}" />
  <title>TouCki|Connexion</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="{{ route('agence.agence.login') }}" method="post" class="sign-in-form">
          @csrf
          <h2 class="title">Compte Agence</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="username" placeholder="Entrez votre adresse email" />
          </div>
           <p style="width: 70%;font-size:11px;color:red;">
              @error('email')
                <span class="invalid-feedback" role="alert" style="width: 100%;">
                    {{ $message }}
                </span>
            @enderror
           </p>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Entrez votre mot de passe" aria-label="Password" aria-describedby="password-addon" />
          </div>
            @error('password')
              <p style="width: 70%;font-size:11px;color:red;">
                <span class="invalid-feedback" role="alert" >
                  {{ $message }}
              </span>
              </p>
            @enderror
          <input type="submit" value="Connexion" name="signin" class="btn solid"/>
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px;"><a href="{{ route('agence.password.reset') }}" style="color: #4590ef;"> <i style="text-decoration: underline;margin-right:4px;" class="fas fa-unlock"></i> Mot de passe oublié? </a></p>
        </form>

        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Full Name" name="signup_full_name" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="signup_email" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="signup_password" value="" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="signup_cpassword" value="" required />
          </div>
          <input type="submit" class="btn" name="signup" value="Sign up" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>TouCki cii Sénégal</h3>
          <p>
            Nous sommes convaincus que le digital est un facteur de croissance et de survie pour toutes entreprises quels que soient la taille et le secteur, c’est pourquoi nous nous engageons à vous accompagner à maximiser votre performance et vos résultats grâce à la digitalisation. 
          </p>
          <!-- <button class="btn transparent" id="sign-up-btn">
            Creer un compte agence
          </button> -->
        </div>
        <img src="{{asset('admin/assets/images/bus.svg')}}" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="{{asset('user/assets/images/register.svg')}}" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="{{asset('user/assets/js/pages/login2.js')}}"></script>
  <script src="app.js"></script>
</body>

</html>