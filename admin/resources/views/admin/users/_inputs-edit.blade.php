<!-- Name -->
<div class="col-md-6 col-sm-12">
    <div class="form-group">
        <label for="name">Nome*</label>
        <input type="text"
            class="form-control @error('name') is-invalid  @enderror"
            name="name" id="name"
            placeholder="Digite o nome"
            value="{{ old('name', $user->name) }}">

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
            value="{{ old('email', $user->email) }}" disabled>

        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
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
            value="{{ old('cpf', $user->cpf) }}">

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
            value="{{ old('rg', $user->rg) }}">

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
            value="{{ $user->birth_date ? old('birth_date', $user->birth_date->format('d/m/Y') ) : '' }}">

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
            value="{{ old('phone', $user->phone) }}">

        @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Gender -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="gender">Sexo</label>
        <select class="select2 form-control select2-hidden-accessible" name="gender" style="width: 100%;">
            @foreach($genders as $gender)
                <option value="{{$gender->id}}" @if($user->gender_id == $gender->id) selected @endif>
                    {{ $gender->name }}
                </option>
            @endforeach
        </select>

        @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>


<!-- ==== Address ==== -->

<!-- Street -->
<div class="col-md-3 col-sm-12">
    <div class="form-group">
        <label for="street">Rua*</label>
        <input type="text"
            class="form-control @error('street') is-invalid  @enderror"
            name="street" id="street"
            placeholder="Digite a rua"
            value="{{ old('street', $user->addresses()->first()->street)}}">

        @error('street') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Number -->
<div class="col-md-2 col-sm-12">
    <div class="form-group">
        <label for="number">Número*</label>
        <input type="text"
            class="form-control @error('number') is-invalid  @enderror"
            name="number" id="number"
            placeholder="Digite o número"
            value="{{ old('number', $user->addresses()->first()->number) }}">

        @error('number') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- District -->
<div class="col-md-2 col-sm-12">
    <div class="form-group">
        <label for="district">Bairro*</label>
        <input type="text"
            class="form-control @error('district') is-invalid  @enderror"
            name="district" id="district"
            placeholder="Digite o bairro"
            value="{{ old('district', $user->addresses()->first()->district) }}">

        @error('district') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Complement -->
<div class="col-md-2 col-sm-12">
    <div class="form-group">
        <label for="complement">Complemento</label>
        <input type="text"
            class="form-control @error('complement') is-invalid  @enderror"
            name="complement" id="complement"
            placeholder="Digite o complemento"
            value="{{ old('complement', $user->addresses()->first()->complement) }}">

        @error('complement') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- City -->
<div class="col-md-2 col-sm-12">
    <div class="form-group">
        <label for="city">Cidade*</label>
        <input type="text"
            class="form-control @error('city') is-invalid  @enderror"
            name="city" id="city"
            placeholder="Digite a cidade"
            value="{{ old('city', $user->addresses()->first()->city) }}">

        @error('city') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- State -->
<div class="col-md-2 col-sm-12">
    <div class="form-group">
        <label for="state">Estado*</label>
        <input type="text"
            class="form-control @error('state') is-invalid  @enderror"
            name="state" id="state"
            placeholder="Digite o estado"
            value="{{ old('state', $user->addresses()->first()->state) }}">

        @error('state') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Country -->
<div class="col-md-2 col-sm-12">
    <div class="form-group">
        <label for="country">País*</label>
        <input type="text"
            class="form-control @error('country') is-invalid  @enderror"
            name="country" id="country"
            placeholder="Digite o país"
            value="{{ old('country', $user->addresses()->first()->country) }}">

        @error('country') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Cep -->
<div class="col-md-2 col-sm-12">
    <div class="form-group">
        <label for="cep">CEP*</label>
        <input type="text"
            class="form-control @error('cep') is-invalid  @enderror cep"
            name="cep" id="cep"
            placeholder="Digite o CEP"
            value="{{ old('cep', $user->addresses()->first()->cep) }}">

        @error('cep') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
</div>
