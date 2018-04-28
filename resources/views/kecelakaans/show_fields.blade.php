<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $kecelakaan->id !!}</p>
</div>

<!-- No Lapangan Field -->
<div class="form-group">
    {!! Form::label('no_lapangan', 'No Lapangan:') !!}
    <p>{!! $kecelakaan->no_lapangan !!}</p>
</div>

<!-- Keterangan Lokasi Field -->
<div class="form-group">
    {!! Form::label('keterangan_lokasi', 'Keterangan Lokasi:') !!}
    <p>{!! $kecelakaan->keterangan_lokasi !!}</p>
</div>

<!-- Total Kerugian Field -->
<div class="form-group">
    {!! Form::label('total_kerugian', 'Total Kerugian:') !!}
    <p>{!! $kecelakaan->total_kerugian !!}</p>
</div>

<!-- Geom Field -->
<div class="form-group">
    {!! Form::label('geom', 'Map:') !!}
    <div id="map-content" style="width:100%;height:420px; z-index:50"></div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $kecelakaan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $kecelakaan->updated_at !!}</p>
</div>

@section('scripts')
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-content'),{
                center: new google.maps.LatLng(-0.343600, 100.380834),
                zoom: 20,
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

            getMap();
        }

        function getMap() {
            var curMap = new google.maps.Data();
            curMap.loadGeoJson('{!! route('getMapKecelakaan',['id'=>$kecelakaan->id]) !!}');
            curMap.setStyle(function(feature){
                return({
                    fillColor: '#bd0d2b',
                    strokeColor: '#000000',
                    strokeWeight: 1,
                    fillOpacity: 0.3
                });
            });
            curMap.setMap(map);
            $.get('{!! route('getCenterKecelakaan',['id'=>$kecelakaan->id]) !!}',function(result){
                map.setCenter(new google.maps.LatLng(result.lat,result.lon));
                map.setZoom(16);
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3UDFwI28UYpMQQqpV7YxlSBShk-7fGCc&callback=initMap"></script>

@endsection