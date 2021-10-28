 <div class="search-box me-2 mb-2 d-inline-block">
    <div class="position-relative">
            <form id="searchClients"  action=" {{ route('admin.client.create') }} ">
                <input  type="text" id="search" class="form-control @error('search') is-invalid @enderror" name="search"  required autocomplete="search" value="{{ request()->search ?? old('search') }}" placeholder="Rechercher un client">
                @error('search')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </form>
            <a onclick="event.preventDefault();document.getElementById('searchClients').submit();">
                <i class="bx bx-search-alt search-icon"></i>
            </a>
    </div>
</div>