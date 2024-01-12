<form action="{{ route('login-post') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email</label>
        <input class="mb-3 form-control" id="email" type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input class="mb-3 form-control" id="password" type="password" name="password" required>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Masuk</button>
    </div>
</form>
