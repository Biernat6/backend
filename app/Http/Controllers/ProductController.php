<?php
    namespace app\Http\Controllers;

    use App\Models\Product;
    use App\Models\Img;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class ProductController extends Controller
    {

        // Admin

        //Dodawanie produktu
        public function addProduct(Request $request)
        {
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');

            $product->save();

            $img = new Img();
            $img->product_id = $product->id; 
            $img->url = $request->input('url');
            $img->save();

            return response()->json($product);
        }

        //Modyfikowanie produktu
        public function modifiedProduct(Request $request, $id)
        {
            $product = Product::findOrFail($id);
        
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category_id');

            $product->save();
            return response()->json($product);
        }



        //Usuwanie produktu
        public function deleteProduct($id)
        {
            $product = Product::findOrFail($id);

            $product->delete();
            return response()->json($product);
        }

        //Aktualizacja magazynu produktu
        public function update(Request $request, $id)
        {
            $product = Product::findOrFail($id);

            $product->stock = $request->input('stock');

            $product->save();
            return response()->json($product);
        }

        //User

        //Wyświetlanie
        public function index()
        {
            $product = Product::with('images')->get();
            return response()->json($product);
        }

        //Wyszukanie produktu
        public function find($id)
        {
            $product = Product::with('category')->findOrFail($id);
            return response()->json($product);
        }


        // Pobranie obrazów produktu
        public function getProductImages($id)
        {
            $images = Img::where('product_id', $id)->get();
            return response()->json($images);
        }

        public function findByPriceRange(Request $request)
        {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');

            $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

            return response()->json($products);
        }

        public function indexAdministration()
        {
            $product = Product::with(['images', 'category'])->get();
            return response()->json($product);
        }

        public function addImageByUrl(Request $request, $productId)
        {
            $img = new Img();
            $img->product_id = $productId; 
            $img->url = $request->input('url');
            $img->save();
        
            return response()->json($img);
        }

        public function deleteImage($imageId)
        {
            $image = Img::findOrFail($imageId);
            $image->delete();
            return response()->json(['message' => 'Zdjęcie zostało usunięte']);
        }

        public function updateImage(Request $request, $imageId)
        {
            $image = Img::findOrFail($imageId);
            $image->url = $request->input('url');
            $image->save();
        
            return response()->json(['message' => 'Obraz produktu został zaktualizowany pomyślnie']);
        }
    }
?>