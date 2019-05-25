<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\File
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $extension
 * @property string $folder
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereExtension( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereFolder( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereType( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereUserId( $value )
 */
class File extends Model
{
   //
   protected $fillable = [ 'name', 'type', 'extension', 'user_id', ];

   public function user ()
   {
      return $this->belongsTo ( User::class );
   }

}
