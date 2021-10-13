<?if($auth):?>
    <div class="container">
        <?=$header?>
        <?=$sidebarMenu?>
        <?=$mainblock?>
        <?=$footer?>
    </div>
<?else:?>
    <div class="login_container">
        <div class="login_logo_container">
            <p id="logo">MoveIT</p>
            
        </div>
        <h3><?=$message?></h3>
        <div class="login_form_container">
            <form action="/main" method="post" class="login_form">
                <label for="login_input">Login</label> <input type="text" class="login_input" id="login_input" name="login">
                <label for="pass_input">Password</label> <input type="password" class="login_input" id="pass_input" name="pass">
                Remember Me <input type="checkbox" name="save"> 
                <input type="submit" class="submitButton" value="Sign in">
                <br>
                <a class="regLink" href="/registration">Registration</a>               
            </form>
        </div>
    </div>
<?endif;?>