<div class="card card-body">
    <div class="form-group">
        <input type="text" name="{{ $address }}[first_name]" id="{{ $address }}FirstName" placeholder="First Name"
        class="form-control @error($address.'.first_name') is-invalid @enderror" />

        @error($address.'.first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" name="{{ $address }}[last_name]" id="{{ $address }}LastName" placeholder="Last Name"
        class="form-control @error($address.'.last_name') is-invalid @enderror" />

        @error($address.'.last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" name="{{ $address }}[street_address]" id="{{ $address }}StreetAddress" placeholder="Street Address" class="form-control @error($address.'.street_address') is-invalid @enderror" />

        @error($address.'.street_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" name="{{ $address }}[postal_code]" id="{{ $address }}PostalCode" placeholder="Postal Code"
        class="form-control @error($address.'.postal_code') is-invalid @enderror" />

        @error($address.'.postal_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" name="{{ $address }}[city]" id="{{ $address }}City" placeholder="City"
        class="form-control @error($address.'.city') is-invalid @enderror" />

        @error($address.'.city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" name="{{ $address }}[country]" id="{{ $address }}Country" placeholder="Country"
        class="form-control @error($address.'.country') is-invalid @enderror" value="US" />

        @error($address.'.country')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" name="{{ $address }}[phone]" id="{{ $address }}Phone" placeholder="Phone Number"
        class="form-control @error($address.'.phone') is-invalid @enderror" />

        @error($address.'.phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" name="{{ $address }}[email]" id="{{ $address }}Email"  placeholder="example@domain.com"
        class="form-control @error($address.'.email') is-invalid @enderror" />

        @error($address.'.email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>