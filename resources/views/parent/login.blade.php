<div>
    <div>
        <h2>Sign In</h2>
        <div>A few more clicks to sign in to your account. Follow your children's progress from home</div>
        <div class="intro-x mt-8">
            <form id="login-form" method="post" action="{{route('login')}}">
                @csrf
                <div>
                    <input name="email" type="text" placeholder="Email" value="parent@smart.com">

                </div>
                <input name="password" type="password" placeholder="Password" value="chouaibe">
                <hr>
                <button type="submit">Register</button>
            </form>
        </div>

    </div>
</div>
