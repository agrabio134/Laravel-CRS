<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#logout-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Redirect or perform any other operation after successful logout
                        window.location.href = '/';
                    },
                    error: function(xhr) {
                        // Handle logout error
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
