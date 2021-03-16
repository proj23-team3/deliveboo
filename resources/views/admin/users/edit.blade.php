
<h1>Edit Restaurant</h1>

<h3>{{$user->name}}</h3>
<h3>{{$user->email}}</h3>
<h3>{{$user->address}}</h3>
<h3>{{$user->vat_number}}</h3>
<h3>{{$user->shipping_costs}}</h3>
<img src="{{str_contains($user->cover,'cover') ? asset('storage/' . $user->cover) : asset('img/default_restaurant.svg')  }}" alt="" width="300">

<form action="{{route('admin.users.update',['user' => $user->id])}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="cover"
            class="col-md-4 col-form-label text-md-right">{{ __('An image of your restaurant') }}</label>

        <div class="col-md-6">
            <input type="file" name="cover" id="cover" class="form-control-file">
        </div>
    </div>
    <button type="submit"> invia cambiamento</button>
</form>