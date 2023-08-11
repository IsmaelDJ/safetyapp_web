<div>
    <form method="POST" class="form-horizontal" action="{{ route('storeUser') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="useremail" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                   value="{{ old('email') }}" name="email" placeholder="Entrez votre adresse email" autofocus required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>Adresse email invalide</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="username" class="form-label">Nom</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" id="username" name="name" autofocus required
                   placeholder="Entrez votre nom">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>Nom invalid</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="userpassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                   placeholder="Enter un mot de passe" autofocus required>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>Mot de passe invalide</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="confirmpassword" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword"
                   name="password_confirmation" placeholder="Repetez le mot de passe" autofocus required>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                            <strong>Mot de passe invalide</strong>
                        </span>
            @enderror
        </div>
        <div class="mb-2">
            <label class="form-label">Rôle</label>
            <select
                wire:model='role'
                class="form-select form-select-lg @error('role') is-invalid @enderror"
                name="role">
                <option value="" selected>Selectionnez un role</option>
                    <option value="admin">Admin</option>
                    <option value="transporteur">Transporteur</option>
                </select>
            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>Role non selectionnée</strong>
            </span>
            @enderror
        </div>
        @if ($isCarrier)
        <div class="mb-3">
            <label for="phone" class="form-label">Numéro de téléphone</label>
            <input required 
            type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror"
                   value="{{old('phone')}}"
                   id="phone" name="phone" placeholder="Entrez le numéro de téléphone du sous-traitant">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>Nom invalid</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input required type="text" class="form-control form-control-lg @error('address') is-invalid @enderror"
                   value="{{old('address')}}"
                   id="address" name="address" placeholder="Entrez l'adresse du sous-traitant">
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>Nom invalid</strong>
            </span>
            @enderror
        </div>
        @endif
        <div class="mb-2">
            <label for="avatar">Photo de profile</label>
            <div class="input-group">
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02" name="avatar" autofocus required>
                <label class="input-group-text" for="inputGroupFile02">Téléverser</label>
            </div>
            @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mt-4 d-grid">
            <button class="btn btn-primary waves-effect waves-light"
                    type="submit">Créer</button>
        </div>
    </form> 
</div>
