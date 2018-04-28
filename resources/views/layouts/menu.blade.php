
<li class="{{ Request::is('pasals*') ? 'active' : '' }}">
    <a href="{!! route('pasals.index') !!}"><i class="fa fa-edit"></i><span>Pasal</span></a>
</li>

<li class="{{ Request::is('kecelakaans*') ? 'active' : '' }}">
    <a href="{!! route('kecelakaans.index') !!}"><i class="fa fa-edit"></i><span>Kecelakaan</span></a>
</li>


<li class="{{ Request::is('kendaraans*') ? 'active' : '' }}">
    <a href="{!! route('kendaraans.index') !!}"><i class="fa fa-edit"></i><span>Kendaraan</span></a>
</li>

<li class="{{ Request::is('korbanKendaraans*') ? 'active' : '' }}">
    <a href="{!! route('korbanKendaraans.index') !!}"><i class="fa fa-edit"></i><span>Korban Kendaraan</span></a>
</li>

<li class="{{ Request::is('korbanKecelakaans*') ? 'active' : '' }}">
    <a href="{!! route('korbanKecelakaans.index') !!}"><i class="fa fa-edit"></i><span>Korban Kecelakaan</span></a>
</li>

<li class="{{ Request::is('tilangs*') ? 'active' : '' }}">
    <a href="{!! route('tilangs.index') !!}"><i class="fa fa-edit"></i><span>Tilang</span></a>
</li>

