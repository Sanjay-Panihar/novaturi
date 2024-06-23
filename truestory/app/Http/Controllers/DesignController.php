<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class DesignController extends Controller
{
    

    public function showCustomizePage()
    {
        return view('Tshirtdesign');
    }

    public function customizeTshirt(Request $request)
    {
        // Your customization logic here

        // Assuming you have created a canvas with Fabric.js and saved it as an image
        $imagePath = 'path/to/your/generated/tshirt-image.png';

        // Save the image path to the session for later download
        $request->session()->put('tshirt_image_path', $imagePath);

        return view('customize-tshirt', ['imagePath' => $imagePath]);
    }

    public function downloadTshirt(Request $request)
    {
        // Retrieve the saved image path from the session
        $imagePath = $request->session()->get('tshirt_image_path');

        // Generate a unique name for the downloaded file
        $downloadFileName = 'custom_tshirt_' . time() . '.png';

        // Set the headers to force download
        return response()->download($imagePath, $downloadFileName);
    }
}
