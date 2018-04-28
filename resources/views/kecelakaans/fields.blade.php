<!-- No Lapangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_lapangan', 'No Lapangan:') !!}
    {!! Form::number('no_lapangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan_lokasi', 'Keterangan Lokasi:') !!}
    {!! Form::text('keterangan_lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Kerugian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_kerugian', 'Total Kerugian:') !!}
    {!! Form::number('total_kerugian', null, ['class' => 'form-control']) !!}
</div>

<!-- Geom Field -->
<div class="form-group col-sm-12">
    <div id="map-content" style="width:100%;height:420px; z-index:50"></div>
    <a class="btn btn-primary btn-sm" id="delete-button">Delete</a>
    <label class="col-sm-12">Geom</label>
    <div class="col-sm-12">
        {!! Form::text('geom', null, ['class' => 'form-control','id'=>'geom']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kecelakaans.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
    <script>
        var drawingManager;
        var selectedShape;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-content'),{
                center: new google.maps.LatLng(-0.94924, 100.35427),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true,
                mapTypeControl: true
            });

            var polyOptions = {
                fillColor: 'blue',
                strokeColor: 'blue',
                draggable: true
            };

            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_LEFT,
                    drawingModes: [
                        google.maps.drawing.OverlayType.POLYGON
                    ]
                },
                polygonOptions: polyOptions,
                map: map
            });

            //event digitasi di google map
            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event){
                if (event.type == google.maps.drawing.OverlayType.POLYGON){
                    //console.log('polygon path array', event.overlay.getPath().getArray());
                    var str_input ='((';
                    var i=0;
                    var coor = [];
                    $.each(event.overlay.getPath().getArray(), function(key, latlng){
                        var lat = latlng.lat();
                        var lon = latlng.lng();
                        coor[i] = lon +' '+ lat;
                        str_input += lon +' '+ lat +',';
                        i++;
                    });
                    str_input = str_input+''+coor[0]+'))';
                    $("#geom").val(str_input);
                    drawingManager.setDrawingMode(null);
                    drawingManager.setOptions({
                        drawingControl: false
                    });
                    // Add an event listener that selects the newly-drawn shape when the user mouses down on it.
                    var newShape = event.overlay;
                    newShape.type = event.type;
                    setSelection(newShape);
                    google.maps.event.addListener(newShape, 'click', function(){
                        setSelection(newShape);
                    });
                }
                function getCoordinate(){
                    var polygonBounds = newShape.getPath();
                    str_input ='((';
                    for(var i = 0 ; i < polygonBounds.length ; i++){
                        coor[i] = polygonBounds.getAt(i).lng() +' '+ polygonBounds.getAt(i).lat();
                        str_input += polygonBounds.getAt(i).lng() +' '+ polygonBounds.getAt(i).lat() +',';
                    }
                    str_input = str_input+''+coor[0]+'))';
                    $("#geom").val(str_input);
                }
                google.maps.event.addListener(newShape.getPath(), 'set_at', getCoordinate);
                google.maps.event.addListener(newShape.getPath(), 'insert_at', getCoordinate);
                google.maps.event.addListener(newShape.getPath(), 'remove_at', getCoordinate);
            });
            google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
            google.maps.event.addListener(map, 'click', clearSelection);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

            drawingManager.setMap(map);
        }

        function clearSelection() {
            if (selectedShape) {
                selectedShape.setEditable(false);
                selectedShape = null;
            }
        }

        function setSelection(shape) {
            clearSelection();
            selectedShape = shape;
            shape.setEditable(true);
        }

        function deleteSelectedShape() {
            if (selectedShape) {
                $("#geom").val('');
                selectedShape.setMap(null);
                drawingManager.setOptions({
                    drawingControl: true
                });
            }
        }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIhFclffR-6pgFqaUP_d7ZU8fEUhCflZ0&libraries=drawing&callback=initMap"></script>
@endsection