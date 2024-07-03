<?php

namespace App\Http\Controllers;

use App\Models\FreelanceCategory;
use Illuminate\Http\Request;

class FreelanceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $freelanceCategories = FreelanceCategory::select('id', 'category_name', 'featured_category', 'category_image', 'category_discount', 'description', 'url', 'meta_title', 'meta_description', 'meta_keywords', 'category_status', 'cover_image')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('Admin.freelance_category.index', compact('freelanceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.freelance_category.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $freelanceCategory = FreelanceCategory::findOrFail($id);

        return view('Admin.freelance_category.edit', compact('freelanceCategory'));
    }
    public function destroy(FreelanceCategory $freelanceCategory)
    {
        // Delete associated category images
        if (!empty($freelanceCategory->category_image)) {
            $images = json_decode($freelanceCategory->category_image);
            foreach ($images as $image) {
                $imagePath = public_path('admin/freelance/category_image/smallimage/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Delete associated cover image
        if (!empty($freelanceCategory->cover_image)) {
            $coverImagePath = public_path('admin/freelance/cover_image/smallimage/' . $freelanceCategory->cover_image);
            if (file_exists($coverImagePath)) {
                unlink($coverImagePath);
            }
        }

        // Delete the freelance category record
        $freelanceCategory->delete();

        return redirect()->route('freelance-category.index')->with('Success_message', 'Freelance category has been deleted successfully.');
    }

    /**
     * Shared function to handle both store and update operations for Freelance Category.
     */
    public function store(Request $request)
    {
        $this->addUpdateFreelanceCategory($request);

        return redirect()->route('freelance-category.index')->with('Success_message', 'Freelance category has been created successfully.');
    }

    public function update(Request $request, $id)
    {
        $freelanceCategory = FreelanceCategory::findOrFail($id);
        $this->addUpdateFreelanceCategory($request, $freelanceCategory);

        return redirect()->route('freelance-category.index')->with('Success_message', 'Freelance category updated successfully.');
    }
    private function addUpdateFreelanceCategory(Request $request, FreelanceCategory $freelanceCategory = null)
    {
        $validatedData = $request->validate([
            'category_name'     => 'required|string|max:255',
            'featured_category' => 'required|string|max:255',
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
                $image->move(public_path('admin/freelance/category_image/smallimage'), $imageName);
                $images[] = $imageName;
            }
            $validatedData['category_image'] = json_encode($images);
        }
    
        // Handle cover image upload if files are present
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->move(public_path('admin/freelance/cover_image/smallimage'), $coverImageName);
            $validatedData['cover_image'] = $coverImageName;
        }
    
        // If updating, delete old images if new ones are provided
        if ($freelanceCategory) {
            if (!empty($freelanceCategory->category_image) && $request->hasFile('category_image')) {
                $oldImages = json_decode($freelanceCategory->category_image, true);
                foreach ($oldImages as $oldImage) {
                    if (is_string($oldImage) && file_exists(public_path('admin/freelance/category_image/smallimage/' . $oldImage))) {
                        unlink(public_path('admin/freelance/category_image/smallimage/' . $oldImage));
                    }
                }
            }
            if (!empty($freelanceCategory->cover_image) && $request->hasFile('cover_image')) {
                if (file_exists(public_path('admin/freelance/cover_image/smallimage/' . $freelanceCategory->cover_image))) {
                    unlink(public_path('admin/freelance/cover_image/smallimage/' . $freelanceCategory->cover_image));
                }
            }
            $freelanceCategory->update($validatedData);
        } else {
            $freelanceCategory = FreelanceCategory::create($validatedData);
        }
    
        return $freelanceCategory;
    }
    
    
    public function getFreelancerCategories()
    {
        $freelanceCategory = FreelanceCategory::select('id', 'category_name')->where('category_status', 1)->orderBy('category_name', 'ASC')->get();

        return response()->json(['data' => $freelanceCategory]);
    }
}
