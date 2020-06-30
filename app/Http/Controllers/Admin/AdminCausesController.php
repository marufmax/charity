<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CausesRequest;
use App\Models\Causes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCausesController extends Controller
{
    public function index()
    {
        $causes = Causes::paginate(20);

        return view('admin.causes.index', compact('causes'));
    }

    public function create()
    {
        return view('admin.causes.create');
    }

    public function store(CausesRequest $request)
    {
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');

            $fileName = time() . '-' . $file->getClientOriginalName();

            $request->file('featured_image')->move(public_path('images/causes'), $fileName);
        }

        Causes::create([
           'title' => $request->title,
           'slug' => Str::slug($request->title),
           'description' => $request->description,
           'is_featured' => $request->is_featured === 'on' ? 1 : 0,
           'target_amount' => $request->target_amount,
           'featured_image' => $request->hasFile('featured_image') ? $fileName : null,
        ]);

        return redirect()->back()->with(['success' => 'Cause added successfully!']);
    }

    public function destroy(Causes $causes)
    {
        $causes->delete();

        return redirect()->back()->with(['success' => 'Cause deleted successfully!']);
    }
}
