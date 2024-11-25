<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('info-images', 'public');
            $validated['image'] = $path;
        }

        Info::create($validated);

        return redirect()
            ->route('dashboard.infos.index')
            ->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function update(Request $request, Info $info)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($info->image) {
                Storage::disk('public')->delete($info->image);
            }
            
            $path = $request->file('image')->store('info-images', 'public');
            $validated['image'] = $path;
        }

        $info->update($validated);

        return redirect()
            ->route('dashboard.infos.index')
            ->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy(Info $info)
    {
        if ($info->image) {
            Storage::disk('public')->delete($info->image);
        }
        
        $info->delete();

        return redirect()
            ->route('dashboard.infos.index')
            ->with('success', 'Informasi berhasil dihapus!');
    }
} 