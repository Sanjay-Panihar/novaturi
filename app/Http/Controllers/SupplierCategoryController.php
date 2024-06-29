<?php

namespace App\Http\Controllers;

use App\Models\SupplierCategory;
use Illuminate\Http\Request;

class SupplierCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplierCategories = SupplierCategory::select('id','category_name','featured_category','category_image','category_discount','description','url','meta_title','meta_description','meta_keywords','category_status', 'cover_image')
                                                ->orderBy('id', 'desc')->paginate(10);

        return view('Admin.supplier_category.index', compact('supplierCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.supplier_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->addUpdateSupplierCategory($request);

        return redirect()->route('supplier-category.index')->with('Success_message', 'Supplier category has been created successfully.');
    }

    public function update(Request $request, $id)
    {
        $supplierCategory = SupplierCategory::findOrFail($id);
        $this->addUpdateSupplierCategory($request, $supplierCategory);

        return redirect()->route('supplier-category.index')->with('Success_message', 'Supplier category updated successfully.');
    }
    private function addUpdateSupplierCategory(Request $request, SupplierCategory $supplierCategory = null)
    {
        $validatedData = $request->validate([
            'category_name'     => 'required|string|max:255',
            'featured_category' => 'nullable|string|max:255',
            'category_image'    => 'nullable|array',
            'category_image.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_discount' => 'nullable|numeric',
            'description'       => 'nullable|string',
            'url'               => 'nullable|string|max:255',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:255',
            'category_status'   => 'required|in:0,1',
        ]);

        // Handle category image upload if files are present
        if ($request->hasFile('category_image')) {
            $images = [];
            foreach ($request->file('category_image') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('admin/supplier/category_image/smallimage'), $imageName);
                $images[] = $imageName;
            }
            $validatedData['category_image'] = json_encode($images);
        }

        // Handle cover image upload if files are present
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->move(public_path('admin/supplier/cover_image/smallimage'), $coverImageName);
            $validatedData['cover_image'] = $coverImageName;
        }

        // If updating, delete old images if new ones are provided
        if ($supplierCategory) {
            if (!empty($supplierCategory->category_image) && $request->hasFile('category_image')) {
                $oldImages = json_decode($supplierCategory->category_image);
                foreach ($oldImages as $oldImage) {
                    if (file_exists(public_path('admin/supplier/category_image/smallimage/' . $oldImage))) {
                        unlink(public_path('admin/supplier/category_image/smallimage/' . $oldImage));
                    }
                }
            }
            // Handle old cover image
            if (!empty($supplierCategory->cover_image) && $request->hasFile('cover_image')) {
                if (file_exists(public_path('admin/supplier/cover_image/smallimage/' . $supplierCategory->cover_image))) {
                    unlink(public_path('admin/supplier/cover_image/smallimage/' . $supplierCategory->cover_image));
                }
            }
            $supplierCategory->update($validatedData);
        } else {
            $supplierCategory = SupplierCategory::create($validatedData);
        }

        return $supplierCategory;
    }
    public function edit($id)
    {
        $supplierCategory = SupplierCategory::findOrFail($id);

        return view('admin.supplier_category.edit', compact('supplierCategory'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplierCategory $supplierCategory)
    {
        // Delete associated category images
        if (!empty($supplierCategory->category_image)) {
            $images = json_decode($supplierCategory->category_image);
            foreach ($images as $image) {
                $imagePath = public_path('admin/supplier/category_image/smallimage/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
    
        // Delete associated cover image
        if (!empty($supplierCategory->cover_image)) {
            $coverImagePath = public_path('admin/supplier/cover_image/smallimage/' . $supplierCategory->cover_image);
            if (file_exists($coverImagePath)) {
                unlink($coverImagePath);
            }
        }
    
        // Delete the business category record
        $supplierCategory->delete();
    
        return redirect()->route('supplier-category.index')->with('Success_message', 'Supplier category has been deleted successfully.');
    }
    public function getSupplierCategories() {
        $supplierCategory = SupplierCategory::select('id', 'category_name')->where('category_status', 1)->orderBy('category_name', 'ASC')->get();

        return response()->json(['data' =>$supplierCategory]);
    }
}
