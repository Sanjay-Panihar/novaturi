<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessCategories = BusinessCategory::select('id','category_name','featured_category','category_image','category_discount','description','url','meta_title','meta_description','meta_keywords','category_status', 'cover_image')
                                                ->orderBy('id', 'desc')->paginate(10);

        return view('admin.business_category.index', compact('businessCategories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.business_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->addUpdateBusinessCategory($request);

        return redirect()->route('business-category.index')->with('Success_message', 'Business category has been created successfully.');
    }

    public function update(Request $request, $id)
    {
        $businessCategory = BusinessCategory::findOrFail($id);
        $this->addUpdateBusinessCategory($request, $businessCategory);

        return redirect()->route('business-category.index')->with('Success_message', 'Business category updated successfully.');
    }
    private function addUpdateBusinessCategory(Request $request, BusinessCategory $businessCategory = null)
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
                $image->move(public_path('admin/category_image/smallimage'), $imageName);
                $images[] = $imageName;
            }
            $validatedData['category_image'] = json_encode($images);
        }

        // Handle cover image upload if files are present
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->move(public_path('admin/cover_image/smallimage'), $coverImageName);
            $validatedData['cover_image'] = $coverImageName;
        }

        // If updating, delete old images if new ones are provided
        if ($businessCategory) {
            if (!empty($businessCategory->category_image) && $request->hasFile('category_image')) {
                $oldImages = json_decode($businessCategory->category_image);
                foreach ($oldImages as $oldImage) {
                    if (file_exists(public_path('admin/category_image/smallimage/' . $oldImage))) {
                        unlink(public_path('admin/category_image/smallimage/' . $oldImage));
                    }
                }
            }
            // Handle old cover image
            if (!empty($businessCategory->cover_image) && $request->hasFile('cover_image')) {
                if (file_exists(public_path('admin/cover_image/smallimage/' . $businessCategory->cover_image))) {
                    unlink(public_path('admin/cover_image/smallimage/' . $businessCategory->cover_image));
                }
            }
            $businessCategory->update($validatedData);
        } else {
            $businessCategory = BusinessCategory::create($validatedData);
        }

        return $businessCategory;
    }
    public function edit($id)
    {
        $businessCategory = BusinessCategory::findOrFail($id);
        return view('admin.business_category.edit', compact('businessCategory'));
    }

    public function destroy(BusinessCategory $businessCategory)
    {
        // Delete associated category images
        if (!empty($businessCategory->category_image)) {
            $images = json_decode($businessCategory->category_image);
            foreach ($images as $image) {
                $imagePath = public_path('admin/category_image/smallimage/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
    
        // Delete associated cover image
        if (!empty($businessCategory->cover_image)) {
            $coverImagePath = public_path('admin/cover_image/smallimage/' . $businessCategory->cover_image);
            if (file_exists($coverImagePath)) {
                unlink($coverImagePath);
            }
        }
    
        // Delete the business category record
        $businessCategory->delete();
    
        return redirect()->route('business-category.index')->with('Success_message', 'Business category has been deleted successfully.');
    }
    
}
