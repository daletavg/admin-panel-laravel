<ul class="nav nav-pills nav-pills-primary" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
            RU - Русский
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
            UK - Украинский
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
            EN - Английский
        </a>
    </li>
</ul>


<div class="tab-content tab-space">
    <div class="tab-pane active" id="link1" aria-expanded="true">
        {!! $tabs[0] ??''!!}
    </div>
    <div class="tab-pane" id="link2" aria-expanded="false">
        {!! $tabs[1] ??''!!}
    </div>
    <div class="tab-pane" id="link3" aria-expanded="false">
        {!! $tabs[2] ??''!!}
    </div>
</div>
