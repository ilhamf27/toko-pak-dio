<x-layout>
    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 500px">
        <div class="card-header text-center">
            Toko Pak Dio
        </div>
        <div class="card-body">
            <form action="/" method="POST">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
                    <label for="floatingInput">Email</label>
                </div>
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                <div class="d-flex flex-column">
                    <button class="btn btn-primary block mt-4" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
