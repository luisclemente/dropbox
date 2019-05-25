<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class FilesController extends Controller
{
   private $img_ext = [ 'jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF' ];
   private $video_ext = [ 'mp4', 'avi', 'mpeg', 'flv', 'FLV', 'MP4', 'AVI', 'MPEG' ];
   private $document_ext = [ 'doc', 'docx', 'pdf', 'odt', 'xlsx', 'XLSX', 'DOC', 'DOCX', 'PDF', 'ODT' ];
   private $audio_ext = [ 'mp3', 'mpga', 'wma', 'ogg', 'MP3', 'MPGA', 'WMA', 'OGG' ];

   public function __construct ()
   {
      $this->middleware ( [
         'auth',
        // 'role:Admin|Subscriptor',
        // 'role:Admin',
      ]);
   }

   public function create ()
   {
      return view ( 'admin.files.create' );
   }

   public function images ()
   {
      $images = File::whereUserId ( auth ()->id () )->OrderBy ( 'id', 'desc' )->where ( 'type', '=', 'image' )->get ();

      $folder = str_slug ( Auth::user ()->name . '-' . Auth::id () );

      return view ( 'admin.files.type.images', compact ( 'images', 'folder' ) );
   }

   public function videos ()
   {
      $videos = File::whereUserId ( auth ()->id () )->OrderBy ( 'id', 'desc' )->where ( 'type', '=', 'video' )->get ();

      $folder = str_slug ( Auth::user ()->name . '-' . Auth::id () );

      return view ( 'admin.files.type.videos', compact ( 'videos', 'folder' ) );
   }

   public function audios ()
   {
      $audios = File::whereUserId ( auth ()->id () )->OrderBy ( 'id', 'desc' )->where ( 'type', '=', 'audio' )->get ();

      $folder = str_slug ( Auth::user ()->name . '-' . Auth::id () );

      return view ( 'admin.files.type.audios', compact ( 'audios', 'folder' ) );
   }

   public function documents ()
   {
      $documents = File::whereUserId ( auth ()->id () )->OrderBy ( 'id', 'desc' )->where ( 'type', '=', 'document' )->get ();

     // dd($documents);
      $folder = str_slug ( Auth::user ()->name . '-' . Auth::id () );

      return view ( 'admin.files.type.documents', compact ( 'documents', 'folder' ) );
   }

//VALIDACIONES
   public function store ( Request $request )
   {
//      ini_get (archivo php.ini del servidor). Aumentamos su tamaño máximo
      $max_size = (int) ini_get ( 'upload_max_filesize' ) * 1000000000;
      $all_ext = implode ( ',', $this->allExtensions () );

      $request->validate ( [
           'file' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
      ] );

      $file = $request->file ( 'file' );
      $name = $file->getClientOriginalName (); // p.ej. "arbol.jpeg"
      $ext = $file->getClientOriginalExtension (); // p.ej. "jpeg"
      $type = $this->getType ( $ext );

      if ( $type != null){
         //      putFileAs ( ruta, archivo, nombre-del-archivo). Guarda un archivo en la ruta y con el nombre indicados.
         if ( Storage::putFileAs ( '/public/' . $this->getUserFolder () . '/' . $type . '/', $file, $name ) )
         {
         //   $uploadFile::create ( [
            File::create ( [
               'name'      => $name,
               'type'      => $type,
               'extension' => $ext,
               'user_id'   => Auth::id ()
            ] );
         }
         return back ()->with ( 'info', [ 'success', 'El archivo se ha subido correctamente' ] );
      }

      return back ()->with ( 'info', [ 'danger', 'El tipo de archivo no pudo ser subido' ] );

   }

   public function destroy ( $id )
   {
      $file = File::findOrFail ( $id );

      if ( Storage::disk ( 'local' )->exists ( '/public/' . $this->getUserFolder () . '/' . $file->type . '/' . $file->name  ) )
      {
         if ( Storage::disk ( 'local' )->delete ( '/public/' . $this->getUserFolder () . '/' . $file->type . '/' . $file->name  ) )
         {
            try
            {
               $file->delete ();
            } catch ( \Exception $e )
            {
            }

            return back ()->with ( 'info', [ 'success', 'El archivo se ha eliminado correctamente' ] );

         }
      }
   }


   private function getType ( $ext )
   {
      if ( in_array ( $ext, $this->img_ext ) )
      {
         return 'image';
      }
      if ( in_array ( $ext, $this->video_ext ) )
      {
         return 'video';
      }
      if ( in_array ( $ext, $this->audio_ext ) )
      {
         return 'audio';
      }
      if ( in_array ( $ext, $this->document_ext ) )
      {
         return 'document';
      }
   }

   private function allExtensions ()
   {
      return array_merge ( $this->img_ext, $this->video_ext, $this->audio_ext, $this->document_ext );
   }

   private function getUserFolder ()
   {
      $folder = Auth::user ()->name . '-' . Auth::id ();
      return Str::slug ( $folder, '-' );
   }


}
