<div class="container mt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div class="login-box">
                <div class="login-logo">
                  <a href=""><b><img src="{{asset('backend/assets/dist/img/AdminLTELogo.png')}}" width="50"></a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in Admin</p>
                    <form action="{{ route('login') }}" method="POST" name="form"onsubmit=" return SubmitLogin()">
                      @csrf
                      <div class="input-group mb-3">
                        <input type="email" name="email" placeholder="Enter Email"class="form-control">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Enter Password"class="form-control">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <button onclick="Login()" type="submit" class="btn btn-primary ">Sign In</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
  <!-- /.login-box -->

<script>
    async function Login() {
        let email = document.getElementById('email').value;
        let pass = document.getElementById('password').value;
        if (email.length === 0) {
            alert("Email Required!");
        } if (pass.length === 0) {
            alert("Password Required!");
        }
        else {
            // showLoader();
        let res = await axios.post("/api/user-login",{email:email,password:pass});
        // hideLoader();
        if(res.status===200 && res.data['status']==='success'){
            successToast('Login successfully !');
            window.location.href="/dashboard";
            
        }else{
            errorToast(res.data['message']);
            // alert('dddd');
        }

        }

    }
</script>