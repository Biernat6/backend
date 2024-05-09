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
            $product->type = $request->input('type');
            $product->weight = $request->input('weight');
            $product->description = $request->input('description');
            $product->unit_price = $request->input('unit_price');
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');
            $product->stock = $request->input('stock');

            $product->save();

            $img = new Img();
            $img->product_id = $product->id; 
            $img->img_url = $request->input('img_url');
            $img->save();

            return response()->json($product);
        }

        //Modyfikowanie produktu
        public function modifiedProduct(Request $request, $id)
{
        $product = Product::findOrFail($id);
        
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->weight = $request->input('weight');
        $product->description = $request->input('description');
        $product->unit_price = $request->input('unit_price');
        $product->category_id = $request->input('category_id');
        $product->stock = $request->input('stock');

        $product->save();

        $img = Img::where('product_id', $product->id)->first();

        // Sprawdzenie, czy img_url nie jest puste
        if ($request->has('img_url') && !is_null($request->input('img_url'))) {
            if ($img) {
                $img->img_url = $request->input('img_url');
                $img->save();
            } else {
                $newImg = new Img();
                $newImg->product_id = $product->id;
                $newImg->img_url = $request->input('img_url');
                $newImg->save();
            }
        }

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
            $product = Product::all();
            return response()->json($product);
        }

        //Wyszukanie produktu
        public function find($id)
        {
            $product = Product::findOrFail($id);
            return response()->json($product);
        }
    }
?>