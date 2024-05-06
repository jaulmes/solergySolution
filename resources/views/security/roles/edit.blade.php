@extends('dashboard.main')

@section('head')
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script nonce="fd9c0b9b-19f8-4f37-9aa7-aa2e1adba7fe">
    try{(function(w,d){!function(j,k,l,m){j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v="5592";j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const w of Object.entries(Object.entries(dataLayer).reduce(((x,y)=>({...x[1],...y[1]})),{})))zaraz.set(w[0],w[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const z=j.zaraz.q.shift();j[l].q.push(z)}r.defer=!0;for(const A of[localStorage,sessionStorage])Object.keys(A||{}).filter((C=>C.startsWith("_zaraz_"))).forEach((B=>{try{j[l]["z_"+B.slice(7)]=JSON.parse(A.getItem(B))}catch{j[l]["z_"+B.slice(7)]=A.getItem(B)}}));r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>


@endsection

@section('content')
<section class="content">
    <div class="container-fluid mr-5 " >
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <div class="card-header">
                        <h3 class="card-title">Ajouter un role</h3>
                    </div>
                    <form method="post" action="{{route('role.update', [$roles->id])}}" >
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group mx-5">
                                    <label for="titre">titre </label>
                                    <input name="name" type="text" class="form-control" value="{{old('name')?? $roles->name}}" id="titre" placeholder="entrer le titre">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="permission_id">select permission</label>

                                <select name="permission_id[]" multiple aria-label="multiple select example" id="permission_id"  multiple="multiple" >
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript')
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-multiselect.js"></script>
    <script src="js/main.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v55bfa2fee65d44688e90c00735ed189a1713218998793" integrity="sha512-FIKRFRxgD20moAo96hkZQy/5QojZDAbyx0mQ17jEGHCJc/vi0G2HXLtofwD7Q3NmivvP9at5EVgbRqOaOQb+Rg==" data-cf-beacon='{"rayId":"87a50897ef286601","version":"2024.4.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
@endsection