# Simple CRUD App Using Laravel

## Setting Up Migration

```
php artisan make:migration create_articles_table --create=”articles”
```

Kode diatas akan menghasilkan sebuah migration untuk membuat tabel artikel.
```
Schema::create('articles', function(Blueprint $table){
    $table->increments('id');
    $table->string('title');
    $table->text('description');
    $table->timestamps();
    $table->datetime('published_at);
});
```
Buka console, jalankan migration tersebut dengan mengetikkan perintah:
```
php artisan migrate
```

## Routes
Buka 'routes.php', tambahkan route baru untuk menghandle semua request yang berhubungan dengan artikel.
```
Route::resource('articles', 'ArticleController');

// atau gunakan function call seperti berikut
resource('articles', 'ArticleController');
```

Setelah menambahkan route diatas kita akan mendapatkan beberapa tambahan routes yang ditambahkan secara otomatis oleh laravel. Untuk melihat route-route yang telah dibuat gunakan perintah `php artisan route:list`

## Controller
Untuk menghandle semua request yang berhubungan dengan artikel kita harus membuat sebuah controller baru yang akan kita beri nama `ArticleController`. Gunakan perintah berikut untuk membuat resource controller secara otomatis.
```
php artisan make:controller ArticleController
```
## Model
Setelah kita menjalankan perintah `php artisan migrate` laravel akan membuatkan table `articles` yang akan kita petakan menjadi objek PHP menggunakan ORM laravel yaitu `Eloquent`. Untuk keperluan tersebut kita butuh untuk membuat model. Gunakan perintah berikut untuk menggenerate model `Article'.
```
php artisan make:model Article
```

## Membuat Form untuk Menambahkan Article
Halaman untuk menambahkan artikel akan diakses melalui url `http://localhost:8000/articles/create` yang dihandle oleh `ArticleController` pada method `create`.

Buka file `ArticleController` kemudian tambahkan kode berikut pada method `create`
```
public function create(){
    return view('articles.create');
}
```

### Membuat view untuk Form Menambahkan Artikel
Buatlah sebuah view baru pada folder `resources/articles/create.blade.php` kemudian isikan kode berikut:
```
@section('content')
    <form method="POST" action="{{ route('article.create') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection
```
