<script>
    $( '#deleteModal' ).on( 'show.bs.modal', function ( event ) {
        var file_id = $( event.relatedTarget ).data( 'file-id' );
        $( this ).find( '.modal-body #file_id' ).val( file_id );
    } )
</script>