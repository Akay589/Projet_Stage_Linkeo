<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Test</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Testez le Chatbot</h2>
        <form id="chatbotForm">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Entrez votre message</label>
                <input type="text" id="message" class="form-control" placeholder="Entrez 'Bonjour' ou 'de quoi s'agit cet app ?'">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

        <div class="mt-4">
            <h5>Réponse du bot :</h5>
            <p id="botResponse"></p>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <script>
            $(document).ready(function() {
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $('#chatbotForm').on('submit', function(event) {
                    event.preventDefault();

                    const message = $('#message').val();

                    $.ajax({
                        url: '/botman',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        data: { message: message },
                        success: function(response) {
                            // Affiche un message de succès si la réponse est bien envoyée
                            if (response.success) {
                                $('#botResponse').text('Message bien reçu. Le bot a répondu.');
                            } else {
                                $('#botResponse').text('Le bot n\'a pas répondu.');
                            }
                        },
                        error: function() {
                            $('#botResponse').text('Erreur de communication avec le chatbot.');
                        }
                    });
                });
            });



    </script>

</body>
</html>
