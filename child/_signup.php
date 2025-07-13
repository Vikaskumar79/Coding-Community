<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupModalLabel">Sign Up for iConnect Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/forums/child/_handlesignup.php" method="post">
        <div class="modal-body">
        <div class="mb-3">
            <label for="First Name" class="form-label">Full Name</label>
            <input type="text " class="form-control" id="firstname"  name="firstname" placeholder="Enter your  name" required >
          </div>
          
          <div class="mb-3">
            <label for="Mobile Number" class="form-label">Mobile Number</label>
            <input type="Mobile Number" class="form-control" id="number" name="number" placeholder="Enter your mobile number" required >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"required >We'll never share your email with anyone.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass">
          </div>
         
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>