<h1>Index of all Dishes</h1>
@foreach ($dishes as $dish)
<h3>{{$dish->dish_name}}</h3>
<h3>{{$dish->dish_ingredients}}</h3>
<h3>{{$dish->dish_price}}</h3>
<img src="{{str_contains($dish->dish_image,'dishes') ? asset('storage/' . $dish->dish_image ) : asset('img/default_dish.svg')}}" width="250" alt="">
<a href="{{route('admin.dishes.edit',['dish'=> $dish->id])}}" class="btn btn-primary">Edit</a>
@endforeach

