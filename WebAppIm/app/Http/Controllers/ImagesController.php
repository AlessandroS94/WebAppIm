<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Images::paginate(10);
        return view('welcome', compact('images'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexByTitle()
    {
        $images = Images::orderBy('title', 'desc')->paginate(10);
        return view('welcome', compact('images'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexByUploadedAt()
    {
        $images = Images::orderBy('uploaded_at', 'desc')->paginate(10);
        return view('welcome', compact('images'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexByTitleIncr()
    {
        $images = Images::orderBy('title', 'asc')->paginate(10);
        return view('welcome', compact('images'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexByUploadedAtIncr()
    {
        $images = Images::orderBy('uploaded_at', 'asc')->paginate(10);
        return view('welcome', compact('images'));
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $filter = $request->input('filter');
        $images = Images::where('title', 'like', '%' . $filter . '%')->paginate(10);
        return view('welcome', compact('images'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Validazione dei dati
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:10240', // Max 10MB
        ]);

        // Gestione dell'upload dell'immagine
        $imageFile = $request->file('image');
        $imagePath = $imageFile->store('images', 'public');

        // Estrazione dei metadati (opzionale, se implementato)
        $exifData = @exif_read_data($imageFile);

        // Inizializzazione delle variabili per i metadati
        $dateTaken = null;
        $latitude = null;
        $longitude = null;

        if ($exifData !== false) {
            // Estrai la data dello scatto
            if (!empty($exifData['DateTimeOriginal'])) {
                $dateTaken = date('Y-m-d H:i:s', strtotime($exifData['DateTimeOriginal']));
            }

            // Estrai le coordinate GPS
            if (!empty($exifData['GPSLatitude']) && !empty($exifData['GPSLongitude'])) {
                $latitude = $this->getGps($exifData['GPSLatitude'], $exifData['GPSLatitudeRef']);
                $longitude = $this->getGps($exifData['GPSLongitude'], $exifData['GPSLongitudeRef']);
            }
        }
        // Crea una nuova istanza dell'immagine nel database
        Images::create([
            'title' => $validatedData['title'],
            'image_path' => $imagePath,
            'uploaded_at' => now(),
            'date_taken' => $dateTaken,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'metadata' => $exifData ? json_encode($exifData) : null,
        ]);
        // Reindirizza l'utente con un messaggio di successo
        return redirect('/')->with('success', 'Immagine caricata con successo.');
    }

    // Funzioni helper per convertire le coordinate GPS
    private function getGps($exifCoord, $hemi)
    {
        $degrees = count($exifCoord) > 0 ? $this->gps2Num($exifCoord[0]) : 0;
        $minutes = count($exifCoord) > 1 ? $this->gps2Num($exifCoord[1]) : 0;
        $seconds = count($exifCoord) > 2 ? $this->gps2Num($exifCoord[2]) : 0;

        $flip = ($hemi == 'W' || $hemi == 'S') ? -1 : 1;

        return $flip * ($degrees + ($minutes / 60) + ($seconds / 3600));
    }

    private function gps2Num($coordPart)
    {
        $parts = explode('/', $coordPart);

        if (count($parts) <= 0) {
            return 0;
        }

        if (count($parts) == 1) {
            return $parts[0];
        }

        return floatval($parts[0]) / floatval($parts[1]);
    }


}
