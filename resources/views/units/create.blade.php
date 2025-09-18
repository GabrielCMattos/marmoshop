<form action="{{ url('categories') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <button type="submit">Create Category</button>
</form>