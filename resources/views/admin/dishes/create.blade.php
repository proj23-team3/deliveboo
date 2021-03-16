<h1>Crea Il tuo Piatto</h1>

<div class="container">
    <form  method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="dish_name" class="col-sm-1-12 col-form-label"></label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control"  name="dish_name" id="dish_name" placeholder="Dish Name">
            </div>
        </div>
        <div class="form-group row">
            
            <label for="dish_ingredients" class="col-sm-1-12 col-form-label"></label>
            <div class="col-sm-1-12">
                <textarea name="dish_ingredients" id="dish_ingredients" cols="30" rows="10" placeholder="Dish Ingredients"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="dish_price" class="col-sm-1-12 col-form-label"></label>
            <div class="col-sm-1-12">
                <input type="number" step=".01 " class="form-control" name="dish_price" id="dish_price" placeholder="Dish Price">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-check">
                <label class="form-check-label" for="is_visible">
                <input type="radio" class="form-check-input" name="is_visible" id="is_visible" value="1" checked>
                Visible
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="is_invisible">
                <input type="radio" class="form-check-input" name="is_visible" id="is_invisible" value="1">
                Invisible
                </label>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="dish_image"
                class="col-md-4 col-form-label text-md-right">{{ __('An image of your restaurant') }}</label>

            <div class="col-md-6">
                <input type="file" name="dish_image" id="dish_image" class="form-control-file">
            </div>
        </div>
        <button type="submit"> Create Dish</button>
    </form>
</div>