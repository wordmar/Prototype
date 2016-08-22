<h1>
    Laravel 5 Login
</h1>

<form method="post" action="/login">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <fieldset>
        <label for="name">Name</label>
        <div>
            <select id="name" name="name">
                <option value="john">john</option>
                <option value="admin">admin</option>
                <option value="mary">mary</option>
            </select>
        </div>
        <label for="password">Password</label>
        <div>
            <input type="password" id="password" name="password" value="secret">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </fieldset>
</form>