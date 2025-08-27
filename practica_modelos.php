<?php

use App\Models\categories;

require_once 'vendor/autoload.php';

// Configurar la aplicación Laravel para usar en consola
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\products;
use App\Models\customers;

echo "=== PRÁCTICA DE MODELOS ELOQUENT ===\n\n";

$categoria = [];

$categoria[] = categories::firstOrCreate(
    ['slug' => 'electronica'],
    [
        'name' => 'Electronica',
        'description' => 'Dispositivos electronicos y gadgets',
        'color' => '#FF5733',
        'is_active' => true,
    ]
);
/*
 El equivalente en SQL sería:
 insert into categories (name, slug, description, color, is_active, created_at, updated_at)
 values ('Electronica', 'electronica', 'Dispositivos electronicos y gadgets', '#FF5733', true, now(), now());
 */

$categoria[] = categories::firstOrCreate(
    ['slug' => 'ropa'],
    [
        'name' => 'Ropa',
        'description' => 'Prendas de vestir y accesorios de moda',
        'color' => '#33FF57',
        'is_active' => true,
    ]
);

$categoria[] = categories::firstOrCreate(
    ['slug' => 'hogar'],
    [
        'name' => 'Hogar',
        'description' => 'Artículos para el hogar y decoración',
        'color' => '#3357FF',
        'is_active' => true,
    ]
);


echo "Categorías creadas o existentes:\n";

foreach ($categoria as $cat) {
    echo "ID: {$cat->id}, Nombre: {$cat->name}, Slug: {$cat->slug}, Descripción: {$cat->description}, Color: {$cat->color}, Activo: " . ($cat->is_active ? 'Sí' : 'No') . ", Creado en: {$cat->created_at}, Actualizado en: {$cat->updated_at}\n";
}

echo "\nListado completo de categorías:\n";


$categorias = categories::all();
foreach ($categorias as $cat) {
    echo "ID: {$cat->id}, Nombre: {$cat->name}, Slug: {$cat->slug}, Descripción: {$cat->description}, Color: {$cat->color}, Activo: " . ($cat->is_active ? 'Sí' : 'No') . ", Creado en: {$cat->created_at}, Actualizado en: {$cat->updated_at}\n";
}

/*
el equivalente en SQL sería:
select * from categories;

*/

$cat=categories::find(2);
if ($cat) {
    $cat->is_active = false;
    $cat->save();
}

/*
el equivalente en SQL sería:
update categories
set is_active = false, updated_at = now()
where id = 2;
*/

$cat1=categories::where('slug','hogar')->first();
if ($cat1){
    $cat1->is_active=false;
    $cat1->save();
};


