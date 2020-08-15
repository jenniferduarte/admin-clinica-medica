<!-- Name -->
<div class="col-md-6 col-sm-12">
    <div class="form-group">
        <label for="name">Nome*</label>
        <input type="text" 
            class="form-control @error('name') is-invalid  @enderror" 
            name="name" id="name" 
            placeholder="Digite o nome" 
            value="{{ old('name') }}">

            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Email -->
<div class="col-md-6 col-sm-12">
    <div class="form-group">
        <label for="email">Email*</label>
        <input type="email" 
            class="form-control @error('email')) is-invalid  @enderror" 
            name="email" id="email" 
            placeholder="Digite o email" 
            value="{{ old('email') }}">

        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Password -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="password">Senha*</label>
        <input type="password" 
            class="form-control @error('password') is-invalid  @endif" 
            name="password" id="password" 
            placeholder="Digite a senha" 
            value="{{ old('password') }}">

        @error('password') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Password confirmation -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="password-confirm">Confirmação da senha*</label>
        <input type="password" 
            class="form-control @error('password') is-invalid  @enderror" 
            name="password_confirmation" id="password-confirm" 
            placeholder="Digite o senha novamente" 
            autocomplete="new-password"
            value="{{ old('password') }}">

        @error('password') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- CPF -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" 
            class="form-control cpf @error('cpf') is-invalid  @enderror" 
            name="cpf" id="cpf" 
            placeholder="Digite o cpf"
            value="{{ old('cpf') }}">

        @error('cpf') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- RG -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="rg">RG</label>
        <input type="text" 
            class="form-control @error('rg') is-invalid  @enderror" 
            name="rg" id="rg" 
            placeholder="Digite o rg"
            value="{{ old('rg') }}">

        @error('rg') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Birth date -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="birth-date">Data de nascimento</label>
        <input type="text" 
            class="form-control date @error('birth_date') is-invalid  @enderror" 
            name="birth_date" id="birth-date" 
            placeholder="Digite a data de nascimento"
            value="{{ old('birth_date') }}">

        @error('birth_date') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Phone -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="text" 
            class="form-control phone_with_ddd @error('phone') is-invalid  @enderror" 
            name="phone" id="phone" 
            placeholder="Digite o telefone"
            value="{{ old('phone') }}">

        @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Gender -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="gender">Sexo</label>
        <select class="select2 form-control select2-hidden-accessible" name="gender" style="width: 100%;">
            @foreach($genders as $gender)
                <option value="{{$gender->id}}"> {{ $gender->name }}</option>
            @endforeach
        </select>

        @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>