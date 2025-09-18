<form action="{{ url('brands') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <button type="submit">Create Brand</button>
</form>