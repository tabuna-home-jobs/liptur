<div id="route-app">
    <path-input field-name="route" icons-resource="/icons.json" field-value="{{$route}}"
                template="/tpl/route-template.html"></path-input>
</div>

@push("scripts")
    <script src="/js/route-app.js"></script>
    <script src="/dist/js/g-map-route.js"></script>
@endpush

@push("stylesheet")
<style>
    .g-maps {
        height: 40vh;
    }

    .map-container .panel {
        margin-bottom: 0;
        border-radius: 0;
    }

    .map-container .row {
        margin-left: 0;
        margin-right: 0;
    }

    .find-dropdown {
        position: absolute;
        z-index: 10;
        top: 3em;
        background-color: white;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 0.3em 0 0.3em 0;
    }

    .find-dropdown li {
        list-style-type: none;
        padding-left: 1.5em;
        padding-right: 1.5em;
        cursor: pointer;
    }

    .find-dropdown li:hover {
        background-color: #ccc;
    }

    .dropdown-menu .fa {
        cursor: pointer;
    }

    .map-icon {
        padding: 3px;
    }

    .pt-icon {
        max-height: 1.4em;
        border-radius: 3px;
    }
</style>
@endpush