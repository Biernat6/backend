<?php
    namespace App\Http\Controllers;

    use App\Models\Categories;
    use App\Models\Product;
    use Illuminate\Http\Request;

    class CategoryController extends Controller
    {
        //User

        //Wyświetlanie wszystkich zamówień
        public function index()
        {
            $categories = Categories::all();
            return response()->json($categories);
        }

        // Wyszukiwanie produktów w kategorii
        public function findProductsByCategory($id)
        {
            $category = Categories::findOrFail($id);
            $products = $category->products()->with('images')->get();
            return response()->json($products);
        }

        // Wyszukiwanie kategorii
        public function find($id)
        {
            $category = Categories::findOrFail($id);
            return response()->json($category );
        }


        //Admin

        //Dodawanie kategorii
        public function create(Request $request)
        {
            $category = new Categories();

            $category->name = $request->input('name');
        
            $category->save();
            return response()->json($category);
        }        

        //Usuwanie kategorii
        public function destroy($id)
        {
            $category = Categories::destroy($id);
            return response()->json($category);
        }

        //Modyfikowanie kategorii
        public function update(Request $request, $id)
        {
            $category = Categories::findOrFail($id);
            $category->name = $request->input('name');
            $category->save();
    
            return response()->json($category);
        }

        // Dodawanie produktu do kategorii
        public function addProductToCategory(Request $request, $categoryId)
        {
            $category = Categories::findOrFail($categoryId);
            
            $productId = $request->input('product_id');
            
            $product = Product::findOrFail($productId);
            
            $product->category_id = $categoryId; 
            $product->save();
            
            return response()->json(['message' => 'Produkt został prawidłowo dodany']);
        }
    }
?>