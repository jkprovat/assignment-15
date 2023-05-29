<form action="{{route('contact.submit')}}" method="POST">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="message">Message:</label>
    <textarea name="message" id="message" cols="30" rows="10" required></textarea>

    <button type="submit">Submit</button>
</form>

