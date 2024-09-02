@extends('layouts.app')

@section('content')
<div class="container" x-data="{ search: '', users: [], showDropdown: false }">
    <h2>Ajouter/Modifier un Matériel</h2>
    <form action="{{ route('materiel.store') }}" method="POST">
        @csrf
        <!-- Autres champs de formulaire pour les détails du matériel -->

        <!-- Champ de recherche pour l'UID LDAP -->
        <div class="form-group relative">
            <label for="usager">Usager (UID LDAP)</label>
            <input type="text" id="usager" name="usager" class="form-control" placeholder="Rechercher un usager..."
                   x-model="search"
                   @input.debounce.500ms="fetchUsers"
                   @focus="showDropdown = true"
                   @click.away="showDropdown = false">

            <!-- Liste déroulante dynamique -->
            <ul x-show="showDropdown && users.length > 0" class="list-group" style="position: absolute; z-index: 1000; width: 100%;">
                <template x-for="user in users" :key="user">
                    <li @click="selectUser(user)" class="list-group-item" x-text="user"></li>
                </template>
            </ul>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

<script>
    function fetchUsers() {
        fetch('/fetch-ldap-users?search=' + this.search)
            .then(response => response.json())
            .then(data => {
                this.users = data;
            });
    }

    function selectUser(user) {
        this.search = user;
        this.showDropdown = false;
    }
</script>
@endsection
