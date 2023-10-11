<x-mail::message>
    # Nouvelle demande de contact

    Une nouvelle demande de contact a été envoyée.
    - Prénom : {{ $data['firstname'] }}
    - Nom : {{ $data['lastname'] }}
    - Téléphone : {{ $data['phone'] }}
    - Email : {{ $data['email'] }}

    **Message :**<br/>
    {{ $data['message'] }}
</x-mail::message>


