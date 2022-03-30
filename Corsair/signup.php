<div class="Modal js-modal-signup">
    <div class="Modal-container">
            <div class="Modal-close js-close-signup">
                <ion-icon name="close"></ion-icon>
            </div>
            <header class="Modal-header">
                <h3>Đăng ký</h3>
            </header>
            <div class="Modal-body">
                <form method="post" action="handle_signup.php" id="register">
                       <div class="mb-3 form-group">
                          
                          <input type="text" name="name" rules="required" class="form-control" id="exampleFormControlInput1" placeholder="Name *">
                          <span class="form-message"></span>
                        </div>
                        <div class="mb-3 form-group">
                          
                            <input type="email" name="email" rules="required|email" class="form-control" id="exampleFormControlInput1" placeholder="Email *">
                            <span class="form-message "></span>
                        </div>
                        <div class="mb-3 form-group">
                          
                            <input type="password" name="password" rules="required|min:6" class="form-control" id="exampleFormControlInput1" placeholder="Password *">
                            <span class="form-message"></span>
                        </div>
                        <div class="mb-3 form-group">
                          
                          <input type="text" name="phone_number" rules="required|phone" class="form-control" id="exampleFormControlInput1" placeholder="Phonenumber *">
                          <span class="form-message"></span>
                        </div>
                        <div class="mb-3 form-group">
                          
                          <input type="text" name="address" rules="required" class="form-control" id="exampleFormControlInput1" placeholder="Address *">
                          <span class="form-message"></span>
                        </div>

                        <div class="footer-form">
                            <button class="btn-submit" type="submit">Đăng ký</button>
                            <div class="go-signin  js-go-signin">Bạn đã có tài khoản ?</div>
                        </div>
                        
                </form>


            </div>
          
    </div>
</div>
<script src="./js/validate.js"></script>
<script>
 
    
    Validator('#register')

</script>