<div class="regContainer">
    <div class="login_logo_container">
        <p id="logo">MoveIT. Регистрация</p>
    </div>
    <div class="login_form_container">
        <form action="/main" method="POST" class="reg_form">
            <label for="newUserInput">Введите свое имя:</label>
            <input type="text" class="regInput" name="newUser" id="newUserInput">
            <label for="newLoginInput">Введите логин:</label>
            <input type="text" class="regInput" name="newLogin" id="newLoginInput">
            <label for="newPasswordInput">Введите пароль:</label>
            <input type="password" class="regInput" name="newUserPwd" id="newUserPassword">
            <input type="submit" class="submitButton" value="Зарегистрироваться">
            <br>
            <a class="regLink" href="/main">Выйти</a>
        </form>
    </div>
</div>