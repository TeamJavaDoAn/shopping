# Room Demo

## Purpose of this guideline
- This document is the practice demo of the talk in training course for how to step by step to implement a task using Laravel framework.

- For more details about step by step to setup a Laravel project, please refer to [TBD](https://www.google.com.vn/search?ei=mgeaW-TNEoyZ8wW7noiIDQ&q=step+by+step+to+build+a+laravel+project&oq=step+by+step+to+build+a+laravel+project&gs_l=psy-ab.3...40575.41311.0.41830.5.5.0.0.0.0.178.486.0j3.3.0....0...1.1.64.psy-ab..2.0.0....0.v-GAsU8GZ2w)
  
- Before do the following steps, please delete the below files if they are existed:
    - database/migrations/Y_m_d_His_create_rooms_table.php
    - database/factories/RoomFactory.php
    - database/seeds/RoomsTableSeeder.php
    - app/Models/Room.php
    - resources/views/admin/location/rooms/*.blade.php
    - app/Http/Controllers/Admin/Location/RoomController.php
    - Remove all routes related to room in routes/web/php


---
## First step: MVC approaching
---

## Remind
- What is MVC?
- How to appoach with MVC model?

## Refer document
- [Database: Migrations](https://laravel.com/docs/5.7/migrations)
- [Database: Seeding](https://laravel.com/docs/5.7/seeding)
- [View](https://laravel.com/docs/5.7/views)
- [Routing](https://laravel.com/docs/5.7/routing)
- [Controller](https://laravel.com/docs/5.7/controllers)
- [Faker](https://faker.readthedocs.io/en/master/)

## Prepare DB

- Create rooms table
```bash
$ php artisan make:migration create_rooms_table --create=rooms

# It created a migration file likes database/migrations/Y_m_d_His_create_rooms_table.php
```

- Edit migration file
```php
# File: database/migrations/Y_m_d_His_create_rooms_table.php
public function up()
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->increments('id');
        $table->string('code', 32);
        $table->text('description');
        $table->timestamps();
    });
}
```

- Migrate data
```bash
php artisan migrate
```
or in development mode (recommend)
```bash
php artisan migrate:fresh
```


## Create Model and fake data
- Create Model under Models folder
```bash
# Below command will genarate 2 files:
#  1. Model file: app/Models/Room.php
#  2. Factory file: database/factories/RoomFactory.php

php artisan make:model --factory Models/Room
```

- Create some fake data for room
```php
# File: database/factories/RoomFactory.php
<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Room::class, function (Faker $faker) {
    return [
        'code' => $faker->randomNumber(2),
        'description' => $faker->paragraph,
    ];
});
```

- Create a seeder
```bash
# Below command will generate seed file:
#  database/seeds/RoomsTableSeeder.php

php artisan make:seeder RoomsTableSeeder
```

- Generate seed data in seed file
```php
# File: database/seeds/RoomsTableSeeder.php

<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Room::class, 5)->create();
    }
}
```

- Update DatabaseSeeder to include Room Seeder
```php
# File: database/seeds/DatabaseSeeder.php

public function run()
{
    // ...
    $this->call(RoomsTableSeeder::class);
}
```

- Refresh database with seed data
```bash 
$ php artisan migrate:fresh --seed
```


## First test to show room information
- Add a view template to show all rooms
```html
<!-- File: resources/views/admin/location/rooms/index.blade.php -->

<table border="1">
    <thead>
        <th>Id</th>
        <th>Code</th>
        <th>Description</th>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
        <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->code }}</td>
            <td>{{ $room->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
```

- Config routing
```php
# File: routes/web.php

Route::get('/rooms', function () {
    $rooms = \App\Models\Room::all();
    return view('admin/location/room/index', ['rooms' => $rooms]);
});
```

- Access url [*admin/location/rooms*] to see all rooms

## Create Controller
- Create RoomController belongs to Location folder
```bash
# Below command will generate a controller file and populate CRUD actions into it
# Generated file: app/Http/Controllers/Admin/Location/RoomController.php


php artisan make:controller Admin/Location/RoomController --resource --model=Models/Room
```

- Assign the view template to action index
```php
# File: app/Http/Controllers/Admin/Location/RoomController.php

<?php

namespace App\Http\Controllers\Admin\Location;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();

        return view('admin/location/rooms/index')->with('rooms', $rooms);
    }

    // ...
}
```

- Define CRUD routing
```php
#File: routes/web.php

// Note: remove the test route that we defined above
/*
Route::get('/rooms', function () {
    $rooms = \App\Models\Room::all();
    return view('admin/location/rooms/index', ['rooms' => $rooms]);
});
*/

// We group all routers which have the same namespace and prefix, also put them under middleware "auth" to allow only logged-in users access these URLs
Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    // URL prefix by "admin."
    
    Route::namespace('Location')->prefix('location')->group(function () {
        // Controllers Within The "App\Http\Controllers\Admin\Location" Namespace
        // URL prefix by "admin.location."

        Route::resource('rooms', 'RoomController');
    });
});
```

- Access URL: [*/admin/location/rooms*] to test again

---
## Second step: From Model to Repository
---

## Refer document
- [Model - Eloquent ORM](https://laravel.com/docs/5.7/eloquent)
- [Database: Pagination](https://laravel.com/docs/5.7/pagination)
- []()

## Add Paging for Room List
- Using Laravel pagination
```php
# File: app/Http/Controllers/Admin/Location/RoomController.php

    public function index()
    {
        $rooms = Room::paginate(5);

        return view('admin/location/rooms/index')->with('rooms', $rooms);
    }
```

- Appending to pagination links
```html
<!-- File: resources/views/admin/location/rooms/index.blade.php -->

{{ $rooms->links() }}
```

- Access URL: [*/admin/location/rooms*] to test paging

## Add new function to Room Model
- update users table to add room_id
```bash
php artisan make:migration add_room_to_users_table --table=users

# It created a migration file likes database/migrations/Y_m_d_His_add_room_to_users_table.php
```

```php
# File: database/migrations/Y_m_d_His_add_room_to_users_table.php

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('room_id')->after('avatar_url')->nullable();
        });
    }
```

- Check empty seat of room
```php
# File: app/Models/Room

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Room extends Model
{
    /**
     * Return the empty seat of the room
     */
    public function emptySeat()
    {
        $seated = User::where('room_id', $this->id)->count();

        return $this->capacity - $seated;
    }
}
```

- Show empty seat in room list
```html
<!-- File: resources/views/admin/location/rooms/index.blade.php -->

<tbody>
    @foreach ($rooms as $room)
    <tr>
        <td>{{ $room->id }}</td>
        <td>{{ $room->code }}</td>
        <td>{{ $room->capacity }}</td>
        <td>{{ $room->emptySeat() }}</td>
        <td>{{ $room->description }}</td>
    </tr>
    @endforeach
</tbody>
```

- Access URL: [*/admin/location/rooms*] to test for new function **emptySeat()**

## Repository Design Patern
- [Repository Pattern trong Laravel](https://techblog.vn/repository-pattern-trong-laravel)
- [Repository Pattern là gì](https://viblo.asia/p/repository-pattern-la-gi-su-dung-repository-pattern-trong-laravel-gDVK2jqwKLj)

## Refactoring Code to Create Repository
- Create simple repository
```php
# File: app\Repositories\RoomRepository

<?php

namespace App\Repositories;

use App\Models\Room;
use App\User;

class RoomRepository extends Room
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * Return the empty seat of the room
     */
    public function emptySeat()
    {
        $seated = User::where('room_id', $this->id)->count();

        return $this->capacity - $seated;
    }
}
```

- Inject to RoomController and use this repo
```php
# File: app/Http/Controllers/Admin/Location/RoomController.php

<?php

namespace App\Http\Controllers\Admin\Location;

use App\Repositories\RoomRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    protected $roomRepository

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$rooms = Room::paginate(5);

        // Change to use via repository
        $rooms = $this->roomRepository::paginate(5);

        return view('admin/location/rooms/index')->with('rooms', $rooms);
    }

    // ...
}
```

- More complex: use Abstract and Interface *(not recommend)*
    - Define a base repository interface (basic methods: e.g. all, save, update, delete, find)
    - Define a base abstract eloquent repository (implements for base interface methods)
    - Define a room interface repository extends base repository interface to inherite all basic methods and define some other needed methods 
    - Create a room repository extends base abstract repository and implements for base interface repository
    - Bind in service provider to inject room repository for room interface repository


---
## Third step: Validation, Session, Error Handling and Log
---

## More complex code for room

- Add create templete for room
```html
<!-- File: resources/views/admin/location/rooms/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Room</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rooms.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required></textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="capacity" class="col-md-4 col-form-label text-md-right">{{ __('Capacity') }}</label>

                            <div class="col-md-6">
                                <input id="capacity" type="text" class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}" name="capacity" value="{{ old('capacity') }}" required>

                                @if ($errors->has('capacity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

- Update RoomController
    - Validation
    - Flash Session
    - Error Handling
    - Log
  
```php
# File: app/Http/Controllers/Admin/Location/RoomController.php

<?php

namespace App\Http\Controllers\Admin\Location;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\RoomRepository;

class RoomController extends Controller
{
    // ...

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/location/rooms/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'code'      => 'required|unique:rooms|max:255',
            'capacity'  => 'required|integer',
        ]);

        try {
            // Save new record
            if ($this->roomRepositorySimple->create($request->all())) {
                // Flash a successful message
                $request->session()->flash('status', [
                    'type' => 'success',
                    'message' => 'Room was created successful!'
                ]);
            } else {
                throw new \Exception('Cannot store room data');
            }
        } catch (\Exception $e) {
            // Log error
            Log::error($e->getMessage());

            // Flash a error message
            $request->session()->flash('status', [
                'type' => 'danger',
                'message' => 'Cannot store room data'
            ]);
        }
        
        // Back to list page with flash message
        return redirect()->route('rooms.index');
    }

    // ...
}
```

- Update create templete and index templete to show error and flash message
```html
<!-- File: resources/views/admin/location/rooms/create.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Error Messages -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
...
```

```html
<!-- File: resources/views/admin/location/rooms/index.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Flash message -->
@if (session('status'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{ session('status.type') }} alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status.message') }}
                </div>
            </div>
        </div>
    </div>
@endif

...
```    

## Refactoring for common message alert

- Create a common view file for alert message and error display
```html
<!-- File: resources/views/partials/alert.blade.php -->

@if (isset($errors) && $errors->any())
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('status'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{ session('status.type') }} alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status.message') }}
                </div>
            </div>
        </div>
    </div>
@endif
```

- Inject alert template to app layout
```html
<!-- File: resources/views/layouts/app.blade.php -->

    ...
        <main class="py-4">
            @include('partials.alert')
            
            @yield('content')
        </main>
    ...
```

- Remove the alert message and error display code on create and list room template

- Retest to see the result

## More complex validation

---
## Security
---

## SQL Injection
- (Tho Nguyen)

## CSRF
- (Dung Tran)

---
## Unit Test
---

## Feature test vs Unit test

## How to write the testable code

## Prepare for writing unit test

## Example

## Note: 
[Observer Pattern](https://viblo.asia/p/design-pattern-observer-pattern-Ljy5Ve1Vlra)