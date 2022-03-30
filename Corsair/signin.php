<div class="Modal js-modal-signin">
    <div class="Modal-container">
            <div class="Modal-close js-close-signin">
                <ion-icon name="close"></ion-icon>
            </div>
            <header class="Modal-header">
                <h3>Đăng Nhập</h3>
            </header>
            <div class="Modal-body">
                <form method="post" action="handle_signin.php" id="login">
                        <div class="mb-3 form-group ">
                    
                            <input type="email" name="email" rules="required|email" class="form-control" id="exampleFormControlInput1" placeholder="Email *">
                            <span class="form-message"></span>
                        </div>
                        <div class="mb-3 form-group">
                          
                            <input type="password" name="password" rules="required|min:6" class="form-control" id="exampleFormControlInput1" placeholder="Password *">
                            <span class="form-message"></span>
                        </div>

                        <div class="footer-form">
                            <button class="btn-submit" type="submit">Đăng nhập</button>
                            <div class="go-signup js-go-signup">Bạn chưa có tài khoản ?</div>
                        </div>
                        
                </form>


            </div>
          
    </div>
</div>
<script src="./js/validate.js"></script>
<script>
    Validator('#login')
</script>