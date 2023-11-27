 <!-- /.login-box -->
  <div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{URL('/')}}" class="link">home</a></li>
    <li class="item-link"><span>login</span></li>
  </ul>
</div>
<div class="row">
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
    <div class=" main-content-area">
      <div class="wrap-login-item ">						
        <div class="login-form form-item form-stl">
            <form action="{{ route('login') }}" method="POST" name="form"onsubmit=" return SubmitLogin()"name="frm-login">
              @csrf
            <fieldset class="wrap-title">
              <h3 class="form-title">Log in to your account</h3>										
            </fieldset>
            <fieldset class="wrap-input">
              <label for="frm-login-uname">Email Address:</label>
              <input type="text" id="frm-login-uname" name="email" placeholder="Type your email address">
            </fieldset>
            <fieldset class="wrap-input">
              <label for="frm-login-pass">Password:</label>
              <input type="password" id="frm-login-pass" name="password" placeholder="************">
            </fieldset>
            
            <fieldset class="wrap-input">
              <label class="remember-field">
                <input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
              </label>
              <a class="link-function left-position" href="#" title="Forgotten password?">Forgotten password?</a>
            </fieldset>
            <input type="submit" onclick="Login()"class="btn btn-submit" value="Login" name="submit">
          </form>
        </div>												
      </div>
    </div><!--end main products area-->		
  </div>
</div><!--end row-->

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