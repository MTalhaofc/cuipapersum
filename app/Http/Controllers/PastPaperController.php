<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PastPaper;
use App\Models\PastPaperImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PastPaperController extends Controller
{
    public function index(Request $request) {
        $query = PastPaper::query();

        if ($request->filled('subject')) {
            $query->where('subject', 'like', '%' . $request->subject . '%');
        }

        if ($request->filled('coursecode')) {
            $query->where('coursecode', 'like', '%' . $request->coursecode . '%');
        }

        $pastPapers = $query->latest()->get();

        return view('landing', compact('pastPapers'));
    }

    public function create() {
        return view('pastpapers.createpaper');
    }

   
    
        public function store(Request $request) {
            $request->validate([
                'title' => 'required|string|max:255',
                'coursecode' => 'required|string|max:255',
                'teachers' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'subject' => 'nullable|string',
                'files.*' => 'required|file|mimes:pdf,jpg,jpeg,png',
            ]);
    
            $pastPaper = PastPaper::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'coursecode' => $request->coursecode,
                'teachers' => $request->teachers,
                'department' => $request->department,
                'subject' => $request->subject,
            ]);
    
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('pastpapers', 'public');
                    $pastPaper->images()->create(['file_path' => $path]);
                }
            }
    
            return redirect()->route('landing')->with('success', 'Past paper uploaded successfully!');
        }
    
        // ... other methods ...
    
    

    public function show(PastPaper $pastpaper) {
        return view('pastpapers.show', compact('pastpaper'));
    }

    public function edit(PastPaper $pastpaper) {
        if (Auth::id() !== $pastpaper->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('pastpapers.edit', compact('pastpaper'));
    }

    public function update(Request $request, PastPaper $pastpaper) {
        if (Auth::id() !== $pastpaper->user_id) {
            abort(403, 'Unauthorized action.');
        }
    
        $request->validate([
            'title' => 'required|string|max:255',
            'coursecode' => 'required|string|max:255',
            'teachers' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'subject' => 'nullable|string',
            'images.*' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);
    
        // Update past paper details
        $pastpaper->update([
            'title' => $request->title,
            'coursecode' => $request->coursecode,
            'teachers' => $request->teachers,
            'department' => $request->department,
            'subject' => $request->subject,
        ]);
    
        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('pastpapers', 'public');
                $pastpaper->images()->create(['file_path' => $path]);
            }
        }
    
        return redirect()->route('landing')->with('success', 'Past paper updated successfully!');
    }
    

    public function destroy(PastPaper $pastpaper) {
        if (Auth::id() !== $pastpaper->user_id) {
            abort(403, 'Unauthorized action.');
        }

        foreach ($pastpaper->images as $image) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }

        $pastpaper->delete();

        return redirect()->route('landing')->with('success', 'Past paper deleted successfully!');
    }

    public function downloadImage($imageId) {
        $image = Image::findOrFail($imageId);
    
        return Storage::disk('public')->download($image->file_path);
    }
    
public function deleteImage(PastPaper $pastpaper, $imageId) {
    $image = $pastpaper->images()->findOrFail($imageId);
    
    // Delete the file from storage
    Storage::disk('public')->delete($image->file_path);
    
    // Delete the image record from the database
    $image->delete();

    return response()->json(['success' => true]);
}
public function indexByDepartment($department)
{
    $pastPapers = PastPaper::where('department', $department)->get();

    return view('pastpapers.indexbydepartment', compact('pastPapers', 'department'));
}
}